@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div style="display:flex;align-items:center;justify-content:center;min-height:75vh;">
    <div style="width:100%;max-width:400px;">
        <div style="text-align:center;margin-bottom:24px;">
            <i class="fas fa-book-open" style="font-size:2.5rem;color:#1a56db;margin-bottom:10px;"></i>
            <h1 style="font-size:1.5rem;font-weight:700;color:#1f2937;margin-bottom:4px;">Perpustakaan Jaya</h1>
            <p style="color:#6b7280;font-size:0.9rem;">Silakan login untuk masuk ke sistem</p>
        </div>
        <div class="card">
            <div class="card-body">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <i class="fas fa-exclamation-circle"></i>
                        {{ $errors->first() }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Masukkan email" value="{{ old('email') }}" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Masukkan password" required>
                    </div>
                    <button type="submit" class="btn btn-primary" style="width:100%;justify-content:center;padding:10px;font-size:0.95rem;">
                        <i class="fas fa-sign-in-alt"></i> Masuk
                    </button>
                </form>

                <div style="text-align:center;margin-top:16px;padding-top:16px;border-top:1px solid #e5e7eb;">
                    <p style="color:#9ca3af;font-size:0.8rem;">
                        Demo: <strong style="color:#6b7280;">admin@perpustakaan.com</strong> / <strong style="color:#6b7280;">password123</strong>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
