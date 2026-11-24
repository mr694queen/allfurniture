@extends('admin.layouts.app')
@section('title', 'Proyek')
@section('page-title', 'Proyek / Portfolio')
@section('page-subtitle', 'Kelola galeri proyek furniture yang sudah dikerjakan')

@section('content')
<div class="ph">
  <div class="ph-left">
    <h1 class="ph-title">Proyek</h1>
    <p class="ph-sub">{{ $projects->count() }} proyek terdaftar</p>
  </div>
  <div class="ph-acts">
    <a href="{{ route('projects.create') }}" class="btn btn-p">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
      Tambah Proyek
    </a>
  </div>
</div>

<div class="card">
  <div class="tbl-wrap">
    <table>
      <thead>
        <tr>
          <th style="width:48px">#</th>
          <th>Proyek</th>
          <th>Kategori</th>
          <th>Lokasi</th>
          <th>Tahun</th>
          <th>Foto</th>
          <th>Status</th>
          <th style="width:120px">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse($projects as $i => $proj)
        <tr>
          <td class="td-m">{{ $i + 1 }}</td>
          <td>
            <div style="display:flex;align-items:center;gap:.75rem">
              <div style="width:48px;height:36px;border-radius:var(--r-sm);overflow:hidden;flex-shrink:0;background:var(--lt)">
                @if($proj->images->isNotEmpty())
                  <img src="{{ asset('storage/'.$proj->images->first()->image_path) }}" alt="" style="width:100%;height:100%;object-fit:cover">
                @else
                  <div style="width:100%;height:100%;display:flex;align-items:center;justify-content:center;color:var(--md)">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M9 3v18"/></svg>
                  </div>
                @endif
              </div>
              <span class="td-b">{{ $proj->name }}</span>
            </div>
          </td>
          <td class="td-m">{{ $proj->category ?: '—' }}</td>
          <td class="td-m">{{ $proj->location ?: '—' }}</td>
          <td class="td-m">{{ $proj->year ?: '—' }}</td>
          <td>
            <span style="font-size:.78rem;color:var(--md)">{{ $proj->images->count() }} foto</span>
          </td>
          <td>
            <span class="bdg {{ $proj->is_published ? 'bdg-ok' : 'bdg-off' }}">
              {{ $proj->is_published ? 'Publik' : 'Draft' }}
            </span>
          </td>
          <td>
            <div style="display:flex;gap:.375rem">
              <a href="{{ route('projects.edit', $proj) }}" class="btn btn-s btn-xs">Edit</a>
              <button type="button" class="btn btn-d btn-xs"
                onclick="openDlg('{{ route('projects.destroy', $proj) }}', 'Hapus proyek &quot;{{ addslashes($proj->name) }}&quot;? Semua foto juga akan dihapus.')">
                Hapus
              </button>
            </div>
          </td>
        </tr>
        @empty
        <tr><td colspan="8">
          <div class="empty">
            <div class="empty-ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M9 3v18"/><path d="M3 9h6"/><path d="M3 15h6"/></svg></div>
            <p class="empty-t">Belum ada proyek</p>
            <p class="empty-s">Tambahkan proyek furniture yang sudah diselesaikan untuk membangun portfolio</p>
            <a href="{{ route('projects.create') }}" class="btn btn-p btn-sm">Tambah Proyek</a>
          </div>
        </td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection
