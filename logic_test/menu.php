<?php
/**
 * MENU INTERAKTIF PENGUJIAN SOAL LOGIC
 * Cara Menjalankan: php logic_test/menu.php
 */

$daftarSoal = [
    1 => ['name' => 'Deret Fibonacci', 'file' => '01_fibonacci.php'],
    2 => ['name' => 'Pengecekan Palindrom', 'file' => '02_palindrome.php'],
    3 => ['name' => 'Pola Bintang & Piramida', 'file' => '03_bintang.php'],
    4 => ['name' => 'FizzBuzz (Kelipatan)', 'file' => '04_fizzbuzz.php'],
    5 => ['name' => 'Bubble Sort (Pengurutan)', 'file' => '05_bubble_sort.php'],
    6 => ['name' => 'Hitung Huruf Vokal & Konsonan', 'file' => '06_vokal_konsonan.php'],
    7 => ['name' => 'Cari Nilai Maksimum & Minimum', 'file' => '07_min_max.php'],
    8 => ['name' => 'Faktorial & Bilangan Prima', 'file' => '08_faktorial_prima.php'],
];

echo "=================================================\n";
echo "   🧪 MENU PENGUJIAN SOAL LOGIC PROGRAMMING     \n";
echo "=================================================\n";
foreach ($daftarSoal as $key => $item) {
    echo "  [$key] {$item['name']}\n";
}
echo "  [9] Jalankan SEMUA Soal Sekaligus\n";
echo "  [0] Keluar\n";
echo "=================================================\n";
echo "Pilih nomor soal yang ingin dicoba (0-9): ";

$pilihan = trim(fgets(STDIN));

if ($pilihan === '0' || $pilihan === '') {
    echo "Keluar.\n";
    exit;
}

if ($pilihan === '9') {
    foreach ($daftarSoal as $item) {
        echo "\n\n";
        include __DIR__ . '/' . $item['file'];
    }
    exit;
}

if (isset($daftarSoal[(int)$pilihan])) {
    echo "\n";
    include __DIR__ . '/' . $daftarSoal[(int)$pilihan]['file'];
} else {
    echo "Pilihan tidak valid.\n";
}

