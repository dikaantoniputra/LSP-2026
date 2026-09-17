<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ProductController extends Controller
{
    /**
     * Display a listing of the products.
     */
    public function index(): View
    {
        // Ambil semua produk beserta data kategorinya untuk DataTables
        $products = Product::with('category')->latest()->get();

        // Logika perhitungan data statistik dashboard
        $totalProduk = Product::count();
        $totalStok = Product::sum('stok');
        $produkTersedia = Product::where('status', 'Tersedia')->count();
        $produkHabis = Product::where('status', 'Habis')->orWhere('stok', '<=', 0)->count();
        $totalNilaiAset = Product::selectRaw('SUM(harga * stok) as total_val')->value('total_val') ?? 0;
        $rataRataHarga = Product::avg('harga') ?? 0;

        $stats = [
            'total_produk' => $totalProduk,
            'total_stok' => $totalStok,
            'produk_tersedia' => $produkTersedia,
            'produk_habis' => $produkHabis,
            'total_nilai_aset' => $totalNilaiAset,
            'rata_rata_harga' => $rataRataHarga,
        ];

        return view('products.index', compact('products', 'stats'));
    }

    /**
     * Show the form for creating a new product.
     */
    public function create(): View
    {
        $categories = Category::orderBy('nama_kategori')->get();
        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created product in storage.
     */
    public function store(ProductRequest $request): RedirectResponse
    {
        Product::create($request->validated());

        return redirect()
            ->route('products.index')
            ->with('success', 'Produk berhasil ditambahkan ke inventaris!');
    }

    /**
     * Display the specified product.
     */
    public function show(Product $product): View
    {
        $product->load('category');
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified product.
     */
    public function edit(Product $product): View
    {
        $categories = Category::orderBy('nama_kategori')->get();
        return view('products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified product in storage.
     */
    public function update(ProductRequest $request, Product $product): RedirectResponse
    {
        $product->update($request->validated());

        return redirect()
            ->route('products.index')
            ->with('success', "Data produk '{$product->nama_produk}' berhasil diperbarui!");
    }

    /**
     * Remove the specified product from storage.
     */
    public function destroy(Product $product): RedirectResponse
    {
        $nama = $product->nama_produk;
        $product->delete();

        return redirect()
            ->route('products.index')
            ->with('success', "Produk '{$nama}' berhasil dihapus dari sistem!");
    }
}
