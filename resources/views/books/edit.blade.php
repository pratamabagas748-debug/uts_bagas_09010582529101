@extends('layouts.app')

@section('title', 'Edit Buku')

@section('content')
    <div style="max-width:650px;margin:0 auto;">
        <div style="margin-bottom:16px;">
            <a href="{{ route('books.index') }}" class="btn btn-outline btn-sm">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>

        <div class="card">
            <div class="card-header">
                <h2><i class="fas fa-edit" style="color:#e3a008;"></i> Edit Buku</h2>
            </div>
            <div class="card-body">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <i class="fas fa-exclamation-circle"></i>
                        <div>
                            @foreach($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <form method="POST" action="{{ route('books.update', $book) }}">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="title">Judul Buku</label>
                        <input type="text" id="title" name="title" class="form-control" value="{{ old('title', $book->title) }}" required>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="author">Penulis</label>
                            <input type="text" id="author" name="author" class="form-control" value="{{ old('author', $book->author) }}" required>
                        </div>
                        <div class="form-group">
                            <label for="publisher">Penerbit</label>
                            <input type="text" id="publisher" name="publisher" class="form-control" value="{{ old('publisher', $book->publisher) }}" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="year">Tahun Terbit</label>
                            <input type="number" id="year" name="year" class="form-control" value="{{ old('year', $book->year) }}" min="1900" max="{{ date('Y') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="stock">Stok</label>
                            <input type="number" id="stock" name="stock" class="form-control" value="{{ old('stock', $book->stock) }}" min="0" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="category_id">Kategori</label>
                        <select id="category_id" name="category_id" class="form-control" required>
                            <option value="">-- Pilih Kategori --</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id', $book->category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div style="display:flex;gap:10px;margin-top:20px;">
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-save"></i> Perbarui
                        </button>
                        <a href="{{ route('books.index') }}" class="btn btn-secondary">
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
