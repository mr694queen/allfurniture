@extends('admin.layouts.app')
@section('title','Edit Kategori')
@section('page-title','Edit Kategori')
@section('page-subtitle','Ubah data: ' . $category->name)

@section('content')
<div style="max-width:720px">
  <div class="ph">
    <div><h1 class="ph-title">Edit Kategori</h1></div>
    <div class="ph-acts">
      <a href="{{ route('categories.index') }}" class="btn btn-s">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 12H5M12 5l-7 7 7 7"/></svg>
        Kembali
      </a>
    </div>
  </div>
  <form method="POST" action="{{ route('categories.update', $category) }}" enctype="multipart/form-data">
    @csrf @method('PUT')
    <div class="card">
      <div class="card-hd"><span class="card-hd-t"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 19a2 2 0 01-2 2H4a2 2 0 01-2-2V5a2 2 0 012-2h5l2 3h9a2 2 0 012 2z"/></svg> Edit: {{ $category->name }}</span></div>
      <div class="card-bd">
        <div class="fg-2" style="gap:1.25rem">
          <div>
            <label class="lbl">Nama Kategori <span class="req">*</span></label>
            <input type="text" name="name" class="fi @error('name') err @enderror" value="{{ old('name',$category->name) }}" required>
            @error('name')<p class="f-err">{{ $message }}</p>@enderror
          </div>
          <div>
            <label class="lbl">Slug URL <span class="req">*</span></label>
            <input type="text" name="slug" class="fi @error('slug') err @enderror" value="{{ old('slug',$category->slug) }}" required>
            @error('slug')<p class="f-err">{{ $message }}</p>@enderror
          </div>
          <div class="fg-full">
            <label class="lbl">Deskripsi</label>
            <textarea name="description" class="ft">{{ old('description',$category->description) }}</textarea>
          </div>
          <div>
            <label class="lbl">Icon</label>
            <input type="text" name="icon" class="fi" value="{{ old('icon',$category->icon) }}" placeholder="cth. sofa">
          </div>
          <div>
            <label class="lbl">Urutan Tampil</label>
            <input type="number" name="sort_order" class="fi" value="{{ old('sort_order',$category->sort_order) }}" min="0">
          </div>
          <div class="fg-full">
            <label class="lbl">Gambar Kategori</label>
            @if($category->image_path)
            <div class="img-cur">
              <div class="img-cur-th"><img src="{{ asset('storage/'.$category->image_path) }}" alt="{{ $category->name }}"></div>
              <div><p class="img-cur-n">Gambar saat ini</p><p class="img-cur-h">Upload baru untuk mengganti</p></div>
            </div>
            @endif
            <label class="fz">
              <input type="file" name="image_path" accept="image/*" data-preview="imgPrev">
              <div class="fz-ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg></div>
              <p class="fz-t"><strong>Klik untuk upload gambar baru</strong> (opsional)</p>
            </label>
            <div class="fz-preview" id="imgPrev"></div>
            @error('image_path')<p class="f-err">{{ $message }}</p>@enderror
          </div>
          <div class="fg-full">
            <label class="f-chk">
              <input type="hidden" name="is_active" value="0">
              <input type="checkbox" name="is_active" value="1" {{ old('is_active',$category->is_active) ? 'checked' : '' }}>
              <span class="f-chk-lbl">Aktifkan kategori ini</span>
            </label>
          </div>
        </div>
      </div>
      <div class="card-ft" style="display:flex;gap:.75rem;align-items:center">
        <button type="submit" class="btn btn-p">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 21H5a2 2 0 01-2-2V5a2 2 0 012-2h11l5 5v11a2 2 0 01-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/><polyline points="7 3 7 8 15 8"/></svg>
          Simpan Perubahan
        </button>
        <a href="{{ route('categories.index') }}" class="btn btn-s">Batal</a>
        <div style="margin-left:auto">
          <button type="button" class="btn btn-d btn-sm"
            onclick="openDlg('{{ route('categories.destroy',$category) }}','Hapus kategori ini secara permanen?')">
            Hapus Kategori
          </button>
        </div>
      </div>
    </div>
  </form>
</div>
@endsection
