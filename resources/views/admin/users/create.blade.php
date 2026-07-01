@extends('admin.layouts.app')
@section('content')

<div class="d-flex align-items-center gap-2 mb-4">
    <a href="{{ route('admin.users.index') }}" class="btn btn-sm btn-outline-secondary"><i class="bi bi-arrow-left"></i></a>
    <h4 class="fw-bold mb-0">Tambah User</h4>
</div>

<div class="card shadow-sm" style="max-width:500px;">
    <div class="card-header text-white fw-semibold" style="background:#1a3a2e;">
        <i class="bi bi-person-plus"></i> Form Tambah User
        <button type="button" class="btn-close btn-close-white float-end" onclick="history.back()"></button>
    </div>
    <div class="card-body p-4">
        <form action="{{ route('admin.users.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label small fw-semibold">Username / Nama</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('name') }}" placeholder="Nama lengkap">
                @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label class="form-label small fw-semibold">Email</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                    value="{{ old('email') }}" placeholder="email@contoh.com">
                @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label class="form-label small fw-semibold">Role</label>
                <select name="role" class="form-select">
                    <option value="admin">Admin</option>
                    <option value="kasir" selected>Kasir</option>
                    <option value="pelanggan">Pelanggan</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label small fw-semibold">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Min. 6 karakter">
            </div>
            <div class="mb-3">
                <label class="form-label small fw-semibold">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" class="form-control">
            </div>
            <div class="d-flex gap-2">
                <button type="reset"  class="btn btn-outline-secondary flex-fill">Reset</button>
                <button type="submit" class="btn text-white flex-fill fw-bold" style="background:#1a3a2e;">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection