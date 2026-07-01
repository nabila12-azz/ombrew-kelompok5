@extends('admin.layouts.app')
@section('content')

<h4 class="fw-bold mb-4">Pengaturan</h4>

<div class="card shadow-sm" style="max-width:600px;">
    <div class="card-header text-white fw-semibold" style="background:#1a3a2e">
        <i class="bi bi-gear"></i> Pengaturan Toko
    </div>
    <div class="card-body p-4">
        <form action="{{ route('admin.pengaturan.update') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label small fw-semibold">Nama Toko</label>
                <input type="text" name="nama_toko" class="form-control"
                    value="{{ $settings['nama_toko'] ?? '' }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label small fw-semibold">Alamat</label>
                <textarea name="alamat" class="form-control" rows="2">{{ $settings['alamat'] ?? '' }}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label small fw-semibold">Nomor Telepon</label>
                <input type="text" name="telepon" class="form-control"
                    value="{{ $settings['telepon'] ?? '' }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label small fw-semibold">Email</label>
                <input type="email" name="email" class="form-control"
                    value="{{ $settings['email'] ?? '' }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label small fw-semibold">Jam Operasional</label>
                <input type="text" name="jam_buka" class="form-control"
                    value="{{ $settings['jam_buka'] ?? '' }}" placeholder="07:00 - 22:00">
            </div>
            <div class="mb-3">
                <label class="form-label small fw-semibold">Deskripsi Singkat</label>
                <textarea name="deskripsi" class="form-control" rows="3">{{ $settings['deskripsi'] ?? '' }}</textarea>
            </div>
            <button type="submit" class="btn text-white fw-bold w-100" style="background:#1a3a2e">
                <i class="bi bi-check-circle"></i> Simpan Pengaturan
            </button>
        </form>
    </div>
</div>
@endsection