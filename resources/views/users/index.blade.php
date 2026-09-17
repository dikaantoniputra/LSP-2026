@extends('layouts.app')

@section('title', 'Data User / Pengguna')

@section('content')
<div class="row mb-3">
    <div class="col-12 col-md-4 mb-2">
        <div class="card bg-primary text-white">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="card-title mb-1">Total Pengguna</h6>
                    <h3 class="mb-0 fw-bold">{{ $totalUsers }}</h3>
                </div>
                <i class="bi bi-people fs-1 opacity-50"></i>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header d-flex flex-column flex-md-row justify-content-between align-items-md-center py-3">
        <h5 class="mb-2 mb-md-0 fw-bold">Daftar Pengguna (User)</h5>
        <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm">
            <i class="bi bi-person-plus-fill me-1"></i> Tambah User Baru
        </a>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table id="usersTable" class="table table-striped table-bordered table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="text-center" style="width: 50px;">No</th>
                        <th>Nama Lengkap</th>
                        <th>Alamat Email</th>
                        <th>Tanggal Terdaftar</th>
                        <th class="text-center" style="width: 140px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $index => $user)
                        <tr>
                            <td class="text-center">{{ $index + 1 }}</td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center fw-bold" style="width: 32px; height: 32px; font-size: 0.85rem;">
                                        {{ strtoupper(substr($user->name, 0, 1)) }}
                                    </div>
                                    <strong>{{ $user->name }}</strong>
                                </div>
                            </td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->created_at ? $user->created_at->format('d-m-Y H:i') : '-' }}</td>
                            <td class="text-center">
                                <div class="btn-group" role="group">
                                    <a href="{{ route('users.show', $user) }}" class="btn btn-info btn-sm text-white" title="Detail">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="{{ route('users.edit', $user) }}" class="btn btn-warning btn-sm text-white" title="Edit">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <button type="button" class="btn btn-danger btn-sm" title="Hapus" onclick="hapusUser('{{ $user->id }}', '{{ addslashes($user->name) }}')">
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

<!-- Modal Hapus User -->
<div class="modal fade" id="modalHapusUser" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger">Konfirmasi Hapus User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus akun user <strong id="namaUserHapus"></strong>?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
                <form id="formHapusUser" method="POST" action="">
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
        $('#usersTable').DataTable({
            columnDefs: [
                { orderable: false, targets: [0, 4] }
            ],
            order: [[1, 'asc']]
        });
    });

    function hapusUser(id, name) {
        const modal = new bootstrap.Modal(document.getElementById('modalHapusUser'));
        document.getElementById('namaUserHapus').innerText = name;
        document.getElementById('formHapusUser').action = '/users/' + id;
        modal.show();
    }
</script>
@endpush
