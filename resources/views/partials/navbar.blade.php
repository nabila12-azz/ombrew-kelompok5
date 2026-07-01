<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-darkgreen sticky-top">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ asset('images/logoOB.png') }}" alt="Om Brew Logo">
        </a>
        <!-- Hamburger Mobile -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu" aria-controls="navMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Menu -->
        <div class="navbar-collapse show" id="navMenu">
            <ul class="navbar-nav mx-auto gap-lg-4">
                <li class="nav-item">
                    <a class="nav-link custom-nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
                        href="{{ route('home') }}">
                        Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link custom-nav-link {{ request()->routeIs('menu') ? 'active' : '' }}"
                        href="{{ route('menu') }}">
                        Menu
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link custom-nav-link {{ request()->routeIs('about') ? 'active' : '' }}"
                        href="{{ route('about') }}">
                        About
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link custom-nav-link {{ request()->routeIs('contact') ? 'active' : '' }}"
                        href="{{ route('contact') }}">
                        Contact
                    </a>
                </li>
            </ul>
            <!-- Button -->
            <div class="d-flex gap-2 mt-3 mt-lg-0">
                <a href="{{ route('login') }}" class="btn btn-signin">
                    Sign In
                </a>
                <a href="{{ route('register') }}" class="btn btn-register">
                    Register
                </a>
            </div>
        </div>
    </div>
</nav>