@extends('layouts.app')

@section('content')

<!-- HERO SECTION -->
<section class="hero-section position-relative overflow-hidden">
    <div class="hero-overlay"></div>
    <div class="container position-relative hero-content">
        <div class="row align-items-center min-vh-100">
            <div class="col-lg-6 text-white">
                <span class="hero-subtitle">
                    WELCOME TO WARUNG
                </span>
                <h1 class="hero-title">
                    OM BREW
                </h1>
                <p class="hero-description">
                    Produk Lokal dengan Kualitas yang Tidak Lokal.
                    Dibuat dengan sepenuh hati untuk memberikan
                    pengalaman terbaik.
                </p>
                <a href="{{ route('menu') }}" class="hero-btn">
                    Lihat Menu
                    <i class="bi bi-cart3 ms-2"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- TRIOO MENU -->
<section class="trio-section">
    <div class="container">
        <div class="trio-header">
            <h2>Trioo <span>Menu</span></h2>
            <div class="trio-line"></div>
            <p>
                Ada tiga menu utama yang disediakan di Warung Om Brew
                dan inilah beberapa menu favorit pelanggan kami.
            </p>
        </div>
        <div class="trio-grid">
            <!-- Card Besar -->
            <div class="trio-card trio-large">
                <div class="trio-overlay"></div>
                <div class="trio-content">
                    <h3>Sate Maranggi</h3>
                    <div class="stars">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                    </div>
                    <a href="{{ route('menu') }}" class="trio-btn">
                        Now
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
            <!-- Card Kanan Atas -->
            <div class="trio-card trio-ayam">
                <div class="trio-overlay"></div>
                <div class="trio-content">
                    <h3>Ayam Penyet</h3>
                    <div class="stars">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                    </div>
                    <a href="{{ route('menu') }}" class="trio-btn">
                        Now
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
            <!-- Card Kanan Bawah -->
            <div class="trio-card trio-sop">
                <div class="trio-overlay"></div>
                <div class="trio-content">
                    <h3>Sop Jando</h3>
                    <div class="stars">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                    </div>
                    <a href="{{ route('menu') }}" class="trio-btn">
                        Now
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- CART MODAL -->
@include('partials.cart-modal')

@endsection