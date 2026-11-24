@extends('admin.layouts.app')
@section('title', 'Tambah Navigasi')
@section('page-title', 'Tambah Item Navigasi')
@section('page-subtitle', 'Buat item menu baru untuk navigasi website')

@section('content')
<div style="max-width:640px">
  <div class="ph">
    <div class="ph-left"><h1 class="ph-title">Tambah Item Navigasi</h1></div>
    <div class="ph-acts">
      <a href="{{ route('navigation.index') }}" class="btn btn-s">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 12H5M12 5l-7 7 7 7"/></svg>
        Kembali
      </a>
    </div>
  </div>
  <form method="POST" action="{{ route('navigation.store') }}">
    @csrf
    <div class="card">
      <div class="card-hd"><span class="card-hd-t">Detail Item Menu</span></div>
      <div class="card-bd">
        <div class="fg-2" style="gap:1.25rem">
          <div class="fg">
            <label class="lbl" for="label">Label Menu <span class="req">*</span></label>
            <input type="text" id="label" name="label" class="fi @error('label') is-invalid @enderror"
              placeholder="cth. Produk" value="{{ old('label') }}" required>
            @error('label')<p class="f-err">{{ $message }}</p>@enderror
          </div>
          <div class="fg">
            <label class="lbl" for="sort_order">Urutan Tampil</label>
            <input type="number" id="sort_order" name="sort_order" class="fi"
              value="{{ old('sort_order', 0) }}" min="0">
          </div>
          <div class="fg" style="grid-column:1/-1">
            <label class="lbl" for="url">URL / Link <span class="req">*</span></label>
            <input type="text" id="url" name="url" class="fi @error('url') is-invalid @enderror"
              placeholder="cth. #produk atau https://example.com" value="{{ old('url') }}" required>
            @error('url')<p class="f-err">{{ $message }}</p>@enderror
            <p class="f-hint">Gunakan anchor (#section) untuk internal, URL lengkap untuk eksternal</p>
          </div>
          <div class="fg">
            <label class="lbl" for="target">Target</label>
            <select id="target" name="target" class="fs">
              <option value="_self"  {{ old('target','_self')==='_self'  ? 'selected' : '' }}>_self (halaman yang sama)</option>
              <option value="_blank" {{ old('target')==='_blank' ? 'selected' : '' }}>_blank (tab baru)</option>
            </select>
          </div>
          <div class="fg" style="display:flex;flex-direction:column;justify-content:flex-end">
            <label class="f-chk" style="margin-top:.75rem">
              <input type="hidden" name="is_external" value="0">
              <input type="checkbox" name="is_external" value="1" {{ old('is_external') ? 'checked' : '' }}>
              <span class="f-chk-lbl">Link Eksternal</span>
            </label>
            <label class="f-chk">
              <input type="hidden" name="is_active" value="0">
              <input type="checkbox" name="is_active" value="1" {{ old('is_active', 1) ? 'checked' : '' }}>
              <span class="f-chk-lbl">Aktifkan item ini</span>
            </label>
          </div>
        </div>
      </div>
      <div class="card-ft" style="display:flex;gap:.75rem">
        <button type="submit" class="btn btn-p">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 21H5a2 2 0 01-2-2V5a2 2 0 012-2h11l5 5v11a2 2 0 01-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/><polyline points="7 3 7 8 15 8"/></svg>
          Simpan Item
        </button>
        <a href="{{ route('navigation.index') }}" class="btn btn-s">Batal</a>
      </div>
    </div>
  </form>
</div>
@endsection
