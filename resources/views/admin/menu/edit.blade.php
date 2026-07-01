@extends('admin.layouts.app')
@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold mb-0">Edit Menu</h4>
    <a href="{{ route('admin.menu.index') }}" class="btn btn-sm btn-outline-secondary">
        <i class="bi bi-arrow-left"></i> Kembali
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-body p-4">
        <form action="{{ route('admin.menu.update', $menu) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row g-3">

                {{-- Nama Menu --}}
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Nama Menu <span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                           value="{{ old('name', $menu->name) }}" placeholder="Contoh: Es Kopi Susu">
                    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                {{-- Kategori --}}
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Kategori <span class="text-danger">*</span></label>
                    <select name="category_id" class="form-select @error('category_id') is-invalid @enderror">
                        <option value="">-- Pilih Kategori --</option>
                        @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" {{ old('category_id', $menu->category_id) == $cat->id ? 'selected' : '' }}>
                            {{ $cat->name }}
                        </option>
                        @endforeach
                    </select>
                    @error('category_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                {{-- Harga --}}
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Harga <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text">Rp</span>
                        <input type="number" name="price" class="form-control @error('price') is-invalid @enderror"
                               value="{{ old('price', $menu->price) }}" placeholder="15000" min="0">
                    </div>
                    @error('price') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                {{-- Rating --}}
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Rating</label>
                    <select name="rating" class="form-select">
                        @for($i = 1; $i <= 5; $i++)
                        <option value="{{ $i }}" {{ old('rating', $menu->rating) == $i ? 'selected' : '' }}>
                            {{ $i }} Bintang
                        </option>
                        @endfor
                    </select>
                </div>

                {{-- Status --}}
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Status <span class="text-danger">*</span></label>
                    <select name="status" class="form-select @error('status') is-invalid @enderror">
                        <option value="tersedia" {{ old('status', $menu->status) == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                        <option value="habis"    {{ old('status', $menu->status) == 'habis'    ? 'selected' : '' }}>Habis</option>
                    </select>
                    @error('status') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                {{-- Aktif --}}
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Tampilkan di Menu</label>
                    <div class="form-check form-switch mt-2">
                        <input class="form-check-input" type="checkbox" name="is_active" value="1"
                               {{ old('is_active', $menu->is_active) ? 'checked' : '' }}>
                        <label class="form-check-label">Aktif</label>
                    </div>
                </div>

                {{-- Deskripsi --}}
                <div class="col-12">
                    <label class="form-label fw-semibold">Deskripsi</label>
                    <textarea name="description" class="form-control" rows="3"
                              placeholder="Deskripsi singkat menu...">{{ old('description', $menu->description) }}</textarea>
                </div>

                {{-- Gambar --}}
                <div class="col-12">
                    <label class="form-label fw-semibold">Gambar Menu</label>

                    {{-- Preview gambar lama --}}
                    @if($menu->image)
                    <div class="mb-2">
                        <img src="{{ asset('storage/'.$menu->image) }}" alt="{{ $menu->name }}"
                             id="preview" width="120" height="120"
                             class="rounded border" style="object-fit:cover;">
                        <div class="small text-muted mt-1">Gambar saat ini</div>
                    </div>
                    @else
                    <img id="preview" src="" alt="" width="120" height="120"
                         class="rounded border d-none" style="object-fit:cover;">
                    @endif

                    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror"
                           accept="image/*" onchange="previewImg(this)">
                    <div class="form-text">Kosongkan jika tidak ingin mengganti gambar. Maks 2MB.</div>
                    @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

            </div>

            <hr class="my-4">

            <div class="d-flex gap-2">
                <button type="submit" class="btn text-white px-4" style="background:#1a3a2e">
                    <i class="bi bi-check-circle"></i> Simpan Perubahan
                </button>
                <a href="{{ route('admin.menu.index') }}" class="btn btn-outline-secondary">
                    Batal
                </a>
            </div>

        </form>
    </div>
</div>

@endsection

@push('scripts')
<script>
function previewImg(input) {
    const preview = document.getElementById('preview');
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = e => {
            preview.src = e.target.result;
            preview.classList.remove('d-none');
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endpush