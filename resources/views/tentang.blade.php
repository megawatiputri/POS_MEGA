@extends('layouts.app')

@section('title', 'Tentang Saya')

@section('content')

<div class="container py-4">

    {{-- Header --}}
    <div class="text-center mb-4">
        <h2 class="fw-bold mb-1">Tentang Saya</h2>
        <p class="text-muted">
            Profil pengembang dan informasi aplikasi Sweet Cake Bakery
        </p>
    </div>

    <div class="row g-4">

        {{-- Profil Pengembang --}}
        <div class="col-lg-5">

            <div class="bg-white rounded-4 shadow-sm p-4 text-center h-100">

                {{-- Foto --}}
                <div class="mb-3">
                    <div
                        class="mx-auto rounded-circle overflow-hidden shadow-sm"
                        style="width:150px;height:150px;background:#ffe8ef;"
                    >
                        <img
                            src="{{ asset('images/cake.jpg') }}"
                            alt="Sweet Cake Bakery"
                            style="width:100%;height:100%;object-fit:cover;"
                        >
                    </div>
                </div>

                <h3 class="fw-bold mb-1">
                    Mega wati putri
                </h3>

                <p class="text-muted mb-3">
                    Pengembang Aplikasi
                </p>

                <div class="mb-3">
                    <span class="badge rounded-pill px-3 py-2"
                          style="background:#ffe4ec;color:#c95f82;">
                        PPLG / RPL
                    </span>
                </div>

                <hr>

                <p class="text-muted mb-0">
                    Saya merupakan pengembang dari aplikasi
                    <strong>Sweet Cake Bakery</strong>.
                    Aplikasi ini dibuat sebagai project untuk membantu
                    proses pengelolaan produk dan transaksi penjualan cake.
                </p>

            </div>

        </div>


        {{-- Informasi Pengembang --}}
        <div class="col-lg-7">

            <div class="bg-white rounded-4 shadow-sm p-4 mb-4">

                <h4 class="fw-bold mb-3">
                    Informasi Pengembang
                </h4>

                <div class="mb-3">
                    <small class="text-muted">Nama</small>
                    <div class="fw-semibold">
                        Mega wati putri
                    </div>
                </div>

                <div class="mb-3">
                    <small class="text-muted">Bidang</small>
                    <div class="fw-semibold">
                        Pengembangan Website
                    </div>
                </div>

                <div>
                    <small class="text-muted">Project</small>
                    <div class="fw-semibold">
                        Sweet Cake Bakery - POS
                    </div>
                </div>

            </div>


            {{-- Teknologi yang Digunakan --}}
            <div class="bg-white rounded-4 shadow-sm p-4 mb-4">

                <h4 class="fw-bold mb-3">
                    Teknologi yang Digunakan
                </h4>

                <div class="text-muted">

                    <p class="mb-2">
                        <strong>Bahasa Pemrograman :</strong>
                        PHP, JavaScript
                    </p>

                    <p class="mb-2">
                        <strong>Framework :</strong>
                        Laravel
                    </p>

                    <p class="mb-2">
                        <strong>Frontend :</strong>
                        HTML, CSS, Bootstrap
                    </p>

                    <p class="mb-2">
                        <strong>Database :</strong>
                        MySQL
                    </p>

                    <p class="mb-0">
                        <strong>Tools :</strong>
                        Visual Studio Code, Git
                    </p>

                </div>

            </div>

        </div>


        {{-- Tentang Aplikasi --}}
        <div class="col-12">

            <div class="bg-white rounded-4 shadow-sm p-4">

                <h4 class="fw-bold mb-3">
                    Tentang Aplikasi
                </h4>

                <p class="text-muted mb-2">
                    <strong>Sweet Cake Bakery</strong> merupakan aplikasi
                    Point of Sale (POS) yang dibuat untuk membantu proses
                    pengelolaan toko cake.
                </p>

                <p class="text-muted mb-2">
                    Aplikasi ini menyediakan beberapa fitur seperti
                    pengelolaan produk, stok, pengguna, kasir, dan
                    transaksi penjualan.
                </p>

                <p class="text-muted mb-0">
                    Dengan adanya aplikasi ini, proses pencatatan
                    produk dan transaksi diharapkan menjadi lebih
                    mudah, teratur, dan efisien.
                </p>

            </div>

        </div>

    </div>

</div>

@endsection