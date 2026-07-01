<?php
namespace App\Http\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class PesananController extends Controller {
    public function index(Request $request) {
        $query = Order::query();

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        if ($request->filled('search')) {
            $query->where('customer_name', 'like', '%'.$request->search.'%')
                  ->orWhere('order_code',  'like', '%'.$request->search.'%');
        }

        $pesanan = $query->latest()->paginate(10)->withQueryString();
        return view('admin.pesanan.index', compact('pesanan'));
    }

    public function updateStatus(Request $request, Order $order) {
        $request->validate(['status' => 'required|in:pending,confirmed,selesai,batal']);
        $order->update(['status' => $request->status]);
        return back()->with('success', 'Status pesanan diperbarui!');
    }

    public function destroy(Order $order) {
        $order->delete();
        return back()->with('success', 'Pesanan dihapus!');
    }
}