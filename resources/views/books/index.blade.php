@extends('layouts.app')

@section('title', 'Daftar Buku')

@section('content')
    {{-- Stats --}}
    <div class="stats-bar">
        <div class="stat-card">
            <div class="stat-label"><i class="fas fa-book"></i> Total Buku</div>
            <div class="stat-number">{{ $books->total() }}</div>
        </div>
        <div class="stat-card">
            <div class="stat-label"><i class="fas fa-tags"></i> Kategori</div>
            <div class="stat-number">{{ $categories->count() }}</div>
        </div>
        <div class="stat-card">
            <div class="stat-label"><i class="fas fa-cubes"></i> Total Stok</div>
            <div class="stat-number">{{ $books->sum('stock') }}</div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h2><i class="fas fa-list" style="color:#2c3e6b;"></i> Data Buku</h2>
            <a href="{{ route('books.create') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Tambah Buku
            </a>
        </div>

        {{-- Search & Filter --}}
        <div style="padding:12px 18px;border-bottom:1px solid #dce1e8;background:#fafbfc;">
            <form method="GET" action="{{ route('books.index') }}" class="filter-bar">
                <div style="position:relative;flex:1;max-width:260px;">
                    <i class="fas fa-search" style="position:absolute;left:10px;top:50%;transform:translateY(-50%);color:#aaa;font-size:0.8rem;"></i>
                    <input type="text" name="search" class="form-control" placeholder="Cari judul / penulis..." value="{{ request('search') }}" style="padding-left:32px;max-width:100%;">
                </div>
                <select name="category_id" class="form-control">
                    <option value="">Semua Kategori</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-primary btn-sm">
                    <i class="fas fa-search"></i> Cari
                </button>
                @if(request('search') || request('category_id'))
                    <a href="{{ route('books.index') }}" class="btn btn-outline btn-sm">
                        <i class="fas fa-times"></i> Reset
                    </a>
                @endif
            </form>
        </div>

        {{-- Table --}}
        <div class="table-responsive">
            @if($books->count() > 0)
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Penulis</th>
                            <th>Penerbit</th>
                            <th>Tahun</th>
                            <th>Kategori</th>
                            <th>Stok</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($books as $index => $book)
                            <tr>
                                <td style="color:#aaa;">{{ $books->firstItem() + $index }}</td>
                                <td style="font-weight:600;">{{ $book->title }}</td>
                                <td>{{ $book->author }}</td>
                                <td>{{ $book->publisher }}</td>
                                <td>{{ $book->year }}</td>
                                <td><span class="badge badge-category">{{ $book->category->name }}</span></td>
                                <td>
                                    @if($book->stock == 0)
                                        <span class="badge badge-stock empty">Habis</span>
                                    @elseif($book->stock <= 5)
                                        <span class="badge badge-stock low">{{ $book->stock }}</span>
                                    @else
                                        <span class="badge badge-stock">{{ $book->stock }}</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="action-btns">
                                        <a href="{{ route('books.show', $book) }}" class="btn btn-secondary btn-sm" title="Detail">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('books.edit', $book) }}" class="btn btn-warning btn-sm" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button type="button" class="btn btn-danger btn-sm" title="Hapus" onclick="confirmDelete({{ $book->id }}, '{{ $book->title }}')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                        <form id="delete-form-{{ $book->id }}" action="{{ route('books.destroy', $book) }}" method="POST" style="display:none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="empty-state">
                    <i class="fas fa-book-open"></i>
                    <h3>Belum ada data buku</h3>
                    <p>
                        @if(request('search') || request('category_id'))
                            Tidak ditemukan buku sesuai filter.
                        @else
                            Tambahkan buku pertama ke perpustakaan.
                        @endif
                    </p>
                    @if(request('search') || request('category_id'))
                        <a href="{{ route('books.index') }}" class="btn btn-outline">Reset Filter</a>
                    @else
                        <a href="{{ route('books.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Tambah Buku
                        </a>
                    @endif
                </div>
            @endif
        </div>

        @if($books->hasPages())
            <div class="pagination-wrapper">
                {{ $books->appends(request()->query())->links() }}
            </div>
        @endif
    </div>

    {{-- Delete Modal --}}
    <div class="modal-overlay" id="deleteModal">
        <div class="modal-box">
            <i class="fas fa-exclamation-triangle"></i>
            <h3>Hapus Buku</h3>
            <p>Yakin ingin menghapus "<span id="deleteBookTitle"></span>"?</p>
            <div class="modal-actions">
                <button class="btn btn-secondary" onclick="closeModal()">Batal</button>
                <button class="btn btn-danger" id="confirmDeleteBtn">
                    <i class="fas fa-trash"></i> Hapus
                </button>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    let deleteBookId = null;

    function confirmDelete(id, title) {
        deleteBookId = id;
        document.getElementById('deleteBookTitle').textContent = title;
        document.getElementById('deleteModal').classList.add('active');
    }

    function closeModal() {
        document.getElementById('deleteModal').classList.remove('active');
        deleteBookId = null;
    }

    document.getElementById('confirmDeleteBtn').addEventListener('click', function() {
        if (deleteBookId) {
            document.getElementById('delete-form-' + deleteBookId).submit();
        }
    });

    document.getElementById('deleteModal').addEventListener('click', function(e) {
        if (e.target === this) closeModal();
    });
</script>
@endsection
