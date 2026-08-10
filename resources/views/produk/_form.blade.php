@csrf

<div class="row g-4">

    {{-- FORM --}}
    <div class="col-lg-8">

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

        <div class="row">

            <div class="col-md-6 mb-3">

                <label class="form-label fw-semibold">
                    Harga Beli
                </label>

                <div class="input-group">

                    <span class="input-group-text">
                        Rp
                    </span>

                    <input
                        type="number"
                        name="purchase_price"
                        class="form-control @error('purchase_price') is-invalid @enderror"
                        value="{{ old('purchase_price', $produk->harga_beli ?? '') }}">

                </div>

                @error('purchase_price')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            <div class="col-md-6 mb-3">

                <label class="form-label fw-semibold">
                    Harga Jual
                </label>

                <div class="input-group">

                    <span class="input-group-text">
                        Rp
                    </span>

                    <input
                        type="number"
                        name="selling_price"
                        class="form-control @error('selling_price') is-invalid @enderror"
                        value="{{ old('selling_price', $produk->harga_jual ?? '') }}">

                </div>

                @error('selling_price')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                @enderror

            </div>

        </div>

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

        <button class="btn btn-primary px-4">
             Simpan
        </button>

        <a href="{{ route('produk.index') }}"
           class="btn btn-outline-secondary px-4">
            Kembali
        </a>

    </div>

    {{-- PREVIEW --}}
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

                    <div id="placeholder" class="text-muted py-5">

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
function previewImage(input){

    const file=input.files[0];

    const preview=document.getElementById('preview');

    const placeholder=document.getElementById('placeholder');

    if(file){

        preview.src=URL.createObjectURL(file);

        preview.style.display='block';

        if(placeholder){
            placeholder.style.display='none';
        }

    }

}
</script>