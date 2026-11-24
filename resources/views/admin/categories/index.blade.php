@extends('admin.layouts.app')
@section('title','Kategori')
@section('page-title','Kategori Furniture')
@section('page-subtitle','Kelola kategori produk yang tampil di website')

@section('content')
<div class="ph">
  <div>
    <h1 class="ph-title">Kategori</h1>
    <p class="ph-sub">{{ $categories->count() }} kategori terdaftar</p>
  </div>
  <div class="ph-acts">
    <a href="{{ route('categories.create') }}" class="btn btn-p">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
        <line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/>
      </svg>
      Tambah Kategori
    </a>
  </div>
</div>

<div class="card">
  <div class="tbl-wrap">
    <table>
      <thead>
        <tr>
          <th style="width:44px">#</th>
          <th>Kategori</th>
          <th>Jumlah Produk</th>
          <th>Status</th>
          <th>Urutan</th>
          <th style="width:110px">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse($categories as $i => $cat)
        <tr>
          <td class="td-m">{{ $i+1 }}</td>
          <td>
            <div style="display:flex;align-items:center;gap:.75rem">
              <div style="width:42px;height:42px;border-radius:var(--r-sm);overflow:hidden;flex-shrink:0;background:var(--br-pale)">
                @if($cat->image_path)
                  <img src="{{ asset('storage/'.$cat->image_path) }}" alt="{{ $cat->name }}" style="width:100%;height:100%;object-fit:cover">
                @else
                  <div style="width:100%;height:100%;display:flex;align-items:center;justify-content:center;color:var(--br-l)">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 19a2 2 0 01-2 2H4a2 2 0 01-2-2V5a2 2 0 012-2h5l2 3h9a2 2 0 012 2z"/></svg>
                  </div>
                @endif
              </div>
              <div>
                <span class="td-b">{{ $cat->name }}</span>
                <span style="display:block;font-size:.74rem;color:var(--md)">{{ $cat->slug }}</span>
              </div>
            </div>
          </td>
          <td>
            @php $prodCount = $cat->products_count ?? $cat->products()->count(); @endphp
            <span style="display:inline-flex;align-items:center;gap:.35rem;font-size:.82rem;font-weight:600;color:{{ $prodCount > 0 ? 'var(--br-d)' : 'var(--md)' }}">
              {{ $prodCount }}
              <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 21V5a2 2 0 00-2-2h-4a2 2 0 00-2 2v16"/></svg>
            </span>
          </td>
          <td><span class="bdg {{ $cat->is_active ? 'bdg-ok' : 'bdg-off' }}">{{ $cat->is_active ? 'Aktif' : 'Nonaktif' }}</span></td>
          <td class="td-m">{{ $cat->sort_order }}</td>
          <td>
            <div class="row-acts">
              <a href="{{ route('categories.edit', $cat) }}" class="btn btn-s btn-xs">Edit</a>
              <button type="button" class="btn btn-d btn-xs"
                onclick="openDlg('{{ route('categories.destroy', $cat) }}','Hapus kategori &quot;{{ addslashes($cat->name) }}&quot;?')">
                Hapus
              </button>
            </div>
          </td>
        </tr>
        @empty
        <tr><td colspan="6">
          <div class="empty">
            <div class="empty-ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M22 19a2 2 0 01-2 2H4a2 2 0 01-2-2V5a2 2 0 012-2h5l2 3h9a2 2 0 012 2z"/></svg></div>
            <p class="empty-t">Belum ada kategori</p>
            <p class="empty-s">Tambahkan kategori pertama untuk mengorganisir produk</p>
            <a href="{{ route('categories.create') }}" class="btn btn-p btn-sm">Tambah Kategori</a>
          </div>
        </td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection
