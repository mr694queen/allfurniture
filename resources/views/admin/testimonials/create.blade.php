@extends('admin.layouts.app')
@section('title', 'Tambah Testimoni')
@section('page-title', 'Tambah Testimoni')
@section('page-subtitle', 'Masukkan ulasan pelanggan baru')

@section('content')
<div style="max-width:680px">
  <div class="ph">
    <div class="ph-left"><h1 class="ph-title">Tambah Testimoni</h1></div>
    <div class="ph-acts">
      <a href="{{ route('testimonials.index') }}" class="btn btn-s">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 12H5M12 5l-7 7 7 7"/></svg>
        Kembali
      </a>
    </div>
  </div>

  <form method="POST" action="{{ route('testimonials.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="card">
      <div class="card-hd"><span class="card-hd-t">Data Testimoni</span></div>
      <div class="card-bd">
        <div class="fg-2" style="gap:1.25rem">
          <div class="fg">
            <label class="lbl" for="name">Nama Pelanggan <span class="req">*</span></label>
            <input type="text" id="name" name="name" class="fi @error('name') is-invalid @enderror"
              placeholder="cth. Budi Santoso" value="{{ old('name') }}" required>
            @error('name')<p class="f-err">{{ $message }}</p>@enderror
          </div>
          <div class="fg">
            <label class="lbl" for="project_type">Jenis Proyek</label>
            <input type="text" id="project_type" name="project_type" class="fi"
              placeholder="cth. Renovasi Ruang Tamu" value="{{ old('project_type') }}">
          </div>
          <div class="fg" style="grid-column:1/-1">
            <label class="lbl" for="message">Ulasan / Pesan <span class="req">*</span></label>
            <textarea id="message" name="message" class="ft @error('message') is-invalid @enderror"
              style="min-height:120px" placeholder="Tuliskan ulasan pelanggan..." required>{{ old('message') }}</textarea>
            @error('message')<p class="f-err">{{ $message }}</p>@enderror
          </div>
          <div class="fg">
            <label class="lbl" for="rating">Rating</label>
            <select id="rating" name="rating" class="fs">
              @for($r=5;$r>=1;$r--)
                <option value="{{ $r }}" {{ old('rating',5)==$r?'selected':'' }}>{{ $r }} Bintang</option>
              @endfor
            </select>
          </div>
          <div class="fg">
            <label class="lbl" for="sort_order">Urutan Tampil</label>
            <input type="number" id="sort_order" name="sort_order" class="fi"
              value="{{ old('sort_order', 0) }}" min="0">
          </div>
          <div class="fg" style="grid-column:1/-1">
            <label class="lbl">Foto Pelanggan</label>
            <label class="fz">
              <input type="file" name="photo_path" accept="image/*" data-preview="photoPreview">
              <div class="fz-ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/><circle cx="12" cy="7" r="4"/></svg></div>
              <p class="fz-t">Upload foto pelanggan (opsional) atau <strong>klik untuk memilih</strong></p>
              <p class="fz-t" style="font-size:.72rem;margin-top:.25rem">PNG, JPG — maks. 2 MB</p>
            </label>
            <div class="fz-preview" id="photoPreview"></div>
            @error('photo_path')<p class="f-err">{{ $message }}</p>@enderror
          </div>
          <div class="fg" style="grid-column:1/-1">
            <label class="f-chk">
              <input type="hidden" name="is_published" value="0">
              <input type="checkbox" name="is_published" value="1" {{ old('is_published',1) ? 'checked' : '' }}>
              <span class="f-chk-lbl">Tampilkan testimoni ini di website</span>
            </label>
          </div>
        </div>
      </div>
      <div class="card-ft" style="display:flex;gap:.75rem">
        <button type="submit" class="btn btn-p">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 21H5a2 2 0 01-2-2V5a2 2 0 012-2h11l5 5v11a2 2 0 01-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/><polyline points="7 3 7 8 15 8"/></svg>
          Simpan Testimoni
        </button>
        <a href="{{ route('testimonials.index') }}" class="btn btn-s">Batal</a>
      </div>
    </div>
  </form>
</div>
@endsection
