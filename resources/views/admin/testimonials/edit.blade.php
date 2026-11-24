@extends('admin.layouts.app')
@section('title', 'Edit Testimoni')
@section('page-title', 'Edit Testimoni')
@section('page-subtitle', $testimonial->name)

@section('content')
<div style="max-width:680px">
  <div class="ph">
    <div class="ph-left"><h1 class="ph-title">Edit Testimoni</h1></div>
    <div class="ph-acts">
      <a href="{{ route('testimonials.index') }}" class="btn btn-s">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 12H5M12 5l-7 7 7 7"/></svg>
        Kembali
      </a>
    </div>
  </div>

  <form method="POST" action="{{ route('testimonials.update', $testimonial) }}" enctype="multipart/form-data">
    @csrf @method('PUT')
    <div class="card">
      <div class="card-hd"><span class="card-hd-t">Edit: {{ $testimonial->name }}</span></div>
      <div class="card-bd">
        <div class="fg-2" style="gap:1.25rem">
          <div class="fg">
            <label class="lbl">Nama Pelanggan <span class="req">*</span></label>
            <input type="text" name="name" class="fi @error('name') is-invalid @enderror"
              value="{{ old('name', $testimonial->name) }}" required>
            @error('name')<p class="f-err">{{ $message }}</p>@enderror
          </div>
          <div class="fg">
            <label class="lbl">Jenis Proyek</label>
            <input type="text" name="project_type" class="fi"
              value="{{ old('project_type', $testimonial->project_type) }}">
          </div>
          <div class="fg" style="grid-column:1/-1">
            <label class="lbl">Ulasan <span class="req">*</span></label>
            <textarea name="message" class="ft @error('message') is-invalid @enderror"
              style="min-height:120px" required>{{ old('message', $testimonial->message) }}</textarea>
            @error('message')<p class="f-err">{{ $message }}</p>@enderror
          </div>
          <div class="fg">
            <label class="lbl">Rating</label>
            <select name="rating" class="fs">
              @for($r=5;$r>=1;$r--)
                <option value="{{ $r }}" {{ old('rating',$testimonial->rating)==$r?'selected':'' }}>{{ $r }} Bintang</option>
              @endfor
            </select>
          </div>
          <div class="fg">
            <label class="lbl">Urutan Tampil</label>
            <input type="number" name="sort_order" class="fi"
              value="{{ old('sort_order', $testimonial->sort_order) }}" min="0">
          </div>
          <div class="fg" style="grid-column:1/-1">
            <label class="lbl">Foto Pelanggan</label>
            @if($testimonial->photo_path)
              <div class="img-cur">
                <div class="img-cur-th">
                  <img src="{{ asset('storage/'.$testimonial->photo_path) }}" alt="{{ $testimonial->name }}">
                </div>
                <div class="img-cur-info">
                  <p class="img-cur-n">Foto saat ini</p>
                  <p class="img-cur-h">Upload baru untuk mengganti</p>
                </div>
              </div>
            @endif
            <label class="fz">
              <input type="file" name="photo_path" accept="image/*" data-preview="photoPreview">
              <div class="fz-ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/><circle cx="12" cy="7" r="4"/></svg></div>
              <p class="fz-t"><strong>Klik untuk upload foto baru</strong> (opsional)</p>
            </label>
            <div class="fz-preview" id="photoPreview"></div>
            @error('photo_path')<p class="f-err">{{ $message }}</p>@enderror
          </div>
          <div class="fg" style="grid-column:1/-1">
            <label class="f-chk">
              <input type="hidden" name="is_published" value="0">
              <input type="checkbox" name="is_published" value="1" {{ old('is_published',$testimonial->is_published) ? 'checked' : '' }}>
              <span class="f-chk-lbl">Tampilkan di website</span>
            </label>
          </div>
        </div>
      </div>
      <div class="card-ft" style="display:flex;gap:.75rem">
        <button type="submit" class="btn btn-p">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 21H5a2 2 0 01-2-2V5a2 2 0 012-2h11l5 5v11a2 2 0 01-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/><polyline points="7 3 7 8 15 8"/></svg>
          Simpan Perubahan
        </button>
        <a href="{{ route('testimonials.index') }}" class="btn btn-s">Batal</a>
        <div style="margin-left:auto">
          <button type="button" class="btn btn-d btn-sm"
            onclick="openDlg('{{ route('testimonials.destroy', $testimonial) }}', 'Hapus testimoni dari &quot;{{ addslashes($testimonial->name) }}&quot;?')">
            Hapus
          </button>
        </div>
      </div>
    </div>
  </form>
</div>
@endsection
