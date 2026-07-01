@extends('admin.layouts.app')
@section('content')

<h4 class="fw-bold mb-4">Laporan Penjualan</h4>

<!-- Stat Cards -->
<div class="row g-3 mb-4">
    <div class="col-md-3">
        <div class="card stat-card shadow-sm p-3">
            <div class="small text-muted">Total Pendapatan</div>
            <div class="fw-bold fs-5 text-success">Rp {{ number_format($totalPendapatan,0,',','.') }}</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card stat-card shadow-sm p-3">
            <div class="small text-muted">Total Pesanan Selesai</div>
            <div class="fw-bold fs-5 text-primary">{{ $totalPesanan }}</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card stat-card shadow-sm p-3">
            <div class="small text-muted">Total Diskon</div>
            <div class="fw-bold fs-5 text-warning">Rp {{ number_format($totalDiskon,0,',','.') }}</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card stat-card shadow-sm p-3">
            <div class="small text-muted">Rata-rata per Pesanan</div>
            <div class="fw-bold fs-5">Rp {{ number_format($rataRata,0,',','.') }}</div>
        </div>
    </div>
</div>

<!-- Filter Tanggal -->
<div class="card shadow-sm mb-4 p-3">
    <form class="row g-2 align-items-end">
        <div class="col-md-3">
            <label class="form-label small fw-semibold">Dari Tanggal</label>
            <input type="date" name="dari" class="form-control form-control-sm" value="{{ $dari }}">
        </div>
        <div class="col-md-3">
            <label class="form-label small fw-semibold">Sampai Tanggal</label>
            <input type="date" name="sampai" class="form-control form-control-sm" value="{{ $sampai }}">
        </div>
        <div class="col-md-2">
            <button class="btn btn-sm text-white w-100" style="background:#1a3a2e">Tampilkan</button>
        </div>
    </form>
</div>

<!-- Tabel -->
<div class="card shadow-sm">
    <div class="card-header bg-white d-flex justify-content-between align-items-center">
        <h6 class="fw-bold mb-0">Detail Penjualan</h6>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr><th>Kode</th><th>Pelanggan</th><th>Item</th><th>Subtotal</th><th>Diskon</th><th>Total</th><th>Tanggal</th></tr>
                </thead>
                <tbody>
                @forelse($orders as $o)
                <tr>
                    <td class="small fw-semibold">{{ $o->order_code }}</td>
                    <td>{{ $o->customer_name }}</td>
                    <td class="small text-muted">{{ count($o->items) }} item</td>
                    <td class="small">Rp {{ number_format($o->subtotal,0,',','.') }}</td>
                    <td class="small text-success">-Rp {{ number_format($o->discount,0,',','.') }}</td>
                    <td class="fw-bold">Rp {{ number_format($o->total,0,',','.') }}</td>
                    <td class="small text-muted">{{ $o->created_at->format('d/m/Y') }}</td>
                </tr>
                @empty
                <tr><td colspan="7" class="text-center py-4 text-muted">Tidak ada data</td></tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
new Chart(document.getElementById('laporanChart'), {
    type: 'line',
    data: {
        labels: {!! json_encode(array_column($chartData, 'bulan')) !!},
        datasets: [{
            label: 'Pendapatan (Rp)',
            data: {!! json_encode(array_column($chartData, 'total')) !!},
            borderColor: '#1a3a2e', backgroundColor: 'rgba(26,58,46,.1)',
            tension: 0.4, fill: true, pointBackgroundColor: '#1a3a2e',
        }]
    },
    options: { responsive:true, plugins:{legend:{display:false}}, scales:{y:{beginAtZero:true}} }
});
</script>
@endpush