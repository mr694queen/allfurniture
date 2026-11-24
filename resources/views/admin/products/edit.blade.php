@extends('admin.layouts.app')
@section('title', 'Edit Produk')
@section('page-title', 'Edit Produk')
@section('page-subtitle', $product->name)

@section('content')
<div style="max-width:900px">
  <div class="ph">
    <div class="ph-left"><h1 class="ph-title">Edit Produk</h1></div>
    <div class="ph-acts">
      <a href="{{ route('products.index') }}" class="btn btn-s">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 12H5M12 5l-7 7 7 7"/></svg>
        Kembali
      </a>
    </div>
  </div>

  <form method="POST" action="{{ route('products.update', $product) }}" enctype="multipart/form-data">
    @csrf @method('PUT')
    <div style="display:grid;grid-template-columns:1fr 340px;gap:1.25rem;align-items:start">

      {{-- Left --}}
      <div style="display:flex;flex-direction:column;gap:1.25rem">

        {{-- Informasi Utama --}}
        <div class="card">
          <div class="card-hd"><span class="card-hd-t">Informasi Utama</span></div>
          <div class="card-bd">
            <div class="fg-2" style="gap:1.25rem">
              <div class="fg-full">
                <label class="lbl">Nama Produk <span class="req">*</span></label>
                <input type="text" name="name" class="fi @error('name') err @enderror"
                  value="{{ old('name', $product->name) }}" required>
                @error('name')<p class="f-err">{{ $message }}</p>@enderror
              </div>
              <div>
                <label class="lbl">Slug URL</label>
                <input type="text" name="slug" class="fi @error('slug') err @enderror"
                  value="{{ old('slug', $product->slug) }}">
                @error('slug')<p class="f-err">{{ $message }}</p>@enderror
              </div>
              <div>
                <label class="lbl">Kategori <span class="req">*</span></label>
                <select name="category_id" class="fs @error('category_id') err @enderror">
                  <option value="">— Pilih Kategori —</option>
                  @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" {{ old('category_id', $product->category_id) == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                  @endforeach
                </select>
                @error('category_id')<p class="f-err">{{ $message }}</p>@enderror
                <p class="f-hint">Produk akan tampil di popup kategori ini</p>
              </div>
              <div class="fg-full">
                <label class="lbl">Deskripsi</label>
                <textarea name="description" class="ft" style="min-height:120px">{{ old('description', $product->description) }}</textarea>
              </div>
              <div>
                <label class="lbl">Material Utama</label>
                <input type="text" name="material" class="fi"
                  value="{{ old('material', $product->material) }}" placeholder="cth. Kayu Jati">
              </div>
              <div>
                <label class="lbl">Dimensi</label>
                <input type="text" name="dimensions" class="fi"
                  value="{{ old('dimensions', $product->dimensions) }}" placeholder="cth. 180×90×75 cm">
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
            @php $existingMats = old('materials') ? collect(old('materials')) : $product->materials; @endphp
            @foreach($existingMats as $i => $mat)
              @php
                $matId = is_object($mat) ? $mat->id : ($mat['id'] ?? null);
                $matName = is_object($mat) ? $mat->name : ($mat['name'] ?? '');
                $matDesc = is_object($mat) ? $mat->description : ($mat['description'] ?? '');
                $matSpec = is_object($mat) ? $mat->spec_notes : ($mat['spec_notes'] ?? '');
              @endphp
              <div class="mat-row" style="border:1.5px solid var(--brd);border-radius:var(--r-sm);padding:.875rem;background:var(--soft)">
                <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:.5rem">
                  <span style="font-size:.75rem;font-weight:700;color:var(--br-d);text-transform:uppercase;letter-spacing:.05em">Bahan #{{ $i+1 }}</span>
                  <div style="display:flex;gap:.375rem">
                    @if($matId)
                      <input type="hidden" name="materials[{{ $i }}][id]" value="{{ $matId }}">
                    @endif
                    <button type="button" class="btn btn-d btn-xs" onclick="removeMaterial(this, {{ $matId ?? 'null' }})">Hapus</button>
                  </div>
                </div>
                <div style="display:grid;grid-template-columns:1fr 1fr;gap:.625rem">
                  <input type="text" name="materials[{{ $i }}][name]" class="fi" placeholder="Nama bahan (cth. Kayu Jati)" value="{{ $matName }}" required>
                  <input type="text" name="materials[{{ $i }}][description]" class="fi" placeholder="Deskripsi singkat" value="{{ $matDesc }}">
                </div>
                <input type="text" name="materials[{{ $i }}][spec_notes]" class="fi" style="margin-top:.5rem" placeholder="Spesifikasi tambahan (opsional)" value="{{ $matSpec }}">
              </div>
            @endforeach
            <div id="matEmpty" style="text-align:center;padding:1.5rem;color:var(--md);font-size:.82rem;{{ $existingMats->count() > 0 ? 'display:none' : '' }}">
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
                <label class="lbl">URL Produk Shopee</label>
                <input type="url" name="shopee_url" class="fi @error('shopee_url') err @enderror"
                  placeholder="https://shopee.co.id/..." value="{{ old('shopee_url', $product->shopee_url) }}">
                @error('shopee_url')<p class="f-err">{{ $message }}</p>@enderror
                <p class="f-hint">Jika diisi, tombol "Beli di Shopee" akan tampil di popup produk</p>
              </div>
              <div class="fg-2" style="gap:.625rem">
                <div>
                  <label class="lbl">Nama Toko (opsional)</label>
                  <input type="text" name="shopee_store_name" class="fi"
                    placeholder="cth. ALL FURNITURE Official Store" value="{{ old('shopee_store_name', $product->shopee_store_name) }}">
                </div>
                <div>
                  <label class="lbl">Keterangan (opsional)</label>
                  <input type="text" name="shopee_notes" class="fi"
                    placeholder="cth. Gratis ongkir" value="{{ old('shopee_notes', $product->shopee_notes) }}">
                </div>
              </div>
            </div>
          </div>
        </div>

        {{-- Existing images --}}
        @if($product->images->count())
        <div class="card">
          <div class="card-hd"><span class="card-hd-t">Foto Saat Ini ({{ $product->images->count() }})</span></div>
          <div class="card-bd">
            <p style="font-size:.78rem;color:var(--md);margin-bottom:1rem">Centang foto yang ingin dihapus.</p>
            <div style="display:flex;flex-wrap:wrap;gap:.75rem">
              @foreach($product->images as $img)
              <div style="position:relative">
                <div style="width:80px;height:80px;border-radius:var(--r-sm);overflow:hidden;border:2px solid var(--brd)">
                  <img src="{{ asset('storage/'.$img->image_path) }}" alt="" style="width:100%;height:100%;object-fit:cover">
                </div>
                @if($img->is_primary)
                  <span style="position:absolute;bottom:2px;left:2px;background:var(--br);color:var(--white);font-size:.55rem;font-weight:700;padding:.1rem .35rem;border-radius:3px">UTAMA</span>
                @endif
                <label style="position:absolute;top:2px;right:2px;cursor:pointer">
                  <input type="checkbox" name="delete_images[]" value="{{ $img->id }}"
                    style="width:16px;height:16px;accent-color:#dc2626">
                </label>
              </div>
              @endforeach
            </div>
          </div>
        </div>
        @endif

        {{-- Add new images --}}
        <div class="card">
          <div class="card-hd"><span class="card-hd-t">Tambah Foto Baru</span></div>
          <div class="card-bd">
            <label class="fz">
              <input type="file" name="images[]" accept="image/*" multiple data-preview="imgPreview">
              <div class="fz-ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg></div>
              <p class="fz-t"><strong>Klik atau seret</strong> untuk menambah foto</p>
              <p class="fz-t" style="font-size:.72rem;margin-top:.25rem">Maks. 4 MB/foto</p>
            </label>
            <div class="fz-preview" id="imgPreview"></div>
          </div>
        </div>

        {{-- SEO --}}
        <div class="card">
          <div class="card-hd"><span class="card-hd-t">SEO</span></div>
          <div class="card-bd">
            <div class="fg-2" style="gap:1.25rem">
              <div class="fg-full">
                <label class="lbl">Meta Title</label>
                <input type="text" name="meta_title" class="fi"
                  value="{{ old('meta_title', $product->meta_title) }}" maxlength="255">
              </div>
              <div class="fg-full">
                <label class="lbl">Meta Description</label>
                <textarea name="meta_description" class="ft" style="min-height:72px" maxlength="500">{{ old('meta_description', $product->meta_description) }}</textarea>
              </div>
            </div>
          </div>
        </div>
      </div>

      {{-- Right --}}
      <div style="display:flex;flex-direction:column;gap:1.25rem">
        <div class="card">
          <div class="card-hd"><span class="card-hd-t">Harga</span></div>
          <div class="card-bd" style="display:flex;flex-direction:column;gap:1rem">
            <div>
              <label class="lbl">Harga (Rp)</label>
              <input type="number" name="price" class="fi @error('price') err @enderror"
                value="{{ old('price', $product->price) }}" min="0" step="1000">
              @error('price')<p class="f-err">{{ $message }}</p>@enderror
            </div>
            <div>
              <label class="lbl">Label Harga Kustom</label>
              <input type="text" name="price_label" class="fi"
                value="{{ old('price_label', $product->price_label) }}" placeholder="cth. Mulai Rp 1.500.000">
              <p class="f-hint">Kosongkan untuk format angka otomatis</p>
            </div>
          </div>
        </div>

        <div class="card">
          <div class="card-hd"><span class="card-hd-t">Status & Tampilan</span></div>
          <div class="card-bd" style="display:flex;flex-direction:column;gap:.875rem">
            <label class="f-chk">
              <input type="hidden" name="is_published" value="0">
              <input type="checkbox" name="is_published" value="1" {{ old('is_published', $product->is_published) ? 'checked' : '' }}>
              <span class="f-chk-lbl">Publikasikan produk</span>
            </label>
            <label class="f-chk">
              <input type="hidden" name="is_available" value="0">
              <input type="checkbox" name="is_available" value="1" {{ old('is_available', $product->is_available) ? 'checked' : '' }}>
              <span class="f-chk-lbl">Produk tersedia</span>
            </label>
            <label class="f-chk">
              <input type="hidden" name="is_featured" value="0">
              <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $product->is_featured) ? 'checked' : '' }}>
              <span class="f-chk-lbl">Produk Unggulan</span>
            </label>
          </div>
        </div>

        <div class="card">
          <div class="card-hd"><span class="card-hd-t">Detail</span></div>
          <div class="card-bd" style="display:flex;flex-direction:column;gap:1rem">
            <div>
              <label class="lbl">Badge</label>
              <input type="text" name="badge" class="fi"
                value="{{ old('badge', $product->badge) }}" maxlength="50" placeholder="cth. Baru, Terlaris">
            </div>
            <div>
              <label class="lbl">Urutan Tampil</label>
              <input type="number" name="sort_order" class="fi"
                value="{{ old('sort_order', $product->sort_order) }}" min="0">
            </div>
          </div>
        </div>

        <button type="submit" class="btn btn-p" style="justify-content:center;width:100%">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 21H5a2 2 0 01-2-2V5a2 2 0 012-2h11l5 5v11a2 2 0 01-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/><polyline points="7 3 7 8 15 8"/></svg>
          Simpan Perubahan
        </button>
        <a href="{{ route('products.index') }}" class="btn btn-s" style="justify-content:center;width:100%">Batal</a>
        <button type="button" class="btn btn-d btn-sm" style="width:100%;justify-content:center;margin-top:.25rem"
          onclick="openDlg('{{ route('products.destroy', $product) }}', 'Hapus produk &quot;{{ addslashes($product->name) }}&quot; secara permanen?')">
          Hapus Produk
        </button>
      </div>
    </div>
  </form>
</div>

<style>
@media(max-width:768px){form>div[style*="grid-template-columns:1fr 340px"]{grid-template-columns:1fr!important}}
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
let matIndex = {{ $existingMats->count() }};

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
      <button type="button" class="btn btn-d btn-xs" onclick="removeMaterial(this,null)">Hapus</button>
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

function removeMaterial(btn, matId) {
  if (matId) {
    // Existing material — add to delete list
    const delInput = document.createElement('input');
    delInput.type = 'hidden';
    delInput.name = 'delete_materials[]';
    delInput.value = matId;
    document.querySelector('form').appendChild(delInput);
  }
  btn.closest('.mat-row').remove();
  checkMatEmpty();
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
