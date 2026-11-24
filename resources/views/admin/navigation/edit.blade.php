@extends('admin.layouts.app')
@section('title', 'Edit Navigasi')
@section('page-title', 'Edit Item Navigasi')
@section('page-subtitle', $navigation->label)

@section('content')
<div style="max-width:640px">
  <div class="ph">
    <div class="ph-left"><h1 class="ph-title">Edit Item Navigasi</h1></div>
    <div class="ph-acts">
      <a href="{{ route('navigation.index') }}" class="btn btn-s">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 12H5M12 5l-7 7 7 7"/></svg>
        Kembali
      </a>
    </div>
  </div>
  <form method="POST" action="{{ route('navigation.update', $navigation) }}">
    @csrf @method('PUT')
    <div class="card">
      <div class="card-hd"><span class="card-hd-t">Edit: {{ $navigation->label }}</span></div>
      <div class="card-bd">
        <div class="fg-2" style="gap:1.25rem">
          <div class="fg">
            <label class="lbl">Label Menu <span class="req">*</span></label>
            <input type="text" name="label" class="fi @error('label') is-invalid @enderror"
              value="{{ old('label', $navigation->label) }}" required>
            @error('label')<p class="f-err">{{ $message }}</p>@enderror
          </div>
          <div class="fg">
            <label class="lbl">Urutan Tampil</label>
            <input type="number" name="sort_order" class="fi"
              value="{{ old('sort_order', $navigation->sort_order) }}" min="0">
          </div>
          <div class="fg" style="grid-column:1/-1">
            <label class="lbl">URL / Link <span class="req">*</span></label>
            <input type="text" name="url" class="fi @error('url') is-invalid @enderror"
              value="{{ old('url', $navigation->url) }}" required>
            @error('url')<p class="f-err">{{ $message }}</p>@enderror
          </div>
          <div class="fg">
            <label class="lbl">Target</label>
            <select name="target" class="fs">
              <option value="_self"  {{ old('target', $navigation->target ?? '_self')==='_self'  ? 'selected' : '' }}>_self (halaman sama)</option>
              <option value="_blank" {{ old('target', $navigation->target)==='_blank' ? 'selected' : '' }}>_blank (tab baru)</option>
            </select>
          </div>
          <div class="fg" style="display:flex;flex-direction:column;justify-content:flex-end">
            <label class="f-chk" style="margin-top:.75rem">
              <input type="hidden" name="is_external" value="0">
              <input type="checkbox" name="is_external" value="1" {{ old('is_external', $navigation->is_external) ? 'checked' : '' }}>
              <span class="f-chk-lbl">Link Eksternal</span>
            </label>
            <label class="f-chk">
              <input type="hidden" name="is_active" value="0">
              <input type="checkbox" name="is_active" value="1" {{ old('is_active', $navigation->is_active) ? 'checked' : '' }}>
              <span class="f-chk-lbl">Aktifkan item ini</span>
            </label>
          </div>
        </div>
      </div>
      <div class="card-ft" style="display:flex;gap:.75rem">
        <button type="submit" class="btn btn-p">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 21H5a2 2 0 01-2-2V5a2 2 0 012-2h11l5 5v11a2 2 0 01-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/><polyline points="7 3 7 8 15 8"/></svg>
          Simpan Perubahan
        </button>
        <a href="{{ route('navigation.index') }}" class="btn btn-s">Batal</a>
        <div style="margin-left:auto">
          <button type="button" class="btn btn-d btn-sm"
            onclick="openDlg('{{ route('navigation.destroy', $navigation) }}', 'Hapus item navigasi &quot;{{ addslashes($navigation->label) }}&quot;?')">
            Hapus
          </button>
        </div>
      </div>
    </div>
  </form>
</div>
@endsection
