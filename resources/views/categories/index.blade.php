@extends('layouts.app')

@section('title', 'Kategori Produk')

@section('content')
<div class="row mb-3">
    <div class="col-12 col-md-4 mb-2">
        <div class="card bg-primary text-white">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="card-title mb-1">Total Kategori</h6>
                    <h3 class="mb-0 fw-bold">{{ $totalCategories }}</h3>
                </div>
                <i class="bi bi-tags fs-1 opacity-50"></i>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header d-flex flex-column flex-md-row justify-content-between align-items-md-center py-3">
        <h5 class="mb-2 mb-md-0 fw-bold">Daftar Kategori Produk</h5>
        <a href="{{ route('categories.create') }}" class="btn btn-primary btn-sm">
            <i class="bi bi-plus-lg me-1"></i> Tambah Kategori
        </a>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table id="categoriesTable" class="table table-striped table-bordered table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="text-center" style="width: 50px;">No</th>
                        <th>Nama Kategori</th>
                        <th>Deskripsi</th>
                        <th class="text-center" style="width: 140px;">Jumlah Produk</th>
                        <th style="width: 150px;">Tanggal Dibuat</th>
                        <th class="text-center" style="width: 140px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $index => $cat)
                        <tr>
                            <td class="text-center">{{ $index + 1 }}</td>
                            <td>
                                <strong>{{ $cat->nama_kategori }}</strong>
                            </td>
                            <td>{{ $cat->deskripsi ?: '-' }}</td>
                            <td class="text-center">
                                <span class="badge bg-secondary">
                                    {{ $cat->products_count }} produk
                                </span>
                            </td>
                            <td>{{ $cat->created_at ? $cat->created_at->format('d-m-Y H:i') : '-' }}</td>
                            <td class="text-center">
                                <div class="btn-group" role="group">
                                    <a href="{{ route('categories.show', $cat) }}" class="btn btn-info btn-sm text-white" title="Lihat Produk">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="{{ route('categories.edit', $cat) }}" class="btn btn-warning btn-sm text-white" title="Edit">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <button type="button" class="btn btn-danger btn-sm" title="Hapus" onclick="hapusKategori('{{ $cat->id }}', '{{ addslashes($cat->nama_kategori) }}')">
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

<!-- Modal Hapus Kategori -->
<div class="modal fade" id="modalHapusKategori" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger">Konfirmasi Hapus Kategori</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus kategori <strong id="namaKategoriHapus"></strong>?
                <p class="text-muted small mt-2 mb-0">Produk yang terikat dengan kategori ini akan disesuaikan menjadi tanpa kategori.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
                <form id="formHapusKategori" method="POST" action="">
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
        $('#categoriesTable').DataTable({
            columnDefs: [
                { orderable: false, targets: [0, 5] }
            ],
            order: [[1, 'asc']]
        });
    });

    function hapusKategori(id, name) {
        const modal = new bootstrap.Modal(document.getElementById('modalHapusKategori'));
        document.getElementById('namaKategoriHapus').innerText = name;
        document.getElementById('formHapusKategori').action = '/categories/' + id;
        modal.show();
    }
</script>
@endpush
