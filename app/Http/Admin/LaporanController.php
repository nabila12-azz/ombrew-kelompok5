<?php
namespace App\Http\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class LaporanController extends Controller {
    public function index(Request $request) {
        $dari   = $request->dari   ?? now()->startOfMonth()->format('Y-m-d');
        $sampai = $request->sampai ?? now()->format('Y-m-d');

        $orders = Order::where('status', 'selesai')
                  ->whereBetween('created_at', [$dari.' 00:00:00', $sampai.' 23:59:59'])
                  ->latest()->get();

        $totalPendapatan = $orders->sum('total');
        $totalPesanan    = $orders->count();
        $totalDiskon     = $orders->sum('discount');
        $rataRata        = $totalPesanan > 0 ? $totalPendapatan / $totalPesanan : 0;

        // Data chart
        $chartData = [];
        for ($i = 5; $i >= 0; $i--) {
            $bulan = now()->subMonths($i);
            $chartData[] = [
                'bulan' => $bulan->format('M Y'),
                'total' => Order::where('status','selesai')
                           ->whereYear('created_at',  $bulan->year)
                           ->whereMonth('created_at', $bulan->month)
                           ->sum('total'),
            ];
        }

        return view('admin.laporan.index', compact(
            'orders','totalPendapatan','totalPesanan',
            'totalDiskon','rataRata','chartData','dari','sampai'
        ));
    }
}