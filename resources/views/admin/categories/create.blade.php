@extends('admin.layouts.app')
@section('title','Tambah Kategori')
@section('page-title','Tambah Kategori')
@section('page-subtitle','Buat kategori produk baru')

@section('content')
<div style="max-width:720px">
  <div class="ph">
    <div><h1 class="ph-title">Tambah Kategori</h1></div>
    <div class="ph-acts">
      <a href="{{ route('categories.index') }}" class="btn btn-s">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 12H5M12 5l-7 7 7 7"/></svg>
        Kembali
      </a>
    </div>
  </div>
  <form method="POST" action="{{ route('categories.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="card">
      <div class="card-hd"><span class="card-hd-t"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 19a2 2 0 01-2 2H4a2 2 0 01-2-2V5a2 2 0 012-2h5l2 3h9a2 2 0 012 2z"/></svg> Informasi Kategori</span></div>
      <div class="card-bd">
        <div class="fg-2" style="gap:1.25rem">
          <div>
            <label class="lbl" for="name">Nama Kategori <span class="req">*</span></label>
            <input type="text" id="name" name="name" class="fi @error('name') err @enderror"
              placeholder="cth. Furniture Ruang Tamu" value="{{ old('name') }}" required>
            @error('name')<p class="f-err">{{ $message }}</p>@enderror
          </div>
          <div>
            <label class="lbl" for="slug">Slug URL <span class="req">*</span></label>
            <input type="text" id="slug" name="slug" class="fi @error('slug') err @enderror"
              placeholder="furniture-ruang-tamu" value="{{ old('slug') }}" required>
            @error('slug')<p class="f-err">{{ $message }}</p>@enderror
            <p class="f-hint">Otomatis dari nama. Hanya huruf kecil, angka, tanda minus.</p>
          </div>
          <div class="fg-full">
            <label class="lbl" for="description">Deskripsi</label>
            <textarea id="description" name="description" class="ft" placeholder="Deskripsi singkat kategori...">{{ old('description') }}</textarea>
          </div>
          <div>
            <label class="lbl" for="icon">Icon</label>
            <input type="text" id="icon" name="icon" class="fi" placeholder="cth. sofa" value="{{ old('icon') }}">
            <p class="f-hint">Nama icon Lucide (opsional)</p>
          </div>
          <div>
            <label class="lbl" for="sort_order">Urutan Tampil</label>
            <input type="number" id="sort_order" name="sort_order" class="fi" value="{{ old('sort_order',0) }}" min="0">
          </div>
          <div class="fg-full">
            <label class="lbl">Gambar Kategori</label>
            <label class="fz">
              <input type="file" name="image_path" accept="image/*" data-preview="imgPrev">
              <div class="fz-ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg></div>
              <p class="fz-t">Seret gambar ke sini atau <strong>klik untuk memilih</strong></p>
              <p class="fz-t" style="font-size:.7rem;margin-top:.2rem">PNG, JPG, WEBP — maks. 2 MB</p>
            </label>
            <div class="fz-preview" id="imgPrev"></div>
            @error('image_path')<p class="f-err">{{ $message }}</p>@enderror
          </div>
          <div class="fg-full">
            <label class="f-chk">
              <input type="hidden" name="is_active" value="0">
              <input type="checkbox" name="is_active" value="1" {{ old('is_active',1) ? 'checked' : '' }}>
              <span class="f-chk-lbl">Aktifkan kategori ini (tampil di website)</span>
            </label>
          </div>
        </div>
      </div>
      <div class="card-ft" style="display:flex;gap:.75rem">
        <button type="submit" class="btn btn-p">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 21H5a2 2 0 01-2-2V5a2 2 0 012-2h11l5 5v11a2 2 0 01-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/><polyline points="7 3 7 8 15 8"/></svg>
          Simpan Kategori
        </button>
        <a href="{{ route('categories.index') }}" class="btn btn-s">Batal</a>
      </div>
    </div>
  </form>
</div>
@push('scripts')
<script>
document.getElementById('name')?.addEventListener('input',function(){
  const s=document.getElementById('slug');
  if(!s.dataset.m) s.value=this.value.toLowerCase().replace(/[^a-z0-9\s-]/g,'').trim().replace(/\s+/g,'-').replace(/-+/g,'-');
});
document.getElementById('slug')?.addEventListener('input',function(){this.dataset.m='1'});
</script>
@endpush
@endsection
