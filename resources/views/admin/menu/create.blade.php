@extends('admin.layouts.app')
@section('content')

<div class="d-flex align-items-center gap-2 mb-4">
    <a href="{{ route('admin.menu.index') }}" class="btn btn-sm btn-outline-secondary"><i class="bi bi-arrow-left"></i></a>
    <h4 class="fw-bold mb-0">Tambah Menu</h4>
</div>

<div class="card shadow-sm" style="max-width:600px;">
    <div class="card-header text-white fw-semibold" style="background:#1a3a2e">
         Form Tambah Menu
    </div>
    <div class="card-body p-4">
        <form action="{{ route('admin.menu.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label small fw-semibold">Nama Menu</label>
                    <input type="text" name="name" class="form-control" required placeholder="Nama menu">
                </div>
                <div class="col-md-6">
                    <label class="form-label small fw-semibold">Kategori</label>
                    <select name="category_id" class="form-select" required>
                        <option value="">-- Pilih --</option>
                        @foreach($categories as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12">
                    <label class="form-label small fw-semibold">Deskripsi</label>
                    <textarea name="description" class="form-control" rows="3" placeholder="Deskripsi singkat menu..."></textarea>
                </div>
                <div class="col-md-6">
                    <label class="form-label small fw-semibold">Harga (Rp)</label>
                    <input type="number" name="price" class="form-control" required placeholder="25000">
                </div>
                <div class="col-md-6">
                    <label class="form-label small fw-semibold">Status</label>
                    <select name="status" class="form-select">
                        <option value="tersedia">Tersedia</option>
                        <option value="habis">Habis</option>
                    </select>
                </div>
                <div class="col-12">
                    <label class="form-label small fw-semibold">Gambar Menu</label>
                    <input type="file" name="image" class="form-control" accept="image/*"
                        onchange="previewImg(this)">
                    <img id="imgPreview" src="" class="mt-2 rounded d-none" style="max-height:150px;">
                    <small class="text-muted">Format: JPG/PNG, max 2MB</small>
                </div>
            </div>
            <div class="d-flex gap-2 mt-4">
                <a href="{{ route('admin.menu.index') }}" class="btn btn-outline-secondary flex-fill">Batal</a>
                <button type="submit" class="btn text-white flex-fill fw-bold" style="background:#1a3a2e">Simpan</button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
function previewImg(input) {
    const preview = document.getElementById('imgPreview');
    if (input.files && input.files[0]) {
        preview.src = URL.createObjectURL(input.files[0]);
        preview.classList.remove('d-none');
    }
}
</script>
@endpush
@endsection