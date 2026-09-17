<?php
/**
 * SOAL 1: DERET FIBONACCI
 * Cara Menjalankan: php logic_test/01_fibonacci.php
 */

function generateFibonacci($n) {
    if ($n <= 0) return [];
    if ($n === 1) return [0];

    $fibonacci = [0, 1];
    for ($i = 2; $i < $n; $i++) {
        $fibonacci[$i] = $fibonacci[$i - 1] + $fibonacci[$i - 2];
    }
    return $fibonacci;
}

echo "=== PENGUJIAN SOAL 1: DERET FIBONACCI ===\n\n";

// Uji coba dengan n = 10
$n1 = 10;
echo "Input n = $n1\n";
echo "Hasil  : " . implode(", ", generateFibonacci($n1)) . "\n\n";

// Uji coba dengan n = 15
$n2 = 15;
echo "Input n = $n2\n";
echo "Hasil  : " . implode(", ", generateFibonacci($n2)) . "\n";
echo "========================================\n";

