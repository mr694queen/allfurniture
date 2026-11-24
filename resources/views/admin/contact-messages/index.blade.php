@extends('admin.layouts.app')
@section('title', 'Pesan Masuk')
@section('page-title', 'Pesan Masuk')
@section('page-subtitle', 'Pesan konsultasi dari pengunjung website')

@section('content')
@php
  $unreadCount = $messages->where('is_read', false)->count();
@endphp

<div class="ph">
  <div class="ph-left">
    <h1 class="ph-title">Pesan Masuk</h1>
    <p class="ph-sub">
      {{ $messages->total() }} total pesan
      @if($unreadCount > 0)
        &mdash; <span style="color:var(--wood);font-weight:600">{{ $unreadCount }} belum dibaca</span>
      @endif
    </p>
  </div>
</div>

<div class="card">
  <div class="tbl-wrap">
    <table>
      <thead>
        <tr>
          <th style="width:48px"></th>
          <th>Nama</th>
          <th>WhatsApp</th>
          <th>Kebutuhan</th>
          <th>Email</th>
          <th>Status</th>
          <th>Waktu</th>
          <th style="width:140px">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse($messages as $msg)
        <tr style="{{ !$msg->is_read ? 'background:var(--wood-xs)' : '' }}">
          <td>
            @if(!$msg->is_read)
              <span style="display:inline-block;width:8px;height:8px;border-radius:50%;background:var(--wood);flex-shrink:0" title="Belum dibaca"></span>
            @else
              <span style="display:inline-block;width:8px;height:8px;border-radius:50%;background:var(--lt)" title="Sudah dibaca"></span>
            @endif
          </td>
          <td>
            <div style="display:flex;align-items:center;gap:.625rem">
              <div style="width:30px;height:30px;border-radius:50%;background:var(--wood-pale);display:flex;align-items:center;justify-content:center;flex-shrink:0;font-family:'Playfair Display',serif;font-size:.8rem;font-weight:700;color:var(--wood-d)">
                {{ strtoupper(substr($msg->name, 0, 1)) }}
              </div>
              <span class="{{ !$msg->is_read ? 'td-b' : '' }}" style="font-size:.84rem">{{ $msg->name }}</span>
            </div>
          </td>
          <td>
            @if($msg->whatsapp)
              <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $msg->whatsapp) }}" target="_blank" rel="noopener"
                 style="color:var(--wood);font-size:.82rem;font-weight:500">
                {{ $msg->whatsapp }}
              </a>
            @else
              <span class="td-m">—</span>
            @endif
          </td>
          <td style="max-width:240px">
            <span style="display:block;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;max-width:220px;font-size:.82rem;color:var(--dk)">
              {{ $msg->requirement ?: ($msg->message ?: '—') }}
            </span>
          </td>
          <td class="td-m" style="font-size:.78rem">{{ $msg->email ?: '—' }}</td>
          <td>
            @if($msg->status === 'new')
              <span class="bdg bdg-new">Baru</span>
            @elseif($msg->status === 'processed')
              <span class="bdg bdg-pro">Diproses</span>
            @else
              <span class="bdg bdg-done">Selesai</span>
            @endif
          </td>
          <td class="td-m" style="font-size:.78rem;white-space:nowrap">{{ $msg->created_at->format('d M Y, H:i') }}</td>
          <td>
            <div style="display:flex;gap:.375rem;flex-wrap:wrap">
              @if(!$msg->is_read)
                <form method="POST" action="{{ route('messages.mark-read', $msg) }}" style="display:inline">
                  @csrf @method('PUT')
                  <button type="submit" class="btn btn-s btn-xs" title="Tandai sudah dibaca">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:12px;height:12px"><polyline points="20 6 9 17 4 12"/></svg>
                    Baca
                  </button>
                </form>
              @endif
              <button type="button" class="btn btn-d btn-xs"
                onclick="openDlg('{{ route('messages.delete', $msg) }}', 'Hapus pesan dari &quot;{{ addslashes($msg->name) }}&quot; secara permanen?')">
                Hapus
              </button>
            </div>
          </td>
        </tr>

        {{-- Expanded detail row --}}
        @if($msg->requirement || $msg->message)
        <tr style="{{ !$msg->is_read ? 'background:var(--wood-xs)' : '' }}">
          <td></td>
          <td colspan="7" style="padding-top:0;padding-bottom:.875rem">
            <div style="background:var(--soft);border-radius:var(--r-sm);padding:.75rem 1rem;font-size:.82rem;color:var(--dk);line-height:1.7;border-left:3px solid var(--wood-pale);max-width:680px">
              {{ $msg->requirement ?: $msg->message }}
            </div>
          </td>
        </tr>
        @endif

        @empty
        <tr><td colspan="8">
          <div class="empty">
            <div class="empty-ico">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
            </div>
            <p class="empty-t">Belum ada pesan masuk</p>
            <p class="empty-s">Pesan konsultasi dari pengunjung website akan muncul di sini</p>
          </div>
        </td></tr>
        @endforelse
      </tbody>
    </table>
  </div>

  @if($messages->hasPages())
  <div class="card-ft" style="display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:.75rem">
    <p style="font-size:.78rem;color:var(--md)">
      Menampilkan {{ $messages->firstItem() }}–{{ $messages->lastItem() }} dari {{ $messages->total() }} pesan
    </p>
    <div class="pagination">{{ $messages->links() }}</div>
  </div>
  @endif
</div>
@endsection
