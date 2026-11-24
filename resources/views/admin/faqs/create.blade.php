@extends('admin.layouts.app')
@section('title', 'Tambah FAQ')
@section('page-title', 'Tambah FAQ')
@section('page-subtitle', 'Tambahkan pertanyaan dan jawaban baru')

@section('content')
<div style="max-width:680px">
  <div class="ph">
    <div class="ph-left"><h1 class="ph-title">Tambah FAQ</h1></div>
    <div class="ph-acts">
      <a href="{{ route('faqs.index') }}" class="btn btn-s">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 12H5M12 5l-7 7 7 7"/></svg>
        Kembali
      </a>
    </div>
  </div>
  <form method="POST" action="{{ route('faqs.store') }}">
    @csrf
    <div class="card">
      <div class="card-hd"><span class="card-hd-t">Detail FAQ</span></div>
      <div class="card-bd">
        <div class="fg-1" style="gap:1.25rem">
          <div class="fg">
            <label class="lbl" for="question">Pertanyaan <span class="req">*</span></label>
            <input type="text" id="question" name="question" class="fi @error('question') is-invalid @enderror"
              placeholder="cth. Apakah bisa memesan furniture custom?" value="{{ old('question') }}" required>
            @error('question')<p class="f-err">{{ $message }}</p>@enderror
          </div>
          <div class="fg">
            <label class="lbl" for="answer">Jawaban <span class="req">*</span></label>
            <textarea id="answer" name="answer" class="ft @error('answer') is-invalid @enderror"
              style="min-height:140px" placeholder="Tuliskan jawaban yang jelas dan informatif..." required>{{ old('answer') }}</textarea>
            @error('answer')<p class="f-err">{{ $message }}</p>@enderror
          </div>
          <div class="fg">
            <label class="lbl" for="sort_order">Urutan Tampil</label>
            <input type="number" id="sort_order" name="sort_order" class="fi"
              value="{{ old('sort_order', 0) }}" min="0" style="max-width:160px">
            <p class="f-hint">Angka kecil tampil lebih dulu</p>
          </div>
          <div class="fg">
            <label class="f-chk">
              <input type="hidden" name="is_active" value="0">
              <input type="checkbox" name="is_active" value="1" {{ old('is_active', 1) ? 'checked' : '' }}>
              <span class="f-chk-lbl">Aktifkan FAQ ini (tampil di website)</span>
            </label>
          </div>
        </div>
      </div>
      <div class="card-ft" style="display:flex;gap:.75rem">
        <button type="submit" class="btn btn-p">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 21H5a2 2 0 01-2-2V5a2 2 0 012-2h11l5 5v11a2 2 0 01-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/><polyline points="7 3 7 8 15 8"/></svg>
          Simpan FAQ
        </button>
        <a href="{{ route('faqs.index') }}" class="btn btn-s">Batal</a>
      </div>
    </div>
  </form>
</div>
@endsection
