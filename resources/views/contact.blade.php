@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/contact.css') }}">

<!-- CONTACT HERO -->
<section class="contact-hero-banner">
    <div class="contact-hero-overlay">
        <h1 class="contact-hero-title">CONTACT US</h1>
    </div>
</section>

<!-- CONTACT CARDS -->
<section class="contact-section py-5">
    <div class="container">
        <div class="row g-3 justify-content-center">

            <!-- Alamat -->
            <div class="col-md-3 col-sm-6">
                <div class="contact-card text-center p-4">
                    <i class="bi bi-geo-alt contact-icon mb-3"></i>
                    <h6 class="contact-card-title">ADRESS LINE</h6>
                    <p class="contact-card-desc">Kota Subang, Jalan Sompi</p>
                </div>
            </div>

            <!-- Phone — highlight -->
            <div class="col-md-3 col-sm-6">
                <div class="contact-card contact-card-highlight text-center p-4">
                    <i class="bi bi-telephone contact-icon mb-3"></i>
                    <h6 class="contact-card-title">PHONE NUMBER</h6>
                    <p class="contact-card-desc">+62 0882-2154-0965-7843</p>
                </div>
            </div>

            <!-- Email -->
            <div class="col-md-3 col-sm-6">
                <div class="contact-card text-center p-4">
                    <i class="bi bi-envelope contact-icon mb-3"></i>
                    <h6 class="contact-card-title">EMAIL ADDRESS</h6>
                    <p class="contact-card-desc">email WarungOB@gmail.com</p>
                </div>
            </div>

        </div>
    </div>
</section>
        <!-- GET IN TOUCH + FORM -->
<section class="contact-bottom-section py-5">
    <div class="container">
        <div class="row g-5">

            <!-- Kiri: Get In Touch + Maps -->
            <div class="col-md-6">
                <h3 class="contact-bottom-title">Get In Touch</h3>
                <p class="contact-bottom-desc">
                    Kami siap membantu kamu! Kunjungi langsung warung kami atau
                    hubungi melalui form di samping untuk pertanyaan dan kerjasama.
                </p>
                <div class="contact-maps-wrap mt-4">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3962.123456789!2d107.123456!3d-6.123456!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2sWarung+Om+Brew!5e0!3m2!1sid!2sid!4v1234567890"
                        width="100%"
                        height="250"
                        style="border:0;"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                        class="contact-maps">
                    </iframe>
                </div>
            </div>

            <!-- Kanan: Form -->
            <div class="col-md-6">
                <h3 class="contact-bottom-title">Fill Up The Form</h3>
                <p class="contact-bottom-desc">
                    Your email address will not be published, requieded fields are marked
                </p>

                <div class="mt-4">
                    <!-- Nama -->
                    <div class="contact-form-group mb-3">
                        <label class="contact-form-label">
                            <i class="bi bi-person me-2"></i>Your Name
                        </label>
                        <input type="text" class="contact-form-input" placeholder="">
                    </div>

                    <!-- Email -->
                    <div class="contact-form-group mb-3">
                        <label class="contact-form-label">
                            <i class="bi bi-envelope me-2"></i>Email Address
                        </label>
                        <input type="email" class="contact-form-input" placeholder="">
                    </div>

                    <!-- Catatan -->
                    <div class="contact-form-group mb-4">
                        <label class="contact-form-label">
                            <i class="bi bi-pencil-square me-2"></i>Catatan
                        </label>
                        <textarea class="contact-form-input" rows="4" placeholder=""></textarea>
                    </div>

                    <!-- Tombol -->
                    <button class="btn-kirim">
                        Kirim <i class="bi bi-send-fill ms-1"></i>
                    </button>
                </div>
            </div>

        </div>
    </div>
</section>

        <!-- Banner Delivery -->
<!-- Banner Delivery -->
<div class="delivery-banner">
</div>
@endsection