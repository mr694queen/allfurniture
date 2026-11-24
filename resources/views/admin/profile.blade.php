@extends('admin.layouts.app')
@section('title', 'Profil Admin')
@section('page-title', 'Profil Akun')
@section('page-subtitle', 'Kelola informasi akun administrator')

@section('content')
<div style="max-width:760px">

  <div style="display:grid;grid-template-columns:1fr 1fr;gap:1.375rem">

    {{-- Profile card --}}
    <div class="card" style="grid-column:1/-1">
      <div class="card-bd" style="display:flex;align-items:center;gap:1.5rem;flex-wrap:wrap">
        {{-- Avatar --}}
        <div style="width:72px;height:72px;border-radius:50%;background:var(--wood);color:var(--white);display:flex;align-items:center;justify-content:center;font-family:'Playfair Display',serif;font-size:2rem;font-weight:700;flex-shrink:0">
          {{ strtoupper(substr($user->name, 0, 1)) }}
        </div>
        <div>
          <h2 style="font-family:'Playfair Display',serif;font-size:1.3rem;font-weight:700;color:var(--charcoal);margin-bottom:.2rem">{{ $user->name }}</h2>
          <p style="font-size:.85rem;color:var(--md)">{{ $user->email }}</p>
          <p style="font-size:.78rem;color:var(--md);margin-top:.25rem">
            Bergabung: {{ $user->created_at->format('d M Y') }}
          </p>
        </div>
        <div style="margin-left:auto">
          <span class="bdg bdg-ok">Administrator</span>
        </div>
      </div>
    </div>

    {{-- Update profile --}}
    <div class="card">
      <div class="card-hd">
        <span class="card-hd-t">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
          Informasi Profil
        </span>
      </div>
      <form method="POST" action="{{ route('admin.profile.update') }}">
        @csrf @method('PUT')
        <div class="card-bd">
          <div class="fg-1" style="gap:1.125rem">
            <div class="fg">
              <label class="lbl" for="name">Nama Lengkap <span class="req">*</span></label>
              <input type="text" id="name" name="name"
                class="fi @error('name') is-invalid @enderror"
                value="{{ old('name', $user->name) }}" required autocomplete="name">
              @error('name')<p class="f-err">{{ $message }}</p>@enderror
            </div>
            <div class="fg">
              <label class="lbl" for="email">Alamat Email <span class="req">*</span></label>
              <input type="email" id="email" name="email"
                class="fi @error('email') is-invalid @enderror"
                value="{{ old('email', $user->email) }}" required autocomplete="email">
              @error('email')<p class="f-err">{{ $message }}</p>@enderror
            </div>
          </div>
        </div>
        <div class="card-ft" style="display:flex;gap:.75rem">
          <button type="submit" class="btn btn-p">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 21H5a2 2 0 01-2-2V5a2 2 0 012-2h11l5 5v11a2 2 0 01-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/><polyline points="7 3 7 8 15 8"/></svg>
            Simpan Profil
          </button>
        </div>
      </form>
    </div>

    {{-- Change password --}}
    <div class="card">
      <div class="card-hd">
        <span class="card-hd-t">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0110 0v4"/></svg>
          Ubah Password
        </span>
      </div>
      <form method="POST" action="{{ route('admin.profile.password') }}">
        @csrf
        <div class="card-bd">
          <div class="fg-1" style="gap:1.125rem">
            <div class="fg">
              <label class="lbl" for="current_password">Password Saat Ini <span class="req">*</span></label>
              <div style="position:relative">
                <input type="password" id="current_password" name="current_password"
                  class="fi @error('current_password') is-invalid @enderror"
                  autocomplete="current-password" style="padding-right:2.5rem" required>
                <button type="button" class="pw-eye-btn" data-target="current_password"
                  style="position:absolute;right:.75rem;top:50%;transform:translateY(-50%);background:none;border:none;color:var(--md);cursor:pointer;padding:.2rem">
                  <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                </button>
              </div>
              @error('current_password')<p class="f-err">{{ $message }}</p>@enderror
            </div>
            <div class="fg">
              <label class="lbl" for="password">Password Baru <span class="req">*</span></label>
              <div style="position:relative">
                <input type="password" id="password" name="password"
                  class="fi @error('password') is-invalid @enderror"
                  autocomplete="new-password" style="padding-right:2.5rem" required minlength="8">
                <button type="button" class="pw-eye-btn" data-target="password"
                  style="position:absolute;right:.75rem;top:50%;transform:translateY(-50%);background:none;border:none;color:var(--md);cursor:pointer;padding:.2rem">
                  <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                </button>
              </div>
              @error('password')<p class="f-err">{{ $message }}</p>@enderror
              <p class="f-hint">Minimal 8 karakter</p>
            </div>
            <div class="fg">
              <label class="lbl" for="password_confirmation">Konfirmasi Password Baru <span class="req">*</span></label>
              <input type="password" id="password_confirmation" name="password_confirmation"
                class="fi" autocomplete="new-password" required minlength="8">
            </div>
          </div>
        </div>
        <div class="card-ft" style="display:flex;gap:.75rem">
          <button type="submit" class="btn btn-p">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0110 0v4"/></svg>
            Ubah Password
          </button>
        </div>
      </form>
    </div>

    {{-- Danger zone --}}
    <div class="card" style="grid-column:1/-1;border-color:#fecaca">
      <div class="card-hd" style="background:#fef2f2;border-bottom-color:#fecaca">
        <span class="card-hd-t" style="color:#991b1b">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
          Zona Bahaya
        </span>
      </div>
      <div class="card-bd" style="display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:1rem">
        <div>
          <p style="font-size:.875rem;font-weight:600;color:var(--charcoal);margin-bottom:.2rem">Keluar dari Admin Panel</p>
          <p style="font-size:.8rem;color:var(--md)">Sesi Anda akan diakhiri dan diarahkan ke halaman login.</p>
        </div>
        <form method="POST" action="{{ route('admin.logout') }}">
          @csrf
          <button type="submit" class="btn btn-d">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 21H5a2 2 0 01-2-2V5a2 2 0 012-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
            Keluar (Logout)
          </button>
        </form>
      </div>
    </div>

  </div>
</div>

@push('scripts')
<script>
// Password show/hide
document.querySelectorAll('.pw-eye-btn').forEach(btn => {
  btn.addEventListener('click', function(){
    const input = document.getElementById(this.dataset.target);
    if(!input) return;
    const isHidden = input.type === 'password';
    input.type = isHidden ? 'text' : 'password';
    const svg = this.querySelector('svg');
    if(svg) svg.style.color = isHidden ? 'var(--wood)' : 'var(--md)';
  });
});
</script>
@endpush
@endsection
