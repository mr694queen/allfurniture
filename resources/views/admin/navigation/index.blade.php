@extends('admin.layouts.app')
@section('title', 'Navigasi')
@section('page-title', 'Navigasi Website')
@section('page-subtitle', 'Kelola item menu navigasi yang tampil di website')

@section('content')
<div class="ph">
  <div class="ph-left">
    <h1 class="ph-title">Navigasi</h1>
    <p class="ph-sub">{{ $items->count() }} item navigasi terdaftar</p>
  </div>
  <div class="ph-acts">
    <a href="{{ route('navigation.create') }}" class="btn btn-p">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
      Tambah Item
    </a>
  </div>
</div>

<div class="card">
  <div class="tbl-wrap">
    <table>
      <thead>
        <tr>
          <th style="width:48px">#</th>
          <th>Label</th>
          <th>URL</th>
          <th>Target</th>
          <th>Eksternal</th>
          <th>Status</th>
          <th>Urutan</th>
          <th style="width:120px">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse($items as $i => $item)
        <tr>
          <td class="td-m">{{ $i + 1 }}</td>
          <td class="td-b">{{ $item->label }}</td>
          <td>
            <code style="font-size:.73rem;background:var(--lt);padding:.2rem .5rem;border-radius:4px;color:var(--dk)">
              {{ Str::limit($item->url, 40) }}
            </code>
          </td>
          <td class="td-m">{{ $item->target ?: '_self' }}</td>
          <td>
            @if($item->is_external)
              <span class="bdg bdg-new">Eksternal</span>
            @else
              <span class="td-m">Internal</span>
            @endif
          </td>
          <td>
            <span class="bdg {{ $item->is_active ? 'bdg-ok' : 'bdg-off' }}">
              {{ $item->is_active ? 'Aktif' : 'Nonaktif' }}
            </span>
          </td>
          <td class="td-m">{{ $item->sort_order }}</td>
          <td>
            <div style="display:flex;gap:.375rem">
              <a href="{{ route('navigation.edit', $item) }}" class="btn btn-s btn-xs">Edit</a>
              <button type="button" class="btn btn-d btn-xs"
                onclick="openDlg('{{ route('navigation.destroy', $item) }}', 'Hapus item navigasi &quot;{{ addslashes($item->label) }}&quot;?')">
                Hapus
              </button>
            </div>
          </td>
        </tr>
        @empty
        <tr><td colspan="8">
          <div class="empty">
            <div class="empty-ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75"><line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="18" x2="21" y2="18"/></svg></div>
            <p class="empty-t">Belum ada item navigasi</p>
            <p class="empty-s">Tambahkan item menu untuk navigasi website</p>
            <a href="{{ route('navigation.create') }}" class="btn btn-p btn-sm">Tambah Item</a>
          </div>
        </td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection
