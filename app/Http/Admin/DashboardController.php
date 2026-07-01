<?php
namespace App\Http\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;

class DashboardController extends Controller {
    public function index() {
        // Statistik kartu atas
        $totalPendapatan = Order::where('status', 'selesai')->sum('total');
        $totalPesanan    = Order::count();
        $pesananPending  = Order::where('status', 'pending')->count();
        $totalMenu       = Product::where('is_active', true)->count();
        $totalUser       = User::count();

        // Data chart bulanan (6 bulan terakhir)
        $chartData = [];
        for ($i = 5; $i >= 0; $i--) {
            $bulan = now()->subMonths($i);
            $chartData[] = [
                'bulan'  => $bulan->format('M'),
                'total'  => Order::where('status','selesai')
                            ->whereYear('created_at', $bulan->year)
                            ->whereMonth('created_at', $bulan->month)
                            ->sum('total'),
            ];
        }

        // Tabel pesanan terbaru
        $pesananTerbaru = Order::latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalPendapatan','totalPesanan','pesananPending',
            'totalMenu','totalUser','chartData','pesananTerbaru'
        ));
    }
}