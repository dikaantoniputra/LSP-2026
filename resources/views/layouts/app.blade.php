<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Aplikasi Inventaris') - DIKA</title>

    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <!-- DataTables Bootstrap 5 CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">

    <style>
        body {
            background-color: #f8f9fa;
            color: #212529;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .navbar-brand {
            font-weight: 700;
        }

        .card {
            border: 1px solid #dee2e6;
            border-radius: 6px;
        }

        .card-header {
            background-color: #fdfdfd;
            border-bottom: 1px solid #dee2e6;
            font-weight: 600;
        }

        .table > :not(caption) > * > * {
            padding: 0.65rem 0.75rem;
            vertical-align: middle;
        }

        /* Penyesuaian Sederhana DataTables */
        div.dataTables_wrapper div.dataTables_length select {
            width: auto;
            display: inline-block;
            margin: 0 4px;
        }

        div.dataTables_wrapper div.dataTables_filter input {
            display: inline-block;
            width: auto;
            margin-left: 6px;
        }

        div.dataTables_wrapper div.dataTables_info {
            padding-top: 0.85em;
            font-size: 0.9rem;
            color: #6c757d;
        }

        div.dataTables_wrapper div.dataTables_paginate {
            padding-top: 0.5em;
        }

        footer {
            margin-top: auto;
            background-color: #ffffff;
            border-top: 1px solid #dee2e6;
            padding: 15px 0;
            color: #6c757d;
            font-size: 0.9rem;
        }
    </style>
    @stack('styles')
</head>
<body>

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('products.index') }}">
                <i class="bi bi-box-seam"></i> DIKA
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('products.*') ? 'active fw-bold' : '' }}" href="{{ route('products.index') }}">
                            <i class="bi bi-box-seam me-1"></i> Data Produk
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('categories.*') ? 'active fw-bold' : '' }}" href="{{ route('categories.index') }}">
                            <i class="bi bi-tags me-1"></i> Kategori Produk
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('users.*') ? 'active fw-bold' : '' }}" href="{{ route('users.index') }}">
                            <i class="bi bi-people me-1"></i> Data User
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="py-4">
        <div class="container">
            <!-- Flash Message -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i> {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @yield('content')
        </div>
    </main>

    <!-- Footer -->
    <footer>
        <div class="container text-center">
            &copy; {{ date('Y') }} <strong>DIKA</strong> &mdash; Aplikasi Pengelolaan Data Barang
        </div>
    </footer>

    <!-- jQuery & Bootstrap JS Bundle -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- DataTables JS & Bootstrap 5 -->
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

    <script>
        // Konfigurasi bawaan DataTables sederhana dan natural (Bahasa Indonesia)
        $.extend(true, $.fn.dataTable.defaults, {
            language: {
                "search": "Cari:",
                "lengthMenu": "Tampilkan _MENU_ entri",
                "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                "infoEmpty": "Menampilkan 0 sampai 0 dari 0 data",
                "infoFiltered": "(disaring dari total _MAX_ entri)",
                "zeroRecords": "Tidak ditemukan data yang sesuai",
                "emptyTable": "Tidak ada data yang tersedia",
                "paginate": {
                    "first": "Pertama",
                    "last": "Terakhir",
                    "next": "Berikutnya",
                    "previous": "Sebelumnya"
                }
            },
            pageLength: 10,
            ordering: true
        });
    </script>
    @stack('scripts')
</body>
</html>
