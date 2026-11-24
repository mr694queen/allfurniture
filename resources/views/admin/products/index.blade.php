@extends('admin.layouts.app')
@section('title','Produk')
@section('page-title','Manajemen Produk')
@section('page-subtitle','Kelola katalog produk furniture ALL FURNITURE')

@section('content')
<div class="ph">
  <div>
    <h1 class="ph-title">Produk</h1>
    <p class="ph-sub">{{ $products->total() }} produk terdaftar</p>
  </div>
  <div class="ph-acts">
    <a href="{{ route('products.create') }}" class="btn btn-p">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
      Tambah Produk
    </a>
  </div>
</div>

{{-- Filter --}}
<form method="GET" action="{{ route('products.index') }}">
  <div class="card" style="margin-bottom:1.25rem">
    <div class="fbar">
      <div class="fbar-srch">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
        <input type="text" name="search" placeholder="Cari produk..." value="{{ request('search') }}">
      </div>
      <select name="category" class="fs" style="width:160px">
        <option value="">Semua Kategori</option>
        @foreach($categories as $cat)
          <option value="{{ $cat->id }}" {{ request('category')==$cat->id?'selected':'' }}>{{ $cat->name }}</option>
        @endforeach
      </select>
      <select name="status" class="fs" style="width:140px">
        <option value="">Semua Status</option>
        <option value="published" {{ request('status')==='published'?'selected':'' }}>Publik</option>
        <option value="draft"     {{ request('status')==='draft'?'selected':'' }}>Draft</option>
        <option value="featured"  {{ request('status')==='featured'?'selected':'' }}>Unggulan</option>
      </select>
      <button type="submit" class="btn btn-p btn-sm">Filter</button>
      @if(request()->hasAny(['search','category','status']))
        <a href="{{ route('products.index') }}" class="btn btn-s btn-sm">Reset</a>
      @endif
    </div>
  </div>
</form>

<div class="card">
  <div class="tbl-wrap">
    <table>
      <thead>
        <tr>
          <th style="width:44px">#</th>
          <th>Produk</th>
          <th>Kategori</th>
          <th>Harga</th>
          <th>Status</th>
          <th>Unggulan</th>
          <th style="width:110px">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse($products as $p)
        <tr>
          <td class="td-m">{{ $loop->iteration + ($products->currentPage()-1)*$products->perPage() }}</td>
          <td>
            <div style="display:flex;align-items:center;gap:.75rem">
              <div style="width:44px;height:44px;border-radius:var(--r-sm);overflow:hidden;flex-shrink:0;background:var(--br-pale)">
                @if($p->primaryImage)
                  <img src="{{ asset('storage/'.$p->primaryImage->image_path) }}" alt="{{ $p->name }}" style="width:100%;height:100%;object-fit:cover">
                @else
                  <div style="width:100%;height:100%;display:flex;align-items:center;justify-content:center;color:var(--br-l)">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 21V5a2 2 0 00-2-2h-4a2 2 0 00-2 2v16"/></svg>
                  </div>
                @endif
              </div>
              <div style="min-width:0">
                <p class="td-b" style="white-space:nowrap;overflow:hidden;text-overflow:ellipsis;max-width:180px">{{ $p->name }}</p>
                @if($p->badge)<span class="bdg bdg-new" style="margin-top:.2rem">{{ $p->badge }}</span>@endif
              </div>
            </div>
          </td>
          <td class="td-m">{{ $p->category?->name ?? '—' }}</td>
          <td>
            @if($p->price_label || $p->price)
              <span style="font-size:.82rem;font-weight:600;color:var(--br-d)">{{ $p->formatted_price }}</span>
            @else
              <span class="td-m">—</span>
            @endif
          </td>
          <td><span class="bdg {{ $p->is_published ? 'bdg-ok' : 'bdg-off' }}">{{ $p->is_published ? 'Publik' : 'Draft' }}</span></td>
          <td>
            @if($p->is_featured)
              <span style="color:var(--br);font-size:.78rem;font-weight:700;display:flex;align-items:center;gap:.3rem">
                <svg width="12" height="12" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                Unggulan
              </span>
            @else
              <span class="td-m">—</span>
            @endif
          </td>
          <td>
            <div class="row-acts">
              <a href="{{ route('products.edit', $p) }}" class="btn btn-s btn-xs">Edit</a>
              <button type="button" class="btn btn-d btn-xs"
                onclick="openDlg('{{ route('products.destroy', $p) }}','Hapus produk &quot;{{ addslashes($p->name) }}&quot;?')">
                Hapus
              </button>
            </div>
          </td>
        </tr>
        @empty
        <tr><td colspan="7">
          <div class="empty">
            <div class="empty-ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 21V5a2 2 0 00-2-2h-4a2 2 0 00-2 2v16"/></svg></div>
            <p class="empty-t">Belum ada produk</p>
            <p class="empty-s">Tambahkan produk pertama untuk mengisi katalog furniture</p>
            <a href="{{ route('products.create') }}" class="btn btn-p btn-sm">Tambah Produk</a>
          </div>
        </td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
  @if($products->hasPages())
  <div class="card-ft" style="display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:.75rem">
    <p style="font-size:.78rem;color:var(--md)">Menampilkan {{ $products->firstItem() }}–{{ $products->lastItem() }} dari {{ $products->total() }}</p>
    <div class="pag">{{ $products->links() }}</div>
  </div>
  @endif
</div>
@endsection
