<?php
/**
 * SOAL 8: FAKTORIAL & BILANGAN PRIMA
 * Cara Menjalankan: php logic_test/08_faktorial_prima.php
 */

function hitungFaktorial($n) {
    if ($n < 0) return null;
    $hasil = 1;
    for ($i = $n; $i >= 1; $i--) {
        $hasil *= $i;
    }
    return $hasil;
}

function isPrima($angka) {
    if ($angka <= 1) return false;
    for ($i = 2; $i <= sqrt($angka); $i++) {
        if ($angka % $i === 0) {
            return false;
        }
    }
    return true;
}

echo "=== PENGUJIAN SOAL 8: FAKTORIAL & PRIMA ===\n\n";

// Test Faktorial
echo "--- Uji Coba Faktorial ---\n";
foreach ([3, 5, 7] as $num) {
    echo "Faktorial $num! = " . hitungFaktorial($num) . "\n";
}

echo "\n--- Uji Coba Bilangan Prima ---\n";
foreach ([2, 4, 11, 15, 29, 35, 97] as $num) {
    $status = isPrima($num) ? "✅ PRIMA" : "❌ BUKAN PRIMA";
    echo sprintf("Angka %-3d => %s\n", $num, $status);
}

echo "\n===========================================\n";

