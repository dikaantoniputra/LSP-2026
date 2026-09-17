# 📦 DIKA - Aplikasi Pengelolaan Data Produk (Laravel 12)

Aplikasi Web CRUD Manajemen Data Produk/Barang sederhana menggunakan **PHP** dan framework **Laravel 12**.

---

## 🚀 Fitur Aplikasi
- **Data Produk (Read)**: Menampilkan tabel daftar produk lengkap dengan pagination dan filter kategori/status.
- **Pencarian Data**: Fitur cari berdasarkan nama dan kode produk.
- **Tambah Produk (Create)**: Form input dengan validasi lengkap.
- **Edit Produk (Update)**: Mengubah informasi produk yang sudah ada.
- **Hapus Produk (Delete)**: Menghapus data produk dengan modal konfirmasi.
- **Tampilan**: Sederhana dan bersih menggunakan Bootstrap 5.3.

---

## 📁 Dokumentasi di Folder `penjelasan/`

Penjelasan detail cara kerja, arsitektur, panduan MySQL, dan soal Logic Programming tersedia di:

1. 📘 **[01_STRUKTUR_DAN_ARSITEKTUR_PROJECT.md](file:///home/Dika/Documents/3.Pelatihan/0.LSP/penjelasan/01_STRUKTUR_DAN_ARSITEKTUR_PROJECT.md)**  
   Struktur alur MVC, fungsi Controller, Model, Request Validation, View Blade, dan Routes.
2. 🔌 **[02_PANDUAN_KONEKSI_MYSQL_DAN_MENJALANKAN_APLIKASI.md](file:///home/Dika/Documents/3.Pelatihan/0.LSP/penjelasan/02_PANDUAN_KONEKSI_MYSQL_DAN_MENJALANKAN_APLIKASI.md)**  
   Cara koneksi MySQL, impor database dump, dan menjalankan `php artisan serve`.
3. 💡 **[03_PEMBAHASAN_SOAL_LOGIC_PROGRAMMING.md](file:///home/Dika/Documents/3.Pelatihan/0.LSP/penjelasan/03_PEMBAHASAN_SOAL_LOGIC_PROGRAMMING.md)**  
   Kode dan algoritma PHP untuk soal Logic (Fibonacci, Palindrome, Bubble Sort, FizzBuzz, Pola Bintang, Hitung Vokal, dll).
4. 📤 **[04_PETUNJUK_PENGUMPULAN_UJIAN_LSP.md](file:///home/Dika/Documents/3.Pelatihan/0.LSP/penjelasan/04_PETUNJUK_PENGUMPULAN_UJIAN_LSP.md)**  
   Checklist berkas dan cara compress project yang rapi untuk dikumpulkan.

---

## ⚡ Cara Menjalankan

```bash
# 1. Sesuaikan .env jika diperlukan (DB_DATABASE=lsp_crud, DB_USERNAME=root, DB_PASSWORD=)

# 2. Migrasi & seed data
php artisan migrate --seed

# 3. Jalankan server
php artisan serve
```

Buka di browser: **[http://127.0.0.1:8000](http://127.0.0.1:8000)**
