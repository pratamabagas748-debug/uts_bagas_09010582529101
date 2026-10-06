@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div style="display:flex;align-items:center;justify-content:center;min-height:80vh;">
    <div style="width:100%;max-width:380px;">
        <div class="card">
            <div style="background:#2c3e6b;padding:20px;text-align:center;color:#fff;">
                <i class="fas fa-book-open" style="font-size:2rem;margin-bottom:8px;color:#8cb4f0;"></i>
                <h1 style="font-size:1.3rem;font-weight:700;margin-bottom:2px;">Perpustakaan Jaya</h1>
                <p style="font-size:0.8rem;color:#c5d3e8;margin:0;">Silakan masuk ke sistem</p>
            </div>
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
                        <input type="email" id="email" name="email" class="form-control" placeholder="Email anda" value="{{ old('email') }}" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Password anda" required>
                    </div>
                    <button type="submit" class="btn btn-primary" style="width:100%;justify-content:center;padding:10px;">
                        <i class="fas fa-sign-in-alt"></i> Masuk
                    </button>
                </form>

                <div style="text-align:center;margin-top:14px;padding-top:14px;border-top:1px solid #e5e7eb;">
                    <p style="color:#aaa;font-size:0.78rem;">
                        Akun: <strong style="color:#666;">bagas@jayapustaka.com</strong> / <strong style="color:#666;">bagas123</strong>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
