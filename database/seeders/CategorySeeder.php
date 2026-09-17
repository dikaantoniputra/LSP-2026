<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'id' => 1,
                'nama_kategori' => 'Elektronik',
                'deskripsi' => 'Perangkat komputer, gadget, aksesoris, dan barang elektronik lainnya.',
            ],
            [
                'id' => 2,
                'nama_kategori' => 'Pakaian & Fashion',
                'deskripsi' => 'Busana pria, wanita, jaket, kemeja, dan aksesoris fashion.',
            ],
            [
                'id' => 3,
                'nama_kategori' => 'Makanan & Minuman',
                'deskripsi' => 'Produk kuliner, camilan, biji kopi, dan minuman kemasan.',
            ],
            [
                'id' => 4,
                'nama_kategori' => 'Alat Tulis & Kantor',
                'deskripsi' => 'Perlengkapan kerja, ATK, buku catatan, dan perlengkapan arsip.',
            ],
            [
                'id' => 5,
                'nama_kategori' => 'Kesehatan & Kecantikan',
                'deskripsi' => 'Produk perawatan diri, suplemen, kosmetik, dan kesehatan.',
            ],
        ];

        foreach ($categories as $item) {
            Category::updateOrCreate(
                ['id' => $item['id']],
                $item
            );
        }
    }
}

