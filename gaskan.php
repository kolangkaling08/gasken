<?php
// ==============================================
// ROUTER DENGAN SISTEM MODULO/Looping LP + BRANDS.JSON
// ==============================================

// Konfigurasi
define('TOTAL_LP_FILES', 10); // Total file LP yang ada (lp1.php sampai lp10.php)

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

// Fungsi untuk replace placeholder dengan data dari brands.json
function replacePlaceholders($content, $brandsData) {
    if (!$brandsData) {
        return $content;
    }
    
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
        
        // Tambahan untuk backward compatibility
        '{{AMPHTML}}' => $brandsData['amphtml'] ?? '',
        '{{IMAGE}}' => $brandsData['image'] ?? '',
        '{{TITLE}}' => $brandsData['title'] ?? '',
        '{{METADES}}' => $brandsData['metades'] ?? '',
        '{{ARTIKEL}}' => $brandsData['artikel'] ?? '',
        '{{KEUNGGULAN1}}' => $brandsData['keunggulan1'] ?? '',
        '{{KEUNGGULAN2}}' => $brandsData['keunggulan2'] ?? '',
        '{{KEUNGGULAN3}}' => $brandsData['keunggulan3'] ?? '',
        '{{KEUNGGULAN4}}' => $brandsData['keunggulan4'] ?? '',
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
    
    // Normalisasi keyword dari URL (case-insensitive, hapus spasi)
    $normalizedUrlKeyword = strtolower(trim($urlKeyword));
    $normalizedUrlKeyword = str_replace(' ', '', $normalizedUrlKeyword);
    
    foreach ($keywords as $lineNumber => $kw) {
        // Normalisasi keyword dari file (case-insensitive, hapus spasi)
        $normalizedKw = strtolower(trim($kw));
        $normalizedKw = str_replace(' ', '', $normalizedKw);
        
        // Jika cocok (exact match setelah dinormalisasi)
        if ($normalizedUrlKeyword === $normalizedKw) {
            $actualLine = $lineNumber + 1; // Karena array index dimulai dari 0
            
            // Hitung LP dengan sistem modulo
            $lpNumber = (($actualLine - 1) % TOTAL_LP_FILES) + 1;
            
            return [
                'found' => true,
                'keyword' => $kw, // keyword asli dari file
                'line' => $actualLine, // line number di kw.txt
                'lp' => $lpNumber, // nomor LP (1-10) berdasarkan sistem modulo
                'normalized' => $normalizedKw
            ];
        }
    }
    
    // Jika tidak ditemukan
    return ['found' => false, 'keyword' => '', 'line' => 0, 'lp' => 1];
}

// Fungsi untuk mengambil keyword dari URL
function getKeywordFromUrl() {
    $requestUri = $_SERVER['REQUEST_URI'];
    
    // Hapus query string
    $uriWithoutQuery = strtok($requestUri, '?');
    
    // Hapus leading slash
    $keyword = ltrim($uriWithoutQuery, '/');
    
    // Hapus trailing slash
    $keyword = rtrim($keyword, '/');
    
    // Decode URL encoding
    $keyword = urldecode($keyword);
    
    // Jika akses root domain, return empty
    if (empty($keyword)) {
        return '';
    }
    
    return $keyword;
}

// Fungsi untuk menampilkan error 404
function show404() {
    $brandsData = getBrandsData();
    $content = '<!DOCTYPE html>
    <html lang="id">
    <head>
        <title>{{Title}} - 404</title>
        <meta name="description" content="{{Metades}}">
        <link rel="amphtml" href="{{Amphtml}}">
    </head>
    <body>
        <h1><strong>Apa Yang Kau Carik Disini!!</strong></h1>
        <p>Halaman yang Anda cari tidak ditemukan.</p>
        <!-- Content dari brands.json akan muncul di sini -->
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

// Jika URL kosong (akses root domain), tampilkan 404
if (empty($urlKeyword)) {
    show404();
}

// Cari keyword di kw.txt dan tentukan LP
$result = findKeywordAndLP($urlKeyword);

// Jika keyword tidak ditemukan di kw.txt
if (!$result['found']) {
    show404();
}

// Ambil data dari hasil pencarian
$keyword = $result['keyword'];      // Keyword asli dari kw.txt
$lineNumber = $result['line'];      // Nomor line di kw.txt (1, 2, 3, ...)
$lpNumber = $result['lp'];          // Nomor LP (1-10) berdasarkan sistem modulo

// Tentukan file LP yang akan digunakan
$lpFile = "lp" . $lpNumber . ".php";

// Debug information
error_log("URL Keyword: $urlKeyword");
error_log("Found Keyword: $keyword (Line: $lineNumber)");
error_log("LP Number: $lpNumber (Modulo dari line $lineNumber)");
error_log("LP File: $lpFile");

// Cek apakah file LP ada
if (!file_exists($lpFile)) {
    // Cari file LP alternatif dengan urutan mundur
    for ($i = $lpNumber - 1; $i >= 1; $i--) {
        $altLpFile = "lp" . $i . ".php";
        if (file_exists($altLpFile)) {
            $lpFile = $altLpFile;
            $lpNumber = $i;
            error_log("File lp" . $lpNumber . ".php tidak ditemukan, menggunakan alternatif: $lpFile");
            break;
        }
    }
    
    // Jika masih tidak ada, coba lp1.php
    if (!file_exists($lpFile)) {
        if (file_exists("lp1.php")) {
            $lpFile = "lp1.php";
            $lpNumber = 1;
            error_log("Menggunakan fallback: lp1.php");
        } else {
            // Tidak ada file LP sama sekali
            show404();
        }
    }
}

// ==============================================
// PASS DATA KE FILE LP
// ==============================================

// Set parameter untuk file LP
$_GET['daftar'] = $keyword;      // Keyword yang akan diproses

// Simpan informasi tambahan di global
$GLOBALS['LP_NUMBER'] = $lpNumber;
$GLOBALS['LINE_NUMBER'] = $lineNumber;
$GLOBALS['TOTAL_LP'] = TOTAL_LP_FILES;

// Ambil data dari brands.json
$brandsData = getBrandsData();

// Include file LP dengan placeholder replacement
includeWithPlaceholders($lpFile, $brandsData);

// ==============================================
// END OF INDEX.PHP
// ==============================================
