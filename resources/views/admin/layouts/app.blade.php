<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin — Om Brew</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        :root { --darkgreen:#1a3a2e; --midgreen:#2d5a3d; --accent:#c8a96e; }
        body { background:#f0f2f0; }

        /* SIDEBAR */
        .sidebar {
            width: 220px; min-height: 100vh;
            background: #DCEBE1; position: fixed; left:0; top:0;
            z-index: 100; transition: all .3s;
        }
        .sidebar .brand {
            align-items: center; padding: 20px 50px; border-bottom: 1px solid rgba(255,255,255,.1);
        }
        .sidebar .brand-logo {
            width:36px;height:36px; background:var(--darkgreen);
            border-radius:8px; display:inline-flex;
            align-items:center; justify-content:center;
            font-weight:900; color:var(--darkgreen); font-size:14px;
        }
        .sidebar .nav-link {
            color: #013C16; padding: 10px 16px;
            border-radius: 8px; margin: 2px 8px; font-size:.875rem;
            transition: all .2s;
        }
        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background: rgba(1,60,22,.15); color: #013C16;
        }
        .sidebar .nav-link i { width: 20px; }
        .sidebar .nav-section {
            font-size:.7rem; color:#013C16;
            padding: 12px 24px 4px; text-transform:uppercase; letter-spacing:.06em;
        }

        /* TOPBAR */
        .topbar {
            margin-left: 220px; background:#fff;
            padding: 12px 24px; border-bottom:1px solid #e9ecef;
            display: flex; align-items:center; justify-content:space-between;
            position: sticky; top:0; z-index:99;
        }

        /* MAIN */
        .main-content { margin-left:220px; padding:24px; }

        /* STAT CARDS */
        .stat-card { border-radius:12px; border:none; }
        .stat-card .icon-box {
            width:48px; height:48px; border-radius:10px;
            display:flex; align-items:center; justify-content:center; font-size:1.4rem;
        }

        /* TABLE */
        .table th { background:#f8f9fa; font-size:.8rem; text-transform:uppercase; letter-spacing:.04em; }
        .badge-status { font-size:.75rem; padding:4px 10px; border-radius:20px; }

        /* RESPONSIVE */
        @media(max-width:768px) {
            .sidebar { transform: translateX(-100%); }
            .sidebar.show { transform: translateX(0); }
            .topbar, .main-content { margin-left:0; }
        }
    </style>
</head>
<body>

<!-- SIDEBAR -->
<aside class="sidebar" id="sidebar">
    <div class="brand d-flex align-items-center gap-2">
    <img src="{{ asset('images/logoOB.png') }}" alt="Om Brew Logo" 
         style="width:48px; background:var(--darkgreen); border-radius:10px; height:48px; object-fit:contain;">
    <div>
        <div class="fw-bold" style="font-size:.95rem; color:#013C16;">Om <br> Brew</div>
    </div>
</div>

    <nav class="mt-3">
        <div class="nav-section">Main</div>
        <a href="{{ route('admin.dashboard') }}" class="nav-link d-flex align-items-center gap-2 {{ request()->routeIs('admin.dashboard') ? 'active':'' }}">
            <i class="bi bi-grid-1x2"></i> Dashboard
        </a>

        <div class="nav-section">Kelola</div>
        <a href="{{ route('admin.users.index') }}" class="nav-link d-flex align-items-center gap-2 {{ request()->routeIs('admin.users*') ? 'active':'' }}">
            <i class="bi bi-people"></i> Data User
        </a>
        <a href="{{ route('admin.pesanan.index') }}" class="nav-link d-flex align-items-center gap-2 {{ request()->routeIs('admin.pesanan*') ? 'active':'' }}">
            <i class="bi bi-receipt"></i> Kelola Pesanan
        </a>
        <a href="{{ route('admin.menu.index') }}" class="nav-link d-flex align-items-center gap-2 {{ request()->routeIs('admin.menu*') ? 'active':'' }}">
            <i class="bi bi-menu-button-wide"></i> Kelola Menu
        </a>

        <div class="nav-section">Laporan</div>
        <a href="{{ route('admin.laporan.index') }}" class="nav-link d-flex align-items-center gap-2 {{ request()->routeIs('admin.laporan*') ? 'active':'' }}">
            <i class="bi bi-bar-chart"></i> Laporan Penjualan
        </a>

        <div class="nav-section">Sistem</div>
        <a href="{{ route('admin.pengaturan.index') }}" class="nav-link d-flex align-items-center gap-2 {{ request()->routeIs('admin.pengaturan*') ? 'active':'' }}">
            <i class="bi bi-gear"></i> Pengaturan
        </a>
        <hr class="border-secondary mx-3">
    </nav>
</aside>

<!-- TOPBAR -->
<div class="topbar">
    <div class="d-flex align-items-center gap-2">
        <button class="btn btn-sm btn-light d-md-none" onclick="document.getElementById('sidebar').classList.toggle('show')">
            <i class="bi bi-list"></i>
        </button>
        <span class="text-muted small">Welcome Back, <strong>Admin</strong></span>
    </div>
    <div class="d-flex align-items-center gap-3">
        <input type="text" class="form-control form-control-sm" placeholder="Cari..." style="width:180px;">
        <form method="POST" action="{{ route('logout') }}" class="m-0">
    @csrf
    <button type="submit" class="btn btn-sm btn-outline-danger" title="Logout">
        <i class="bi bi-box-arrow-right"></i> Logout
    </button>
</form>
    </div>
</div>

<!-- KONTEN -->
<main class="main-content">
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle me-1"></i> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    @yield('content')
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
@stack('scripts')
</body>
</html>