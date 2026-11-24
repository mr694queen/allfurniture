@extends('admin.layouts.app')
@section('title', 'Tambah Social Link')
@section('page-title', 'Tambah Social Link')
@section('page-subtitle', 'Tambahkan tautan media sosial baru')

@section('content')
<div style="max-width:600px">
  <div class="ph">
    <div class="ph-left"><h1 class="ph-title">Tambah Social Link</h1></div>
    <div class="ph-acts">
      <a href="{{ route('social-links.index') }}" class="btn btn-s">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 12H5M12 5l-7 7 7 7"/></svg>
        Kembali
      </a>
    </div>
  </div>
  <form method="POST" action="{{ route('social-links.store') }}">
    @csrf
    <div class="card">
      <div class="card-hd"><span class="card-hd-t">Detail Social Media</span></div>
      <div class="card-bd">
        <div class="fg-2" style="gap:1.25rem">
          <div class="fg">
            <label class="lbl" for="platform">Platform <span class="req">*</span></label>
            <select id="platform" name="platform" class="fs @error('platform') is-invalid @enderror">
              <option value="">— Pilih Platform —</option>
              @foreach(['Instagram','Facebook','TikTok','YouTube','Twitter / X','WhatsApp','Pinterest','LinkedIn'] as $p)
                <option value="{{ $p }}" {{ old('platform')===$p ? 'selected' : '' }}>{{ $p }}</option>
              @endforeach
            </select>
            @error('platform')<p class="f-err">{{ $message }}</p>@enderror
          </div>
          <div class="fg">
            <label class="lbl" for="sort_order">Urutan Tampil</label>
            <input type="number" id="sort_order" name="sort_order" class="fi"
              value="{{ old('sort_order', 0) }}" min="0">
          </div>
          <div class="fg" style="grid-column:1/-1">
            <label class="lbl" for="url">URL Profil <span class="req">*</span></label>
            <input type="url" id="url" name="url" class="fi @error('url') is-invalid @enderror"
              placeholder="https://instagram.com/allfurniture" value="{{ old('url') }}" required>
            @error('url')<p class="f-err">{{ $message }}</p>@enderror
          </div>
          <div class="fg" style="grid-column:1/-1">
            <label class="lbl" for="icon">Nama Icon</label>
            <input type="text" id="icon" name="icon" class="fi"
              placeholder="cth. instagram, facebook, tiktok" value="{{ old('icon') }}">
            <p class="f-hint">Nama icon dari Lucide Icons atau Font Awesome (opsional)</p>
          </div>
          <div class="fg" style="grid-column:1/-1">
            <label class="f-chk">
              <input type="hidden" name="is_active" value="0">
              <input type="checkbox" name="is_active" value="1" {{ old('is_active', 1) ? 'checked' : '' }}>
              <span class="f-chk-lbl">Tampilkan link ini di website</span>
            </label>
          </div>
        </div>
      </div>
      <div class="card-ft" style="display:flex;gap:.75rem">
        <button type="submit" class="btn btn-p">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 21H5a2 2 0 01-2-2V5a2 2 0 012-2h11l5 5v11a2 2 0 01-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/><polyline points="7 3 7 8 15 8"/></svg>
          Simpan
        </button>
        <a href="{{ route('social-links.index') }}" class="btn btn-s">Batal</a>
      </div>
    </div>
  </form>
</div>
@endsection
