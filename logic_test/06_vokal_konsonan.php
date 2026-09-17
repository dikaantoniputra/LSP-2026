<?php
/**
 * SOAL 6: HITUNG VOKAL & KONSONAN
 * Cara Menjalankan: php logic_test/06_vokal_konsonan.php
 */

function hitungVokalKonsonan($kalimat) {
    $kalimat = strtolower($kalimat);
    $vokal = ['a', 'i', 'u', 'e', 'o'];
    $jumlahVokal = 0;
    $jumlahKonsonan = 0;

    for ($i = 0; $i < strlen($kalimat); $i++) {
        $char = $kalimat[$i];
        if (ctype_alpha($char)) {
            if (in_array($char, $vokal)) {
                $jumlahVokal++;
            } else {
                $jumlahKonsonan++;
            }
        }
    }

    return ['vokal' => $jumlahVokal, 'konsonan' => $jumlahKonsonan];
}

echo "=== PENGUJIAN SOAL 6: HITUNG VOKAL & KONSONAN ===\n\n";

$contoh = [
    "Sertifikasi LSP",
    "Belajar PHP Laravel",
    "Dika Junior Web Developer"
];

foreach ($contoh as $teks) {
    $res = hitungVokalKonsonan($teks);
    echo "Kalimat  : \"$teks\"\n";
    echo "Vokal    : {$res['vokal']}\n";
    echo "Konsonan : {$res['konsonan']}\n";
    echo "----------------------------------------\n";
}

echo "=================================================\n";

