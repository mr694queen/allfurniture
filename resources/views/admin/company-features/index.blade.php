@extends('admin.layouts.app')
@section('title', 'Keunggulan')
@section('page-title', 'Keunggulan Perusahaan')
@section('page-subtitle', 'Kelola poin keunggulan yang tampil di website')

@section('content')
<div class="ph">
  <div class="ph-left">
    <h1 class="ph-title">Keunggulan</h1>
    <p class="ph-sub">{{ $features->count() }} keunggulan terdaftar</p>
  </div>
  <div class="ph-acts">
    <a href="{{ route('company-features.create') }}" class="btn btn-p">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
      Tambah Keunggulan
    </a>
  </div>
</div>

<div class="card">
  <div class="tbl-wrap">
    <table>
      <thead>
        <tr>
          <th style="width:48px">#</th>
          <th>Judul</th>
          <th>Deskripsi</th>
          <th>Icon</th>
          <th>Status</th>
          <th>Urutan</th>
          <th style="width:120px">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse($features as $i => $f)
        <tr>
          <td class="td-m">{{ $i + 1 }}</td>
          <td class="td-b">{{ $f->title }}</td>
          <td style="max-width:280px">
            <span style="display:block;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;max-width:260px;font-size:.82rem;color:var(--md)">{{ $f->description ?: '—' }}</span>
          </td>
          <td>
            @if($f->icon)
              <code style="font-size:.73rem;background:var(--lt);padding:.2rem .5rem;border-radius:4px;color:var(--dk)">{{ $f->icon }}</code>
            @else
              <span class="td-m">—</span>
            @endif
          </td>
          <td>
            <span class="bdg {{ $f->is_active ? 'bdg-ok' : 'bdg-off' }}">
              {{ $f->is_active ? 'Aktif' : 'Nonaktif' }}
            </span>
          </td>
          <td class="td-m">{{ $f->sort_order }}</td>
          <td>
            <div style="display:flex;gap:.375rem">
              <a href="{{ route('company-features.edit', $f) }}" class="btn btn-s btn-xs">Edit</a>
              <button type="button" class="btn btn-d btn-xs"
                onclick="openDlg('{{ route('company-features.destroy', $f) }}', 'Hapus keunggulan &quot;{{ addslashes($f->title) }}&quot;?')">
                Hapus
              </button>
            </div>
          </td>
        </tr>
        @empty
        <tr><td colspan="7">
          <div class="empty">
            <div class="empty-ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg></div>
            <p class="empty-t">Belum ada data keunggulan</p>
            <p class="empty-s">Tambahkan poin-poin keunggulan untuk ditampilkan di halaman utama</p>
            <a href="{{ route('company-features.create') }}" class="btn btn-p btn-sm">Tambah Keunggulan</a>
          </div>
        </td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection
