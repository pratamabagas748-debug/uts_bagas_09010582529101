<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Perpustakaan Jaya - Sistem Manajemen Buku">
    <title>@yield('title', 'Beranda') | Perpustakaan Jaya</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: #eef1f6;
            color: #333;
            min-height: 100vh;
        }

        /* === TOP HEADER BAR === */
        .top-header {
            background: #2c3e6b;
            color: #fff;
            padding: 14px 0;
        }

        .top-header-inner {
            max-width: 1140px;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 700;
            font-size: 1.1rem;
        }

        .brand i {
            font-size: 1.2rem;
            color: #8cb4f0;
        }

        .user-area {
            display: flex;
            align-items: center;
            gap: 14px;
            font-size: 0.85rem;
        }

        .user-area .user-name {
            color: #c5d3e8;
        }

        .user-area .user-name strong {
            color: #fff;
        }

        .btn-logout-top {
            background: rgba(255,255,255,0.12);
            color: #fff;
            border: none;
            padding: 6px 14px;
            border-radius: 5px;
            font-family: 'Poppins', sans-serif;
            font-size: 0.8rem;
            font-weight: 500;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }

        .btn-logout-top:hover {
            background: rgba(255,255,255,0.2);
        }

        /* === BREADCRUMB / NAV BAR === */
        .sub-nav {
            background: #fff;
            border-bottom: 1px solid #dce1e8;
            padding: 0 20px;
        }

        .sub-nav-inner {
            max-width: 1140px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            height: 46px;
            font-size: 0.82rem;
            color: #6b7280;
            gap: 6px;
        }

        .sub-nav-inner a {
            color: #2c3e6b;
            text-decoration: none;
            font-weight: 600;
        }

        .sub-nav-inner a:hover {
            text-decoration: underline;
        }

        /* === MAIN === */
        .main-wrap {
            max-width: 1140px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Buttons */
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 8px 16px;
            border: none;
            border-radius: 5px;
            font-family: 'Poppins', sans-serif;
            font-size: 0.82rem;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            transition: background 0.15s;
        }

        .btn-primary {
            background: #2c3e6b;
            color: #fff;
        }
        .btn-primary:hover { background: #243358; }

        .btn-success {
            background: #1a8d5f;
            color: #fff;
        }
        .btn-success:hover { background: #157a52; }

        .btn-warning {
            background: #cc8a17;
            color: #fff;
        }
        .btn-warning:hover { background: #b07614; }

        .btn-danger {
            background: #c9302c;
            color: #fff;
        }
        .btn-danger:hover { background: #ac2925; }

        .btn-secondary {
            background: #fff;
            color: #555;
            border: 1px solid #ccc;
        }
        .btn-secondary:hover { background: #f5f5f5; }

        .btn-outline {
            background: transparent;
            color: #555;
            border: 1px solid #ccc;
        }
        .btn-outline:hover { background: #f5f5f5; }

        .btn-sm {
            padding: 5px 10px;
            font-size: 0.78rem;
        }

        /* Card */
        .card {
            background: #fff;
            border: 1px solid #dce1e8;
            border-radius: 6px;
            overflow: hidden;
        }

        .card-header {
            padding: 14px 18px;
            border-bottom: 1px solid #dce1e8;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 10px;
        }

        .card-header h2 {
            font-size: 1rem;
            font-weight: 700;
            color: #1f2937;
            display: flex;
            align-items: center;
            gap: 7px;
        }

        .card-body {
            padding: 18px;
        }

        /* Alert */
        .alert {
            padding: 10px 14px;
            border-radius: 5px;
            margin-bottom: 16px;
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.85rem;
        }

        .alert-success {
            background: #e8f5e9;
            border: 1px solid #a5d6a7;
            color: #2e7d32;
        }

        .alert-danger {
            background: #ffebee;
            border: 1px solid #ef9a9a;
            color: #c62828;
        }

        /* Table */
        .table-responsive { overflow-x: auto; }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead th {
            text-align: left;
            padding: 10px 14px;
            font-size: 0.78rem;
            font-weight: 600;
            color: #fff;
            background: #3b5088;
            border-bottom: none;
        }

        thead th:first-child { border-radius: 4px 0 0 0; }
        thead th:last-child { border-radius: 0 4px 0 0; }

        tbody td {
            padding: 10px 14px;
            font-size: 0.85rem;
            border-bottom: 1px solid #eef0f3;
            color: #444;
        }

        tbody tr:hover { background: #f7f8fb; }
        tbody tr:last-child td { border-bottom: none; }

        /* Badge */
        .badge {
            display: inline-block;
            padding: 2px 10px;
            border-radius: 3px;
            font-size: 0.73rem;
            font-weight: 600;
        }

        .badge-category {
            background: #e3ecf9;
            color: #2c3e6b;
        }

        .badge-stock {
            background: #e0f2e9;
            color: #1a6b42;
        }

        .badge-stock.low {
            background: #fff3cd;
            color: #856404;
        }

        .badge-stock.empty {
            background: #f8d7da;
            color: #842029;
        }

        .action-btns {
            display: flex;
            gap: 4px;
        }

        /* Form */
        .form-group {
            margin-bottom: 14px;
        }

        .form-group label {
            display: block;
            margin-bottom: 4px;
            font-size: 0.82rem;
            font-weight: 600;
            color: #444;
        }

        .form-control {
            width: 100%;
            padding: 9px 12px;
            background: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            color: #333;
            font-family: 'Poppins', sans-serif;
            font-size: 0.85rem;
            outline: none;
        }

        .form-control:focus {
            border-color: #2c3e6b;
            box-shadow: 0 0 0 2px rgba(44, 62, 107, 0.12);
        }

        .form-control::placeholder { color: #aaa; }

        select.form-control {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%23666' d='M6 8L1 3h10z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 12px center;
            padding-right: 34px;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 14px;
        }

        /* Filter Bar */
        .filter-bar {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
            align-items: center;
        }

        .filter-bar .form-control { max-width: 260px; }
        .filter-bar select.form-control { max-width: 180px; }

        /* Detail Grid */
        .detail-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
        }

        .detail-item {
            padding: 12px 14px;
            background: #f7f8fb;
            border-radius: 5px;
            border: 1px solid #e5e7eb;
        }

        .detail-item .label {
            font-size: 0.72rem;
            text-transform: uppercase;
            color: #888;
            margin-bottom: 3px;
            font-weight: 600;
            letter-spacing: 0.03em;
        }

        .detail-item .value {
            font-size: 0.95rem;
            font-weight: 600;
            color: #222;
        }

        .detail-item.full-width {
            grid-column: 1 / -1;
        }

        /* Pagination */
        .pagination-wrapper {
            padding: 14px 18px;
            border-top: 1px solid #dce1e8;
            display: flex;
            justify-content: center;
        }

        .pagination-wrapper nav { display: flex; gap: 3px; }

        .pagination-wrapper .page-link {
            padding: 5px 11px;
            border-radius: 4px;
            font-size: 0.82rem;
            color: #444;
            text-decoration: none;
            border: 1px solid #ccc;
            background: #fff;
        }

        .pagination-wrapper .page-link:hover { background: #f0f0f0; }

        .pagination-wrapper .page-item.active .page-link {
            background: #2c3e6b;
            border-color: #2c3e6b;
            color: #fff;
        }

        .pagination-wrapper .page-item.disabled .page-link {
            opacity: 0.4;
            pointer-events: none;
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 40px 20px;
            color: #888;
        }

        .empty-state i {
            font-size: 2.2rem;
            margin-bottom: 10px;
            color: #ccc;
        }

        .empty-state h3 {
            font-size: 1rem;
            color: #444;
            margin-bottom: 4px;
        }

        .empty-state p {
            font-size: 0.85rem;
            margin-bottom: 14px;
        }

        /* Stats Row */
        .stats-bar {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 14px;
            margin-bottom: 18px;
        }

        .stat-card {
            background: #fff;
            border: 1px solid #dce1e8;
            border-radius: 6px;
            padding: 16px;
            border-left: 4px solid #2c3e6b;
        }

        .stat-card:nth-child(2) { border-left-color: #1a8d5f; }
        .stat-card:nth-child(3) { border-left-color: #cc8a17; }

        .stat-card .stat-label {
            font-size: 0.75rem;
            color: #888;
            font-weight: 500;
            margin-bottom: 2px;
        }

        .stat-card .stat-number {
            font-size: 1.5rem;
            font-weight: 700;
            color: #222;
        }

        /* Modal */
        .modal-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0,0,0,0.4);
            z-index: 200;
            align-items: center;
            justify-content: center;
        }

        .modal-overlay.active { display: flex; }

        .modal-box {
            background: #fff;
            border-radius: 8px;
            padding: 24px;
            max-width: 380px;
            width: 90%;
            text-align: center;
            box-shadow: 0 8px 30px rgba(0,0,0,0.15);
        }

        .modal-box i {
            font-size: 2rem;
            color: #cc8a17;
            margin-bottom: 10px;
        }

        .modal-box h3 {
            margin-bottom: 4px;
            font-size: 1rem;
            color: #222;
        }

        .modal-box p {
            color: #777;
            font-size: 0.85rem;
            margin-bottom: 18px;
        }

        .modal-actions {
            display: flex;
            gap: 8px;
            justify-content: center;
        }

        /* Footer */
        .footer {
            text-align: center;
            padding: 18px;
            font-size: 0.75rem;
            color: #aaa;
            margin-top: 12px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .main-wrap { padding: 14px; }
            .form-row { grid-template-columns: 1fr; }
            .detail-grid { grid-template-columns: 1fr; }
            .filter-bar { flex-direction: column; }
            .filter-bar .form-control,
            .filter-bar select.form-control { max-width: 100%; }
            .action-btns { flex-direction: column; }
            .stats-bar { grid-template-columns: 1fr; }
            .top-header-inner { flex-direction: column; gap: 8px; text-align: center; }
        }
    </style>
</head>
<body>
    @auth
    <div class="top-header">
        <div class="top-header-inner">
            <div class="brand">
                <i class="fas fa-book-open"></i>
                Perpustakaan Jaya
            </div>
            <div class="user-area">
                <span class="user-name"><i class="fas fa-user-circle"></i> <strong>{{ Auth::user()->name }}</strong></span>
                <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="btn-logout-top">
                        <i class="fas fa-sign-out-alt"></i> Keluar
                    </button>
                </form>
            </div>
        </div>
    </div>
    <div class="sub-nav">
        <div class="sub-nav-inner">
            <a href="{{ route('books.index') }}"><i class="fas fa-home"></i> Beranda</a>
            <span>/</span>
            <span>@yield('title', 'Halaman')</span>
        </div>
    </div>
    @endauth

    <div class="main-wrap">
        @if(session('success'))
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i>
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </div>

    <div class="footer">
        &copy; {{ date('Y') }} Perpustakaan Jaya &mdash; Sistem Informasi Manajemen Buku
    </div>

    @yield('scripts')
</body>
</html>
