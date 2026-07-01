@extends('admin.layouts.app')
@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold mb-0">Kelola Menu</h4>
    <a href="{{ route('admin.menu.create') }}" class="btn btn-sm text-white" style="background:#1a3a2e">
        <i class="bi bi-plus-circle"></i> Tambah Menu
    </a>
</div>

<!-- Filter Kategori -->
<div class="d-flex gap-2 mb-3">
    <a href="{{ route('admin.menu.index') }}" class="btn btn-sm {{ !request('category') ? 'text-white':'btn-outline-secondary' }}"
        style="{{ !request('category') ? 'background:#1a3a2e':'' }}">Semua</a>
    @foreach($categories as $cat)
    <a href="{{ route('admin.menu.index', ['category'=>$cat->id]) }}"
        class="btn btn-sm {{ request('category')==$cat->id ? 'text-white':'btn-outline-secondary' }}"
        style="{{ request('category')==$cat->id ? 'background:#1a3a2e':'' }}">
        {{ $cat->name }}
    </a>
    @endforeach
</div>

<div class="card shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0 align-middle">
                <thead>
                    <tr><th>Gambar</th><th>Nama Menu</th><th>Kategori</th><th>Harga</th><th>Status</th><th>Aksi</th></tr>
                </thead>
                <tbody>
                @forelse($products as $product)
                <tr>
                    <td>
                        <img src="{{ $product->image ? asset('storage/'.$product->image) : asset('images/no-image.png') }}"
                             width="50" height="50" class="rounded" style="object-fit:cover;">
                    </td>
                    <td class="fw-semibold">{{ $product->name }}</td>
                    <td><span class="badge bg-secondary">{{ $product->category->name }}</span></td>
                    <td>Rp {{ number_format($product->price,0,',','.') }}</td>
                    <td>
                        <span class="badge bg-{{ $product->status=='tersedia'?'success':'danger' }}">
                            {{ ucfirst($product->status) }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('admin.menu.edit', $product) }}" class="btn btn-sm btn-outline-primary">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <form action="{{ route('admin.menu.destroy', $product) }}" method="POST" class="d-inline"
                              onsubmit="return confirm('Hapus menu {{ $product->name }}?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="6" class="text-center py-4 text-muted">Belum ada menu</td></tr>
                @endforelse
                </tbody>
            </table>
        </div>
        <div class="p-3">{{ $products->links() }}</div>
    </div>
</div>
@endsection