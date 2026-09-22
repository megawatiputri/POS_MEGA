@extends('layouts.app')

@section('title', 'Kartu Ucapan')

@section('content')

<div class="container py-4">

    {{-- Header --}}
    <div class="p-4 rounded-4 shadow-sm mb-4"
         style="background:linear-gradient(135deg,#ffd6e0,#fff3e6);">

        <h2 class="fw-bold mb-1">
            💌 Kartu Ucapan
        </h2>

        <p class="text-muted mb-0">
            Buat kartu ucapan untuk melengkapi pesanan Sweet Cake Bakery.
        </p>

    </div>

    {{-- Pesan berhasil --}}
    @if(session('success'))
        <div class="alert alert-success rounded-4">
            {{ session('success') }}
        </div>
    @endif

    {{-- Form --}}
    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-body p-4">

            <h4 class="fw-bold mb-4">
                ✨ Buat Kartu Ucapan
            </h4>

            <form action="{{ route('kartu-ucapan.store') }}" method="POST">
                @csrf

                <div class="row g-3">

                    {{-- Nama Penerima --}}
                    <div class="col-md-6">

                        <label class="form-label fw-semibold">
                            Nama Penerima
                        </label>

                        <input type="text"
                               name="nama_penerima"
                               class="form-control rounded-3"
                               placeholder="Masukkan nama penerima"
                               required>

                    </div>

                    {{-- Tema --}}
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
                                  rows="5"
                                  placeholder="Tuliskan ucapan untuk penerima..."
                                  required></textarea>

                    </div>

                    {{-- Catatan --}}
                    <div class="col-12">

                        <label class="form-label fw-semibold">
                             Catatan Tambahan
                        </label>

                        <textarea name="catatan"
                                  class="form-control rounded-3"
                                  rows="3"
                                  placeholder="Contoh: Tolong gunakan tulisan warna pink."></textarea>

                    </div>

                </div>

                <div class="mt-4">

                    <button type="submit"
                            class="btn btn-success rounded-pill px-4">

                        <i class="bi bi-envelope-heart me-1"></i>
                        Simpan Kartu Ucapan

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection