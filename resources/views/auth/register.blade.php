<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar — Om Brew</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        :root {
            --dg: #1a3a2e;
            --mg: #2d5a3d;
            --ac: #c8a96e;
        }
 
        * { box-sizing: border-box; margin: 0; padding: 0; }
 
        body {
            min-height: 100vh;
            background: #c8c8c8;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', sans-serif;
            padding: 40px 16px;
        }
 
        .auth-card {
            display: flex;
            width: 100%;
            max-width: 660px;
            min-height: 400px;
            border-radius: 6px;
            overflow: hidden;
            box-shadow: 0 8px 32px rgba(0,0,0,.25);
        }
 
        /* PANEL KIRI: FOTO */
        .card-photo {
            width: 50%;
            flex-shrink: 0;
            position: relative;
            overflow: hidden;
            background: var(--dg);
        }
        .card-photo img {
            width: 265%;
            height: 100%;
            object-fit: cover;
            display: block;
        }
        .photo-fallback {
            width: 100%;
            height: 100%;
            min-height: 400px;
            background: linear-gradient(160deg, #0f2318 0%, #1a3a2e 40%, #2d5a3d 100%);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 16px;
        }
        .photo-fallback .cup-icon {
            font-size: 4rem;
            color: rgba(200,169,110,.5);
        }
        .photo-fallback p {
            color: rgba(255,255,255,.35);
            font-size: .75rem;
            text-align: center;
            padding: 0 20px;
            line-height: 1.6;
        }
 
        /* PANEL KANAN: FORM */
        .card-form {
            flex: 1;
            background: #fff;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 32px 28px;
        }
 
        /* Logo */

        .brand-logo {
            color: var(--dg);
            margin-bottom: 20px;
        }

        .brand-logo img {
            color: var(--dg);
            width: 100px;
            height: auto;
            display: block;
        }

        .brand-mark {
            font-size: 2rem;
            font-weight: 900;
            color: var(--dg);
            font-style: italic;
            font-family: Georgia, 'Times New Roman', serif;
            line-height: 1;
            margin-bottom: 4px;
        }
        .welcome-txt {
            font-size: .82rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }
 
        /* Label & Input */
        .f-label {
            font-size: .72rem;
            font-weight: 600;
            color: #555;
            display: block;
            margin-bottom: 4px;
            width: 100%;
            text-align: left;
        }
 
        .input-wrap {
            position: relative;
            width: 100%;
            margin-bottom: 11px;
        }
        .input-wrap .icon {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: #ccc;
            font-size: .82rem;
            pointer-events: none;
        }
        .input-wrap input {
            width: 100%;
            border: 1px solid #ddd;
            border-radius: 3px;
            padding: 7px 10px 7px 30px;
            font-size: .82rem;
            color: #333;
            background: #fafafa;
            outline: none;
            transition: border-color .2s, box-shadow .2s;
        }
        .input-wrap input:focus {
            border-color: var(--dg);
            background: #fff;
            box-shadow: 0 0 0 2px rgba(26,58,46,.1);
        }
        .input-wrap input.is-invalid { border-color: #dc3545; }
        .input-wrap .toggle-eye {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: #ccc;
            font-size: .82rem;
            cursor: pointer;
        }
        .input-wrap .toggle-eye:hover { color: var(--dg); }
 
        /* Row link */
        .link-row {
            display: flex;
            justify-content: space-between;
            width: 100%;
            margin-bottom: 15px;
        }
        .link-row a {
            font-size: .7rem;
            text-decoration: none;
            color: #999;
        }
        .link-row a.highlight {
            color: var(--ac);
            font-weight: 600;
        }
        .link-row a:hover { text-decoration: underline; }
 
        /* Tombol */
        .btn-submit {
            width: 100%;
            background: var(--dg);
            color: #fff;
            border: none;
            border-radius: 3px;
            padding: 9px;
            font-size: .82rem;
            font-weight: 600;
            cursor: pointer;
            letter-spacing: .05em;
            transition: background .2s;
            margin-bottom: 13px;
        }
        .btn-submit:hover { background: var(--mg); }
 
        /* OR divider */
        .divider {
            display: flex;
            align-items: center;
            gap: 10px;
            width: 100%;
            margin-bottom: 11px;
        }
        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: #efefef;
        }
        .divider span { font-size: .68rem; color: #ccc; }
 
        /* Social buttons */
        .social-wrap {
            display: flex;
            gap: 12px;
            justify-content: center;
        }
        .btn-social {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            border: 1px solid #ddd;
            background: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: box-shadow .2s, border-color .2s;
        }
        .btn-social:hover {
            box-shadow: 0 2px 8px rgba(0,0,0,.1);
            border-color: #bbb;
        }
        .btn-social.fb { background: #1877F2; border-color: #1877F2; }
        .btn-social svg { width: 17px; height: 17px; }
 
        /* Error box */
        .err-msg {
            width: 100%;
            background: #fff5f5;
            border: 1px solid #fecaca;
            color: #991b1b;
            border-radius: 3px;
            padding: 8px 12px;
            font-size: .75rem;
            margin-bottom: 12px;
        }
        .field-err {
            font-size: .72rem;
            color: #dc3545;
            margin-top: -8px;
            margin-bottom: 8px;
            display: block;
        }

        .btn-home {
            width: 100%;
            background: transparent;
            color: var(--dg);
            border: 1px solid var(--dg);
            border-radius: 3px;
            padding: 9px;
            font-size: .82rem;
            font-weight: 600;
            text-decoration: none;
            text-align: center;
            display: block;
            margin-top: 10px;
            transition: all .2s;
        }

        .btn-home:hover {
            background: var(--dg);
            color: #fff;
        }
 
        @media (max-width: 520px) {
            .auth-card { flex-direction: column; }
            .card-photo { width: 100%; min-height: 180px; }
            .photo-fallback { min-height: 180px; }
        }
    </style>
</head>
<body>
 
<div class="auth-card">
 
    <!-- KIRI: FOTO -->
    <div class="card-photo">
        <img src="{{ asset('images/bgHome2.png') }}"
             alt="Om Brew"
             onerror="this.style.display='none'; document.getElementById('fb-reg').style.display='flex';">
        <div id="fb-reg" class="photo-fallback" style="display:none;">
            <i class="bi bi-cup-hot cup-icon"></i>
            <p>Taruh foto<br>warung kamu di<br><code>public/assets/img/auth-bg.jpg</code></p>
        </div>
    </div>
 
    <!-- KANAN: FORM REGISTER -->
    <div class="card-form">
 
        <div class="brand-logo">
            <img src="{{ asset('images/LogoAuth.png') }}" alt="Om Brew Logo">
        </div>
        <div class="welcome-txt">Helloo !! Welcome backk</div>
 
        @if ($errors->any())
        <div class="err-msg">
            <i class="bi bi-exclamation-circle me-1"></i>
            {{ $errors->first() }}
        </div>
        @endif
 
        <form method="POST" action="{{ route('register') }}" style="width:100%;">
            @csrf
 
            <!-- Username / Nama -->
            <label class="f-label">Username</label>
            <div class="input-wrap">
                <i class="bi bi-person icon"></i>
                <input type="text"
                       name="name"
                       value="{{ old('name') }}"
                       placeholder="Nama lengkap kamu"
                       class="{{ $errors->has('name') ? 'is-invalid' : '' }}"
                       required
                       autofocus
                       autocomplete="name">
            </div>
            @error('name')
                <span class="field-err">{{ $message }}</span>
            @enderror
 
            <!-- Email -->
            <label class="f-label">Email</label>
            <div class="input-wrap">
                <i class="bi bi-envelope icon"></i>
                <input type="email"
                       name="email"
                       value="{{ old('email') }}"
                       placeholder="email@contoh.com"
                       class="{{ $errors->has('email') ? 'is-invalid' : '' }}"
                       required
                       autocomplete="username">
            </div>
            @error('email')
                <span class="field-err">{{ $message }}</span>
            @enderror
 
            <!-- Password -->
            <label class="f-label">Password</label>
            <div class="input-wrap">
                <i class="bi bi-lock icon"></i>
                <input type="password"
                       name="password"
                       id="pw-reg"
                       placeholder="••••••••"
                       class="{{ $errors->has('password') ? 'is-invalid' : '' }}"
                       required
                       autocomplete="new-password">
                <span class="toggle-eye" onclick="togglePw('pw-reg','eye-reg')">
                    <i class="bi bi-eye" id="eye-reg"></i>
                </span>
            </div>
            @error('password')
                <span class="field-err">{{ $message }}</span>
            @enderror
 
            <!-- Konfirmasi Password (hidden, auto-sync) -->
            <input type="hidden" name="password_confirmation" id="pw-confirm">
 
            <div class="link-row">
                <a href="{{ route('login') }}">Sudah Punya Akun?</a>
                <a href="{{ route('login') }}" class="highlight">Login Now</a>
            </div>
 
            <button type="submit" class="btn-submit" onclick="syncPw()">Register</button>
            <a href="{{ route('home') }}" class="btn-home">
                <i class="bi bi-arrow-left"></i> Kembali ke Home
            </a>
        </form>
 
        <div class="divider"><span>or</span></div>
 
        <div class="social-wrap">
            <!-- Google -->
            <button class="btn-social" type="button" title="Daftar dengan Google">
                <svg viewBox="0 0 24 24">
                    <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                    <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                    <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
                    <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
                </svg>
            </button>
            <!-- Facebook -->
            <button class="btn-social fb" type="button" title="Daftar dengan Facebook">
                <svg viewBox="0 0 24 24">
                    <path fill="#fff" d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                </svg>
            </button>
        </div>
 
    </div>
</div>
 
<script>
function togglePw(inputId, iconId) {
    const inp  = document.getElementById(inputId);
    const icon = document.getElementById(iconId);
    if (inp.type === 'password') {
        inp.type = 'text';
        icon.className = 'bi bi-eye-slash';
    } else {
        inp.type = 'password';
        icon.className = 'bi bi-eye';
    }
}
 
// Sync password ke password_confirmation sebelum submit
function syncPw() {
    const pw = document.getElementById('pw-reg').value;
    document.getElementById('pw-confirm').value = pw;
}
</script>
 
</body>
</html>