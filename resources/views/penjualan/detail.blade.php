@extends('layouts.app')

@section('title', 'Detail Penjualan')

@section('content')

<div class="container py-4">

    {{-- HEADER --}}
    <div class="page-header">

        <div>
            <h2 class="fw-bold mb-1">
                <i class="bi bi-receipt-cutoff me-2"></i>
                Detail Penjualan
            </h2>

            <p class="text-muted mb-0">
                Informasi lengkap transaksi penjualan
            </p>
        </div>

        <div class="d-flex gap-2 no-print">

            <button onclick="window.print()"
                    class="btn btn-pink rounded-pill px-4">
                <i class="bi bi-printer me-1"></i>
                Print
            </button>

            <a href="{{ url()->previous() }}"
               class="btn btn-outline-secondary rounded-pill px-4">
                <i class="bi bi-arrow-left me-1"></i>
                Kembali
            </a>

        </div>

    </div>


    {{-- INFORMASI TRANSAKSI --}}
    <div class="transaction-info">

        <div class="info-item">

            <div class="icon-box">
                <i class="bi bi-person"></i>
            </div>

            <div>
                <small>Kasir</small>
                <strong>
                    {{ $sale->user->name }}
                </strong>
            </div>

        </div>


        <div class="info-item">

            <div class="icon-box">
                <i class="bi bi-calendar3"></i>
            </div>

            <div>
                <small>Tanggal Transaksi</small>
                <strong>
                    {{ $sale->created_at->translatedFormat('d F Y, H:i') }}
                </strong>
            </div>

        </div>


        <div class="info-item">

            <div class="icon-box">
                <i class="bi bi-cash-stack"></i>
            </div>

            <div>
                <small>Total Pembayaran</small>

                <strong class="total-text">
                    Rp {{ number_format($sale->total_pembayaran, 0, ',', '.') }}
                </strong>
            </div>

        </div>

    </div>


    {{-- PRODUK --}}
    <div class="product-section">

        <div class="section-header">

            <div>

                <h4 class="fw-bold mb-1">
                    <i class="bi bi-cake2 me-2"></i>
                    Produk yang Dibeli
                </h4>

                <p class="text-muted mb-0">
                    Daftar produk dalam transaksi ini
                </p>

            </div>

        </div>


        {{-- TABEL PRODUK --}}
        <div class="product-table-wrapper">

            <table class="product-table">

                <thead>

                    <tr>

                        <th>No</th>

                        <th>Produk</th>

                        <th>Nama Produk</th>

                        <th>Harga</th>

                        <th>Jumlah</th>

                        <th>Subtotal</th>

                    </tr>

                </thead>


                <tbody>

                    @foreach($sale->itempenjualan as $item)

                    <tr>

                        {{-- NOMOR --}}
                        <td class="number">
                            {{ $loop->iteration }}
                        </td>


                        {{-- FOTO --}}
                        <td>

                            <div class="product-image">

                                @if($item->produk->foto)

                                    <img
                                        src="{{ asset('storage/' . $item->produk->foto) }}"
                                        alt="{{ $item->produk->nama }}"
                                    >

                                @else

                                    <div class="no-image">
                                        🍰
                                    </div>

                                @endif

                            </div>

                        </td>


                        {{-- NAMA PRODUK --}}
                        <td>

                            <span class="product-name">
                                {{ $item->produk->nama }}
                            </span>

                        </td>


                        {{-- HARGA --}}
                        <td>

                            Rp {{ number_format($item->harga_satuan, 0, ',', '.') }}

                        </td>


                        {{-- JUMLAH --}}
                        <td>

                            <span class="quantity">

                                {{ $item->kuantitas }} pcs

                            </span>

                        </td>


                        {{-- SUBTOTAL --}}
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


        {{-- TOTAL --}}
        <div class="total-box">

            <div>

                <small>
                    Total Pembayaran
                </small>

                <h3>
                    Rp {{ number_format($sale->total_pembayaran, 0, ',', '.') }}
                </h3>

            </div>

            <div class="total-icon">

                <i class="bi bi-check-lg"></i>

            </div>

        </div>


        {{-- FOOTER --}}
        <div class="thank-you">

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


<style>

/* ============================= */
/* UMUM */
/* ============================= */

body {
    background: #fff9f6;
}

.page-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 25px;
}

.page-header h2 {
    color: #172033;
}

.btn-pink {
    background: #e87592;
    color: white;
    border: none;
}

.btn-pink:hover {
    background: #d95f7d;
    color: white;
}


/* ============================= */
/* INFORMASI TRANSAKSI */
/* ============================= */

.transaction-info {
    background: white;
    border-radius: 20px;
    padding: 25px;
    margin-bottom: 25px;

    display: grid;
    grid-template-columns: repeat(3, 1fr);

    gap: 25px;

    border: 1px solid #f1e5e7;

    box-shadow: 0 5px 20px rgba(0,0,0,0.05);
}

.info-item {
    display: flex;
    align-items: center;
    gap: 15px;
}

.icon-box {
    width: 48px;
    height: 48px;

    border-radius: 14px;

    background: #fff0f3;

    color: #e87592;

    display: flex;
    align-items: center;
    justify-content: center;

    font-size: 20px;

    flex-shrink: 0;
}

.info-item small {
    display: block;
    color: #777;
    margin-bottom: 3px;
}

.info-item strong {
    display: block;
    color: #172033;
}

.total-text {
    color: #168653 !important;
    font-size: 18px;
}


/* ============================= */
/* PRODUK */
/* ============================= */

.product-section {
    background: white;

    border-radius: 20px;

    padding: 25px;

    border: 1px solid #f1e5e7;

    box-shadow: 0 5px 20px rgba(0,0,0,0.05);
}

.section-header {
    margin-bottom: 20px;
}

.section-header h4 {
    color: #172033;
}


/* ============================= */
/* TABEL */
/* ============================= */

.product-table-wrapper {
    width: 100%;
    overflow: hidden;
}

.product-table {
    width: 100%;
    border-collapse: collapse;
    table-layout: fixed;
}

.product-table th {
    color: #333;

    font-size: 14px;

    font-weight: 600;

    text-align: left;

    padding: 15px 8px;

    border-bottom: 1px solid #eeeeee;
}

.product-table td {
    padding: 18px 8px;

    border-bottom: 1px solid #f1f1f1;

    vertical-align: middle;

    color: #222;

    font-size: 14px;
}

.product-table tr:last-child td {
    border-bottom: none;
}


/* LEBAR KOLOM */

.product-table th:nth-child(1),
.product-table td:nth-child(1) {
    width: 7%;
}

.product-table th:nth-child(2),
.product-table td:nth-child(2) {
    width: 13%;
}

.product-table th:nth-child(3),
.product-table td:nth-child(3) {
    width: 27%;
}

.product-table th:nth-child(4),
.product-table td:nth-child(4) {
    width: 20%;
}

.product-table th:nth-child(5),
.product-table td:nth-child(5) {
    width: 15%;
}

.product-table th:nth-child(6),
.product-table td:nth-child(6) {
    width: 18%;
}


/* ============================= */
/* FOTO PRODUK */
/* ============================= */

.product-image {
    width: 55px;
    height: 55px;

    border-radius: 14px;

    overflow: hidden;

    background: #fff5f7;

    display: flex;
    align-items: center;
    justify-content: center;
}

.product-image img {
    width: 100%;
    height: 100%;

    object-fit: cover;

    display: block;
}

.no-image {
    font-size: 25px;
}


/* ============================= */
/* NAMA PRODUK */
/* ============================= */

.product-name {
    font-weight: 600;
    color: #172033;
}


/* ============================= */
/* JUMLAH */
/* ============================= */

.quantity {
    display: inline-block;

    background: #f8f9fa;

    border-radius: 20px;

    padding: 7px 14px;

    font-weight: 600;

    white-space: nowrap;
}


/* ============================= */
/* TOTAL */
/* ============================= */

.total-box {
    margin-top: 25px;

    padding: 20px 25px;

    border-radius: 18px;

    background: #fff7f8;

    border: 1px solid #ffe3e8;

    display: flex;

    justify-content: space-between;

    align-items: center;
}

.total-box small {
    color: #777;
}

.total-box h3 {
    margin: 3px 0 0;

    color: #e87592;

    font-weight: 700;
}

.total-icon {
    width: 48px;
    height: 48px;

    border-radius: 50%;

    background: #e87592;

    color: white;

    display: flex;

    align-items: center;

    justify-content: center;

    font-size: 22px;
}


/* ============================= */
/* TERIMA KASIH */
/* ============================= */

.thank-you {
    text-align: center;

    margin-top: 25px;

    padding-top: 20px;

    border-top: 1px solid #eeeeee;

    color: #444;
}

.thank-you p {
    margin-bottom: 8px;
}

.thank-you strong {
    color: #172033;
}

.thank-you small {
    color: #777;
}


/* ============================= */
/* RESPONSIVE */
/* ============================= */

@media (max-width: 768px) {

    .page-header {
        align-items: flex-start;
        gap: 15px;
    }

    .transaction-info {
        grid-template-columns: 1fr;
    }

    .product-section {
        padding: 18px;
    }

    .product-table {
        table-layout: auto;
    }

    .product-table th,
    .product-table td {
        padding: 12px 5px;
        font-size: 12px;
    }

    .product-image {
        width: 48px;
        height: 48px;
    }

}


/* ============================= */
/* PRINT */
/* ============================= */

@media print {

    @page {
        size: A4;
        margin: 15mm;
    }

    body {
        background: white !important;
    }

    .no-print {
        display: none !important;
    }

    .container {
        max-width: 100% !important;
        width: 100% !important;
        padding: 0 !important;
    }

    .page-header {
        justify-content: center;
        text-align: center;
        border-bottom: 1px solid #ccc;
        padding-bottom: 15px;
    }

    .page-header h2 {
        font-size: 24px;
    }

    .page-header p {
        font-size: 14px;
    }

    .transaction-info,
    .product-section {
        box-shadow: none !important;
        border: 1px solid #ddd !important;
    }

    .transaction-info {
        grid-template-columns: repeat(3, 1fr);
    }

    .product-section {
        margin-top: 15px;
    }

    .product-table-wrapper {
        overflow: visible !important;
    }

    .product-table {
        width: 100% !important;
    }

    .product-image {
        width: 50px;
        height: 50px;
    }

    .thank-you {
        display: block;
    }

}

</style>

@endsection