@extends('admin.layouts.app')
@section('content')

<h4 class="fw-bold mb-4">Kelola Pesanan</h4>

<!-- Filter -->
<div class="card shadow-sm mb-4 p-3">
    <form class="row g-2 align-items-end">
        <div class="col-md-4">
            <input type="text" name="search" class="form-control form-control-sm"
                placeholder="Cari nama / kode pesanan..." value="{{ request('search') }}">
        </div>
        <div class="col-md-3">
            <select name="status" class="form-select form-select-sm">
                <option value="">Semua Status</option>
                <option value="pending"   {{ request('status')=='pending'   ?'selected':'' }}>Pending</option>
                <option value="confirmed" {{ request('status')=='confirmed' ?'selected':'' }}>Confirmed</option>
                <option value="selesai"   {{ request('status')=='selesai'   ?'selected':'' }}>Selesai</option>
                <option value="batal"     {{ request('status')=='batal'     ?'selected':'' }}>Batal</option>
            </select>
        </div>
        <div class="col-md-2">
            <button class="btn btn-sm text-white w-100" style="background:#1a3a2e">Filter</button>
        </div>
    </form>
</div>

<div class="card shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr><th>Kode</th><th>Pelanggan</th><th>Item</th><th>Total</th><th>Pembayaran</th><th>Status</th><th>Tanggal</th><th>Aksi</th></tr>
                </thead>
                <tbody>
                @forelse($pesanan as $p)
                <tr>
                    <td class="fw-semibold small">{{ $p->order_code }}</td>
                    <td>{{ $p->customer_name }}</td>
                    <td class="small text-muted">{{ count($p->items) }} item</td>
                    <td class="fw-semibold">Rp {{ number_format($p->total,0,',','.') }}</td>
                    <td class="small">{{ $p->payment_method }}</td>
                    <td>
                        @php $badge=['pending'=>'warning','confirmed'=>'primary','selesai'=>'success','batal'=>'danger']; @endphp
                        <span class="badge bg-{{ $badge[$p->status]??'secondary' }}">{{ ucfirst($p->status) }}</span>
                    </td>
                    <td class="small text-muted">{{ $p->created_at->format('d/m/Y H:i') }}</td>
                    <td>
                        <!-- Update Status -->
                        <form action="{{ route('admin.pesanan.status', $p) }}" method="POST" class="d-inline">
                            @csrf @method('PATCH')
                            <select name="status" onchange="this.form.submit()" class="form-select form-select-sm" style="width:110px;display:inline-block;">
                                @foreach(['pending','confirmed','selesai','batal'] as $s)
                                <option value="{{ $s }}" {{ $p->status==$s?'selected':'' }}>{{ ucfirst($s) }}</option>
                                @endforeach
                            </select>
                        </form>
                        <form action="{{ route('admin.pesanan.destroy', $p) }}" method="POST" class="d-inline"
                              onsubmit="return confirm('Hapus pesanan ini?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="8" class="text-center text-muted py-4">Tidak ada pesanan</td></tr>
                @endforelse
                </tbody>
            </table>
        </div>
        <div class="p-3">{{ $pesanan->links() }}</div>
    </div>
</div>
@endsection