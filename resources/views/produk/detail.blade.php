@extends('layouts.app')

@section('title', 'Detail Produk')

@section('content')

<div class="container py-5">

    {{-- Tombol kembali --}}
    <div class="mb-4">
        <a href="{{ route('produk.index') }}"
           class="text-decoration-none"
           style="color:#d85c7a;">
        </a>
    </div>

    <div class="row align-items-center g-5">

        {{-- FOTO CAKE --}}
        <div class="col-lg-6">

            <div class="rounded-4 overflow-hidden shadow-sm"
                 style="background:#fff;">

                @if($produk->foto)

                    <img src="{{ asset('storage/' . $produk->foto) }}"
                         alt="{{ $produk->nama }}"
                         class="w-100"
                         style="height:430px; object-fit:cover;">

                @else

                    <img src="https://placehold.co/800x600/fdf0f3/9b5969?text=Sweet+Cake"
                         alt="Tidak ada foto"
                         class="w-100"
                         style="height:430px; object-fit:cover;">

                @endif

            </div>

        </div>


        {{-- INFORMASI CAKE --}}
        <div class="col-lg-6">

            <p class="text-uppercase mb-2"
               style="
                    color:#d85c7a;
                    font-size:14px;
                    font-weight:600;
                    letter-spacing:2px;
               ">
                Sweet Cake Bakery
            </p>

            <h1 class="fw-bold mb-3"
                style="color:#2f2930;">
                {{ $produk->nama }}
            </h1>

            <p class="text-muted mb-4">
                Cake pilihan Sweet Cake Bakery untuk menemani
                berbagai momen spesial.
            </p>

            <hr>

            {{-- HARGA --}}
            <div class="mb-4">

                <small class="text-muted">
                    Harga Jual
                </small>

                <h2 class="fw-bold mt-1"
                    style="color:#d85c7a;">
                    Rp {{ number_format($produk->harga_jual, 0, ',', '.') }}
                </h2>

            </div>


            {{-- STOK --}}
            <div class="mb-4">

                <small class="text-muted d-block mb-2">
                    Ketersediaan Produk
                </small>

                @if($produk->stok > 10)

                    <span class="badge rounded-pill px-3 py-2"
                          style="
                              background:#e7f7ef;
                              color:#27845a;
                              font-size:14px;
                          ">
                        <i class="bi bi-check-circle-fill"></i>
                        Stok tersedia · {{ $produk->stok }} unit
                    </span>

                @elseif($produk->stok > 0)

                    <span class="badge rounded-pill px-3 py-2"
                          style="
                              background:#fff4dc;
                              color:#b77900;
                              font-size:14px;
                          ">
                        <i class="bi bi-exclamation-circle-fill"></i>
                        Stok menipis · {{ $produk->stok }} unit
                    </span>

                @else

                    <span class="badge rounded-pill px-3 py-2"
                          style="
                              background:#fde8e8;
                              color:#c94b4b;
                              font-size:14px;
                          ">
                        <i class="bi bi-x-circle-fill"></i>
                        Produk habis
                    </span>

                @endif

            </div>


            {{-- PENGINPUT --}}
            <div class="mb-4">

                <small class="text-muted d-block">
                    Produk ditambahkan oleh
                </small>

                <div class="fw-semibold mt-1">

                    <i class="bi bi-person-circle me-1"
                       style="color:#d85c7a;"></i>

                    {{ $produk->user->name }}

                </div>

            </div>


            {{-- TOMBOL --}}
            <div class="d-flex gap-2 mt-4">

                @can('update', $produk)

                    <a href="{{ route('produk.edit', $produk) }}"
                       class="btn rounded-pill px-4"
                       style="
                            background:#f7c6d5;
                            color:#8f4056;
                            border:none;
                       ">
                        Edit Produk
                    </a>

                @endcan

                <a href="{{ route('produk.index') }}"
                   class="btn rounded-pill px-4"
                   style="
                        background:#f8f4f5;
                        color:#555;
                        border:1px solid #eadde1;
                   ">
                    Kembali
                </a>

            </div>

        </div>

    </div>

</div>

@endsection