@extends('admin.layouts.app')
@section('title', 'Cara Pemesanan')
@section('page-title', 'Cara Pemesanan')
@section('page-subtitle', 'Kelola langkah-langkah proses pemesanan furniture')

@section('content')
<div class="ph">
  <div class="ph-left">
    <h1 class="ph-title">Cara Pemesanan</h1>
    <p class="ph-sub">{{ $steps->count() }} langkah terdaftar</p>
  </div>
  <div class="ph-acts">
    <a href="{{ route('ordering-steps.create') }}" class="btn btn-p">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
      Tambah Langkah
    </a>
  </div>
</div>

<div class="card">
  <div class="tbl-wrap">
    <table>
      <thead>
        <tr>
          <th style="width:64px">No.</th>
          <th>Judul Langkah</th>
          <th>Deskripsi</th>
          <th>Icon</th>
          <th>Status</th>
          <th>Urutan</th>
          <th style="width:120px">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse($steps as $i => $step)
        <tr>
          <td>
            <div style="width:32px;height:32px;border-radius:50%;background:var(--wood-pale);display:flex;align-items:center;justify-content:center;font-family:'Playfair Display',serif;font-size:.85rem;font-weight:700;color:var(--wood-d)">
              {{ str_pad($step->step_number ?? $i+1, 2, '0', STR_PAD_LEFT) }}
            </div>
          </td>
          <td class="td-b">{{ $step->title }}</td>
          <td style="max-width:280px">
            <span style="display:block;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;max-width:260px;font-size:.82rem;color:var(--md)">{{ $step->description ?: '—' }}</span>
          </td>
          <td>
            @if($step->icon)
              <code style="font-size:.73rem;background:var(--lt);padding:.2rem .5rem;border-radius:4px;color:var(--dk)">{{ $step->icon }}</code>
            @else
              <span class="td-m">—</span>
            @endif
          </td>
          <td>
            <span class="bdg {{ $step->is_active ? 'bdg-ok' : 'bdg-off' }}">
              {{ $step->is_active ? 'Aktif' : 'Nonaktif' }}
            </span>
          </td>
          <td class="td-m">{{ $step->sort_order }}</td>
          <td>
            <div style="display:flex;gap:.375rem">
              <a href="{{ route('ordering-steps.edit', $step) }}" class="btn btn-s btn-xs">Edit</a>
              <button type="button" class="btn btn-d btn-xs"
                onclick="openDlg('{{ route('ordering-steps.destroy', $step) }}', 'Hapus langkah &quot;{{ addslashes($step->title) }}&quot;?')">
                Hapus
              </button>
            </div>
          </td>
        </tr>
        @empty
        <tr><td colspan="7">
          <div class="empty">
            <div class="empty-ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75"><line x1="8" y1="6" x2="21" y2="6"/><line x1="8" y1="12" x2="21" y2="12"/><line x1="8" y1="18" x2="21" y2="18"/><line x1="3" y1="6" x2="3.01" y2="6"/><line x1="3" y1="12" x2="3.01" y2="12"/><line x1="3" y1="18" x2="3.01" y2="18"/></svg></div>
            <p class="empty-t">Belum ada langkah pemesanan</p>
            <p class="empty-s">Tambahkan langkah-langkah agar pelanggan memahami proses pemesanan</p>
            <a href="{{ route('ordering-steps.create') }}" class="btn btn-p btn-sm">Tambah Langkah</a>
          </div>
        </td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection
