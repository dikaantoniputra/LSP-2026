@extends('layouts.app')

@section('title', 'Detail Produk')

@section('content')
<div class="row justify-content-center">
    <div class="col-12 col-md-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center py-3">
                <h5 class="mb-0 fw-bold">Detail Produk</h5>
                <a href="{{ route('products.index') }}" class="btn btn-secondary btn-sm">
                    <i class="bi bi-arrow-left me-1"></i> Kembali
                </a>
            </div>

            <div class="card-body p-4">
                <table class="table table-bordered mb-4">
                    <tbody>
                        <tr>
                            <th style="width: 30%;" class="bg-light">Kode Produk</th>
                            <td><code>{{ $product->kode_produk }}</code></td>
                        </tr>
                        <tr>
                            <th class="bg-light">Nama Produk</th>
                            <td><strong>{{ $product->nama_produk }}</strong></td>
                        </tr>
                        <tr>
                            <th class="bg-light">Kategori</th>
                            <td>
                                @if($product->category)
                                    <a href="{{ route('categories.show', $product->category) }}" class="badge bg-secondary text-decoration-none">
                                        <i class="bi bi-tag me-1"></i> {{ $product->category->nama_kategori }}
                                    </a>
                                @else
                                    <span class="text-muted fst-italic">Tanpa Kategori</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th class="bg-light">Harga</th>
                            <td class="text-primary fw-bold">{{ $product->formatted_harga }}</td>
                        </tr>
                        <tr>
                            <th class="bg-light">Stok</th>
                            <td>{{ $product->stok }} unit</td>
                        </tr>
                        <tr>
                            <th class="bg-light">Status</th>
                            <td>
                                @if($product->status === 'Tersedia')
                                    <span class="badge bg-success">Tersedia</span>
                                @elseif($product->status === 'Habis')
                                    <span class="badge bg-danger">Habis</span>
                                @else
                                    <span class="badge bg-warning text-dark">Preorder</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th class="bg-light">Deskripsi</th>
                            <td>{{ $product->deskripsi ?: '-' }}</td>
                        </tr>
                        <tr>
                            <th class="bg-light">Tanggal Dibuat</th>
                            <td>{{ $product->created_at ? $product->created_at->format('d-m-Y H:i') : '-' }}</td>
                        </tr>
                    </tbody>
                </table>

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('products.edit', $product) }}" class="btn btn-warning btn-sm text-white">
                        <i class="bi bi-pencil me-1"></i> Edit Data
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
