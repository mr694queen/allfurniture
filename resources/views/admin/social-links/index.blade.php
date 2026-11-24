@extends('admin.layouts.app')
@section('title', 'Social Links')
@section('page-title', 'Social Media Links')
@section('page-subtitle', 'Kelola tautan media sosial yang tampil di website dan footer')

@section('content')
<div class="ph">
  <div class="ph-left">
    <h1 class="ph-title">Social Links</h1>
    <p class="ph-sub">{{ $links->count() }} link terdaftar</p>
  </div>
  <div class="ph-acts">
    <a href="{{ route('social-links.create') }}" class="btn btn-p">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
      Tambah Social Link
    </a>
  </div>
</div>

<div class="card">
  <div class="tbl-wrap">
    <table>
      <thead>
        <tr>
          <th style="width:48px">#</th>
          <th>Platform</th>
          <th>URL</th>
          <th>Icon</th>
          <th>Status</th>
          <th>Urutan</th>
          <th style="width:120px">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse($links as $i => $link)
        <tr>
          <td class="td-m">{{ $i + 1 }}</td>
          <td class="td-b">{{ $link->platform }}</td>
          <td>
            <a href="{{ $link->url }}" target="_blank" rel="noopener"
               style="font-size:.8rem;color:var(--wood);word-break:break-all;max-width:260px;display:block">
              {{ Str::limit($link->url, 50) }}
            </a>
          </td>
          <td>
            @if($link->icon)
              <code style="font-size:.73rem;background:var(--lt);padding:.2rem .5rem;border-radius:4px;color:var(--dk)">{{ $link->icon }}</code>
            @else
              <span class="td-m">—</span>
            @endif
          </td>
          <td>
            <span class="bdg {{ $link->is_active ? 'bdg-ok' : 'bdg-off' }}">
              {{ $link->is_active ? 'Aktif' : 'Nonaktif' }}
            </span>
          </td>
          <td class="td-m">{{ $link->sort_order }}</td>
          <td>
            <div style="display:flex;gap:.375rem">
              <a href="{{ route('social-links.edit', $link) }}" class="btn btn-s btn-xs">Edit</a>
              <button type="button" class="btn btn-d btn-xs"
                onclick="openDlg('{{ route('social-links.destroy', $link) }}', 'Hapus link {{ addslashes($link->platform) }}?')">
                Hapus
              </button>
            </div>
          </td>
        </tr>
        @empty
        <tr><td colspan="7">
          <div class="empty">
            <div class="empty-ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75"><circle cx="18" cy="5" r="3"/><circle cx="6" cy="12" r="3"/><circle cx="18" cy="19" r="3"/><line x1="8.59" y1="13.51" x2="15.42" y2="17.49"/><line x1="15.41" y1="6.51" x2="8.59" y2="10.49"/></svg></div>
            <p class="empty-t">Belum ada social link</p>
            <p class="empty-s">Tambahkan tautan media sosial untuk ditampilkan di footer website</p>
            <a href="{{ route('social-links.create') }}" class="btn btn-p btn-sm">Tambah Social Link</a>
          </div>
        </td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection
