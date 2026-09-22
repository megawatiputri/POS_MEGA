@csrf

<div class="row g-4">

    {{-- FORM --}}
    <div class="col-lg-8">

        {{-- FOTO PRODUK --}}
        <div class="mb-3">
            <label class="form-label fw-semibold">
                Foto Produk
            </label>

            <input
                type="file"
                name="foto"
                class="form-control @error('foto') is-invalid @enderror"
                onchange="previewImage(this)">

            @error('foto')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>


        {{-- NAMA PRODUK --}}
        <div class="mb-3">
            <label class="form-label fw-semibold">
                Nama Produk
            </label>

            <input
                type="text"
                name="name"
                class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name', $produk->nama ?? '') }}"
                placeholder="Contoh : Chocolate Cake">

            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>


        {{-- DESKRIPSI --}}
        <div class="mb-3">
            <label class="form-label fw-semibold">
                📝 Deskripsi Produk
            </label>

            <textarea
                name="deskripsi"
                class="form-control @error('deskripsi') is-invalid @enderror"
                rows="4"
                placeholder="Contoh: Cake lembut dengan krim cokelat yang creamy dan rasa manis yang pas.">{{ old('deskripsi', $produk->deskripsi ?? '') }}</textarea>

            @error('deskripsi')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

            <small class="text-muted">
                Jelaskan rasa, bahan, tekstur, atau keunikan produk.
            </small>
        </div>


        {{-- HARGA --}}
        <div class="row">

            {{-- HARGA POKOK --}}
            <div class="col-md-6 mb-3">

                <label class="form-label fw-semibold">
                    Harga Pokok
                </label>

                <div class="input-group">

                    <span class="input-group-text">
                        Rp
                    </span>

                    <input
                        type="number"
                        name="purchase_price"
                        id="purchase_price"
                        class="form-control @error('purchase_price') is-invalid @enderror"
                        value="{{ old('purchase_price', $produk->harga_beli ?? '') }}"
                        placeholder="Masukkan harga pokok"
                        min="0"
                        oninput="hitungHargaJual()">

                </div>

                @error('purchase_price')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            {{-- HARGA JUAL --}}
            <div class="col-md-6 mb-3">

                <label class="form-label fw-semibold">
                    Harga Jual
                    <small class="text-muted">(Otomatis +30%)</small>
                </label>

                <div class="input-group">

                    <span class="input-group-text">
                        Rp
                    </span>

                    <input
                        type="number"
                        name="selling_price"
                        id="selling_price"
                        class="form-control @error('selling_price') is-invalid @enderror"
                        value="{{ old('selling_price', $produk->harga_jual ?? '') }}"
                        placeholder="Otomatis"
                        readonly>

                </div>

                <small class="text-muted">
                    Harga jual otomatis dihitung dari harga pokok + 30%.
                </small>

                @error('selling_price')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                @enderror

            </div>

        </div>


        {{-- STOK --}}
        <div class="mb-4">

            <label class="form-label fw-semibold">
                Stok
            </label>

            <input
                type="number"
                name="stock"
                class="form-control @error('stock') is-invalid @enderror"
                value="{{ old('stock', $produk->stok ?? '') }}"
                placeholder="Jumlah stok">

            @error('stock')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

        </div>


        {{-- TOMBOL --}}
        <button class="btn btn-primary px-4">
            Simpan
        </button>

        <a
            href="{{ route('produk.index') }}"
            class="btn btn-outline-secondary px-4">

            Kembali

        </a>

    </div>


    {{-- PREVIEW FOTO --}}
    <div class="col-lg-4">

        <div class="card shadow-sm rounded-4">

            <div class="card-body text-center">

                <h5 class="fw-bold mb-3">
                    Preview Foto
                </h5>

                @if(!empty($produk->foto))

                    <img
                        id="preview"
                        src="{{ asset('storage/'.$produk->foto) }}"
                        class="img-fluid rounded-3 border"
                        style="max-height:260px;object-fit:cover;">

                @else

                    <img
                        id="preview"
                        class="img-fluid rounded-3 border"
                        style="display:none;max-height:260px;object-fit:cover;">

                    <div
                        id="placeholder"
                        class="text-muted py-5">

                        📷

                        <br><br>

                        Preview foto akan muncul di sini.

                    </div>

                @endif

            </div>

        </div>

    </div>

</div>


<script>

// ==========================================
// HITUNG HARGA JUAL OTOMATIS +30%
// ==========================================
function hitungHargaJual() {

    const hargaPokok = document.getElementById('purchase_price').value;
    const hargaJual = document.getElementById('selling_price');

    if (hargaPokok && hargaPokok > 0) {

        // Harga pokok + 30%
        const hasil = Math.round(Number(hargaPokok) * 1.30);

        hargaJual.value = hasil;

    } else {

        hargaJual.value = '';

    }
}


// ==========================================
// PREVIEW FOTO
// ==========================================
function previewImage(input) {

    const file = input.files[0];

    const preview = document.getElementById('preview');

    const placeholder = document.getElementById('placeholder');

    if (file) {

        preview.src = URL.createObjectURL(file);

        preview.style.display = 'block';

        if (placeholder) {
            placeholder.style.display = 'none';
        }

    }

}


// ==========================================
// HITUNG SAAT HALAMAN EDIT DIBUKA
// ==========================================
document.addEventListener('DOMContentLoaded', function () {

    const hargaPokok = document.getElementById('purchase_price');

    if (hargaPokok && hargaPokok.value) {
        hitungHargaJual();
    }

});

</script>