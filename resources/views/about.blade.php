@extends('layouts.app')

@section('content')

<!-- ABOUT HERO -->
<section class="about-hero-banner">
    <div class="about-hero-overlay">
        <h1 class="about-hero-title">ABOUT US</h1>
    </div>
</section>

<!-- ABOUT CONTENT -->
<section class="about-content py-5">
    <div class="container">
        <div class="row align-items-center g-4">
            <div class="col-md-7">
                <h2 class="about-brand-title">Om Brew</h2>
                <p class="about-desc">
                    Lapar? Tenang, Om Brew siap nemenin waktu makan kamu 🍽️ Mulai dari ayam penyet yang
                    pedasnya nampol sampai sate maranggi dengan cita rasa khas, semuanya dibuat dengan penuh
                    rasa dan kualitas terbaik. Jangan lupa beli di daerah subang, daerah subang bangget gampang
                    nyari, murah meriah dan terpecaya hanya di warung om breww lets gooo
                </p>
            </div>
            <div class="col-md-5 d-flex justify-content-center">
                <div class="about-circle-img">
                    <img src="{{ asset('images/bgAbout.png') }}" alt="Om Brew">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- LAYANAN KAMI -->
<section class="layanan-section py-5">
    <div class="container">
        <h3 class="layanan-title text-center mb-2">Layanan <span class="layanan-highlight">Kami</span></h3>
        <p class="text-center layanan-subtitle mb-5">
            Pelanggan dapat melakukan pemesanan secara langsung di tempat maupun<br>
            melalui platform online, dan kami selalu tersedia di jadwalkan
        </p>

        <div class="row g-4 justify-content-center">

            <!-- GoFood -->
            <div class="col-md-3 col-sm-6">
                <div class="layanan-card layanan-card-gofood text-center p-4 h-100">
                    <div class="layanan-logo-wrap mx-auto mb-3">
                        <img src="{{ asset('images/gofood.png') }}" alt="GoFood" class="layanan-logo">
                    </div>
                    <h6 class="layanan-card-title">GoFood</h6>
                    <p class="layanan-card-desc">Pesan via GoFood, pengiriman cepat ke lokasi kamu</p>
                    <a href="https://gofood.co.id" target="_blank" class="btn btn-layanan">Buka</a>
                </div>
            </div>

            <!-- ShopeeFood -->
            <div class="col-md-3 col-sm-6">
                <div class="layanan-card layanan-card-shopee text-center p-4 h-100">
                    <div class="layanan-logo-wrap mx-auto mb-3">
                        <img src="{{ asset('images/shopee.png') }}" alt="ShopeeFood" class="layanan-logo">
                    </div>
                    <h6 class="layanan-card-title">ShopeeFood</h6>
                    <p class="layanan-card-desc">Dapatkan cashback spesial saat pesan lewat ShopeeFood</p>
                    <a href="https://shopee.co.id/food" target="_blank" class="btn btn-layanan">Buka</a>
                </div>
            </div>

            <!-- GrabFood -->
            <div class="col-md-3 col-sm-6">
                <div class="layanan-card layanan-card-grab text-center p-4 h-100">
                    <div class="layanan-logo-wrap mx-auto mb-3">
                        <img src="{{ asset('images/grab.png') }}" alt="GrabFood" class="layanan-logo">
                    </div>
                    <h6 class="layanan-card-title">GrabFood</h6>
                    <p class="layanan-card-desc">Tersedia di GrabFood dengan berbagai promo menarik</p>
                    <a href="https://food.grab.com" target="_blank" class="btn btn-layanan">Buka</a>
                </div>
            </div>

            <!-- Jam Operasional -->
            <div class="col-md-3 col-sm-6">
                <div class="layanan-card layanan-card-jam text-center p-4 h-100 d-flex flex-column align-items-center justify-content-center">
                    <div class="layanan-logo-wrap mx-auto mb-3">
                        <i class="bi bi-clock layanan-clock-icon"></i>
                    </div>
                    <h6 class="layanan-card-title">Jam Operasional</h6>
                    <p class="layanan-card-desc mb-1">Buka Setiap Hari</p>
                    <p class="fw-bold text-dark mb-1">Senin–Sabtu</p>
                    <p class="text-muted small">14.00–22.00</p>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection