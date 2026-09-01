@extends('layouts.app')

@section('title', 'Detail Penjualan')

@section('content')

<div class="container py-4">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4 no-print">

        <div>
            <h3 class="fw-bold mb-1">
                <i class="bi bi-receipt-cutoff me-2"></i>
                Detail Penjualan
            </h3>

            <p class="text-muted mb-0">
                Informasi lengkap transaksi penjualan
            </p>
        </div>

        <div class="d-flex gap-2">

            {{-- Tombol Kembali --}}
            <a href="{{ url()->previous() }}"
               class="btn btn-outline-secondary rounded-pill px-4">
                <i class="bi bi-arrow-left me-1"></i>
                Kembali
            </a>

            {{-- Tombol Cetak --}}
            <button type="button"
                    onclick="window.print()"
                    class="btn btn-print rounded-pill px-4">
                <i class="bi bi-printer me-1"></i>
                Cetak
            </button>

        </div>

    </div>


    {{-- Area yang akan dicetak --}}
    <div id="print-area">

        {{-- Judul khusus saat print --}}
        <div class="print-header">
            <h2>🎂 Sweet Cake Bakery</h2>
            <p>Detail Transaksi Penjualan</p>
            <hr>
        </div>


        {{-- Informasi Transaksi --}}
        <div class="card border-0 shadow-sm rounded-4 mb-4">

            <div class="card-body p-4">

                <div class="row g-4">

                    {{-- Kasir --}}
                    <div class="col-md-4">

                        <div class="d-flex align-items-center">

                            <div class="icon-box me-3">
                                <i class="bi bi-person"></i>
                            </div>

                            <div>
                                <small class="text-muted d-block">
                                    Kasir
                                </small>

                                <strong>
                                    {{ $sale->user->name }}
                                </strong>
                            </div>

                        </div>

                    </div>


                    {{-- Tanggal --}}
                    <div class="col-md-4">

                        <div class="d-flex align-items-center">

                            <div class="icon-box me-3">
                                <i class="bi bi-calendar3"></i>
                            </div>

                            <div>
                                <small class="text-muted d-block">
                                    Tanggal Transaksi
                                </small>

                                <strong>
                                    {{ $sale->created_at->translatedFormat('d F Y, H:i') }}
                                </strong>
                            </div>

                        </div>

                    </div>


                    {{-- Total --}}
                    <div class="col-md-4">

                        <div class="d-flex align-items-center">

                            <div class="icon-box me-3">
                                <i class="bi bi-cash-stack"></i>
                            </div>

                            <div>
                                <small class="text-muted d-block">
                                    Total Pembayaran
                                </small>

                                <strong class="text-success fs-5">
                                    Rp {{ number_format($sale->total_pembayaran, 0, ',', '.') }}
                                </strong>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- Daftar Produk --}}
        <div class="card border-0 shadow-sm rounded-4">

            <div class="card-header bg-white border-0 p-4 pb-2">

                <h5 class="fw-bold mb-1">
                    <i class="bi bi-cake2 me-2"></i>
                    Produk yang Dibeli
                </h5>

                <small class="text-muted">
                    Daftar produk dalam transaksi ini
                </small>

            </div>


            <div class="card-body p-4">

                <div class="table-responsive">

                    <table class="table align-middle mb-0">

                        <thead>

                            <tr class="text-muted">

                                <th width="60">
                                    No
                                </th>

                                <th width="100">
                                    Produk
                                </th>

                                <th>
                                    Nama Produk
                                </th>

                                <th>
                                    Harga
                                </th>

                                <th>
                                    Jumlah
                                </th>

                                <th>
                                    Subtotal
                                </th>

                            </tr>

                        </thead>


                        <tbody>

                            @foreach($sale->itempenjualan as $item)

                            <tr>

                                {{-- Nomor --}}
                                <td class="fw-semibold">
                                    {{ $loop->iteration }}
                                </td>


                                {{-- Foto --}}
                                <td>

                                    <div class="product-image">

                                        @if($item->produk->foto)

                                            <img
                                                src="{{ asset('storage/' . $item->produk->foto) }}"
                                                alt="{{ $item->produk->nama }}"
                                            >

                                        @else

                                            <div class="no-image">
                                                🎂
                                            </div>

                                        @endif

                                    </div>

                                </td>


                                {{-- Nama --}}
                                <td>

                                    <span class="fw-semibold">
                                        {{ $item->produk->nama }}
                                    </span>

                                </td>


                                {{-- Harga --}}
                                <td>
                                    Rp {{ number_format($item->harga_satuan, 0, ',', '.') }}
                                </td>


                                {{-- Jumlah --}}
                                <td>

                                    <span class="badge bg-light text-dark px-3 py-2 rounded-pill">
                                        {{ $item->kuantitas }} pcs
                                    </span>

                                </td>


                                {{-- Subtotal --}}
                                <td>

                                    <strong>
                                        Rp {{ number_format($item->subtotal, 0, ',', '.') }}
                                    </strong>

                                </td>

                            </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>


                {{-- Total --}}
                <div class="total-box mt-4">

                    <div>

                        <small class="text-muted">
                            Total Pembayaran
                        </small>

                        <h4 class="fw-bold mb-0">
                            Rp {{ number_format($sale->total_pembayaran, 0, ',', '.') }}
                        </h4>

                    </div>


                    <div class="total-icon">
                        <i class="bi bi-check-circle-fill"></i>
                    </div>

                </div>


                {{-- Footer Print --}}
                <div class="print-footer">

                    <hr>

                    <p>
                        Terima kasih telah berbelanja di
                        <strong>Sweet Cake Bakery</strong> 🍰
                    </p>

                    <small>
                        Semoga harimu menyenangkan!
                    </small>

                </div>

            </div>

        </div>

    </div>

</div>


<style>

    /* =========================
       TOMBOL CETAK
    ========================= */

    .btn-print {
        background: #f472b6;
        color: white;
        border: none;
    }

    .btn-print:hover {
        background: #ec4899;
        color: white;
    }


    /* =========================
       ICON
    ========================= */

    .icon-box {
        width: 45px;
        height: 45px;
        border-radius: 14px;
        background: #fff0f3;
        color: #e87592;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
    }


    /* =========================
       FOTO PRODUK
    ========================= */

    .product-image {
        width: 70px;
        height: 70px;
        border-radius: 15px;
        overflow: hidden;
        background: #fff5f7;
    }

    .product-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .no-image {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 30px;
    }


    /* =========================
       TABLE
    ========================= */

    .table thead th {
        border-bottom: 1px solid #eee;
        font-size: 14px;
        font-weight: 600;
        padding-bottom: 15px;
    }

    .table tbody td {
        border-bottom: 1px solid #f1f1f1;
        padding: 18px 10px;
    }

    .table tbody tr:last-child td {
        border-bottom: none;
    }


    /* =========================
       TOTAL
    ========================= */

    .total-box {
        background: #fff7f8;
        border-radius: 18px;
        padding: 20px 24px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        border: 1px solid #ffe3e8;
    }

    .total-box h4 {
        color: #e87592;
    }

    .total-icon {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background: #e87592;
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 22px;
    }


    /* =========================
       HEADER PRINT
    ========================= */

    .print-header {
        display: none;
        text-align: center;
    }

    .print-header h2 {
        font-weight: bold;
        margin-bottom: 5px;
    }

    .print-header p {
        margin-bottom: 10px;
    }


    .print-footer {
        display: none;
        text-align: center;
    }


    /* =========================
       PRINT
    ========================= */

    @media print {

        @page {
            size: A4;
            margin: 15mm;
        }

        body {
            background: white !important;
        }

        /* Sembunyikan navbar */
        nav,
        .navbar {
            display: none !important;
        }

        /* Sembunyikan tombol */
        .no-print {
            display: none !important;
        }

        /* Tampilkan header print */
        .print-header {
            display: block;
        }

        /* Tampilkan footer print */
        .print-footer {
            display: block;
        }

        /* Hilangkan shadow */
        .shadow,
        .shadow-sm {
            box-shadow: none !important;
        }

        /* Card jadi lebih sederhana */
        .card {
            border: 1px solid #ddd !important;
            box-shadow: none !important;
        }

        /* Hilangkan padding berlebihan */
        .container {
            max-width: 100% !important;
            width: 100% !important;
            padding: 0 !important;
        }

        /* Jangan potong tabel */
        table {
            page-break-inside: auto;
        }

        tr {
            page-break-inside: avoid;
            page-break-after: auto;
        }

        /* Warna teks saat print */
        h1,
        h2,
        h3,
        h4,
        h5,
        p,
        span,
        td,
        th,
        strong,
        small {
            color: #000 !important;
        }

        /* Total tetap terlihat */
        .total-box {
            background: #fff !important;
            border: 1px solid #ddd !important;
        }

        .total-icon {
            background: #eee !important;
            color: #000 !important;
        }

        /* Badge jumlah */
        .badge {
            border: 1px solid #ddd !important;
            background: white !important;
            color: #000 !important;
        }

        /* Ukuran foto */
        .product-image {
            width: 55px;
            height: 55px;
        }

    }


    /* =========================
       MOBILE
    ========================= */

    @media (max-width: 768px) {

        .table {
            min-width: 800px;
        }

        .card-body {
            padding: 20px !important;
        }

    }

</style>

@endsection