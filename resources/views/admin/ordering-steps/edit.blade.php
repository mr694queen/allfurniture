@extends('admin.layouts.app')
@section('title', 'Edit Langkah Pemesanan')
@section('page-title', 'Edit Langkah Pemesanan')
@section('page-subtitle', $orderingStep->title)

@section('content')
<div style="max-width:640px">
  <div class="ph">
    <div class="ph-left"><h1 class="ph-title">Edit Langkah</h1></div>
    <div class="ph-acts">
      <a href="{{ route('ordering-steps.index') }}" class="btn btn-s">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 12H5M12 5l-7 7 7 7"/></svg>
        Kembali
      </a>
    </div>
  </div>
  <form method="POST" action="{{ route('ordering-steps.update', $orderingStep) }}">
    @csrf @method('PUT')
    <div class="card">
      <div class="card-hd"><span class="card-hd-t">Edit: {{ $orderingStep->title }}</span></div>
      <div class="card-bd">
        <div class="fg-2" style="gap:1.25rem">
          <div class="fg" style="grid-column:1/-1">
            <label class="lbl">Judul <span class="req">*</span></label>
            <input type="text" name="title" class="fi @error('title') is-invalid @enderror"
              value="{{ old('title', $orderingStep->title) }}" required>
            @error('title')<p class="f-err">{{ $message }}</p>@enderror
          </div>
          <div class="fg" style="grid-column:1/-1">
            <label class="lbl">Deskripsi</label>
            <textarea name="description" class="ft" style="min-height:100px">{{ old('description', $orderingStep->description) }}</textarea>
          </div>
          <div class="fg">
            <label class="lbl">Nomor Langkah</label>
            <input type="number" name="step_number" class="fi"
              value="{{ old('step_number', $orderingStep->step_number) }}" min="1">
          </div>
          <div class="fg">
            <label class="lbl">Urutan Tampil</label>
            <input type="number" name="sort_order" class="fi"
              value="{{ old('sort_order', $orderingStep->sort_order) }}" min="0">
          </div>
          <div class="fg" style="grid-column:1/-1">
            <label class="lbl">Nama Icon</label>
            <input type="text" name="icon" class="fi"
              value="{{ old('icon', $orderingStep->icon) }}" placeholder="cth. message-circle">
            <p class="f-hint">Nama icon dari Lucide Icons (lucide.dev)</p>
          </div>
          <div class="fg" style="grid-column:1/-1">
            <label class="f-chk">
              <input type="hidden" name="is_active" value="0">
              <input type="checkbox" name="is_active" value="1" {{ old('is_active', $orderingStep->is_active) ? 'checked' : '' }}>
              <span class="f-chk-lbl">Aktifkan langkah ini</span>
            </label>
          </div>
        </div>
      </div>
      <div class="card-ft" style="display:flex;gap:.75rem">
        <button type="submit" class="btn btn-p">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 21H5a2 2 0 01-2-2V5a2 2 0 012-2h11l5 5v11a2 2 0 01-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/><polyline points="7 3 7 8 15 8"/></svg>
          Simpan Perubahan
        </button>
        <a href="{{ route('ordering-steps.index') }}" class="btn btn-s">Batal</a>
        <div style="margin-left:auto">
          <button type="button" class="btn btn-d btn-sm"
            onclick="openDlg('{{ route('ordering-steps.destroy', $orderingStep) }}', 'Hapus langkah &quot;{{ addslashes($orderingStep->title) }}&quot;?')">
            Hapus
          </button>
        </div>
      </div>
    </div>
  </form>
</div>
@endsection
