<?php
/**
 * SOAL 3: POLA BINTANG
 * Cara Menjalankan: php logic_test/03_bintang.php
 */

echo "=== PENGUJIAN SOAL 3: POLA BINTANG ===\n\n";

$tinggi = 5;

echo "1. Pola Segitiga Siku-Siku Kiri (Tinggi: $tinggi):\n";
for ($i = 1; $i <= $tinggi; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        echo "*";
    }
    echo "\n";
}

echo "\n2. Pola Segitiga Siku-Siku Terbalik (Tinggi: $tinggi):\n";
for ($i = $tinggi; $i >= 1; $i--) {
    for ($j = 1; $j <= $i; $j++) {
        echo "*";
    }
    echo "\n";
}

echo "\n3. Pola Piramida Sama Kaki (Tinggi: $tinggi):\n";
for ($i = 1; $i <= $tinggi; $i++) {
    for ($s = 1; $s <= ($tinggi - $i); $s++) {
        echo " ";
    }
    for ($b = 1; $b <= (2 * $i - 1); $b++) {
        echo "*";
    }
    echo "\n";
}

echo "\n=======================================\n";

