<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'kode_produk' => 'PRD-001',
                'nama_produk' => 'Laptop ASUS VivoBook 14',
                'category_id' => 1,
                'harga' => 8500000,
                'stok' => 15,
                'deskripsi' => 'Laptop bertenaga Intel Core i5 dengan RAM 8GB dan SSD 512GB, layar 14 inci FHD.',
                'status' => 'Tersedia',
            ],
            [
                'kode_produk' => 'PRD-002',
                'nama_produk' => 'Mouse Wireless Logitech M220 Silent',
                'category_id' => 1,
                'harga' => 185000,
                'stok' => 45,
                'deskripsi' => 'Mouse wireless tanpa suara klik, koneksi 2.4GHz USB nano receiver hemat daya.',
                'status' => 'Tersedia',
            ],
            [
                'kode_produk' => 'PRD-003',
                'nama_produk' => 'Keyboard Mechanical RGB TKL',
                'category_id' => 1,
                'harga' => 450000,
                'stok' => 20,
                'deskripsi' => 'Keyboard mekanikal 87 tombol dengan switch biru (clicky) dan backlight RGB 16 mode.',
                'status' => 'Tersedia',
            ],
            [
                'kode_produk' => 'PRD-004',
                'nama_produk' => 'Kemeja Formal Oxford Putih Panjang',
                'category_id' => 2,
                'harga' => 175000,
                'stok' => 30,
                'deskripsi' => 'Kemeja pria berbahan katun oxford premium, nyaman dan adem untuk kerja atau acara resmi.',
                'status' => 'Tersedia',
            ],
            [
                'kode_produk' => 'PRD-005',
                'nama_produk' => 'Biji Kopi Arabika Gayo Aceh 250gr',
                'category_id' => 3,
                'harga' => 65000,
                'stok' => 50,
                'deskripsi' => 'Single origin Arabika Gayo Aceh medium roast, aroma floral dengan rasa manis alami.',
                'status' => 'Tersedia',
            ],
            [
                'kode_produk' => 'PRD-006',
                'nama_produk' => 'Buku Catatan Grid Hardcover B5',
                'category_id' => 4,
                'harga' => 42000,
                'stok' => 0,
                'deskripsi' => 'Notebook sampul tebal 160 halaman kertas 100gsm ramah pena tinta / fountain pen.',
                'status' => 'Habis',
            ],
            [
                'kode_produk' => 'PRD-007',
                'nama_produk' => 'Monitor Gaming 24 Inch 165Hz IPS',
                'category_id' => 1,
                'harga' => 1950000,
                'stok' => 8,
                'deskripsi' => 'Monitor bezel-less resolusi Full HD dengan panel IPS 1ms response time dan FreeSync.',
                'status' => 'Tersedia',
            ],
            [
                'kode_produk' => 'PRD-008',
                'nama_produk' => 'Jaket Hoodie Fleece Unisex Hitam',
                'category_id' => 2,
                'harga' => 210000,
                'stok' => 5,
                'deskripsi' => 'Hoodie bahan cotton fleece tebal dan lembut, cocok untuk udara dingin atau harian.',
                'status' => 'Preorder',
            ],
        ];

        foreach ($products as $item) {
            Product::updateOrCreate(
                ['kode_produk' => $item['kode_produk']],
                $item
            );
        }
    }
}
