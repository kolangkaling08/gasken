<?php
// ==============================================
// ROUTER DENGAN URL NORMALIZATION FIX
// ==============================================

// Konfigurasi
define('TOTAL_LP_FILES', 10);

// Fungsi untuk normalisasi keyword ke format URL
function normalizeForUrl($keyword) {
    // Ubah ke lowercase
    $keyword = strtolower(trim($keyword));
    
    // Ganti spasi dengan tanda hubung
    $keyword = str_replace(' ', '-', $keyword);
    
    // Ganti multiple dash dengan single dash
    $keyword = preg_replace('/-+/', '-', $keyword);
    
    // Hapus karakter khusus, hanya izinkan a-z, 0-9, dan dash
    $keyword = preg_replace('/[^a-z0-9\-]/', '', $keyword);
    
    return $keyword;
}

// Fungsi untuk normalisasi keyword untuk pencarian
function normalizeForSearch($keyword) {
    // Ubah ke lowercase dan trim
    $keyword = strtolower(trim($keyword));
    
    // Untuk pencarian, kita perlu dua format:
    // 1. Format asli (dengan spasi)
    // 2. Format dengan tanda hubung
    // Karena URL bisa datang dalam format: grandbet-88
    
    // Coba decode dari URL format (dash ke spasi)
    $keywordWithSpace = str_replace('-', ' ', $keyword);
    
    return [
        'dash_format' => $keyword,           // grandbet-88
        'space_format' => $keywordWithSpace  // grandbet 88
    ];
}

// Fungsi untuk mendapatkan base path
function getBasePath() {
    $scriptName = $_SERVER['SCRIPT_NAME'];
    $scriptDir = dirname($scriptName);
    
    if ($scriptDir === '/' || $scriptDir === '\\') {
        return '/';
    }
    
    return $scriptDir . '/';
}

// Fungsi untuk mendapatkan base URL
function getBaseUrl() {
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
    $host = $_SERVER['HTTP_HOST'];
    $basePath = getBasePath();
    
    return $protocol . $host . $basePath;
}

// Fungsi untuk membaca brands.json
function getBrandsData() {
    $filename = "brands.json";
    
    if (!file_exists($filename)) {
        return null;
    }
    
    $jsonContent = file_get_contents($filename);
    $data = json_decode($jsonContent, true);
    
    return $data;
}

// Fungsi untuk replace placeholder
function replacePlaceholders($content, $brandsData) {
    if (!$brandsData) {
        return $content;
    }
    
    $baseUrl = getBaseUrl();
    $basePath = getBasePath();
    
    $placeholders = [
        '{{Amphtml}}' => $brandsData['amphtml'] ?? '',
        '{{Image}}' => $brandsData['image'] ?? '',
        '{{Title}}' => $brandsData['title'] ?? '',
        '{{Metades}}' => $brandsData['metades'] ?? '',
        '{{Artikel}}' => $brandsData['artikel'] ?? '',
        '{{Keunggunalan1}}' => $brandsData['keunggulan1'] ?? '',
        '{{Keunggunalan2}}' => $brandsData['keunggulan2'] ?? '',
        '{{Keunggunalan3}}' => $brandsData['keunggulan3'] ?? '',
        '{{Keunggunalan4}}' => $brandsData['keunggulan4'] ?? '',
        '{{Link-1}}' => $brandsData['LinkOut-1'] ?? '',
        '{{Link-2}}' => $brandsData['LinkOut-2'] ?? '',
        '{{Link-3}}' => $brandsData['LinkOut-3'] ?? '',
        '{{Link-4}}' => $brandsData['LinkOut-4'] ?? '',
        '{{Link-5}}' => $brandsData['LinkOut-5'] ?? '',
        '{{BaseUrl}}' => $baseUrl,
        '{{BasePath}}' => $basePath,
    ];
    
    return str_replace(array_keys($placeholders), array_values($placeholders), $content);
}

// Fungsi untuk output buffer
function includeWithPlaceholders($lpFile, $brandsData) {
    ob_start();
    require_once($lpFile);
    $content = ob_get_clean();
    $content = replacePlaceholders($content, $brandsData);
    echo $content;
}

// Fungsi untuk mendapatkan semua keyword dari kw.txt
function getAllKeywords() {
    $filename = "kw.txt";
    
    if (!file_exists($filename)) {
        return [];
    }
    
    $lines = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    return array_map('trim', $lines);
}

// Fungsi untuk mencari keyword dengan multiple format matching
function findKeywordAndLP($urlKeyword) {
    $keywords = getAllKeywords();
    
    if (empty($keywords)) {
        return ['found' => false, 'keyword' => '', 'line' => 0, 'lp' => 1];
    }
    
    // Normalisasi keyword dari URL
    $normalizedUrl = normalizeForSearch($urlKeyword);
    $urlKeywordDash = $normalizedUrl['dash_format'];    // grandbet-88
    $urlKeywordSpace = $normalizedUrl['space_format'];  // grandbet 88
    
    // Debug log
    error_log("Searching for URL keyword: '$urlKeyword'");
    error_log("Dash format: '$urlKeywordDash'");
    error_log("Space format: '$urlKeywordSpace'");
    
    foreach ($keywords as $lineNumber => $kw) {
        // Normalisasi keyword dari file
        $normalizedKw = strtolower(trim($kw));
        
        // Cek dalam 3 format:
        // 1. Exact match (case-insensitive)
        if (strtolower(trim($kw)) === strtolower(trim($urlKeyword))) {
            $actualLine = $lineNumber + 1;
            $lpNumber = (($actualLine - 1) % TOTAL_LP_FILES) + 1;
            
            error_log("Found exact match: '$kw' at line $actualLine");
            return [
                'found' => true,
                'keyword' => $kw,
                'line' => $actualLine,
                'lp' => $lpNumber,
            ];
        }
        
        // 2. Match dengan format dash (grandbet-88 vs "grandbet 88")
        $kwDashFormat = normalizeForUrl($kw); // Convert "Grandbet 88" to "grandbet-88"
        
        if ($kwDashFormat === $urlKeywordDash) {
            $actualLine = $lineNumber + 1;
            $lpNumber = (($actualLine - 1) % TOTAL_LP_FILES) + 1;
            
            error_log("Found dash format match: '$kw' -> '$kwDashFormat' at line $actualLine");
            return [
                'found' => true,
                'keyword' => $kw,
                'line' => $actualLine,
                'lp' => $lpNumber,
            ];
        }
        
        // 3. Match dengan format space (grandbet 88)
        if ($normalizedKw === $urlKeywordSpace) {
            $actualLine = $lineNumber + 1;
            $lpNumber = (($actualLine - 1) % TOTAL_LP_FILES) + 1;
            
            error_log("Found space format match: '$kw' at line $actualLine");
            return [
                'found' => true,
                'keyword' => $kw,
                'line' => $actualLine,
                'lp' => $lpNumber,
            ];
        }
        
        // 4. Match dengan hapus semua spasi/dash (grandbet88)
        $kwNoSpace = preg_replace('/[\s\-]/', '', $normalizedKw);
        $urlNoSpace = preg_replace('/[\s\-]/', '', $urlKeywordDash);
        
        if ($kwNoSpace === $urlNoSpace) {
            $actualLine = $lineNumber + 1;
            $lpNumber = (($actualLine - 1) % TOTAL_LP_FILES) + 1;
            
            error_log("Found no-space match: '$kw' -> '$kwNoSpace' at line $actualLine");
            return [
                'found' => true,
                'keyword' => $kw,
                'line' => $actualLine,
                'lp' => $lpNumber,
            ];
        }
    }
    
    error_log("Keyword '$urlKeyword' not found in kw.txt");
    return ['found' => false, 'keyword' => '', 'line' => 0, 'lp' => 1];
}

// Fungsi untuk mengambil keyword dari URL
function getKeywordFromUrl() {
    $requestUri = $_SERVER['REQUEST_URI'];
    
    // Hapus query string
    $uriWithoutQuery = strtok($requestUri, '?');
    
    // Dapatkan base path
    $basePath = getBasePath();
    
    // Hapus base path dari URI
    if ($basePath !== '/') {
        $keyword = preg_replace('#^' . preg_quote($basePath, '#') . '#', '', $uriWithoutQuery);
    } else {
        $keyword = ltrim($uriWithoutQuery, '/');
    }
    
    // Hapus trailing slash
    $keyword = rtrim($keyword, '/');
    
    // Decode URL encoding (%20 menjadi spasi, dll)
    $keyword = urldecode($keyword);
    
    // Debug
    error_log("Extracted keyword from URL: '$keyword'");
    
    return $keyword;
}

// Fungsi untuk menampilkan error 404
function show404($urlKeyword = '') {
    $brandsData = getBrandsData();
    
    $content = '<!DOCTYPE html>
    <html lang="id">
    <head>
        <title>404 - Halaman Tidak Ditemukan</title>
        <meta name="description" content="Halaman yang Anda cari tidak ditemukan.">
        <style>
            body { font-family: Arial, sans-serif; text-align: center; padding: 50px; }
            .keyword-list { background: #f8f9fa; padding: 20px; margin: 20px auto; max-width: 800px; text-align: left; }
        </style>
    </head>
    <body>
        <h1><strong>Apa Yang Kau Carik Disini!!</strong></h1>
        <p>Halaman yang Anda cari tidak ditemukan.</p>';
    
    if (!empty($urlKeyword)) {
        $content .= '<p><strong>Keyword yang dicari:</strong> ' . htmlspecialchars($urlKeyword) . '</p>';
    }
    
    // Tampilkan list keyword yang valid
    $keywords = getAllKeywords();
    if (!empty($keywords)) {
        $content .= '<div class="keyword-list">
            <h3>Berikut adalah keyword yang valid:</h3>
            <ul>';
        
        foreach ($keywords as $kw) {
            $urlFormat = normalizeForUrl($kw);
            $content .= '<li><a href="' . getBaseUrl() . $urlFormat . '">' . htmlspecialchars($kw) . '</a> → <code>' . $urlFormat . '</code></li>';
        }
        
        $content .= '</ul></div>';
    }
    
    $content .= '<p><a href="' . getBaseUrl() . '">Kembali ke Beranda</a></p>
    </body>
    </html>';
    
    header("HTTP/1.0 404 Not Found");
    echo replacePlaceholders($content, $brandsData);
    exit();
}

// ==============================================
// MAIN PROCESS
// ==============================================

// Ambil keyword dari URL
$urlKeyword = getKeywordFromUrl();

// Jika URL kosong, tampilkan 404
if (empty($urlKeyword)) {
    show404();
}

// Cari keyword di kw.txt
$result = findKeywordAndLP($urlKeyword);

// Jika tidak ditemukan
if (!$result['found']) {
    show404($urlKeyword);
}

// Ambil data
$keyword = $result['keyword'];
$lineNumber = $result['line'];
$lpNumber = $result['lp'];

// Tentukan file LP
$lpFile = "lp" . $lpNumber . ".php";

// Cek file LP
if (!file_exists($lpFile)) {
    // Cari alternatif
    for ($i = $lpNumber - 1; $i >= 1; $i--) {
        $altLpFile = "lp" . $i . ".php";
        if (file_exists($altLpFile)) {
            $lpFile = $altLpFile;
            $lpNumber = $i;
            break;
        }
    }
    
    if (!file_exists($lpFile) && file_exists("lp1.php")) {
        $lpFile = "lp1.php";
        $lpNumber = 1;
    } elseif (!file_exists($lpFile)) {
        show404($urlKeyword);
    }
}

// ==============================================
// PASS DATA KE FILE LP
// ==============================================

// Set parameter
$_GET['daftar'] = $keyword;

// Simpan info
$GLOBALS['LP_NUMBER'] = $lpNumber;
$GLOBALS['LINE_NUMBER'] = $lineNumber;
$GLOBALS['BASE_URL'] = getBaseUrl();
$GLOBALS['BASE_PATH'] = getBasePath();

// Ambil brands.json
$brandsData = getBrandsData();

// Include LP file
includeWithPlaceholders($lpFile, $brandsData);
