@extends('layouts.app')

@section('title', 'Request Custom Cake')

@section('content')

<div class="container py-4">

    <div class="p-4 rounded-4 shadow-sm mb-4"
         style="background:linear-gradient(135deg,#ffd6e0,#fff3e6);">

        <h2 class="fw-bold mb-1">🎂 Request Custom Cake</h2>

        <p class="text-muted mb-0">
            Buat cake sesuai keinginan kamu di Sweet Cake Bakery.
        </p>

    </div>

    @if(session('success'))
        <div class="alert alert-success rounded-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-body p-4">

            <h4 class="fw-bold mb-4">
                ✨ Form Custom Cake
            </h4>

            <form action="{{ route('custom-cake.store') }}" method="POST">
                @csrf

                <div class="row g-3">

                    {{-- Nama Pembeli --}}
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">
                            Nama Pembeli
                        </label>

                        <input type="text"
                               name="nama_pembeli"
                               class="form-control rounded-3"
                               placeholder="Masukkan nama pembeli"
                               required>
                    </div>

                    {{-- No HP --}}
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">
                            No. HP
                        </label>

                        <input type="text"
                               name="no_hp"
                               class="form-control rounded-3"
                               placeholder="08xxxxxxxxxx"
                               required>
                    </div>

                    {{-- Jenis Cake --}}
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">
                            Jenis Cake
                        </label>

                        <select name="jenis_cake"
                                class="form-select rounded-3"
                                required>

                            <option value="">
                                Pilih jenis cake
                            </option>

                            <option value="Birthday Cake">
                                Birthday Cake
                            </option>

                            <option value="Wedding Cake">
                                Wedding Cake
                            </option>

                            <option value="Cupcake">
                                Cupcake
                            </option>

                            <option value="Brownies">
                                Brownies
                            </option>

                            <option value="Custom">
                                Custom
                            </option>

                        </select>
                    </div>

                    {{-- Rasa --}}
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">
                            Rasa
                        </label>

                        <select name="rasa"
                                class="form-select rounded-3"
                                required>

                            <option value="">
                                Pilih rasa
                            </option>

                            <option value="Cokelat">
                                Cokelat
                            </option>

                            <option value="Vanila">
                                Vanila
                            </option>

                            <option value="Strawberry">
                                Strawberry
                            </option>

                            <option value="Red Velvet">
                                Red Velvet
                            </option>

                            <option value="Tiramisu">
                                Tiramisu
                            </option>

                        </select>
                    </div>

                    {{-- Ukuran --}}
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">
                            Ukuran Cake
                        </label>

                        <select name="ukuran"
                                class="form-select rounded-3"
                                required>

                            <option value="">
                                Pilih ukuran
                            </option>

                            <option value="Small">
                                Small
                            </option>

                            <option value="Medium">
                                Medium
                            </option>

                            <option value="Large">
                                Large
                            </option>

                        </select>
                    </div>

                    {{-- Tanggal --}}
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">
                            Tanggal Dibutuhkan
                        </label>

                        <input type="date"
                               name="tanggal_dibutuhkan"
                               class="form-control rounded-3"
                               required>
                    </div>

                    {{-- Desain --}}
                    <div class="col-12">
                        <label class="form-label fw-semibold">
                             Desain / Tema Cake
                        </label>

                        <textarea name="desain"
                                  class="form-control rounded-3"
                                  rows="3"
                                  placeholder="Contoh: tema pink, bunga, karakter, minimalis, dll."></textarea>
                    </div>

                    {{-- Tulisan --}}
                    <div class="col-12">
                        <label class="form-label fw-semibold">
                             Tulisan di Atas Cake
                        </label>

                        <input type="text"
                               name="tulisan"
                               class="form-control rounded-3"
                               placeholder="Contoh: Happy Birthday Aisyah">
                    </div>

                    {{-- Catatan --}}
                    <div class="col-12">
                        <label class="form-label fw-semibold">
                             Catatan Tambahan
                        </label>

                        <textarea name="catatan"
                                  class="form-control rounded-3"
                                  rows="3"
                                  placeholder="Tuliskan permintaan tambahan..."></textarea>
                    </div>

                    {{-- Kartu Ucapan --}}
                    <div class="col-12 mt-4">

                        <div class="p-4 rounded-4"
                             style="background:#fff8f3; border:1px solid #ffd6e0;">

                            <h5 class="fw-bold mb-2">
                                💌 Kartu Ucapan
                            </h5>

                            <p class="text-muted small mb-4">
                                Kartu ucapan bersifat opsional. Isi jika ingin
                                menambahkan kartu ucapan untuk penerima cake.
                            </p>

                            <div class="row g-3">

                                {{-- Nama Penerima --}}
                                <div class="col-md-6">

                                    <label class="form-label fw-semibold">
                                        Nama Penerima
                                    </label>

                                    <input type="text"
                                           name="nama_penerima"
                                           class="form-control rounded-3"
                                           placeholder="Contoh: Aisyah">

                                </div>

                                {{-- Tema Kartu --}}
                                <div class="col-md-6">

                                    <label class="form-label fw-semibold">
                                         Tema Kartu
                                    </label>

                                    <select name="tema"
                                            class="form-select rounded-3">

                                        <option value="">
                                            Pilih tema
                                        </option>

                                        <option value="Birthday">
                                             Birthday
                                        </option>

                                        <option value="Anniversary">
                                             Anniversary
                                        </option>

                                        <option value="Wedding">
                                             Wedding
                                        </option>

                                        <option value="Graduation">
                                             Graduation
                                        </option>

                                        <option value="Thank You">
                                             Thank You
                                        </option>

                                        <option value="Other">
                                             Lainnya
                                        </option>

                                    </select>

                                </div>

                                {{-- Isi Ucapan --}}
                                <div class="col-12">

                                    <label class="form-label fw-semibold">
                                         Isi Ucapan
                                    </label>

                                    <textarea name="isi_ucapan"
                                              class="form-control rounded-3"
                                              rows="4"
                                              placeholder="Contoh: Selamat ulang tahun! Semoga selalu bahagia dan sukses."></textarea>

                                </div>

                                {{-- Catatan Kartu --}}
                                <div class="col-12">

                                    <label class="form-label fw-semibold">
                                         Catatan Kartu
                                    </label>

                                    <textarea name="catatan_kartu"
                                              class="form-control rounded-3"
                                              rows="2"
                                              placeholder="Contoh: Tolong gunakan tulisan warna pink."></textarea>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                {{-- Tombol --}}
                <div class="mt-4">

                    <button type="submit"
                            class="btn btn-success rounded-pill px-4">

                        <i class="bi bi-send me-1"></i>
                        Kirim Request

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection