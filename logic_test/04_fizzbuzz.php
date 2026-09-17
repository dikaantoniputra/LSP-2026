<?php
/**
 * SOAL 4: FIZZBUZZ (KELIPATAN 3 & 5)
 * Cara Menjalankan: php logic_test/04_fizzbuzz.php
 */

function fizzBuzz($n) {
    for ($i = 1; $i <= $n; $i++) {
        if ($i % 15 === 0) {
            echo "$i -> FizzBuzz (Kelipatan 3 & 5)\n";
        } elseif ($i % 3 === 0) {
            echo "$i -> Fizz (Kelipatan 3)\n";
        } elseif ($i % 5 === 0) {
            echo "$i -> Buzz (Kelipatan 5)\n";
        } else {
            echo "$i\n";
        }
    }
}

echo "=== PENGUJIAN SOAL 4: FIZZBUZZ (1 s.d. 20) ===\n\n";
fizzBuzz(20);
echo "\n=============================================\n";

