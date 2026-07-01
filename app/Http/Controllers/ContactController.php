<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller {
    public function index() {
        return view('contact');
    }

    public function send(Request $request) {
        $request->validate([
            'name'    => 'required',
            'email'   => 'required|email',
            'message' => 'required',
        ]);
        // Tambahkan logic kirim email jika perlu
        return back()->with('success', 'Pesan berhasil dikirim!');
    }
}