<?php
/**
 * SOAL 7: CARI NILAI MIN & MAX
 * Cara Menjalankan: php logic_test/07_min_max.php
 */

function cariMinMax(array $angka) {
    if (empty($angka)) return null;

    $max = $angka[0];
    $min = $angka[0];

    foreach ($angka as $nilai) {
        if ($nilai > $max) {
            $max = $nilai;
        }
        if ($nilai < $min) {
            $min = $nilai;
        }
    }

    return ['max' => $max, 'min' => $min];
}

echo "=== PENGUJIAN SOAL 7: CARI NILAI MIN & MAX ===\n\n";

$nilaiUjian = [78, 92, 45, 88, 96, 60, 52, 100, 35];
$hasil = cariMinMax($nilaiUjian);

echo "Daftar Nilai    : [ " . implode(", ", $nilaiUjian) . " ]\n";
echo "Nilai Tertinggi : {$hasil['max']}\n";
echo "Nilai Terendah  : {$hasil['min']}\n";
echo "\n==============================================\n";

