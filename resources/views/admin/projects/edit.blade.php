@extends('admin.layouts.app')
@section('title', 'Edit Proyek')
@section('page-title', 'Edit Proyek')
@section('page-subtitle', $project->name)

@section('content')
<div style="max-width:800px">
  <div class="ph">
    <div class="ph-left"><h1 class="ph-title">Edit Proyek</h1></div>
    <div class="ph-acts">
      <a href="{{ route('projects.index') }}" class="btn btn-s">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 12H5M12 5l-7 7 7 7"/></svg>
        Kembali
      </a>
    </div>
  </div>

  <form method="POST" action="{{ route('projects.update', $project) }}" enctype="multipart/form-data">
    @csrf @method('PUT')
    <div style="display:flex;flex-direction:column;gap:1.25rem">
      <div class="card">
        <div class="card-hd"><span class="card-hd-t">Detail Proyek</span></div>
        <div class="card-bd">
          <div class="fg-2" style="gap:1.25rem">
            <div class="fg" style="grid-column:1/-1">
              <label class="lbl" for="name">Nama Proyek <span class="req">*</span></label>
              <input type="text" id="name" name="name" class="fi @error('name') is-invalid @enderror"
                value="{{ old('name', $project->name) }}" required>
              @error('name')<p class="f-err">{{ $message }}</p>@enderror
            </div>
            <div class="fg">
              <label class="lbl">Kategori Proyek</label>
              <input type="text" name="category" class="fi"
                value="{{ old('category', $project->category) }}" placeholder="cth. Rumah Tinggal">
            </div>
            <div class="fg">
              <label class="lbl">Lokasi</label>
              <input type="text" name="location" class="fi"
                value="{{ old('location', $project->location) }}" placeholder="cth. Jakarta Selatan">
            </div>
            <div class="fg">
              <label class="lbl">Tahun</label>
              <input type="number" name="year" class="fi"
                value="{{ old('year', $project->year) }}" min="2000" max="2100">
            </div>
            <div class="fg">
              <label class="lbl">Urutan Tampil</label>
              <input type="number" name="sort_order" class="fi"
                value="{{ old('sort_order', $project->sort_order) }}" min="0">
            </div>
            <div class="fg" style="grid-column:1/-1">
              <label class="lbl">Deskripsi</label>
              <textarea name="description" class="ft" style="min-height:100px">{{ old('description', $project->description) }}</textarea>
            </div>
            <div class="fg" style="grid-column:1/-1">
              <label class="f-chk">
                <input type="hidden" name="is_published" value="0">
                <input type="checkbox" name="is_published" value="1" {{ old('is_published', $project->is_published) ? 'checked' : '' }}>
                <span class="f-chk-lbl">Publikasikan proyek ini</span>
              </label>
            </div>
          </div>
        </div>
      </div>

      {{-- Existing photos --}}
      @if($project->images->count())
      <div class="card">
        <div class="card-hd"><span class="card-hd-t">Foto Saat Ini ({{ $project->images->count() }})</span></div>
        <div class="card-bd">
          <p style="font-size:.78rem;color:var(--md);margin-bottom:1rem">Centang foto yang ingin dihapus.</p>
          <div style="display:flex;flex-wrap:wrap;gap:.75rem">
            @foreach($project->images as $img)
            <div style="position:relative">
              <div style="width:90px;height:68px;border-radius:var(--r-sm);overflow:hidden;border:2px solid var(--border)">
                <img src="{{ asset('storage/'.$img->image_path) }}" alt="" style="width:100%;height:100%;object-fit:cover">
              </div>
              <label style="position:absolute;top:4px;right:4px;cursor:pointer;display:block">
                <input type="checkbox" name="delete_image_ids[]" value="{{ $img->id }}"
                  style="width:16px;height:16px;accent-color:#dc2626">
              </label>
            </div>
            @endforeach
          </div>
        </div>
      </div>
      @endif

      <div class="card">
        <div class="card-hd"><span class="card-hd-t">Tambah Foto Baru</span></div>
        <div class="card-bd">
          <label class="fz">
            <input type="file" name="images[]" accept="image/*" multiple data-preview="projPreview">
            <div class="fz-ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg></div>
            <p class="fz-t"><strong>Klik atau seret</strong> untuk menambah foto</p>
          </label>
          <div class="fz-preview" id="projPreview"></div>
        </div>
      </div>

      <div style="display:flex;gap:.75rem;flex-wrap:wrap">
        <button type="submit" class="btn btn-p">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 21H5a2 2 0 01-2-2V5a2 2 0 012-2h11l5 5v11a2 2 0 01-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/><polyline points="7 3 7 8 15 8"/></svg>
          Simpan Perubahan
        </button>
        <a href="{{ route('projects.index') }}" class="btn btn-s">Batal</a>
        <div style="margin-left:auto">
          <button type="button" class="btn btn-d btn-sm"
            onclick="openDlg('{{ route('projects.destroy', $project) }}', 'Hapus proyek ini beserta semua fotonya?')">
            Hapus Proyek
          </button>
        </div>
      </div>
    </div>
  </form>
</div>

@push('scripts')
<script>
// Handle delete_image_ids array from project controller
// The ProjectController.update doesn't handle delete_image_ids yet, handled in view for reference
// Images delete via ProjectImage model in controller update method
</script>
@endpush
@endsection
