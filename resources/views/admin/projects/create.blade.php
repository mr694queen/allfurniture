@extends('admin.layouts.app')
@section('title', 'Tambah Proyek')
@section('page-title', 'Tambah Proyek')
@section('page-subtitle', 'Dokumentasikan proyek furniture baru')

@section('content')
<div style="max-width:800px">
  <div class="ph">
    <div class="ph-left"><h1 class="ph-title">Tambah Proyek</h1></div>
    <div class="ph-acts">
      <a href="{{ route('projects.index') }}" class="btn btn-s">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 12H5M12 5l-7 7 7 7"/></svg>
        Kembali
      </a>
    </div>
  </div>

  <form method="POST" action="{{ route('projects.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="card">
      <div class="card-hd"><span class="card-hd-t">Detail Proyek</span></div>
      <div class="card-bd">
        <div class="fg-2" style="gap:1.25rem">
          <div class="fg" style="grid-column:1/-1">
            <label class="lbl" for="name">Nama Proyek <span class="req">*</span></label>
            <input type="text" id="name" name="name" class="fi @error('name') is-invalid @enderror"
              placeholder="cth. Renovasi Ruang Tamu — Kediaman Pak Budi" value="{{ old('name') }}" required>
            @error('name')<p class="f-err">{{ $message }}</p>@enderror
          </div>
          <div class="fg">
            <label class="lbl" for="category">Kategori Proyek</label>
            <input type="text" id="category" name="category" class="fi @error('category') is-invalid @enderror"
              placeholder="cth. Rumah Tinggal, Kantor, Sekolah" value="{{ old('category') }}">
            @error('category')<p class="f-err">{{ $message }}</p>@enderror
          </div>
          <div class="fg">
            <label class="lbl" for="location">Lokasi</label>
            <input type="text" id="location" name="location" class="fi"
              placeholder="cth. Jakarta Selatan" value="{{ old('location') }}">
          </div>
          <div class="fg">
            <label class="lbl" for="year">Tahun</label>
            <input type="number" id="year" name="year" class="fi"
              placeholder="{{ date('Y') }}" value="{{ old('year') }}" min="2000" max="2100">
          </div>
          <div class="fg">
            <label class="lbl" for="sort_order">Urutan Tampil</label>
            <input type="number" id="sort_order" name="sort_order" class="fi"
              value="{{ old('sort_order', 0) }}" min="0">
          </div>
          <div class="fg" style="grid-column:1/-1">
            <label class="lbl" for="description">Deskripsi Proyek</label>
            <textarea id="description" name="description" class="ft" style="min-height:100px"
              placeholder="Ceritakan detail pengerjaan proyek ini...">{{ old('description') }}</textarea>
          </div>
          <div class="fg" style="grid-column:1/-1">
            <label class="lbl">Foto Proyek</label>
            <label class="fz">
              <input type="file" name="images[]" accept="image/*" multiple data-preview="projPreview">
              <div class="fz-ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg></div>
              <p class="fz-t">Seret foto proyek ke sini atau <strong>klik untuk memilih</strong></p>
              <p class="fz-t" style="font-size:.72rem;margin-top:.25rem">Bisa pilih banyak foto. Maks. 4 MB/foto.</p>
            </label>
            <div class="fz-preview" id="projPreview"></div>
            @error('images.*')<p class="f-err">{{ $message }}</p>@enderror
          </div>
          <div class="fg" style="grid-column:1/-1">
            <label class="f-chk">
              <input type="hidden" name="is_published" value="0">
              <input type="checkbox" name="is_published" value="1" {{ old('is_published', 1) ? 'checked' : '' }}>
              <span class="f-chk-lbl">Publikasikan proyek ini (tampil di website)</span>
            </label>
          </div>
        </div>
      </div>
      <div class="card-ft" style="display:flex;gap:.75rem">
        <button type="submit" class="btn btn-p">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 21H5a2 2 0 01-2-2V5a2 2 0 012-2h11l5 5v11a2 2 0 01-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/><polyline points="7 3 7 8 15 8"/></svg>
          Simpan Proyek
        </button>
        <a href="{{ route('projects.index') }}" class="btn btn-s">Batal</a>
      </div>
    </div>
  </form>
</div>
@endsection
