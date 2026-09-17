<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\CategoryRequest;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class CategoryController extends Controller
{
    /**
     * Display a listing of categories.
     */
    public function index(): View
    {
        $categories = Category::withCount('products')->latest()->get();
        $totalCategories = Category::count();

        return view('categories.index', compact('categories', 'totalCategories'));
    }

    /**
     * Show the form for creating a new category.
     */
    public function create(): View
    {
        return view('categories.create');
    }

    /**
     * Store a newly created category in storage.
     */
    public function store(CategoryRequest $request): RedirectResponse
    {
        Category::create($request->validated());

        return redirect()
            ->route('categories.index')
            ->with('success', 'Kategori produk berhasil ditambahkan!');
    }

    /**
     * Display the specified category.
     */
    public function show(Category $category): View
    {
        $category->load('products');
        return view('categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified category.
     */
    public function edit(Category $category): View
    {
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified category in storage.
     */
    public function update(CategoryRequest $request, Category $category): RedirectResponse
    {
        $category->update($request->validated());

        return redirect()
            ->route('categories.index')
            ->with('success', "Kategori '{$category->nama_kategori}' berhasil diperbarui!");
    }

    /**
     * Remove the specified category from storage.
     */
    public function destroy(Category $category): RedirectResponse
    {
        $nama = $category->nama_kategori;
        $productCount = $category->products()->count();

        $category->delete();

        $message = "Kategori '{$nama}' berhasil dihapus!";
        if ($productCount > 0) {
            $message .= " ({$productCount} produk terkait kini tidak memiliki kategori).";
        }

        return redirect()
            ->route('categories.index')
            ->with('success', $message);
    }
}

