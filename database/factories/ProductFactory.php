<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $kategoriList = ['Elektronik', 'Pakaian & Fashion', 'Makanan & Minuman', 'Alat Tulis & Kantor', 'Kesehatan & Kecantikan'];
        $statusList = ['Tersedia', 'Habis', 'Preorder'];

        return [
            'kode_produk' => 'PRD-' . strtoupper(fake()->unique()->bothify('###??')),
            'nama_produk' => fake()->words(3, true),
            'kategori' => fake()->randomElement($kategoriList),
            'harga' => fake()->numberBetween(10000, 5000000),
            'stok' => fake()->numberBetween(0, 150),
            'deskripsi' => fake()->sentence(12),
            'status' => fake()->randomElement($statusList),
        ];
    }
}

