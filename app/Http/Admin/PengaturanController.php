<?php
namespace App\Http\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class PengaturanController extends Controller {
    public function index() {
        $settings = Setting::all()->pluck('value', 'key');
        return view('admin.pengaturan.index', compact('settings'));
    }

    public function update(Request $request) {
        $request->validate([
            'nama_toko' => 'required|string|max:100',
            'telepon'   => 'required|string|max:20',
            'email'     => 'required|email',
        ]);

        $keys = ['nama_toko','alamat','telepon','email','jam_buka','deskripsi'];
        foreach ($keys as $key) {
            Setting::updateOrCreate(
                ['key'   => $key],
                ['value' => $request->input($key, '')]
            );
        }

        return back()->with('success', 'Pengaturan berhasil disimpan!');
    }
}