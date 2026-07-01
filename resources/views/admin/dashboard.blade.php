@extends('admin.layouts.app')
@section('content')

<h4 class="fw-bold mb-4">Dashboard</h4>

<!-- STAT CARDS -->
<div class="row g-3 mb-4">
    {{-- 1. Total Pendapatan --}}
    <div class="col-xl-3 col-md-6">
        <div class="card stat-card shadow-sm p-4" style="background:#068BBC; color:white;">
            <div class="d-flex align-items-center gap-3">
                <div class="icon-box text-white"><i class="bi bi-cash-coin"></i></div>
                <div>
                    <div class="small text-white">Total Pendapatan</div>
                    <div class="fw-bold fs-5">Rp {{ number_format($totalPendapatan,0,',','.') }}</div>
                </div>
            </div>
        </div>
    </div>
    {{-- 2. Total Menu --}}
    <div class="col-xl-3 col-md-6">
        <div class="card stat-card shadow-sm p-3" style="background:#EBBD05; color:white;">
            <div class="d-flex align-items-center gap-3">
                <div class="icon-box text-white"><i class="bi bi-grid"></i></div>
                <div>
                    <div class="small text-white">Total Menu</div>
                    <div class="fw-bold fs-5">{{ $totalMenu }}</div>
                </div>
            </div>
        </div>
    </div>
    {{-- 3. Total Pesanan --}}
    <div class="col-xl-3 col-md-6">
        <div class="card stat-card shadow-sm p-3" style="background:#D80105; color:white;">
            <div class="d-flex align-items-center gap-3">
                <div class="icon-box text-white"><i class="bi bi-receipt"></i></div>
                <div>
                    <div class="small text-white">Total Pesanan</div>
                    <div class="fw-bold fs-5">{{ $totalPesanan }}</div>
                </div>
            </div>
        </div>
    </div>
    {{-- 4. Total User --}}
    <div class="col-xl-3 col-md-6">
        <div class="card stat-card shadow-sm p-3" style="background:#039428; color:white;">
            <div class="d-flex align-items-center gap-3">
                <div class="icon-box text-white"><i class="bi bi-people"></i></div>
                <div>
                    <div class="small text-white">Total User</div>
                    <div class="fw-bold fs-5">{{ $totalUser }}</div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- CHART + TABEL -->
<div class="row g-3">
    <div class="col-md-7">
        <div class="card shadow-sm p-4">
            <h6 class="fw-bold mb-3">Grafik Penjualan 6 Bulan</h6>
            <canvas id="salesChart" height="120"></canvas>
        </div>
    </div>
    <div class="col-md-5">
        <div class="card shadow-sm p-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h6 class="fw-bold mb-0">Pesanan Terbaru</h6>
                <a href="{{ route('admin.pesanan.index') }}" class="small text-decoration-none">Lihat Semua</a>
            </div>
            <div class="table-responsive">
                <table class="table table-sm">
                    <thead><tr><th>Kode</th><th>Pelanggan</th><th>Total</th><th>Status</th></tr></thead>
                    <tbody>
                    @foreach($pesananTerbaru as $p)
                    <tr>
                        <td class="small fw-semibold">{{ $p->order_code }}</td>
                        <td class="small">{{ $p->customer_name }}</td>
                        <td class="small">Rp {{ number_format($p->total,0,',','.') }}</td>
                        <td>
                            @php
                            $badge = ['pending'=>'warning','confirmed'=>'primary','selesai'=>'success','batal'=>'danger'];
                            @endphp
                            <span class="badge bg-{{ $badge[$p->status] ?? 'secondary' }} badge-status">
                                {{ ucfirst($p->status) }}
                            </span>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const ctx = document.getElementById('salesChart');
    if (!ctx) return;

    const labels = <?php echo json_encode(array_column($chartData ?? [], 'bulan')); ?>;
    const data = <?php echo json_encode(array_column($chartData ?? [], 'total')); ?>;

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Pendapatan (Rp)',
                data: data,
                backgroundColor: '#1a3a2e',
                borderRadius: 6,
            }]
        },
        options: {
            responsive: true,
            plugins: { legend: { display: false } },
            scales: { y: { beginAtZero: true } }
        }
    });
});
</script>
@endpush