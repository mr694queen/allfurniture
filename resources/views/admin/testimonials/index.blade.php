@extends('admin.layouts.app')
@section('title', 'Testimoni')
@section('page-title', 'Testimoni Pelanggan')
@section('page-subtitle', 'Kelola ulasan dan testimoni yang tampil di website')

@section('content')
<div class="ph">
  <div class="ph-left">
    <h1 class="ph-title">Testimoni</h1>
    <p class="ph-sub">{{ $testimonials->count() }} testimoni terdaftar</p>
  </div>
  <div class="ph-acts">
    <a href="{{ route('testimonials.create') }}" class="btn btn-p">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
      Tambah Testimoni
    </a>
  </div>
</div>

<div class="card">
  <div class="tbl-wrap">
    <table>
      <thead>
        <tr>
          <th style="width:48px">#</th>
          <th>Pelanggan</th>
          <th>Pesan</th>
          <th>Jenis Proyek</th>
          <th>Rating</th>
          <th>Status</th>
          <th style="width:120px">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse($testimonials as $i => $t)
        <tr>
          <td class="td-m">{{ $i + 1 }}</td>
          <td>
            <div style="display:flex;align-items:center;gap:.75rem">
              <div style="width:36px;height:36px;border-radius:50%;overflow:hidden;flex-shrink:0;background:var(--wood-pale);display:flex;align-items:center;justify-content:center">
                @if($t->photo_path)
                  <img src="{{ asset('storage/'.$t->photo_path) }}" alt="{{ $t->name }}" style="width:100%;height:100%;object-fit:cover">
                @else
                  <span style="font-family:'Playfair Display',serif;font-size:.85rem;font-weight:700;color:var(--wood-d)">{{ strtoupper(substr($t->name,0,1)) }}</span>
                @endif
              </div>
              <span class="td-b">{{ $t->name }}</span>
            </div>
          </td>
          <td style="max-width:260px">
            <span style="display:block;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;max-width:240px;font-size:.82rem;color:var(--dk)">
              {{ $t->message }}
            </span>
          </td>
          <td class="td-m">{{ $t->project_type ?: '—' }}</td>
          <td>
            <div style="display:flex;gap:2px;color:var(--wood)">
              @for($s=1;$s<=5;$s++)
                <svg width="13" height="13" viewBox="0 0 24 24" fill="{{ $s<=($t->rating??5)?'currentColor':'none' }}" stroke="currentColor" stroke-width="1.5">
                  <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>
                </svg>
              @endfor
            </div>
          </td>
          <td>
            <span class="bdg {{ $t->is_published ? 'bdg-ok' : 'bdg-off' }}">
              {{ $t->is_published ? 'Tampil' : 'Tersembunyi' }}
            </span>
          </td>
          <td>
            <div style="display:flex;gap:.375rem">
              <a href="{{ route('testimonials.edit', $t) }}" class="btn btn-s btn-xs">Edit</a>
              <button type="button" class="btn btn-d btn-xs"
                onclick="openDlg('{{ route('testimonials.destroy', $t) }}', 'Hapus testimoni dari &quot;{{ addslashes($t->name) }}&quot;?')">
                Hapus
              </button>
            </div>
          </td>
        </tr>
        @empty
        <tr><td colspan="7">
          <div class="empty">
            <div class="empty-ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75"><path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/></svg></div>
            <p class="empty-t">Belum ada testimoni</p>
            <p class="empty-s">Tambahkan ulasan pelanggan untuk meningkatkan kepercayaan pengunjung</p>
            <a href="{{ route('testimonials.create') }}" class="btn btn-p btn-sm">Tambah Testimoni</a>
          </div>
        </td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection
