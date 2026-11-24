<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login Admin â€” ALL FURNITURE</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
<style>
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
html{font-size:16px;-webkit-text-size-adjust:100%}
body{
  font-family:'Inter',system-ui,sans-serif;
  min-height:100vh;display:flex;
  background:#292929;
  color:#171717;
  -webkit-font-smoothing:antialiased;
  position:relative;overflow:hidden;
}

/* â”€â”€ Background â”€â”€ */
.bg-left{
  position:fixed;top:0;left:0;bottom:0;width:50%;
  background:linear-gradient(145deg,#9A7A61 0%,#292929 100%);
}
.bg-left::after{
  content:'';position:absolute;inset:0;
  background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='280' height='280'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='280' height='280' filter='url(%23n)' opacity='.04'/%3E%3C/svg%3E");
  background-size:280px;opacity:.7;pointer-events:none;
}
.bg-right{
  position:fixed;top:0;right:0;bottom:0;width:50%;
  background:#FAFAF8;
}

/* Decorative grid on left */
.bg-grid{
  position:fixed;top:0;left:0;bottom:0;width:50%;pointer-events:none;
  background-image:
    linear-gradient(rgba(255,255,255,.04) 1px,transparent 1px),
    linear-gradient(90deg,rgba(255,255,255,.04) 1px,transparent 1px);
  background-size:48px 48px;
}

/* â”€â”€ Layout â”€â”€ */
.page{
  position:relative;z-index:1;
  display:flex;width:100%;min-height:100vh;
}

/* Left panel â€” brand */
.brand-panel{
  width:50%;display:flex;flex-direction:column;
  justify-content:space-between;padding:3.5rem;
}

.brand-logo{
  font-family:'Playfair Display',serif;
  font-size:1.5rem;font-weight:700;
  color:#FFFFFF;letter-spacing:.02em;
  text-decoration:none;display:inline-block;
}
.brand-logo em{font-style:normal;color:#C6A487}

.brand-center{flex:1;display:flex;flex-direction:column;justify-content:center;padding:2rem 0}

.brand-tag{
  display:inline-flex;align-items:center;gap:.625rem;
  margin-bottom:2rem;
}
.brand-tag-line{width:28px;height:1px;background:#B89578}
.brand-tag-text{
  font-size:.68rem;font-weight:700;letter-spacing:.18em;
  text-transform:uppercase;color:#C6A487;
}

.brand-headline{
  font-family:'Playfair Display',serif;
  font-size:clamp(2rem,3.5vw,3rem);
  font-weight:700;color:#FFFFFF;
  line-height:1.15;margin-bottom:1.5rem;
  letter-spacing:-.02em;
}
.brand-headline em{font-style:italic;color:#D8C1AA}

.brand-desc{
  font-size:.95rem;color:rgba(255,255,255,.5);
  line-height:1.8;max-width:380px;
}

/* Feature list */
.brand-features{margin-top:2.5rem;display:flex;flex-direction:column;gap:1rem}
.brand-feat{
  display:flex;align-items:center;gap:.875rem;
  font-size:.85rem;color:rgba(255,255,255,.55);
}
.brand-feat-dot{
  width:32px;height:32px;background:rgba(184,149,120,.2);
  border:1px solid rgba(184,149,120,.4);border-radius:50%;
  display:flex;align-items:center;justify-content:center;
  color:#C6A487;flex-shrink:0;
}
.brand-feat-dot svg{width:14px;height:14px}

.brand-foot{
  font-size:.75rem;color:rgba(255,255,255,.25);
}

/* â”€â”€ Form panel â”€â”€ */
.form-panel{
  width:50%;display:flex;align-items:center;justify-content:center;
  padding:3.5rem 3.5rem 3.5rem 4rem;
}

.form-card{width:100%;max-width:440px}

.form-card__header{margin-bottom:2.5rem}
.form-card__label{
  font-size:.68rem;font-weight:700;letter-spacing:.15em;
  text-transform:uppercase;color:#B89578;margin-bottom:.875rem;
  display:flex;align-items:center;gap:.5rem;
}
.form-card__label-line{width:20px;height:1px;background:#B89578}
.form-card__title{
  font-family:'Playfair Display',serif;
  font-size:2rem;font-weight:700;color:#292929;
  margin-bottom:.5rem;line-height:1.15;
}
.form-card__sub{font-size:.9rem;color:#9E9E9E;line-height:1.6}

/* Alerts */
.alert{
  border-radius:6px;padding:.875rem 1rem;font-size:.85rem;
  margin-bottom:1.5rem;display:flex;align-items:flex-start;gap:.5rem;
}
.alert svg{width:15px;height:15px;flex-shrink:0;margin-top:1px}
.alert-success{background:#f0fdf4;color:#166534;border:1px solid #bbf7d0}
.alert-error{background:#fef2f2;color:#991b1b;border:1px solid #fecaca}

/* Form fields */
.fg{margin-bottom:1.375rem}
.flabel{
  display:block;font-size:.8rem;font-weight:600;
  color:#424242;margin-bottom:.45rem;letter-spacing:.01em;
}
.finput{
  width:100%;padding:.825rem 1rem;
  font-family:'Inter',sans-serif;font-size:.9rem;
  color:#171717;background:#FFFFFF;
  border:1.5px solid rgba(0,0,0,.1);border-radius:5px;
  outline:none;transition:border-color .25s ease,box-shadow .25s ease;
  -webkit-appearance:none;
}
.finput::placeholder{color:#9E9E9E}
.finput:focus{
  border-color:#B89578;
  box-shadow:0 0 0 3px rgba(184,149,120,.12);
}
.finput.is-invalid{border-color:#dc2626;box-shadow:0 0 0 3px rgba(220,38,38,.08)}
.ferr{
  font-size:.78rem;color:#991b1b;margin-top:.35rem;
  display:flex;align-items:center;gap:.3rem;
}
.ferr::before{content:'â†‘';font-size:.7rem;opacity:.7}

/* Password toggle */
.pw-wrap{position:relative}
.pw-toggle{
  position:absolute;right:.875rem;top:50%;transform:translateY(-50%);
  background:none;border:none;color:#9E9E9E;cursor:pointer;
  display:flex;align-items:center;justify-content:center;
  padding:.25rem;transition:color .2s;
}
.pw-toggle:hover{color:#B89578}
.pw-toggle svg{width:17px;height:17px}

/* Remember + forgot */
.form-row{
  display:flex;align-items:center;justify-content:space-between;
  margin-bottom:1.75rem;flex-wrap:wrap;gap:.5rem;
}
.checkbox-wrap{display:flex;align-items:center;gap:.5rem;cursor:pointer}
.checkbox-wrap input[type=checkbox]{
  width:16px;height:16px;accent-color:#B89578;cursor:pointer;flex-shrink:0;
}
.checkbox-label{font-size:.82rem;color:#424242;user-select:none}
.forgot-link{
  font-size:.82rem;color:#B89578;font-weight:500;
  text-decoration:none;transition:color .2s;
}
.forgot-link:hover{color:#9A7A61;text-decoration:underline}

/* Submit button */
.btn-submit{
  width:100%;padding:.9rem 1.5rem;
  background:#B89578;color:#FFFFFF;
  font-family:'Inter',sans-serif;font-size:.9rem;font-weight:700;
  border:none;border-radius:5px;cursor:pointer;
  transition:all .28s cubic-bezier(.4,0,.2,1);
  letter-spacing:.03em;position:relative;overflow:hidden;
}
.btn-submit::after{
  content:'';position:absolute;inset:0;
  background:linear-gradient(90deg,transparent,rgba(255,255,255,.15),transparent);
  transform:translateX(-100%);transition:transform .5s ease;
}
.btn-submit:hover{background:#9A7A61;transform:translateY(-2px);box-shadow:0 6px 20px rgba(184,149,120,.3)}
.btn-submit:hover::after{transform:translateX(100%)}
.btn-submit:active{transform:translateY(0);box-shadow:none}

/* Back link */
.back-link{
  display:flex;align-items:center;gap:.4rem;
  font-size:.82rem;color:#9E9E9E;text-decoration:none;
  margin-top:2rem;transition:color .2s;
  width:fit-content;
}
.back-link:hover{color:#B89578}
.back-link svg{width:14px;height:14px;transition:transform .2s}
.back-link:hover svg{transform:translateX(-3px)}

/* Decorative accent line on card */
.form-card::before{
  content:'';display:block;height:3px;border-radius:2px;
  background:linear-gradient(90deg,#B89578,#C6A487,#F3EAE0);
  margin-bottom:2.5rem;
}

/* â”€â”€ Responsive â”€â”€ */
@media(max-width:768px){
  .bg-left,.bg-right,.bg-grid{display:none}
  body{background:#FAFAF8}
  .page{flex-direction:column}
  .brand-panel{
    width:100%;background:linear-gradient(135deg,#9A7A61,#292929);
    padding:2.5rem 1.75rem 2rem;
  }
  .brand-center{padding:1.5rem 0;flex:0}
  .brand-headline{font-size:1.75rem}
  .brand-features{display:none}
  .form-panel{width:100%;padding:2.5rem 1.75rem 3rem}
  .form-card{max-width:100%}
}

@media(max-width:480px){
  .brand-panel{padding:2rem 1.25rem 1.75rem}
  .form-panel{padding:2rem 1.25rem 2.5rem}
}
</style>
</head>
<body>
<div class="bg-left" aria-hidden="true"></div>
<div class="bg-right" aria-hidden="true"></div>
<div class="bg-grid" aria-hidden="true"></div>

<div class="page">
  {{-- â”€â”€ Brand panel â”€â”€ --}}
  <div class="brand-panel" role="complementary" aria-label="Brand ALL FURNITURE">
    <a href="{{ route('home') }}" class="brand-logo"><em>ALL</em> FURNITURE</a>

    <div class="brand-center">
      <div class="brand-tag">
        <span class="brand-tag-line" aria-hidden="true"></span>
        <span class="brand-tag-text">Admin Panel</span>
      </div>

      <h1 class="brand-headline">
        Kelola Website<br>
        <em>ALL FURNITURE</em>
      </h1>

      <p class="brand-desc">
        Masuk ke dashboard admin untuk mengelola produk, kategori, portfolio, testimoni, dan seluruh konten website.
      </p>

      <div class="brand-features" aria-hidden="true">
        <div class="brand-feat">
          <div class="brand-feat-dot">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
          </div>
          <span>Kelola produk, kategori &amp; portfolio</span>
        </div>
        <div class="brand-feat">
          <div class="brand-feat-dot">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
          </div>
          <span>Upload gambar &amp; kelola konten dinamis</span>
        </div>
        <div class="brand-feat">
          <div class="brand-feat-dot">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
          </div>
          <span>Monitor pesan dan konsultasi masuk</span>
        </div>
      </div>
    </div>

    <div class="brand-foot">&copy; {{ date('Y') }} ALL FURNITURE. All rights reserved.</div>
  </div>

  {{-- â”€â”€ Form panel â”€â”€ --}}
  <div class="form-panel">
    <div class="form-card">
      <div class="form-card__header">
        <div class="form-card__label">
          <span class="form-card__label-line" aria-hidden="true"></span>
          Akses Admin
        </div>
        <h2 class="form-card__title">Selamat Datang</h2>
        <p class="form-card__sub">Masuk untuk mengakses panel administrasi ALL FURNITURE</p>
      </div>

      {{-- Session status --}}
      @if(session('status'))
        <div class="alert alert-success" role="alert">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 11-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
          {{ session('status') }}
        </div>
      @endif

      {{-- Error: invalid credentials --}}
      @if($errors->has('email') && str_contains($errors->first('email'), 'These credentials'))
        <div class="alert alert-error" role="alert">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="15" y1="9" x2="9" y2="15"/><line x1="9" y1="9" x2="15" y2="15"/></svg>
          Email atau kata sandi tidak valid.
        </div>
      @endif

      <form method="POST" action="{{ route('login.post') }}" novalidate>
        @csrf

        {{-- Email --}}
        <div class="fg">
          <label class="flabel" for="email">Alamat Email</label>
          <input
            type="email"
            id="email"
            name="email"
            class="finput{{ $errors->has('email') ? ' is-invalid' : '' }}"
            placeholder="admin@allfurniture.com"
            value="{{ old('email') }}"
            required
            autocomplete="email"
            autofocus>
          @error('email')
            <p class="ferr">{{ $message }}</p>
          @enderror
        </div>

        {{-- Password --}}
        <div class="fg">
          <label class="flabel" for="password">Kata Sandi</label>
          <div class="pw-wrap">
            <input
              type="password"
              id="password"
              name="password"
              class="finput{{ $errors->has('password') ? ' is-invalid' : '' }}"
              placeholder="â€¢â€¢â€¢â€¢â€¢â€¢â€¢â€¢"
              required
              autocomplete="current-password"
              style="padding-right:2.75rem">
            <button type="button" class="pw-toggle" id="pwToggle" aria-label="Tampilkan/sembunyikan kata sandi" aria-pressed="false">
              <svg id="pwEye" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
              <svg id="pwEyeOff" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="display:none"><path d="M17.94 17.94A10.07 10.07 0 0112 20c-7 0-11-8-11-8a18.45 18.45 0 015.06-5.94M9.9 4.24A9.12 9.12 0 0112 4c7 0 11 8 11 8a18.5 18.5 0 01-2.16 3.19m-6.72-1.07a3 3 0 11-4.24-4.24"/><line x1="1" y1="1" x2="23" y2="23"/></svg>
            </button>
          </div>
          @error('password')
            <p class="ferr">{{ $message }}</p>
          @enderror
        </div>

        {{-- Remember + Forgot --}}
        <div class="form-row">
          <label class="checkbox-wrap">
            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            <span class="checkbox-label">Ingat saya</span>
          </label>
          {{-- Forgot password link â€” placeholder, sesuaikan jika fitur reset tersedia --}}
          {{-- <a href="{{ route('password.request') }}" class="forgot-link">Lupa kata sandi?</a> --}}
        </div>

        <button type="submit" class="btn-submit">Masuk ke Admin Panel</button>
      </form>

      <a href="{{ route('home') }}" class="back-link">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M19 12H5M12 5l-7 7 7 7"/></svg>
        Kembali ke Website
      </a>
    </div>
  </div>
</div>

<script>
// Password toggle
const pwToggle = document.getElementById('pwToggle');
const pwInput  = document.getElementById('password');
const pwEye    = document.getElementById('pwEye');
const pwEyeOff = document.getElementById('pwEyeOff');

if(pwToggle && pwInput){
  pwToggle.addEventListener('click', function(){
    const isHidden = pwInput.type === 'password';
    pwInput.type = isHidden ? 'text' : 'password';
    pwEye.style.display    = isHidden ? 'none'  : '';
    pwEyeOff.style.display = isHidden ? ''      : 'none';
    this.setAttribute('aria-pressed', String(isHidden));
  });
}

// Subtle entrance animation
document.addEventListener('DOMContentLoaded', function(){
  const card = document.querySelector('.form-card');
  const panel = document.querySelector('.brand-panel');
  if(card){
    card.style.opacity = '0';
    card.style.transform = 'translateY(20px)';
    card.style.transition = 'opacity .6s ease, transform .6s ease';
    requestAnimationFrame(()=>{
      requestAnimationFrame(()=>{
        card.style.opacity = '1';
        card.style.transform = 'translateY(0)';
      });
    });
  }
  if(panel){
    panel.style.opacity = '0';
    panel.style.transform = 'translateX(-16px)';
    panel.style.transition = 'opacity .7s ease .1s, transform .7s ease .1s';
    requestAnimationFrame(()=>{
      requestAnimationFrame(()=>{
        panel.style.opacity = '1';
        panel.style.transform = 'translateX(0)';
      });
    });
  }
});
</script>
</body>
</html>

