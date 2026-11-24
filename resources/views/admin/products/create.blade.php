@extends('admin.layouts.app')
@section('title', 'Tambah Produk')
@section('page-title', 'Tambah Produk')
@section('page-subtitle', 'Buat entri produk baru')

@section('content')
<div style="max-width:900px">
  <div class="ph">
    <div class="ph-left"><h1 class="ph-title">Tambah Produk</h1></div>
    <div class="ph-acts">
      <a href="{{ route('products.index') }}" class="btn btn-s">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 12H5M12 5l-7 7 7 7"/></svg>
        Kembali
      </a>
    </div>
  </div>

  <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
    @csrf
    <div style="display:grid;grid-template-columns:1fr 340px;gap:1.25rem;align-items:start">

      {{-- Left: Main info --}}
      <div style="display:flex;flex-direction:column;gap:1.25rem">

        {{-- Informasi Utama --}}
        <div class="card">
          <div class="card-hd"><span class="card-hd-t"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 7h-9M14 17H5M17 17a2 2 0 11-4 0 2 2 0 014 0z"/><path d="M2 2l20 20"/></svg> Informasi Utama</span></div>
          <div class="card-bd">
            <div class="fg-2" style="gap:1.25rem">
              <div class="fg-full">
                <label class="lbl" for="name">Nama Produk <span class="req">*</span></label>
                <input type="text" id="name" name="name" class="fi @error('name') err @enderror"
                  placeholder="cth. Kursi Sofa Premium" value="{{ old('name') }}" required>
                @error('name')<p class="f-err">{{ $message }}</p>@enderror
              </div>
              <div>
                <label class="lbl" for="slug">Slug URL</label>
                <input type="text" id="slug" name="slug" class="fi @error('slug') err @enderror"
                  placeholder="kursi-sofa-premium" value="{{ old('slug') }}">
                @error('slug')<p class="f-err">{{ $message }}</p>@enderror
                <p class="f-hint">Kosongkan untuk generate otomatis</p>
              </div>
              <div>
                <label class="lbl" for="category_id">Kategori <span class="req">*</span></label>
                <select id="category_id" name="category_id" class="fs @error('category_id') err @enderror">
                  <option value="">— Pilih Kategori —</option>
                  @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                  @endforeach
                </select>
                @error('category_id')<p class="f-err">{{ $message }}</p>@enderror
                <p class="f-hint">Produk akan tampil di popup kategori ini</p>
              </div>
              <div class="fg-full">
                <label class="lbl" for="description">Deskripsi Produk</label>
                <textarea id="description" name="description" class="ft" style="min-height:120px"
                  placeholder="Deskripsikan produk secara detail...">{{ old('description') }}</textarea>
              </div>
              <div>
                <label class="lbl" for="material">Material Utama</label>
                <input type="text" id="material" name="material" class="fi"
                  placeholder="cth. Kayu Jati" value="{{ old('material') }}">
              </div>
              <div>
                <label class="lbl" for="dimensions">Dimensi</label>
                <input type="text" id="dimensions" name="dimensions" class="fi"
                  placeholder="cth. 180×90×75 cm" value="{{ old('dimensions') }}">
              </div>
            </div>
          </div>
        </div>

        {{-- Material & Bahan Baku --}}
        <div class="card">
          <div class="card-hd">
            <span class="card-hd-t">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M2 22h20"/><path d="M4 22V8l8-5 8 5v14"/><path d="M12 3v19"/></svg>
              Material & Bahan Baku
            </span>
            <button type="button" class="btn btn-s btn-sm" onclick="addMaterial()">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
              Tambah Bahan
            </button>
          </div>
          <div class="card-bd" id="materialsContainer" style="display:flex;flex-direction:column;gap:.75rem">
            {{-- Existing materials from old input (on validation error) --}}
            @if(old('materials'))
              @foreach(old('materials') as $i => $mat)
                <div class="mat-row" style="border:1.5px solid var(--brd);border-radius:var(--r-sm);padding:.875rem;background:var(--soft)">
                  <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:.5rem">
                    <span style="font-size:.75rem;font-weight:700;color:var(--br-d);text-transform:uppercase;letter-spacing:.05em">Bahan #{{ $i+1 }}</span>
                    <button type="button" class="btn btn-d btn-xs" onclick="this.closest('.mat-row').remove()">Hapus</button>
                  </div>
                  <div style="display:grid;grid-template-columns:1fr 1fr;gap:.625rem">
                    <input type="text" name="materials[{{ $i }}][name]" class="fi" placeholder="Nama bahan (cth. Kayu Jati)" value="{{ $mat['name'] ?? '' }}" required>
                    <input type="text" name="materials[{{ $i }}][description]" class="fi" placeholder="Deskripsi singkat" value="{{ $mat['description'] ?? '' }}">
                  </div>
                  <input type="text" name="materials[{{ $i }}][spec_notes]" class="fi" style="margin-top:.5rem" placeholder="Spesifikasi tambahan (opsional)" value="{{ $mat['spec_notes'] ?? '' }}">
                </div>
              @endforeach
            @endif
            {{-- Empty hint --}}
            <div id="matEmpty" style="text-align:center;padding:1.5rem;color:var(--md);font-size:.82rem;{{ old('materials') ? 'display:none' : '' }}">
              Belum ada bahan baku. Klik "Tambah Bahan" untuk menambahkan.
            </div>
          </div>
        </div>

        {{-- Link Pembelian Shopee --}}
        <div class="card">
          <div class="card-hd"><span class="card-hd-t"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 01-8 0"/></svg> Link Pembelian Online (Shopee)</span></div>
          <div class="card-bd">
            <div style="display:flex;flex-direction:column;gap:.875rem">
              <div>
                <label class="lbl" for="shopee_url">URL Produk Shopee</label>
                <input type="url" id="shopee_url" name="shopee_url" class="fi @error('shopee_url') err @enderror"
                  placeholder="https://shopee.co.id/..." value="{{ old('shopee_url') }}">
                @error('shopee_url')<p class="f-err">{{ $message }}</p>@enderror
                <p class="f-hint">Jika diisi, tombol "Beli di Shopee" akan tampil di popup produk</p>
              </div>
              <div class="fg-2" style="gap:.625rem">
                <div>
                  <label class="lbl" for="shopee_store_name">Nama Toko (opsional)</label>
                  <input type="text" id="shopee_store_name" name="shopee_store_name" class="fi"
                    placeholder="cth. ALL FURNITURE Official Store" value="{{ old('shopee_store_name') }}">
                </div>
                <div>
                  <label class="lbl" for="shopee_notes">Keterangan (opsional)</label>
                  <input type="text" id="shopee_notes" name="shopee_notes" class="fi"
                    placeholder="cth. Gratis ongkir" value="{{ old('shopee_notes') }}">
                </div>
              </div>
            </div>
          </div>
        </div>

        {{-- Foto Produk --}}
        <div class="card">
          <div class="card-hd"><span class="card-hd-t"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg> Foto Produk</span></div>
          <div class="card-bd">
            <label class="fz">
              <input type="file" name="images[]" accept="image/*" multiple data-preview="imgPreview">
              <div class="fz-ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg></div>
              <p class="fz-t">Seret foto ke sini atau <strong>klik untuk memilih</strong></p>
              <p class="fz-t" style="font-size:.72rem;margin-top:.25rem">Bisa pilih lebih dari satu. Foto pertama = gambar utama. Maks. 4 MB/foto.</p>
            </label>
            <div class="fz-preview" id="imgPreview"></div>
            @error('images.*')<p class="f-err">{{ $message }}</p>@enderror
          </div>
        </div>

        {{-- SEO --}}
        <div class="card">
          <div class="card-hd"><span class="card-hd-t">SEO (Opsional)</span></div>
          <div class="card-bd">
            <div class="fg-2" style="gap:1.25rem">
              <div class="fg-full">
                <label class="lbl" for="meta_title">Meta Title</label>
                <input type="text" id="meta_title" name="meta_title" class="fi"
                  placeholder="Judul untuk mesin pencari" value="{{ old('meta_title') }}" maxlength="255">
              </div>
              <div class="fg-full">
                <label class="lbl" for="meta_description">Meta Description</label>
                <textarea id="meta_description" name="meta_description" class="ft" style="min-height:72px"
                  placeholder="Deskripsi singkat untuk mesin pencari (maks. 500 karakter)" maxlength="500">{{ old('meta_description') }}</textarea>
              </div>
            </div>
          </div>
        </div>
      </div>

      {{-- Right: Settings --}}
      <div style="display:flex;flex-direction:column;gap:1.25rem">
        <div class="card">
          <div class="card-hd"><span class="card-hd-t">Harga</span></div>
          <div class="card-bd" style="display:flex;flex-direction:column;gap:1rem">
            <div>
              <label class="lbl" for="price">Harga (Rp)</label>
              <input type="number" id="price" name="price" class="fi @error('price') err @enderror"
                placeholder="0" value="{{ old('price') }}" min="0" step="1000">
              @error('price')<p class="f-err">{{ $message }}</p>@enderror
            </div>
            <div>
              <label class="lbl" for="price_label">Label Harga Kustom</label>
              <input type="text" id="price_label" name="price_label" class="fi"
                placeholder="cth. Mulai dari Rp 1.500.000" value="{{ old('price_label') }}">
              <p class="f-hint">Kosongkan untuk format angka otomatis</p>
            </div>
          </div>
        </div>

        <div class="card">
          <div class="card-hd"><span class="card-hd-t">Status & Tampilan</span></div>
          <div class="card-bd" style="display:flex;flex-direction:column;gap:.875rem">
            <label class="f-chk">
              <input type="hidden" name="is_published" value="0">
              <input type="checkbox" name="is_published" value="1" {{ old('is_published', 1) ? 'checked' : '' }}>
              <span class="f-chk-lbl">Publikasikan produk</span>
            </label>
            <label class="f-chk">
              <input type="hidden" name="is_available" value="0">
              <input type="checkbox" name="is_available" value="1" {{ old('is_available', 1) ? 'checked' : '' }}>
              <span class="f-chk-lbl">Produk tersedia (stok ada)</span>
            </label>
            <label class="f-chk">
              <input type="hidden" name="is_featured" value="0">
              <input type="checkbox" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }}>
              <span class="f-chk-lbl">Produk Unggulan</span>
            </label>
          </div>
        </div>

        <div class="card">
          <div class="card-hd"><span class="card-hd-t">Detail Tambahan</span></div>
          <div class="card-bd" style="display:flex;flex-direction:column;gap:1rem">
            <div>
              <label class="lbl" for="badge">Badge Produk</label>
              <input type="text" id="badge" name="badge" class="fi"
                placeholder="cth. Baru, Terlaris, Promo" value="{{ old('badge') }}" maxlength="50">
              <p class="f-hint">Label kecil yang tampil di foto produk</p>
            </div>
            <div>
              <label class="lbl" for="sort_order">Urutan Tampil</label>
              <input type="number" id="sort_order" name="sort_order" class="fi"
                placeholder="0" value="{{ old('sort_order', 0) }}" min="0">
            </div>
          </div>
        </div>

        <div style="display:flex;flex-direction:column;gap:.625rem">
          <button type="submit" class="btn btn-p" style="justify-content:center">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 21H5a2 2 0 01-2-2V5a2 2 0 012-2h11l5 5v11a2 2 0 01-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/><polyline points="7 3 7 8 15 8"/></svg>
            Simpan Produk
          </button>
          <a href="{{ route('products.index') }}" class="btn btn-s" style="justify-content:center">Batal</a>
        </div>
      </div>
    </div>
  </form>
</div>

<style>
@media(max-width:768px){form > div[style*="grid-template-columns:1fr 340px"]{grid-template-columns:1fr!important}}
.mat-row input.fi{font-size:.8rem}
</style>

@push('scripts')
<script>
// Auto-slug
document.getElementById('name')?.addEventListener('input', function(){
  const sf = document.getElementById('slug');
  if(!sf.dataset.manual) sf.value = this.value.toLowerCase().replace(/[^a-z0-9\s-]/g,'').trim().replace(/\s+/g,'-').replace(/-+/g,'-');
});
document.getElementById('slug')?.addEventListener('input', function(){ this.dataset.manual='1'; });

// Materials repeater
let matIndex = @if(old('materials')) {{ count(old('materials')) }} @else 0 @endif;

function addMaterial() {
  const container = document.getElementById('materialsContainer');
  const empty = document.getElementById('matEmpty');
  if (empty) empty.style.display = 'none';

  const row = document.createElement('div');
  row.className = 'mat-row';
  row.style.cssText = 'border:1.5px solid var(--brd);border-radius:var(--r-sm);padding:.875rem;background:var(--soft)';
  row.innerHTML = `
    <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:.5rem">
      <span style="font-size:.75rem;font-weight:700;color:var(--br-d);text-transform:uppercase;letter-spacing:.05em">Bahan #${matIndex + 1}</span>
      <button type="button" class="btn btn-d btn-xs" onclick="this.closest('.mat-row').remove();checkMatEmpty();">Hapus</button>
    </div>
    <div style="display:grid;grid-template-columns:1fr 1fr;gap:.625rem">
      <input type="text" name="materials[${matIndex}][name]" class="fi" placeholder="Nama bahan (cth. Kayu Jati)" required>
      <input type="text" name="materials[${matIndex}][description]" class="fi" placeholder="Deskripsi singkat">
    </div>
    <input type="text" name="materials[${matIndex}][spec_notes]" class="fi" style="margin-top:.5rem" placeholder="Spesifikasi tambahan (opsional)">
  `;
  container.appendChild(row);
  matIndex++;
}

function checkMatEmpty() {
  const container = document.getElementById('materialsContainer');
  const rows = container.querySelectorAll('.mat-row');
  const empty = document.getElementById('matEmpty');
  if (rows.length === 0 && empty) empty.style.display = 'block';
}
</script>
@endpush
@endsection
