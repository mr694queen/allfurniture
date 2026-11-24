@extends('admin.layouts.app')
@section('title', 'Tambah Langkah Pemesanan')
@section('page-title', 'Tambah Langkah Pemesanan')
@section('page-subtitle', 'Tambahkan langkah baru pada proses pemesanan')

@section('content')
<div style="max-width:640px">
  <div class="ph">
    <div class="ph-left"><h1 class="ph-title">Tambah Langkah</h1></div>
    <div class="ph-acts">
      <a href="{{ route('ordering-steps.index') }}" class="btn btn-s">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 12H5M12 5l-7 7 7 7"/></svg>
        Kembali
      </a>
    </div>
  </div>
  <form method="POST" action="{{ route('ordering-steps.store') }}">
    @csrf
    <div class="card">
      <div class="card-hd"><span class="card-hd-t">Detail Langkah</span></div>
      <div class="card-bd">
        <div class="fg-2" style="gap:1.25rem">
          <div class="fg" style="grid-column:1/-1">
            <label class="lbl" for="title">Judul Langkah <span class="req">*</span></label>
            <input type="text" id="title" name="title" class="fi @error('title') is-invalid @enderror"
              placeholder="cth. Konsultasi & Pilih Furniture" value="{{ old('title') }}" required>
            @error('title')<p class="f-err">{{ $message }}</p>@enderror
          </div>
          <div class="fg" style="grid-column:1/-1">
            <label class="lbl" for="description">Deskripsi Langkah</label>
            <textarea id="description" name="description" class="ft"
              style="min-height:100px" placeholder="Jelaskan langkah ini secara singkat...">{{ old('description') }}</textarea>
          </div>
          <div class="fg">
            <label class="lbl" for="step_number">Nomor Langkah <span class="req">*</span></label>
            <input type="number" id="step_number" name="step_number" class="fi @error('step_number') is-invalid @enderror"
              placeholder="1" value="{{ old('step_number', 1) }}" min="1" required>
            @error('step_number')<p class="f-err">{{ $message }}</p>@enderror
          </div>
          <div class="fg">
            <label class="lbl" for="sort_order">Urutan Tampil</label>
            <input type="number" id="sort_order" name="sort_order" class="fi"
              value="{{ old('sort_order', 0) }}" min="0">
          </div>
          <div class="fg" style="grid-column:1/-1">
            <label class="lbl" for="icon">Nama Icon</label>
            <input type="text" id="icon" name="icon" class="fi"
              placeholder="cth. message-circle, phone, package" value="{{ old('icon') }}">
            <p class="f-hint">Nama icon dari Lucide Icons (lucide.dev)</p>
          </div>
          <div class="fg" style="grid-column:1/-1">
            <label class="f-chk">
              <input type="hidden" name="is_active" value="0">
              <input type="checkbox" name="is_active" value="1" {{ old('is_active', 1) ? 'checked' : '' }}>
              <span class="f-chk-lbl">Aktifkan langkah ini</span>
            </label>
          </div>
        </div>
      </div>
      <div class="card-ft" style="display:flex;gap:.75rem">
        <button type="submit" class="btn btn-p">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 21H5a2 2 0 01-2-2V5a2 2 0 012-2h11l5 5v11a2 2 0 01-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/><polyline points="7 3 7 8 15 8"/></svg>
          Simpan Langkah
        </button>
        <a href="{{ route('ordering-steps.index') }}" class="btn btn-s">Batal</a>
      </div>
    </div>
  </form>
</div>
@endsection
