@extends('admin.layouts.app')
@section('title', 'Pengaturan Situs')
@section('page-title', 'Pengaturan Situs')
@section('page-subtitle', 'Kelola konten, kontak, tampilan, dan SEO website')

@section('content')
@php
  $groupLabels = [
    'general'  => ['label' => 'Informasi Umum',     'icon' => '<path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/>'],
    'contact'  => ['label' => 'Kontak & Lokasi',    'icon' => '<path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/>'],
    'hero'     => ['label' => 'Hero Section',       'icon' => '<rect x="3" y="3" width="18" height="18" rx="2"/><path d="M3 9h18"/><path d="M9 21V9"/>'],
    'about'    => ['label' => 'Tentang Kami',       'icon' => '<circle cx="12" cy="8" r="4"/><path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"/>'],
    'stats'    => ['label' => 'Statistik',          'icon' => '<line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/>'],
    'footer'   => ['label' => 'Footer',             'icon' => '<rect x="3" y="3" width="18" height="18" rx="2"/><path d="M3 15h18"/>'],
    'seo'      => ['label' => 'SEO & Meta',         'icon' => '<circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/>'],
    'navbar'   => ['label' => 'Navbar',             'icon' => '<line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="18" x2="21" y2="18"/>'],
    'theme'    => ['label' => 'Tema & Font',        'icon' => '<circle cx="13.5" cy="6.5" r=".5" fill="currentColor"/><circle cx="17.5" cy="10.5" r=".5" fill="currentColor"/><circle cx="8.5" cy="7.5" r=".5" fill="currentColor"/><circle cx="6.5" cy="12.5" r=".5" fill="currentColor"/><path d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10c.926 0 1.648-.746 1.648-1.688 0-.437-.18-.835-.437-1.125-.29-.289-.438-.652-.438-1.125a1.64 1.64 0 011.668-1.668h1.996c3.051 0 5.555-2.503 5.555-5.554C21.965 6.012 17.461 2 12 2z"/>'],
  ];
  $imageTypes = ['image'];
  $textareaTypes = ['textarea'];
  $colorTypes = ['color'];
@endphp

<form method="POST" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data" id="settingsForm">
  @csrf

  {{-- Sticky save bar --}}
  <div style="position:sticky;top:62px;z-index:300;background:var(--white);border-bottom:1px solid var(--border);padding:.875rem 0;margin-bottom:1.75rem">
    <div style="display:flex;align-items:center;justify-content:space-between;gap:1rem">
      <p style="font-size:.82rem;color:var(--md)">
        <svg style="display:inline;width:14px;height:14px;margin-right:.3rem;color:var(--wood)" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
        Semua perubahan disimpan sekaligus saat klik tombol simpan
      </p>
      <button type="submit" class="btn btn-p">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 21H5a2 2 0 01-2-2V5a2 2 0 012-2h11l5 5v11a2 2 0 01-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/><polyline points="7 3 7 8 15 8"/></svg>
        Simpan Semua Pengaturan
      </button>
    </div>
  </div>

  {{-- Group tabs nav --}}
  <div style="display:flex;gap:.5rem;flex-wrap:wrap;margin-bottom:1.5rem" id="settingsTabs">
    @foreach($settings as $group => $items)
    @php $meta = $groupLabels[$group] ?? ['label' => ucfirst($group), 'icon' => '<circle cx="12" cy="12" r="10"/>']; @endphp
    <a href="#group-{{ $group }}"
       style="display:inline-flex;align-items:center;gap:.4rem;padding:.45rem .875rem;border-radius:var(--r-sm);border:1.5px solid var(--border);font-size:.8rem;font-weight:500;color:var(--dk);text-decoration:none;transition:var(--t)"
       class="settings-tab"
       data-group="{{ $group }}">
      <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">{!! $meta['icon'] !!}</svg>
      {{ $meta['label'] }}
    </a>
    @endforeach
  </div>

  {{-- Setting groups --}}
  @foreach($settings as $group => $items)
  @php $meta = $groupLabels[$group] ?? ['label' => ucfirst($group), 'icon' => '<circle cx="12" cy="12" r="10"/>']; @endphp
  <div class="card" id="group-{{ $group }}" style="margin-bottom:1.375rem">
    <div class="card-hd">
      <span class="card-hd-t">
        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">{!! $meta['icon'] !!}</svg>
        {{ $meta['label'] }}
      </span>
      <span style="font-size:.72rem;color:var(--md)">{{ $items->count() }} pengaturan</span>
    </div>
    <div class="card-bd">
      <div style="display:grid;grid-template-columns:repeat(2,1fr);gap:1.25rem">

        @foreach($items as $setting)
        @php
          $isImage    = $setting->type === 'image';
          $isTextarea = $setting->type === 'textarea';
          $isColor    = $setting->type === 'color';
          $isSelect   = $setting->type === 'select';
          $spanFull   = $isImage || $isTextarea || in_array($setting->key, ['contact_address','about_story','about_vision','about_mission','footer_description','seo_description']);
        @endphp
        <div style="{{ $spanFull ? 'grid-column:1/-1' : '' }}">
          <label class="lbl" for="field-{{ $setting->key }}">
            {{ $setting->label }}
            @if($setting->description)
              <span style="font-weight:400;color:var(--md);font-size:.72rem;margin-left:.3rem">({{ $setting->description }})</span>
            @endif
          </label>

          @if($isImage)
            {{-- Current image preview --}}
            @if($setting->value)
            <div style="display:flex;align-items:center;gap:.75rem;padding:.625rem .875rem;background:var(--soft);border:1px solid var(--border);border-radius:var(--r-sm);margin-bottom:.625rem">
              <div style="width:48px;height:36px;border-radius:4px;overflow:hidden;flex-shrink:0;background:var(--lt)">
                <img src="{{ asset('storage/'.$setting->value) }}" alt="{{ $setting->label }}" style="width:100%;height:100%;object-fit:cover"
                     onerror="this.parentElement.innerHTML='<span style=font-size:.65rem;color:var(--md)>No preview</span>'">
              </div>
              <div>
                <p style="font-size:.75rem;font-weight:600;color:var(--dk)">Gambar saat ini</p>
                <p style="font-size:.7rem;color:var(--md)">{{ basename($setting->value) }}</p>
              </div>
            </div>
            @endif
            <label class="fz" style="padding:1rem">
              <input type="file" name="{{ $setting->key }}" id="field-{{ $setting->key }}"
                     accept="image/*" data-preview="prev-{{ $setting->key }}">
              <div style="display:flex;align-items:center;gap:.625rem">
                <div class="fz-ico" style="width:32px;height:32px;margin:0">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
                </div>
                <span class="fz-t" style="text-align:left">
                  {{ $setting->value ? 'Klik untuk ganti gambar' : 'Klik untuk upload gambar' }}
                  <span style="display:block;font-size:.7rem;margin-top:.1rem">PNG, JPG, WEBP — maks. 2 MB</span>
                </span>
              </div>
            </label>
            <div class="fz-preview" id="prev-{{ $setting->key }}" style="margin-top:.5rem"></div>

          @elseif($isTextarea)
            <textarea id="field-{{ $setting->key }}" name="{{ $setting->key }}"
                      class="ft" style="min-height:80px"
                      placeholder="{{ $setting->label }}">{{ $setting->value }}</textarea>

          @elseif($isColor)
            <div style="display:flex;align-items:center;gap:.75rem">
              <input type="color" id="field-{{ $setting->key }}" name="{{ $setting->key }}"
                     value="{{ $setting->value ?: '#B89578' }}"
                     style="width:40px;height:38px;border:1.5px solid var(--border);border-radius:var(--r-sm);cursor:pointer;padding:2px">
              <input type="text" id="field-{{ $setting->key }}-hex" value="{{ $setting->value }}"
                     class="fi" style="max-width:120px;font-family:monospace"
                     oninput="document.getElementById('field-{{ $setting->key }}').value=this.value"
                     placeholder="#B89578">
            </div>
            <input type="hidden" name="{{ $setting->key }}" id="field-{{ $setting->key }}-hidden"
                   value="{{ $setting->value }}">

          @elseif($isSelect)
            <select id="field-{{ $setting->key }}" name="{{ $setting->key }}" class="fs">
              @foreach(['left','center','right'] as $opt)
                <option value="{{ $opt }}" {{ $setting->value===$opt?'selected':'' }}>{{ ucfirst($opt) }}</option>
              @endforeach
            </select>

          @else
            <input type="text" id="field-{{ $setting->key }}" name="{{ $setting->key }}"
                   class="fi" value="{{ $setting->value }}"
                   placeholder="{{ $setting->label }}">
          @endif
        </div>
        @endforeach

      </div>
    </div>
  </div>
  @endforeach

  <div style="padding:1.5rem 0">
    <button type="submit" class="btn btn-p">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 21H5a2 2 0 01-2-2V5a2 2 0 012-2h11l5 5v11a2 2 0 01-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/><polyline points="7 3 7 8 15 8"/></svg>
      Simpan Semua Pengaturan
    </button>
  </div>
</form>

@push('scripts')
<script>
// Sync color picker <-> hex input -> hidden
document.querySelectorAll('input[type=color]').forEach(picker => {
  const key     = picker.id.replace('field-','').replace('-hidden','');
  const hexInput= document.getElementById('field-' + key + '-hex');
  const hidden  = document.getElementById('field-' + key + '-hidden');
  if(!hexInput || !hidden) return;
  picker.addEventListener('input', () => {
    hexInput.value = picker.value;
    hidden.value   = picker.value;
  });
  hexInput.addEventListener('input', () => {
    if(/^#[0-9a-f]{6}$/i.test(hexInput.value)){
      picker.value = hexInput.value;
      hidden.value = hexInput.value;
    }
  });
});

// Smooth scroll to group on tab click
document.querySelectorAll('.settings-tab').forEach(tab => {
  tab.addEventListener('click', e => {
    e.preventDefault();
    const target = document.querySelector(tab.getAttribute('href'));
    if(target){
      const offset = 62 + 60; // topbar + sticky save bar approx
      window.scrollTo({ top: target.offsetTop - offset, behavior: 'smooth' });
    }
    document.querySelectorAll('.settings-tab').forEach(t =>
      t.style.cssText = 'border-color:var(--border);color:var(--dk);background:var(--white)');
    tab.style.cssText = 'border-color:var(--wood);color:var(--wood-d);background:var(--wood-xs)';
  });
});

// Warn unsaved changes
let changed = false;
document.getElementById('settingsForm')?.addEventListener('change', () => changed = true);
window.addEventListener('beforeunload', e => {
  if(changed){ e.preventDefault(); e.returnValue = ''; }
});
document.getElementById('settingsForm')?.addEventListener('submit', () => { changed = false; });
</script>
@endpush
@endsection

