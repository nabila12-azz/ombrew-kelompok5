<?php
namespace App\Http\Controllers;

use App\Models\Product;

class HomeController extends Controller {
    public function index() {
        $featured = Product::with('category')
                    ->where('is_active', true)
                    ->latest()->take(6)->get();
        return view('home', compact('featured'));
    }

    public function about() {
        return view('about');
    }
}