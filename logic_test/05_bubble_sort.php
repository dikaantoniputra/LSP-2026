<?php
/**
 * SOAL 5: PENGURUTAN ARRAY (BUBBLE SORT MANUAL)
 * Cara Menjalankan: php logic_test/05_bubble_sort.php
 */

function manualBubbleSort(array $arr): array {
    $n = count($arr);
    for ($i = 0; $i < $n - 1; $i++) {
        for ($j = 0; $j < $n - $i - 1; $j++) {
            if ($arr[$j] > $arr[$j + 1]) {
                // Swap (Tukar Posisi)
                $temp = $arr[$j];
                $arr[$j] = $arr[$j + 1];
                $arr[$j + 1] = $temp;
            }
        }
    }
    return $arr;
}

echo "=== PENGUJIAN SOAL 5: BUBBLE SORT MANUAL ===\n\n";

$data1 = [64, 34, 25, 12, 22, 11, 90];
echo "Data Awal   : [ " . implode(", ", $data1) . " ]\n";
echo "Hasil Asc   : [ " . implode(", ", manualBubbleSort($data1)) . " ]\n\n";

$data2 = [5, 1, 4, 2, 8];
echo "Data Awal   : [ " . implode(", ", $data2) . " ]\n";
echo "Hasil Asc   : [ " . implode(", ", manualBubbleSort($data2)) . " ]\n";
echo "\n============================================\n";

