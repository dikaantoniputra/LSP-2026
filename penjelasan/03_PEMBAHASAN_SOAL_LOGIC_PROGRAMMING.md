# 03. Pembahasan Soal Logic Programming (PHP)

Dokumen ini berisi kumpulan solusi, kode algoritma PHP murni, dan penjelasan langkah demi langkah untuk jenis-jenis soal **Logic Programming** yang paling sering keluar dalam Ujian Sertifikasi LSP Programmer / Junior Web Developer.

---

## ⚡ Cara Menjalankan & Mencoba Soal di Terminal

Seluruh soal di bawah ini telah dibuatkan skrip siap jalankan di folder **`logic_test/`**. Buka terminal di folder project, lalu jalankan perintah berikut:

### Opsi 1: Jalankan Menu Interaktif
```bash
php logic_test/menu.php
```
*(Anda tinggal mengetikkan angka 1 - 8 untuk memilih soal mana yang ingin diuji).*

### Opsi 2: Jalankan Satu per Satu Secara Langsung
* Soal 1 (Fibonacci) : `php logic_test/01_fibonacci.php`
* Soal 2 (Palindrom) : `php logic_test/02_palindrome.php`
* Soal 3 (Pola Bintang) : `php logic_test/03_bintang.php`
* Soal 4 (FizzBuzz) : `php logic_test/04_fizzbuzz.php`
* Soal 5 (Bubble Sort) : `php logic_test/05_bubble_sort.php`
* Soal 6 (Vokal & Konsonan) : `php logic_test/06_vokal_konsonan.php`
* Soal 7 (Nilai Min & Max) : `php logic_test/07_min_max.php`
* Soal 8 (Faktorial & Prima) : `php logic_test/08_faktorial_prima.php`

---

## 1. Deret Bilangan Fibonacci

### Deskripsi Soal:
Buatlah fungsi PHP untuk menghasilkan deret Fibonacci sebanyak `$n` angka. Deret dimulai dari 0 dan 1, di mana angka berikutnya adalah penjumlahan dari 2 angka sebelumnya (0, 1, 1, 2, 3, 5, 8, 13, ...).

### Kode PHP:
```php
<?php
function generateFibonacci($n) {
    if ($n <= 0) return [];
    if ($n === 1) return [0];

    $fibonacci = [0, 1];
    for ($i = 2; $i < $n; $i++) {
        $fibonacci[$i] = $fibonacci[$i - 1] + $fibonacci[$i - 2];
    }
    return $fibonacci;
}

// Pengujian:
$n = 10;
$hasil = generateFibonacci($n);
echo "Deret Fibonacci ($n angka): " . implode(", ", $hasil);
// Output: 0, 1, 1, 2, 3, 5, 8, 13, 21, 34
?>
```


### Penjelasan Logika:
1. Inisialisasi array dengan dua nilai pertama yaitu `0` dan `1`.
2. Melakukan perulangan (`for`) mulai dari indeks ke-2 hingga `$n - 1`.
3. Pada setiap iterasi, nilai baru dihitung dengan menjumlahkan elemen indeks sebelumnya `($i - 1)` dan dua indeks sebelumnya `($i - 2)`.

---

## 2. Pemeriksaan Kata / Kalimat Palindrom

### Deskripsi Soal:
Buat fungsi untuk memeriksa apakah sebuah kata atau kalimat bernilai sama saat dibaca dari depan maupun dari belakang (mengabaikan spasi dan perbedaan huruf besar/kecil). Contoh: `"katak"`, `"kasur rusak"`, `"radar"`.

### Kode PHP:
```php
<?php
function isPalindrome($text) {
    // 1. Bersihkan teks: ubah ke huruf kecil dan buang spasi/karakter non-alphanumeric
    $cleanText = strtolower(preg_replace('/[^a-zA-Z0-9]/', '', $text));
    
    $panjang = strlen($cleanText);
    for ($i = 0; $i < $panjang / 2; $i++) {
        if ($cleanText[$i] !== $cleanText[$panjang - 1 - $i]) {
            return false; // Ada karakter yang tidak cocok
        }
    }
    return true; // Semua karakter simetris
}

// Pengujian:
$kata1 = "Kasur Rusak";
$kata2 = "Pemrograman";

echo "'$kata1' adalah Palindrom? " . (isPalindrome($kata1) ? "Ya, Benar" : "Bukan") . "\n";
echo "'$kata2' adalah Palindrom? " . (isPalindrome($kata2) ? "Ya, Benar" : "Bukan") . "\n";
?>
```

### Penjelasan Logika:
1. Menggunakan teknik *two-pointer*: membandingkan karakter dari indeks awal `$i` dengan karakter dari posisi belakang `$panjang - 1 - $i`.
2. Jika ada satu saja perbandingan yang tidak sama, kembalikan `false`. Jika seluruh iterasi hingga separuh panjang teks cocok, kembalikan `true`.

---

## 3. Pola Bintang (Looping Segitiga & Piramida)

### Deskripsi Soal:
Buatlah skrip perulangan untuk mencetak pola bintang segitiga siku-siku dan piramida berdasarkan input tinggi `$tinggi`.

### Kode PHP:

#### A. Segitiga Siku-Siku Kiri:
```php
<?php
$tinggi = 5;
for ($i = 1; $i <= $tinggi; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        echo "*";
    }
    echo "\n";
}
/*
Output:
*
**
***
****
*****
*/
?>
```

#### B. Piramida Segitiga Sama Kaki:
```php
<?php
$tinggi = 5;
for ($i = 1; $i <= $tinggi; $i++) {
    // Cetak spasi di awal
    for ($s = 1; $s <= ($tinggi - $i); $s++) {
        echo " ";
    }
    // Cetak bintang (bilangan ganjil: 2*i - 1)
    for ($b = 1; $b <= (2 * $i - 1); $b++) {
        echo "*";
    }
    echo "\n";
}
/*
Output:
    *
   ***
  *****
 *******
*********
*/
?>
```

---

## 4. Permainan Kelipatan (FizzBuzz)

### Deskripsi Soal:
Cetak angka dari 1 hingga `$n`. Jika angka kelipatan 3 cetak `"Fizz"`, jika kelipatan 5 cetak `"Buzz"`, dan jika kelipatan 3 sekaligus 5 cetak `"FizzBuzz"`.

### Kode PHP:
```php
<?php
function fizzBuzz($n) {
    for ($i = 1; $i <= $n; $i++) {
        if ($i % 15 === 0) { // Kelipatan 3 dan 5
            echo "FizzBuzz\n";
        } elseif ($i % 3 === 0) {
            echo "Fizz\n";
        } elseif ($i % 5 === 0) {
            echo "Buzz\n";
        } else {
            echo "$i\n";
        }
    }
}

// Pengujian 1 s.d. 15
fizzBuzz(15);
?>
```

### Penjelasan Logika:
Pengecekan kondisi `$i % 15 === 0` (atau `$i % 3 === 0 && $i % 5 === 0`) harus ditempatkan di urutan **paling atas** agar angka seperti 15, 30 tidak terpotong oleh kondisi tunggal kelipatan 3 atau 5.

---

## 5. Algoritma Pengurutan Array (Bubble Sort Manual)

### Deskripsi Soal:
Urutkan array angka secara ascending (menaik) secara manual tanpa menggunakan fungsi bawaan seperti `sort()` atau `asort()`.

### Kode PHP:
```php
<?php
function manualBubbleSort(array $arr): array {
    $n = count($arr);
    for ($i = 0; $i < $n - 1; $i++) {
        for ($j = 0; $j < $n - $i - 1; $j++) {
            // Jika elemen saat ini lebih besar dari elemen setelahnya, tukar posisi (swap)
            if ($arr[$j] > $arr[$j + 1]) {
                $temp = $arr[$j];
                $arr[$j] = $arr[$j + 1];
                $arr[$j + 1] = $temp;
            }
        }
    }
    return $arr;
}

// Pengujian:
$data = [64, 34, 25, 12, 22, 11, 90];
$hasilSort = manualBubbleSort($data);
echo "Array Asli    : " . implode(", ", $data) . "\n";
echo "Hasil Sorting : " . implode(", ", $hasilSort) . "\n";
// Output: 11, 12, 22, 25, 34, 64, 90
?>
```

---

## 6. Menghitung Jumlah Huruf Vokal & Konsonan

### Deskripsi Soal:
Buat fungsi untuk menghitung berapa banyak huruf vokal (A, I, U, E, O) dan konsonan dalam sebuah kalimat.

### Kode PHP:
```php
<?php
function hitungVokalKonsonan($kalimat) {
    $kalimat = strtolower($kalimat);
    $vokal = ['a', 'i', 'u', 'e', 'o'];
    $jumlahVokal = 0;
    $jumlahKonsonan = 0;

    for ($i = 0; $i < strlen($kalimat); $i++) {
        $char = $kalimat[$i];
        if (ctype_alpha($char)) { // Pastikan karakter adalah huruf
            if (in_array($char, $vokal)) {
                $jumlahVokal++;
            } else {
                $jumlahKonsonan++;
            }
        }
    }

    return [
        'vokal' => $jumlahVokal,
        'konsonan' => $jumlahKonsonan,
    ];
}

// Pengujian:
$kalimat = "Sertifikasi Kompetensi LSP";
$hasil = hitungVokalKonsonan($kalimat);
echo "Kalimat   : '$kalimat'\n";
echo "Vokal     : " . $hasil['vokal'] . "\n";
echo "Konsonan  : " . $hasil['konsonan'] . "\n";
?>
```

---

## 7. Mencari Nilai Terbesar (Max) & Terkecil (Min) Tanpa Fungsi Bawaan

### Deskripsi Soal:
Cari nilai tertinggi dan terendah dalam sekumpulan array angka tanpa menggunakan fungsi `max()` atau `min()`.

### Kode PHP:
```php
<?php
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

// Pengujian:
$nilaiUjian = [78, 92, 45, 88, 96, 60, 52];
$hasil = cariMinMax($nilaiUjian);
echo "Nilai Tertinggi : " . $hasil['max'] . "\n";
echo "Nilai Terendah  : " . $hasil['min'] . "\n";
?>
```

---

## 8. Faktorial & Pengecekan Bilangan Prima

### Deskripsi Soal:
Buat fungsi untuk menghitung nilai faktorial `$n!` dan fungsi untuk mengecek apakah sebuah angka merupakan bilangan prima.

### Kode PHP:
```php
<?php
// Fungsi Faktorial (n! = n * (n-1) * ... * 1)
function hitungFaktorial($n) {
    if ($n < 0) return null;
    $hasil = 1;
    for ($i = $n; $i >= 1; $i--) {
        $hasil *= $i;
    }
    return $hasil;
}

// Fungsi Cek Bilangan Prima
function isPrima($angka) {
    if ($angka <= 1) return false;
    for ($i = 2; $i <= sqrt($angka); $i++) {
        if ($angka % $i === 0) {
            return false;
        }
    }
    return true;
}

// Pengujian:
echo "5 Faktorial (5!) = " . hitungFaktorial(5) . "\n"; // 120
echo "Apakah 29 Bilangan Prima? " . (isPrima(29) ? "Ya" : "Bukan") . "\n"; // Ya
echo "Apakah 35 Bilangan Prima? " . (isPrima(35) ? "Ya" : "Bukan") . "\n"; // Bukan
?>
```

