@extends('admin.layouts.app')
@section('title', 'FAQ')
@section('page-title', 'Pertanyaan Umum (FAQ)')
@section('page-subtitle', 'Kelola daftar pertanyaan yang sering ditanyakan')

@section('content')
<div class="ph">
  <div class="ph-left">
    <h1 class="ph-title">FAQ</h1>
    <p class="ph-sub">{{ $faqs->count() }} pertanyaan terdaftar</p>
  </div>
  <div class="ph-acts">
    <a href="{{ route('faqs.create') }}" class="btn btn-p">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
      Tambah FAQ
    </a>
  </div>
</div>

<div class="card">
  <div class="tbl-wrap">
    <table>
      <thead>
        <tr>
          <th style="width:48px">#</th>
          <th>Pertanyaan</th>
          <th>Jawaban</th>
          <th>Status</th>
          <th>Urutan</th>
          <th style="width:120px">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse($faqs as $i => $faq)
        <tr>
          <td class="td-m">{{ $i + 1 }}</td>
          <td style="max-width:260px">
            <p class="td-b" style="white-space:normal;line-height:1.45">{{ $faq->question }}</p>
          </td>
          <td style="max-width:300px">
            <span style="display:block;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;max-width:280px;font-size:.82rem;color:var(--md)">{{ $faq->answer }}</span>
          </td>
          <td>
            <span class="bdg {{ $faq->is_active ? 'bdg-ok' : 'bdg-off' }}">
              {{ $faq->is_active ? 'Aktif' : 'Nonaktif' }}
            </span>
          </td>
          <td class="td-m">{{ $faq->sort_order }}</td>
          <td>
            <div style="display:flex;gap:.375rem">
              <a href="{{ route('faqs.edit', $faq) }}" class="btn btn-s btn-xs">Edit</a>
              <button type="button" class="btn btn-d btn-xs"
                onclick="openDlg('{{ route('faqs.destroy', $faq) }}', 'Hapus FAQ ini secara permanen?')">
                Hapus
              </button>
            </div>
          </td>
        </tr>
        @empty
        <tr><td colspan="6">
          <div class="empty">
            <div class="empty-ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 015.83 1c0 2-3 3-3 3"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg></div>
            <p class="empty-t">Belum ada FAQ</p>
            <p class="empty-s">Tambahkan pertanyaan umum untuk membantu calon pelanggan</p>
            <a href="{{ route('faqs.create') }}" class="btn btn-p btn-sm">Tambah FAQ</a>
          </div>
        </td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection
