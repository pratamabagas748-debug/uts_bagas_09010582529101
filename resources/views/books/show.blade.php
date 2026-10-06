@extends('layouts.app')

@section('title', 'Detail Buku')

@section('content')
    <div style="max-width:700px;margin:0 auto;">
        <div style="margin-bottom:1.5rem;">
            <a href="{{ route('books.index') }}" class="btn btn-outline btn-sm">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>

        <div class="card">
            <div class="card-header">
                <h2><i class="fas fa-book" style="color:var(--secondary);"></i> Detail Buku</h2>
                <div style="display:flex;gap:0.5rem;">
                    <a href="{{ route('books.edit', $book) }}" class="btn btn-warning btn-sm">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <form action="{{ route('books.destroy', $book) }}" method="POST" onsubmit="return confirm('Yakin hapus buku ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">
                            <i class="fas fa-trash"></i> Hapus
                        </button>
                    </form>
                </div>
            </div>
            <div class="card-body">
                <div class="detail-grid">
                    <div class="detail-item full-width">
                        <div class="label">Judul Buku</div>
                        <div class="value" style="font-size:1.3rem;">{{ $book->title }}</div>
                    </div>
                    <div class="detail-item">
                        <div class="label">Penulis</div>
                        <div class="value">{{ $book->author }}</div>
                    </div>
                    <div class="detail-item">
                        <div class="label">Penerbit</div>
                        <div class="value">{{ $book->publisher }}</div>
                    </div>
                    <div class="detail-item">
                        <div class="label">Tahun Terbit</div>
                        <div class="value">{{ $book->year }}</div>
                    </div>
                    <div class="detail-item">
                        <div class="label">Kategori</div>
                        <div class="value">
                            <span class="badge badge-category" style="font-size:0.85rem;">{{ $book->category->name }}</span>
                        </div>
                    </div>
                    <div class="detail-item">
                        <div class="label">Stok</div>
                        <div class="value">
                            @if($book->stock == 0)
                                <span class="badge badge-stock empty" style="font-size:0.85rem;">Habis</span>
                            @elseif($book->stock <= 5)
                                <span class="badge badge-stock low" style="font-size:0.85rem;">{{ $book->stock }} eksemplar</span>
                            @else
                                <span class="badge badge-stock" style="font-size:0.85rem;">{{ $book->stock }} eksemplar</span>
                            @endif
                        </div>
                    </div>
                    <div class="detail-item">
                        <div class="label">Ditambahkan Pada</div>
                        <div class="value" style="font-size:0.9rem;">{{ $book->created_at->format('d M Y, H:i') }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
