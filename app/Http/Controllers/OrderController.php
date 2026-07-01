<?php
namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller {
    public function store(Request $request) {
        $request->validate([
            'customer_name'   => 'required|string|max:100',
            'payment_method'  => 'required|string',
            'items'           => 'required|json',
        ]);

        $items    = json_decode($request->items, true);
        $subtotal = collect($items)->sum(fn($i) => $i['price'] * $i['qty']);
        $discount = 0;
        $total    = $subtotal - $discount;

        Order::create([
            'customer_name'  => $request->customer_name,
            'payment_method' => $request->payment_method,
            'note'           => $request->note,
            'items'          => $items,
            'subtotal'       => $subtotal,
            'discount'       => $discount,
            'total'          => $total,
        ]);

        return redirect()->route('order.success')
               ->with('success', 'Pesanan berhasil dikirim!');
    }

    public function success() {
        return view('order-success');
    }
}