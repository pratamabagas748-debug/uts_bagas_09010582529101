@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div style="display:flex;align-items:center;justify-content:center;min-height:80vh;">
    <div style="width:100%;max-width:440px;">
        <div style="text-align:center;margin-bottom:2rem;">
            <div style="width:72px;height:72px;background:linear-gradient(135deg,var(--primary),var(--secondary));border-radius:20px;display:inline-flex;align-items:center;justify-content:center;font-size:1.8rem;color:white;margin-bottom:1rem;box-shadow:0 8px 30px rgba(99,102,241,0.4);">
                <i class="fas fa-book-open"></i>
            </div>
            <h1 style="font-size:1.8rem;font-weight:800;margin-bottom:0.3rem;">Perpustakaan</h1>
            <p style="color:var(--gray);font-size:0.9rem;">Masuk untuk mengelola data buku</p>
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
                        <label for="email"><i class="fas fa-envelope" style="margin-right:6px;"></i>Email</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Masukkan email" value="{{ old('email') }}" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="password"><i class="fas fa-lock" style="margin-right:6px;"></i>Password</label>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Masukkan password" required>
                    </div>
                    <button type="submit" class="btn btn-primary" style="width:100%;justify-content:center;padding:14px;font-size:1rem;">
                        <i class="fas fa-sign-in-alt"></i> Masuk
                    </button>
                </form>

                <div style="text-align:center;margin-top:1.5rem;padding-top:1.5rem;border-top:1px solid var(--border);">
                    <p style="color:var(--gray);font-size:0.82rem;">
                        <i class="fas fa-info-circle"></i>
                        Demo: <strong style="color:var(--gray-light);">admin@perpustakaan.com</strong> / <strong style="color:var(--gray-light);">password123</strong>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
