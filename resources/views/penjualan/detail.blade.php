
@extends('layouts.app')

@section('title', 'Detail Penjualan')

@section('content')

<div class="container py-4">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-1">
                <i class="bi bi-receipt-cutoff me-2"></i>
                Detail Penjualan
            </h3>
            <p class="text-muted mb-0">
                Informasi lengkap transaksi penjualan
            </p>
        </div>

        <a href="{{ url()->previous() }}" class="btn btn-outline-secondary rounded-pill px-4">
            <i class="bi bi-arrow-left me-1"></i>
            Kembali
        </a>
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
                            <small class="text-muted d-block">Kasir</small>
                            <strong>{{ $sale->user->name }}</strong>
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
                            <small class="text-muted d-block">Tanggal Transaksi</small>
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
                            <small class="text-muted d-block">Total Pembayaran</small>
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
                            <th width="60">No</th>
                            <th width="100">Produk</th>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Subtotal</th>
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
                                    <img
                                        src="{{ asset('storage/' . $item->produk->foto) }}"
                                        alt="{{ $item->produk->nama }}"
                                    >
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

        </div>
    </div>

</div>


<style>

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

