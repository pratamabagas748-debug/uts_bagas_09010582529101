<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Perpustakaan Jaya - Sistem Manajemen Buku">
    <title>@yield('title', 'Beranda') | Perpustakaan Jaya</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Nunito', sans-serif;
            background: #f0f2f5;
            color: #333;
            min-height: 100vh;
        }

        /* Navbar */
        .navbar {
            background: #fff;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            padding: 0 24px;
            position: sticky;
            top: 0;
            z-index: 50;
        }

        .navbar-inner {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 60px;
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
            color: #1a56db;
            font-weight: 700;
            font-size: 1.15rem;
        }

        .navbar-brand i {
            font-size: 1.3rem;
        }

        .navbar-user {
            display: flex;
            align-items: center;
            gap: 16px;
            font-size: 0.9rem;
            color: #555;
        }

        /* Buttons */
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 8px 16px;
            border: 1px solid transparent;
            border-radius: 6px;
            font-family: 'Nunito', sans-serif;
            font-size: 0.85rem;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            transition: background 0.2s, box-shadow 0.2s;
        }

        .btn-primary {
            background: #1a56db;
            color: #fff;
        }
        .btn-primary:hover {
            background: #1648b8;
        }

        .btn-success {
            background: #0e9f6e;
            color: #fff;
        }
        .btn-success:hover {
            background: #0c8a5e;
        }

        .btn-warning {
            background: #e3a008;
            color: #fff;
        }
        .btn-warning:hover {
            background: #c88d07;
        }

        .btn-danger {
            background: #e02424;
            color: #fff;
        }
        .btn-danger:hover {
            background: #c81e1e;
        }

        .btn-secondary {
            background: #fff;
            color: #555;
            border-color: #d1d5db;
        }
        .btn-secondary:hover {
            background: #f3f4f6;
        }

        .btn-outline {
            background: transparent;
            color: #555;
            border-color: #d1d5db;
        }
        .btn-outline:hover {
            background: #f3f4f6;
        }

        .btn-logout {
            background: transparent;
            color: #e02424;
            border: 1px solid #fecaca;
            padding: 6px 14px;
            font-size: 0.82rem;
        }
        .btn-logout:hover {
            background: #fef2f2;
        }

        .btn-sm {
            padding: 6px 12px;
            font-size: 0.8rem;
        }

        /* Main Content */
        .main-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 24px;
        }

        /* Card */
        .card {
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            overflow: hidden;
        }

        .card-header {
            padding: 16px 20px;
            border-bottom: 1px solid #e5e7eb;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 12px;
            background: #fafbfc;
        }

        .card-header h2 {
            font-size: 1.1rem;
            font-weight: 700;
            color: #1f2937;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .card-body {
            padding: 20px;
        }

        /* Alert */
        .alert {
            padding: 12px 16px;
            border-radius: 6px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.9rem;
        }

        .alert-success {
            background: #ecfdf5;
            border: 1px solid #a7f3d0;
            color: #065f46;
        }

        .alert-danger {
            background: #fef2f2;
            border: 1px solid #fecaca;
            color: #991b1b;
        }

        /* Table */
        .table-responsive {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead th {
            text-align: left;
            padding: 10px 16px;
            font-size: 0.8rem;
            font-weight: 700;
            color: #6b7280;
            text-transform: uppercase;
            background: #f9fafb;
            border-bottom: 2px solid #e5e7eb;
        }

        tbody td {
            padding: 12px 16px;
            font-size: 0.88rem;
            border-bottom: 1px solid #f3f4f6;
            color: #374151;
        }

        tbody tr:hover {
            background: #f9fafb;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        /* Badge */
        .badge {
            display: inline-block;
            padding: 3px 10px;
            border-radius: 12px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .badge-category {
            background: #dbeafe;
            color: #1e40af;
        }

        .badge-stock {
            background: #d1fae5;
            color: #065f46;
        }

        .badge-stock.low {
            background: #fef3c7;
            color: #92400e;
        }

        .badge-stock.empty {
            background: #fee2e2;
            color: #991b1b;
        }

        .action-btns {
            display: flex;
            gap: 4px;
        }

        /* Form */
        .form-group {
            margin-bottom: 16px;
        }

        .form-group label {
            display: block;
            margin-bottom: 4px;
            font-size: 0.85rem;
            font-weight: 600;
            color: #374151;
        }

        .form-control {
            width: 100%;
            padding: 10px 12px;
            background: #fff;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            color: #1f2937;
            font-family: 'Nunito', sans-serif;
            font-size: 0.9rem;
            outline: none;
            transition: border-color 0.2s;
        }

        .form-control:focus {
            border-color: #1a56db;
            box-shadow: 0 0 0 3px rgba(26, 86, 219, 0.1);
        }

        .form-control::placeholder {
            color: #9ca3af;
        }

        select.form-control {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%236b7280' d='M6 8L1 3h10z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 12px center;
            padding-right: 36px;
        }

        .form-error {
            color: #e02424;
            font-size: 0.8rem;
            margin-top: 4px;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }

        /* Search / Filter Bar */
        .filter-bar {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            align-items: center;
        }

        .filter-bar .form-control {
            max-width: 280px;
        }

        .filter-bar select.form-control {
            max-width: 200px;
        }

        /* Detail Page */
        .detail-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }

        .detail-item {
            padding: 14px 16px;
            background: #f9fafb;
            border-radius: 6px;
            border: 1px solid #e5e7eb;
        }

        .detail-item .label {
            font-size: 0.75rem;
            text-transform: uppercase;
            color: #6b7280;
            margin-bottom: 4px;
            font-weight: 700;
        }

        .detail-item .value {
            font-size: 1rem;
            font-weight: 600;
            color: #1f2937;
        }

        .detail-item.full-width {
            grid-column: 1 / -1;
        }

        /* Pagination */
        .pagination-wrapper {
            padding: 16px 20px;
            border-top: 1px solid #e5e7eb;
            display: flex;
            justify-content: center;
        }

        .pagination-wrapper nav {
            display: flex;
            gap: 4px;
        }

        .pagination-wrapper .page-link {
            padding: 6px 12px;
            border-radius: 6px;
            font-size: 0.85rem;
            color: #374151;
            text-decoration: none;
            border: 1px solid #d1d5db;
            background: #fff;
        }

        .pagination-wrapper .page-link:hover {
            background: #f3f4f6;
        }

        .pagination-wrapper .page-item.active .page-link {
            background: #1a56db;
            border-color: #1a56db;
            color: #fff;
        }

        .pagination-wrapper .page-item.disabled .page-link {
            opacity: 0.5;
            pointer-events: none;
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 48px 20px;
            color: #6b7280;
        }

        .empty-state i {
            font-size: 2.5rem;
            margin-bottom: 12px;
            color: #d1d5db;
        }

        .empty-state h3 {
            font-size: 1.1rem;
            color: #374151;
            margin-bottom: 6px;
        }

        .empty-state p {
            font-size: 0.9rem;
            margin-bottom: 16px;
        }

        /* Stats */
        .stats-bar {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 16px;
            margin-bottom: 20px;
        }

        .stat-card {
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            padding: 16px 20px;
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .stat-icon {
            width: 44px;
            height: 44px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
        }

        .stat-icon.purple {
            background: #ede9fe;
            color: #6d28d9;
        }

        .stat-icon.blue {
            background: #dbeafe;
            color: #1d4ed8;
        }

        .stat-icon.green {
            background: #d1fae5;
            color: #047857;
        }

        .stat-info .stat-number {
            font-size: 1.4rem;
            font-weight: 700;
            color: #1f2937;
        }

        .stat-info .stat-label {
            font-size: 0.8rem;
            color: #6b7280;
        }

        /* Modal Confirm Delete */
        .modal-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.4);
            z-index: 200;
            align-items: center;
            justify-content: center;
        }

        .modal-overlay.active {
            display: flex;
        }

        .modal-box {
            background: #fff;
            border-radius: 10px;
            padding: 28px;
            max-width: 400px;
            width: 90%;
            text-align: center;
            box-shadow: 0 10px 40px rgba(0,0,0,0.15);
        }

        .modal-box i {
            font-size: 2.2rem;
            color: #e3a008;
            margin-bottom: 12px;
        }

        .modal-box h3 {
            margin-bottom: 6px;
            font-size: 1.05rem;
            color: #1f2937;
        }

        .modal-box p {
            color: #6b7280;
            font-size: 0.9rem;
            margin-bottom: 20px;
        }

        .modal-actions {
            display: flex;
            gap: 10px;
            justify-content: center;
        }

        /* Footer */
        .footer {
            text-align: center;
            padding: 20px;
            font-size: 0.8rem;
            color: #9ca3af;
            margin-top: 16px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .main-content {
                padding: 16px;
            }

            .card-header {
                padding: 12px 16px;
            }

            .card-body {
                padding: 16px;
            }

            .form-row {
                grid-template-columns: 1fr;
            }

            .detail-grid {
                grid-template-columns: 1fr;
            }

            .filter-bar {
                flex-direction: column;
            }

            .filter-bar .form-control,
            .filter-bar select.form-control {
                max-width: 100%;
            }

            thead th, tbody td {
                padding: 8px 12px;
                font-size: 0.8rem;
            }

            .action-btns {
                flex-direction: column;
            }

            .stats-bar {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    @auth
    <nav class="navbar">
        <div class="navbar-inner">
            <a href="{{ route('books.index') }}" class="navbar-brand">
                <i class="fas fa-book-open"></i>
                Perpustakaan Jaya
            </a>
            <div class="navbar-user">
                <span>Halo, <strong>{{ Auth::user()->name }}</strong></span>
                <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="btn btn-logout btn-sm">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>
            </div>
        </div>
    </nav>
    @endauth

    <div class="main-content">
        @if(session('success'))
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i>
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </div>

    <div class="footer">
        &copy; {{ date('Y') }} Perpustakaan Jaya. Sistem Manajemen Buku.
    </div>

    @yield('scripts')
</body>
</html>
