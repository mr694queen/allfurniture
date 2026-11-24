@extends('admin.layouts.app')
@section('title','Dashboard')
@section('page-title','Dashboard')
@section('page-subtitle','Selamat datang — ringkasan data ALL FURNITURE')

@section('content')
@php use Carbon\Carbon; @endphp

{{-- ── Welcome strip ── --}}
<div style="
  background:linear-gradient(120deg,var(--br-d) 0%,var(--br) 55%,var(--br-l) 100%);
  border-radius:var(--r-lg);padding:1.75rem 2rem;
  display:flex;align-items:center;justify-content:space-between;
  flex-wrap:wrap;gap:1.25rem;margin-bottom:1.75rem;
  position:relative;overflow:hidden;
">
  {{-- Decorative dots --}}
  <div aria-hidden="true" style="
    position:absolute;right:-40px;top:-40px;
    width:200px;height:200px;border-radius:50%;
    background:radial-gradient(circle,rgba(161,136,127,.15) 0%,transparent 70%);
    pointer-events:none;
  "></div>
  <div>
    <div style="font-size:.68rem;font-weight:700;letter-spacing:.15em;text-transform:uppercase;color:var(--br-l);margin-bottom:.5rem">
      {{ Carbon::now()->locale('id')->isoFormat('dddd, D MMMM Y') }}
    </div>
    <h2 style="font-family:'Playfair Display',serif;font-size:1.5rem;font-weight:700;color:var(--white);margin-bottom:.3rem">
      Halo, {{ auth()->user()->name ?? 'Admin' }} 👋
    </h2>
    <p style="font-size:.84rem;color:rgba(255,255,255,.5)">
      Berikut ringkasan data website ALL FURNITURE hari ini.
    </p>
  </div>
  <a href="{{ route('home') }}" target="_blank" rel="noopener"
     style="
       display:inline-flex;align-items:center;gap:.5rem;
       background:rgba(255,255,255,.1);color:rgba(255,255,255,.85);
       border:1px solid rgba(255,255,255,.15);
       padding:.65rem 1.25rem;border-radius:var(--r-sm);
       font-size:.8rem;font-weight:600;transition:var(--t);
     "
     onmouseover="this.style.background='rgba(255,255,255,.18)'"
     onmouseout="this.style.background='rgba(255,255,255,.1)'">
    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
      <path d="M18 13v6a2 2 0 01-2 2H5a2 2 0 01-2-2V8a2 2 0 012-2h6"/>
      <polyline points="15 3 21 3 21 9"/>
      <line x1="10" y1="14" x2="21" y2="3"/>
    </svg>
    Lihat Website
  </a>
</div>

{{-- ── Stat cards ── --}}
@php
$cards = [
  ['label'=>'Total Produk',     'val'=>$stats['total_products'],     'href'=>route('products.index'),     'cls'=>'sc-ico-br',
   'ico'=>'<rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 21V5a2 2 0 00-2-2h-4a2 2 0 00-2 2v16"/>',
   'meta'=>'produk di katalog'],
  ['label'=>'Total Kategori',   'val'=>$stats['total_categories'],   'href'=>route('categories.index'),   'cls'=>'sc-ico-dk',
   'ico'=>'<path d="M22 19a2 2 0 01-2 2H4a2 2 0 01-2-2V5a2 2 0 012-2h5l2 3h9a2 2 0 012 2z"/>',
   'meta'=>'kategori aktif'],
  ['label'=>'Total Proyek',     'val'=>$stats['total_projects'],     'href'=>route('projects.index'),     'cls'=>'sc-ico-ch',
   'ico'=>'<rect x="3" y="3" width="18" height="18" rx="2"/><path d="M9 3v18"/><path d="M3 9h6"/><path d="M3 15h6"/>',
   'meta'=>'portfolio proyek'],
  ['label'=>'Total Testimoni',  'val'=>$stats['total_testimonials'], 'href'=>route('testimonials.index'), 'cls'=>'sc-ico-br',
   'ico'=>'<path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/>',
   'meta'=>'ulasan pelanggan'],
  ['label'=>'Total Pesan',      'val'=>$stats['total_messages'],     'href'=>route('admin.messages'),     'cls'=>'sc-ico-dk',
   'ico'=>'<path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/>',
   'meta'=>'pesan konsultasi'],
  ['label'=>'Belum Dibaca',     'val'=>$stats['unread_messages'],    'href'=>route('admin.messages'),     'cls'=>($stats['unread_messages']>0?'sc-ico-red':'sc-ico-ch'),
   'ico'=>'<path d="M22 17H2a3 3 0 003-3V9a7 7 0 0114 0v5a3 3 0 003 3zm-8.27 4a2 2 0 01-3.46 0"/>',
   'meta'=>'perlu respons'],
];
@endphp

<div style="display:grid;grid-template-columns:repeat(3,1fr);gap:1.125rem;margin-bottom:1.75rem" class="stat-grid">
  @foreach($cards as $c)
  <a href="{{ $c['href'] }}" class="sc" style="text-decoration:none">
    <div class="sc-ico {{ $c['cls'] }}">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75">{!! $c['ico'] !!}</svg>
    </div>
    <div>
      <span class="sc-val">{{ number_format($c['val']) }}</span>
      <span class="sc-lbl">{{ $c['label'] }}</span>
      <div class="sc-meta">
        <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
          <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/>
          <polyline points="17 6 23 6 23 12"/>
        </svg>
        {{ $c['meta'] }}
      </div>
    </div>
  </a>
  @endforeach
</div>

{{-- ── Quick actions ── --}}
@php
$qas = [
  ['label'=>'Tambah Produk','desc'=>'Buat entri produk baru','href'=>route('products.create'),
   'ico'=>'<rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 21V5a2 2 0 00-2-2h-4a2 2 0 00-2 2v16"/><line x1="12" y1="11" x2="12" y2="17"/><line x1="9" y1="14" x2="15" y2="14"/>'],
  ['label'=>'Tambah Kategori','desc'=>'Organisisr produk baru','href'=>route('categories.create'),
   'ico'=>'<path d="M22 19a2 2 0 01-2 2H4a2 2 0 01-2-2V5a2 2 0 012-2h5l2 3h9a2 2 0 012 2z"/><line x1="12" y1="11" x2="12" y2="17"/><line x1="9" y1="14" x2="15" y2="14"/>'],
  ['label'=>'Tambah Proyek','desc'=>'Dokumentasi portofolio','href'=>route('projects.create'),
   'ico'=>'<rect x="3" y="3" width="18" height="18" rx="2"/><path d="M9 3v18"/><line x1="15" y1="10" x2="21" y2="10"/>'],
  ['label'=>'Lihat Pesan','desc'=>($stats['unread_messages']>0 ? $stats['unread_messages'].' pesan baru' : 'Tidak ada pesan baru'),'href'=>route('admin.messages'),
   'ico'=>'<path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/>'],
  ['label'=>'Pengaturan Situs','desc'=>'Kelola konten website','href'=>route('admin.settings'),
   'ico'=>'<circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 00.33 1.82l.06.06a2 2 0 010 2.83 2 2 0 01-2.83 0l-.06-.06a1.65 1.65 0 00-1.82-.33 1.65 1.65 0 00-1 1.51V21a2 2 0 01-4 0v-.09A1.65 1.65 0 009 19.4a1.65 1.65 0 00-1.82.33l-.06.06a2 2 0 01-2.83-2.83l.06-.06A1.65 1.65 0 004.68 15a1.65 1.65 0 00-1.51-1H3a2 2 0 010-4h.09A1.65 1.65 0 004.6 9a1.65 1.65 0 00-.33-1.82l-.06-.06a2 2 0 012.83-2.83l.06.06A1.65 1.65 0 009 4.68a1.65 1.65 0 001-1.51V3a2 2 0 014 0v.09a1.65 1.65 0 001 1.51 1.65 1.65 0 001.82-.33l.06-.06a2 2 0 012.83 2.83l-.06.06A1.65 1.65 0 0019.4 9a1.65 1.65 0 001.51 1H21a2 2 0 010 4h-.09a1.65 1.65 0 00-1.51 1z"/>'],
];
@endphp

<div class="card" style="margin-bottom:1.75rem">
  <div class="card-hd">
    <span class="card-hd-t">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
        <circle cx="12" cy="12" r="10"/>
        <line x1="12" y1="8" x2="12" y2="16"/>
        <line x1="8" y1="12" x2="16" y2="12"/>
      </svg>
      Aksi Cepat
    </span>
    <span style="font-size:.75rem;color:var(--md)">Pintasan ke halaman penting</span>
  </div>
  <div class="card-bd" style="display:grid;grid-template-columns:repeat(5,1fr);gap:.875rem">
    @foreach($qas as $qa)
    <a href="{{ $qa['href'] }}" class="qa">
      <div class="qa-ico">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75">{!! $qa['ico'] !!}</svg>
      </div>
      <div>
        <div class="qa-t">{{ $qa['label'] }}</div>
        <div class="qa-s">{{ $qa['desc'] }}</div>
      </div>
    </a>
    @endforeach
  </div>
</div>

{{-- ── Recent messages ── --}}
<div class="card">
  <div class="card-hd">
    <span class="card-hd-t">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
        <polyline points="22,6 12,13 2,6"/>
      </svg>
      Pesan Terbaru
    </span>
    <a href="{{ route('admin.messages') }}" class="btn btn-s btn-sm">Lihat Semua</a>
  </div>
  <div class="tbl-wrap">
    <table>
      <thead>
        <tr>
          <th>Nama</th>
          <th>WhatsApp</th>
          <th>Kebutuhan</th>
          <th>Status</th>
          <th>Waktu</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @forelse($recent_activity ?? [] as $msg)
        <tr>
          <td>
            <div style="display:flex;align-items:center;gap:.625rem">
              <div style="
                width:32px;height:32px;border-radius:50%;
                background:linear-gradient(135deg,var(--br-pale),#ede0d4);
                display:flex;align-items:center;justify-content:center;
                flex-shrink:0;font-family:'Playfair Display',serif;
                font-size:.8rem;font-weight:700;color:var(--br-d);
              ">{{ strtoupper(substr($msg->name,0,1)) }}</div>
              <span class="td-b">{{ $msg->name }}</span>
            </div>
          </td>
          <td class="td-m">{{ $msg->whatsapp ?? '—' }}</td>
          <td style="max-width:200px">
            <span style="display:block;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;max-width:180px;font-size:.82rem">
              {{ $msg->requirement ?? $msg->message ?? '—' }}
            </span>
          </td>
          <td>
            <span class="bdg {{ $msg->is_read ? 'bdg-off' : 'bdg-new' }}">
              {{ $msg->is_read ? 'Dibaca' : 'Baru' }}
            </span>
          </td>
          <td class="td-m">{{ $msg->created_at->diffForHumans() }}</td>
          <td>
            <a href="{{ route('admin.messages') }}" class="btn btn-s btn-xs">Detail</a>
          </td>
        </tr>
        @empty
        <tr><td colspan="6">
          <div class="empty">
            <div class="empty-ico">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                <polyline points="22,6 12,13 2,6"/>
              </svg>
            </div>
            <p class="empty-t">Belum ada pesan masuk</p>
            <p class="empty-s">Pesan konsultasi dari pengunjung website akan muncul di sini</p>
          </div>
        </td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>

<style>
@media(max-width:1100px){.stat-grid{grid-template-columns:repeat(2,1fr)!important}}
@media(max-width:640px){.stat-grid{grid-template-columns:1fr!important}}
.card-bd > div[style*="repeat(5,1fr)"]{grid-template-columns:repeat(3,1fr)!important}
@media(max-width:640px){.card-bd > div{grid-template-columns:1fr 1fr!important}}
</style>
@endsection
