<?php
// ==============================================
// ROUTER DENGAN AUTO-DETECT BASE PATH
// ==============================================

// Konfigurasi
define('TOTAL_LP_FILES', 10);

// Fungsi untuk mendapatkan base path aplikasi
function getBasePath() {
    // Dapatkan script filename (misal: /folder/index.php)
    $scriptName = $_SERVER['SCRIPT_NAME'];
    
    // Dapatkan request URI (misal: /folder/keyword)
    $requestUri = $_SERVER['REQUEST_URI'];
    
    // Hapus query string dari request URI
    $requestUri = strtok($requestUri, '?');
    
    // Jika script berada di root (index.php langsung di domain.com)
    if ($scriptName === '/index.php' || $scriptName === '/') {
        // Cek jika ada folder di URL
        $scriptDir = dirname($scriptName);
        if ($scriptDir === '/' || $scriptDir === '\\') {
            return '/'; // Root domain
        } else {
            return $scriptDir . '/'; // Ada folder
        }
    }
    
    // Jika script di dalam folder (domain.com/folder/index.php)
    $scriptDir = dirname($scriptName);
    
    // Jika script di root folder (domain.com/folder/)
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
    
    if (json_last_error() !== JSON_ERROR_NONE) {
        error_log("Error parsing brands.json: " . json_last_error_msg());
        return null;
    }
    
    return $data;
}

// Fungsi untuk replace placeholder dengan BASE URL support
function replacePlaceholders($content, $brandsData) {
    if (!$brandsData) {
        return $content;
    }
    
    // Dapatkan base URL untuk link relatif
    $baseUrl = getBaseUrl();
    
    $placeholders = [
        // Placeholder utama
        '{{Amphtml}}' => $brandsData['amphtml'] ?? '',
        '{{Image}}' => $brandsData['image'] ?? '',
        '{{Title}}' => $brandsData['title'] ?? '',
        '{{Metades}}' => $brandsData['metades'] ?? '',
        '{{Artikel}}' => $brandsData['artikel'] ?? '',
        '{{Keunggunalan1}}' => $brandsData['keunggulan1'] ?? '',
        '{{Keunggunalan2}}' => $brandsData['keunggulan2'] ?? '',
        '{{Keunggunalan3}}' => $brandsData['keunggulan3'] ?? '',
        '{{Keunggunalan4}}' => $brandsData['keunggulan4'] ?? '',
        
        // LinkOut placeholder
        '{{Link-1}}' => $brandsData['LinkOut-1'] ?? '',
        '{{Link-2}}' => $brandsData['LinkOut-2'] ?? '',
        '{{Link-3}}' => $brandsData['LinkOut-3'] ?? '',
        '{{Link-4}}' => $brandsData['LinkOut-4'] ?? '',
        '{{Link-5}}' => $brandsData['LinkOut-5'] ?? '',
        
        // Base URL placeholder (baru!)
        '{{BaseUrl}}' => $baseUrl,
        '{{BasePath}}' => getBasePath(),
        
        // Tambahan untuk backward compatibility
        '{{BASEURL}}' => $baseUrl,
        '{{BASEPATH}}' => getBasePath(),
        '{{AMPHTML}}' => $brandsData['amphtml'] ?? '',
        '{{IMAGE}}' => $brandsData['image'] ?? '',
        '{{TITLE}}' => $brandsData['title'] ?? '',
        '{{METADES}}' => $brandsData['metades'] ?? '',
        '{{ARTIKEL}}' => $brandsData['artikel'] ?? '',
        '{{KEUNGGULAN1}}' => $brandsData['keunggulan1'] ?? '',
        '{{KEUNGGULAN2}}' => $brandsData['keunggulan2'] ?? '',
        '{{KEUNGGULAN3}}' => $brandsData['keunggulan3'] ?? '',
        '{{KEUNGGULAN4}}' => $brandsData['keunggulan4'] ?? '',
        '{{LINK-1}}' => $brandsData['LinkOut-1'] ?? '',
        '{{LINK-2}}' => $brandsData['LinkOut-2'] ?? '',
        '{{LINK-3}}' => $brandsData['LinkOut-3'] ?? '',
        '{{LINK-4}}' => $brandsData['LinkOut-4'] ?? '',
        '{{LINK-5}}' => $brandsData['LinkOut-5'] ?? '',
    ];
    
    return str_replace(
        array_keys($placeholders),
        array_values($placeholders),
        $content
    );
}

// Fungsi untuk output buffer dengan placeholder replacement
function includeWithPlaceholders($lpFile, $brandsData) {
    // Start output buffering
    ob_start();
    
    // Include file LP
    require_once($lpFile);
    
    // Get the content
    $content = ob_get_clean();
    
    // Replace placeholders
    $content = replacePlaceholders($content, $brandsData);
    
    // Output the content
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

// Fungsi untuk mencari keyword dan menentukan LP dengan sistem modulo
function findKeywordAndLP($urlKeyword) {
    $keywords = getAllKeywords();
    
    if (empty($keywords)) {
        return ['found' => false, 'keyword' => '', 'line' => 0, 'lp' => 1];
    }
    
    // Normalisasi keyword dari URL
    $normalizedUrlKeyword = strtolower(trim($urlKeyword));
    $normalizedUrlKeyword = preg_replace('/\s+/', '', $normalizedUrlKeyword);
    
    foreach ($keywords as $lineNumber => $kw) {
        // Normalisasi keyword dari file
        $normalizedKw = strtolower(trim($kw));
        $normalizedKw = preg_replace('/\s+/', '', $normalizedKw);
        
        // Jika cocok
        if ($normalizedKw === $normalizedUrlKeyword) {
            $actualLine = $lineNumber + 1;
            $lpNumber = (($actualLine - 1) % TOTAL_LP_FILES) + 1;
            
            return [
                'found' => true,
                'keyword' => $kw,
                'line' => $actualLine,
                'lp' => $lpNumber,
            ];
        }
    }
    
    return ['found' => false, 'keyword' => '', 'line' => 0, 'lp' => 1];
}

// Fungsi untuk mengambil keyword dari URL dengan base path aware
function getKeywordFromUrl() {
    $requestUri = $_SERVER['REQUEST_URI'];
    
    // Hapus query string
    $uriWithoutQuery = strtok($requestUri, '?');
    
    // Dapatkan base path
    $basePath = getBasePath();
    
    // Jika base path bukan root (/), hapus dari URI
    if ($basePath !== '/') {
        // Hapus base path dari awal URI
        $keyword = preg_replace('#^' . preg_quote($basePath, '#') . '#', '', $uriWithoutQuery);
    } else {
        // Untuk root domain, hapus leading slash saja
        $keyword = ltrim($uriWithoutQuery, '/');
    }
    
    // Hapus trailing slash
    $keyword = rtrim($keyword, '/');
    
    // Decode URL encoding
    $keyword = urldecode($keyword);
    
    // Jika akses root domain atau base path saja
    if (empty($keyword)) {
        return '';
    }
    
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
            .info { background: #f8f9fa; padding: 20px; margin: 20px auto; max-width: 800px; border-radius: 10px; }
        </style>
    </head>
    <body>
        <h1><strong>Apa Yang Kau Carik Disini!!</strong></h1>
        <p>Halaman yang Anda cari tidak ditemukan.</p>';
    
    if (!empty($urlKeyword)) {
        $content .= '<div class="info">
            <p><strong>Keyword yang dicari:</strong> ' . htmlspecialchars($urlKeyword) . '</p>
            <p><strong>Base Path:</strong> ' . htmlspecialchars(getBasePath()) . '</p>
            <p><strong>Base URL:</strong> ' . htmlspecialchars(getBaseUrl()) . '</p>
        </div>';
    }
    
    $content .= '<p><a href="{{BaseUrl}}">Kembali ke Beranda</a></p>
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

// Debug: untuk melihat apa yang terjadi
if (isset($_GET['debug'])) {
    echo '<div style="background: #d1ecf1; padding: 15px; margin: 20px; border-radius: 5px;">
          <h3>Debug Information:</h3>
          <p><strong>Request URI:</strong> ' . $_SERVER['REQUEST_URI'] . '</p>
          <p><strong>Script Name:</strong> ' . $_SERVER['SCRIPT_NAME'] . '</p>
          <p><strong>Base Path:</strong> ' . getBasePath() . '</p>
          <p><strong>Base URL:</strong> ' . getBaseUrl() . '</p>
          <p><strong>Keyword Extracted:</strong> ' . htmlspecialchars($urlKeyword) . '</p>
          </div>';
}

// Jika URL kosong (akses root), tampilkan 404
if (empty($urlKeyword)) {
    show404();
}

// Cari keyword di kw.txt dan tentukan LP
$result = findKeywordAndLP($urlKeyword);

// Jika keyword tidak ditemukan di kw.txt
if (!$result['found']) {
    show404($urlKeyword);
}

// Ambil data dari hasil pencarian
$keyword = $result['keyword'];
$lineNumber = $result['line'];
$lpNumber = $result['lp'];

// Tentukan file LP yang akan digunakan
$lpFile = "lp" . $lpNumber . ".php";

// Cek apakah file LP ada
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
    
    // Jika masih tidak ada, coba lp1.php
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

// Set parameter untuk file LP
$_GET['daftar'] = $keyword;

// Simpan informasi di global
$GLOBALS['LP_NUMBER'] = $lpNumber;
$GLOBALS['LINE_NUMBER'] = $lineNumber;
$GLOBALS['BASE_URL'] = getBaseUrl();
$GLOBALS['BASE_PATH'] = getBasePath();

// Ambil data dari brands.json
$brandsData = getBrandsData();

// Include file LP dengan placeholder replacement
includeWithPlaceholders($lpFile, $brandsData);

// ==============================================
// END OF INDEX.PHP
// ==============================================
