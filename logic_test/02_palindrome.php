<?php
/**
 * SOAL 2: PENGECEKAN PALINDROM
 * Cara Menjalankan: php logic_test/02_palindrome.php
 */

function isPalindrome($text) {
    // Bersihkan spasi dan karakter non-alfanumerik, lalu jadikan huruf kecil
    $cleanText = strtolower(preg_replace('/[^a-zA-Z0-9]/', '', $text));
    $panjang = strlen($cleanText);

    for ($i = 0; $i < $panjang / 2; $i++) {
        if ($cleanText[$i] !== $cleanText[$panjang - 1 - $i]) {
            return false;
        }
    }
    return true;
}

echo "=== PENGUJIAN SOAL 2: PALINDROME CHECKER ===\n\n";

$contohKata = [
    "katak",
    "Kasur Rusak",
    "radar",
    "Pemrograman",
    "Malam",
    "LSP Web Developer"
];

foreach ($contohKata as $kata) {
    $status = isPalindrome($kata) ? "✅ PALINDROM" : "❌ BUKAN PALINDROM";
    echo sprintf("- '%-20s' => %s\n", $kata, $status);
}

echo "\n============================================\n";

