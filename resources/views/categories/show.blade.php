@extends('layouts.app')

@section('title', 'Detail Kategori: ' . $category->nama_kategori)

@section('content')
<div class="row justify-content-center mb-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center py-3">
                <h5 class="mb-0 fw-bold">Detail Kategori: {{ $category->nama_kategori }}</h5>
                <div class="d-flex gap-2">
                    <a href="{{ route('categories.index') }}" class="btn btn-secondary btn-sm">
                        <i class="bi bi-arrow-left me-1"></i> Kembali
                    </a>
                    <a href="{{ route('categories.edit', $category) }}" class="btn btn-warning btn-sm text-white">
                        <i class="bi bi-pencil me-1"></i> Edit Kategori
                    </a>
                </div>
            </div>

            <div class="card-body p-4">
                <table class="table table-bordered mb-4" style="max-width: 600px;">
                    <tbody>
                        <tr>
                            <th style="width: 35%;" class="bg-light">Nama Kategori</th>
                            <td><strong class="text-primary">{{ $category->nama_kategori }}</strong></td>
                        </tr>
                        <tr>
                            <th class="bg-light">Deskripsi</th>
                            <td>{{ $category->deskripsi ?: '-' }}</td>
                        </tr>
                        <tr>
                            <th class="bg-light">Total Produk</th>
                            <td>
                                <span class="badge bg-secondary">
                                    {{ $category->products->count() }} Produk
                                </span>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <h6 class="fw-bold mb-3">Daftar Produk dalam Kategori Ini</h6>

                <div class="table-responsive">
                    <table id="categoryProductsTable" class="table table-striped table-bordered table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="text-center" style="width: 50px;">No</th>
                                <th>Kode Produk</th>
                                <th>Nama Produk</th>
                                <th>Harga</th>
                                <th class="text-center">Stok</th>
                                <th class="text-center">Status</th>
                                <th class="text-center" style="width: 100px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($category->products as $index => $prod)
                                <tr>
                                    <td class="text-center">{{ $index + 1 }}</td>
                                    <td><code>{{ $prod->kode_produk }}</code></td>
                                    <td><strong>{{ $prod->nama_produk }}</strong></td>
                                    <td>{{ $prod->formatted_harga }}</td>
                                    <td class="text-center">
                                        @if($prod->stok > 0)
                                            <span>{{ $prod->stok }}</span>
                                        @else
                                            <span class="badge bg-danger">0</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if($prod->status === 'Tersedia')
                                            <span class="badge bg-success">Tersedia</span>
                                        @elseif($prod->status === 'Habis')
                                            <span class="badge bg-danger">Habis</span>
                                        @else
                                            <span class="badge bg-warning text-dark">Preorder</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('products.show', $prod) }}" class="btn btn-info btn-sm text-white" title="Lihat Detail Produk">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#categoryProductsTable').DataTable({
            columnDefs: [
                { orderable: false, targets: [0, 6] }
            ],
            order: [[1, 'asc']]
        });
    });
</script>
@endpush
