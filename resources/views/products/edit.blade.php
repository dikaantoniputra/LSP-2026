@extends('layouts.app')

@section('title', 'Edit Produk')

@section('content')
<div class="row justify-content-center">
    <div class="col-12 col-md-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center py-3">
                <h5 class="mb-0 fw-bold">Edit Data Produk</h5>
                <a href="{{ route('products.index') }}" class="btn btn-secondary btn-sm">
                    <i class="bi bi-arrow-left me-1"></i> Kembali
                </a>
            </div>

            <div class="card-body p-4">
                <form action="{{ route('products.update', $product) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row mb-3">
                        <div class="col-md-6 mb-3 mb-md-0">
                            <label for="kode_produk" class="form-label fw-semibold">Kode Produk <span class="text-danger">*</span></label>
                            <input type="text" 
                                   name="kode_produk" 
                                   id="kode_produk" 
                                   class="form-control @error('kode_produk') is-invalid @enderror" 
                                   value="{{ old('kode_produk', $product->kode_produk) }}" 
                                   required>
                            @error('kode_produk')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex justify-content-between align-items-center">
                                <label for="category_id" class="form-label fw-semibold mb-0">Kategori <span class="text-danger">*</span></label>
                                <a href="{{ route('categories.create') }}" target="_blank" class="small text-decoration-none">+ Kategori Baru</a>
                            </div>
                            <select name="category_id" id="category_id" class="form-select mt-1 @error('category_id') is-invalid @enderror" required>
                                <option value="" disabled>-- Pilih Kategori --</option>
                                @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}" {{ old('category_id', $product->category_id) == $cat->id ? 'selected' : '' }}>{{ $cat->nama_kategori }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="nama_produk" class="form-label fw-semibold">Nama Produk <span class="text-danger">*</span></label>
                        <input type="text" 
                               name="nama_produk" 
                               id="nama_produk" 
                               class="form-control @error('nama_produk') is-invalid @enderror" 
                               value="{{ old('nama_produk', $product->nama_produk) }}" 
                               required>
                        @error('nama_produk')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6 mb-3 mb-md-0">
                            <label for="harga" class="form-label fw-semibold">Harga (Rp) <span class="text-danger">*</span></label>
                            <input type="number" 
                                   name="harga" 
                                   id="harga" 
                                   class="form-control @error('harga') is-invalid @enderror" 
                                   value="{{ old('harga', (float) $product->harga) }}" 
                                   min="0"
                                   required>
                            @error('harga')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="stok" class="form-label fw-semibold">Stok <span class="text-danger">*</span></label>
                            <input type="number" 
                                   name="stok" 
                                   id="stok" 
                                   class="form-control @error('stok') is-invalid @enderror" 
                                   value="{{ old('stok', $product->stok) }}" 
                                   min="0"
                                   required>
                            @error('stok')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold d-block">Status <span class="text-danger">*</span></label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="statusTersedia" value="Tersedia" {{ old('status', $product->status) === 'Tersedia' ? 'checked' : '' }}>
                            <label class="form-check-label" for="statusTersedia">Tersedia</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="statusHabis" value="Habis" {{ old('status', $product->status) === 'Habis' ? 'checked' : '' }}>
                            <label class="form-check-label" for="statusHabis">Habis</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="statusPreorder" value="Preorder" {{ old('status', $product->status) === 'Preorder' ? 'checked' : '' }}>
                            <label class="form-check-label" for="statusPreorder">Preorder</label>
                        </div>
                        @error('status')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="deskripsi" class="form-label fw-semibold">Deskripsi (Opsional)</label>
                        <textarea name="deskripsi" id="deskripsi" rows="3" class="form-control @error('deskripsi') is-invalid @enderror">{{ old('deskripsi', $product->deskripsi) }}</textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('products.index') }}" class="btn btn-light border">Batal</a>
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="bi bi-check-lg me-1"></i> Update Data
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
