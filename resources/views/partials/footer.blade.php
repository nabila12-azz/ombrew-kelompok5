<link rel="stylesheet" href="{{ asset('css/footer.css') }}">

<!-- FOOTER -->
<footer class="footer-section">
    <div class="container">
        <div class="row g-4 py-5">

            <!-- Kolom 1: Brand -->
<div class="col-md-3">
    <div class="footer-brand">
        <img src="{{ asset('images/logoOB.png') }}" alt="Om Brew Logo">
        <span class="footer-brand-name">OM BREW</span>
    </div>
    <p class="footer-desc">
        Warung makanan & minuman terbaik dengan cita rasa rumahan yang hangat dan terjangkau.
        Dibuat dengan sepenuh hati untuk kamu.
    </p>
    <div class="footer-socials">
        <a href="#" class="footer-social-btn"><i class="bi bi-instagram"></i></a>
        <a href="#" class="footer-social-btn"><i class="bi bi-facebook"></i></a>
        <a href="#" class="footer-social-btn"><i class="bi bi-whatsapp"></i></a>
        <a href="#" class="footer-social-btn"><i class="bi bi-tiktok"></i></a>
    </div>
</div>

            <!-- Kolom 2: Navigasi -->
            <div class="col-md-2 offset-md-1">
                <h6 class="footer-heading">Navigasi</h6>
                <ul class="footer-nav-list">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('menu') }}">Menu</a></li>
                    <li><a href="{{ route('about') }}">About</a></li>
                    <li><a href="{{ route('contact') }}">Contact</a></li>
                </ul>
            </div>

            <!-- Kolom 3: Jam Buka -->
            <div class="col-md-3">
                <h6 class="footer-heading">Jam Buka</h6>
                <ul class="footer-hours-list">
                    <li>
                        <span class="footer-hours-day">Senin – Jumat</span>
                        <span class="footer-hours-time">14.00 – 22.00</span>
                    </li>
                    <li>
                        <span class="footer-hours-day">Sabtu</span>
                        <span class="footer-hours-time">12.00 – 23.00</span>
                    </li>
                    <li>
                        <span class="footer-hours-day">Minggu</span>
                        <span class="footer-hours-closed">Tutup</span>
                    </li>
                </ul>
            </div>

            <!-- Kolom 4: Kontak -->
            <div class="col-md-3">
                <h6 class="footer-heading">Kontak</h6>
                <ul class="footer-contact-list">
                    <li>
                        <i class="bi bi-telephone-fill footer-contact-icon"></i>
                        <span>+62 0882-2154-0965-7843</span>
                    </li>
                    <li>
                        <i class="bi bi-envelope-fill footer-contact-icon"></i>
                        <span>WarungOB@gmail.com</span>
                    </li>
                    <li>
                        <i class="bi bi-geo-alt-fill footer-contact-icon"></i>
                        <span>Kota Subang, Jalan Sompi</span>
                    </li>
                </ul>
            </div>

        </div>

        <!-- Divider -->
        <div class="footer-divider"></div>

        <!-- Bottom Bar -->
        <div class="footer-bottom py-3 d-flex flex-wrap justify-content-between align-items-center">
            <p class="mb-0 footer-copy">&copy; 2026 <span class="footer-copy-brand">Om Brew</span>. All rights reserved.</p>
            <p class="mb-0 footer-copy">Made with <i class="bi bi-heart-fill text-danger"></i> in Subang</p>
        </div>

    </div>
</footer>