<?php
namespace App\Http\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuAdminController extends Controller {
    public function index(Request $request) {
        $query = Product::with('category');
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }
        $products   = $query->latest()->paginate(10)->withQueryString();
        $categories = Category::all();
        return view('admin.menu.index', compact('products', 'categories'));
    }

    public function create() {
        $categories = Category::all();
        return view('admin.menu.create', compact('categories'));
    }

    public function store(Request $request) {
        $request->validate([
            'name'        => 'required|string|max:100',
            'category_id' => 'required|exists:categories,id',
            'price'       => 'required|numeric|min:0',
            'status'      => 'required|in:tersedia,habis',
            'image'       => 'nullable|image|max:2048',
        ]);
        $data = $request->only('name','category_id','description','price','rating','status','is_active');
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }
        Product::create($data);
        return redirect()->route('admin.menu.index')
               ->with('success', 'Menu berhasil ditambahkan!');
    }

    public function edit(Product $menu) {
        $categories = Category::all();
        return view('admin.menu.edit', compact('menu', 'categories'));
    }

    public function update(Request $request, Product $menu) {
        $request->validate([
            'name'        => 'required|string|max:100',
            'category_id' => 'required|exists:categories,id',
            'price'       => 'required|numeric|min:0',
            'status'      => 'required|in:tersedia,habis',
            'image'       => 'nullable|image|max:2048',
        ]);
        $data = $request->only('name','category_id','description','price','rating','status','is_active');
        if ($request->hasFile('image')) {
            if ($menu->image) Storage::disk('public')->delete($menu->image);
            $data['image'] = $request->file('image')->store('products', 'public');
        }
        $menu->update($data);
        return redirect()->route('admin.menu.index')
               ->with('success', 'Menu berhasil diupdate!');
    }

    public function destroy(Product $menu) {
        if ($menu->image) Storage::disk('public')->delete($menu->image);
        $menu->delete();
        return back()->with('success', 'Menu berhasil dihapus!');
    }
}