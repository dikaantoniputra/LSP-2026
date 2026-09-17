@extends('layouts.app')

@section('title', 'Daftar Produk')

@section('content')
<div class="row mb-3 g-3">
    <div class="col-6 col-md-3">
        <div class="card bg-primary text-white h-100">
            <div class="card-body">
                <div class="text-white-50 small text-uppercase">Total Produk</div>
                <h4 class="mb-0 fw-bold mt-1">{{ $stats['total_produk'] }} <small class="fs-6 fw-normal">item</small></h4>
            </div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="card bg-info text-white h-100">
            <div class="card-body">
                <div class="text-white-50 small text-uppercase">Total Stok</div>
                <h4 class="mb-0 fw-bold mt-1">{{ number_format($stats['total_stok']) }} <small class="fs-6 fw-normal">unit</small></h4>
            </div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="card bg-success text-white h-100">
            <div class="card-body">
                <div class="text-white-50 small text-uppercase">Stok Tersedia</div>
                <h4 class="mb-0 fw-bold mt-1">{{ $stats['produk_tersedia'] }} <small class="fs-6 fw-normal">item</small></h4>
            </div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="card bg-danger text-white h-100">
            <div class="card-body">
                <div class="text-white-50 small text-uppercase">Stok Habis / Kritis</div>
                <h4 class="mb-0 fw-bold mt-1">{{ $stats['produk_habis'] }} <small class="fs-6 fw-normal">item</small></h4>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header d-flex flex-column flex-md-row justify-content-between align-items-md-center py-3">
        <h5 class="mb-2 mb-md-0 fw-bold">Data Produk</h5>
        <div class="d-flex gap-2">
            <a href="{{ route('categories.index') }}" class="btn btn-outline-secondary btn-sm">
                <i class="bi bi-tags me-1"></i> Kelola Kategori
            </a>
            <a href="{{ route('products.create') }}" class="btn btn-primary btn-sm">
                <i class="bi bi-plus-lg me-1"></i> Tambah Produk
            </a>
        </div>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table id="productsTable" class="table table-striped table-bordered table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="text-center" style="width: 50px;">No</th>
                        <th>Kode Produk</th>
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th class="text-center">Stok</th>
                        <th class="text-center">Status</th>
                        <th class="text-center" style="width: 140px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $index => $product)
                        <tr>
                            <td class="text-center">{{ $index + 1 }}</td>
                            <td><code>{{ $product->kode_produk }}</code></td>
                            <td><strong>{{ $product->nama_produk }}</strong></td>
                            <td>
                                @if($product->category)
                                    <span class="badge bg-secondary">{{ $product->category->nama_kategori }}</span>
                                @else
                                    <span class="text-muted fst-italic small">Tanpa Kategori</span>
                                @endif
                            </td>
                            <td>{{ $product->formatted_harga }}</td>
                            <td class="text-center">
                                @if($product->stok > 0)
                                    <span>{{ $product->stok }}</span>
                                @else
                                    <span class="badge bg-danger">0</span>
                                @endif
                            </td>
                            <td class="text-center">
                                @if($product->status === 'Tersedia')
                                    <span class="badge bg-success">Tersedia</span>
                                @elseif($product->status === 'Habis')
                                    <span class="badge bg-danger">Habis</span>
                                @else
                                    <span class="badge bg-warning text-dark">Preorder</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <div class="btn-group" role="group">
                                    <a href="{{ route('products.show', $product) }}" class="btn btn-info btn-sm text-white" title="Detail">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="{{ route('products.edit', $product) }}" class="btn btn-warning btn-sm text-white" title="Edit">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <button type="button" class="btn btn-danger btn-sm" title="Hapus" onclick="hapusProduk('{{ $product->id }}', '{{ addslashes($product->nama_produk) }}')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Hapus -->
<div class="modal fade" id="modalHapus" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger">Konfirmasi Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus data produk <strong id="namaProdukHapus"></strong>?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
                <form id="formHapus" method="POST" action="">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Ya, Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#productsTable').DataTable({
            columnDefs: [
                { orderable: false, targets: [0, 7] }
            ],
            order: [[1, 'asc']]
        });
    });

    function hapusProduk(id, nama) {
        const modal = new bootstrap.Modal(document.getElementById('modalHapus'));
        document.getElementById('namaProdukHapus').innerText = nama;
        document.getElementById('formHapus').action = '/products/' + id;
        modal.show();
    }
</script>
@endpush
