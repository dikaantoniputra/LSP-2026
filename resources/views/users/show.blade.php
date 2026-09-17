@extends('layouts.app')

@section('title', 'Detail User')

@section('content')
<div class="row justify-content-center">
    <div class="col-12 col-md-7">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center py-3">
                <h5 class="mb-0 fw-bold">Detail Pengguna</h5>
                <a href="{{ route('users.index') }}" class="btn btn-secondary btn-sm">
                    <i class="bi bi-arrow-left me-1"></i> Kembali
                </a>
            </div>

            <div class="card-body p-4">
                <div class="d-flex align-items-center gap-3 mb-4 p-3 bg-light rounded">
                    <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center fw-bold fs-4" style="width: 54px; height: 54px;">
                        {{ strtoupper(substr($user->name, 0, 1)) }}
                    </div>
                    <div>
                        <h5 class="mb-1 fw-bold text-dark">{{ $user->name }}</h5>
                        <div class="text-muted small">{{ $user->email }}</div>
                    </div>
                </div>

                <table class="table table-bordered mb-4">
                    <tbody>
                        <tr>
                            <th style="width: 35%;" class="bg-light">ID User</th>
                            <td>#{{ $user->id }}</td>
                        </tr>
                        <tr>
                            <th class="bg-light">Nama Lengkap</th>
                            <td><strong>{{ $user->name }}</strong></td>
                        </tr>
                        <tr>
                            <th class="bg-light">Email</th>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <th class="bg-light">Tanggal Terdaftar</th>
                            <td>{{ $user->created_at ? $user->created_at->format('d-m-Y H:i') : '-' }}</td>
                        </tr>
                        <tr>
                            <th class="bg-light">Terakhir Diupdate</th>
                            <td>{{ $user->updated_at ? $user->updated_at->format('d-m-Y H:i') : '-' }}</td>
                        </tr>
                    </tbody>
                </table>

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('users.edit', $user) }}" class="btn btn-warning btn-sm text-white">
                        <i class="bi bi-pencil me-1"></i> Edit User
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
