@extends('layouts.app')

@section('title', 'Penjualan')

@section('content')

<style>
    .sales-header {
        background: linear-gradient(135deg, #ffdce5, #fff4e8);
        border-radius: 22px;
        padding: 25px 30px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.06);
    }

    .sales-search {
        background: white;
        padding: 8px;
        border-radius: 18px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.05);
    }

    .sales-table-wrapper {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0,0,0,0.06);
    }

    .sales-table {
        margin-bottom: 0;
    }

    .sales-table thead th {
        background: #fff0f3;
        color: #4d3b3b;
        font-size: 14px;
        font-weight: 600;
        padding: 16px 14px;
        border-bottom: 1px solid #f2dfe3;
        white-space: nowrap;
    }

    .sales-table tbody td,
    .sales-table tbody th {
        padding: 17px 14px;
        border-bottom: 1px solid #f5eeee;
        vertical-align: middle;
        color: #514545;
    }

    .sales-table tbody tr {
        transition: 0.2s ease;
    }

    .sales-table tbody tr:hover {
        background: #fffaf9;
    }

    .transaction-number {
        color: #9b8585;
        font-size: 13px;
    }

    .cashier {
        font-weight: 600;
        color: #493b3b;
    }

    .total-price {
        color: #b8665c;
        font-size: 16px;
        font-weight: 700;
    }

    .date-text {
        font-size: 14px;
        color: #4e4141;
    }

    .time-text {
        font-size: 12px;
        color: #a29393;
    }

    /* Badge pastel */
    .badge-soft {
        display: inline-block;
        padding: 7px 13px;
        border-radius: 50px;
        font-size: 12px;
        font-weight: 600;
    }

    .badge-cash {
        background: #e8f4ec;
        color: #4d8b67;
    }

    .badge-transfer {
        background: #edf1f8;
        color: #647797;
    }

    .badge-qris {
        background: #fff3dc;
        color: #a27a35;
    }

    .badge-completed {
        background: #e8f4ec;
        color: #4d8b67;
    }

    .badge-open {
        background: #fff3dc;
        color: #a27a35;
    }

    /* Tombol dibuat soft */
    .btn-detail {
        background: #f8dce4;
        color: #a9576c;
        border: none;
        border-radius: 50px;
        padding: 7px 16px;
        font-size: 13px;
    }

    .btn-detail:hover {
        background: #f3cbd6;
        color: #944d60;
    }

    .btn-edit {
        background: #fff0d5;
        color: #9a7434;
        border: none;
        border-radius: 50px;
        padding: 7px 16px;
        font-size: 13px;
    }

    .btn-edit:hover {
        background: #ffe7bd;
        color: #88662b;
    }

    .btn-delete {
        background: #f7e3e3;
        color: #b66a6a;
        border: none;
        border-radius: 50px;
        padding: 7px 16px;
        font-size: 13px;
    }

    .btn-delete:hover {
        background: #f1d2d2;
        color: #a85b5b;
    }

    .empty-box {
        padding: 60px 20px;
    }
</style>


@if(session('errors'))
    <div class="alert alert-danger rounded-4 shadow-sm">
        {{ session('errors') }}
    </div>
@endif


<div class="container-fluid py-4">

    {{-- HEADER --}}
    <div class="sales-header mb-4">

        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">

            <div>

                <h2 class="fw-bold mb-1">
                     Penjualan Cake
                </h2>

                <p class="text-muted mb-0">
                    Catatan transaksi Sweet Cake Bakery.
                </p>

            </div>

            <a href="{{ route('penjualan.create') }}"
               class="btn text-white rounded-pill px-4 py-2"
               style="background:#f18aaa;">

                 Transaksi Baru

            </a>

        </div>

    </div>


    {{-- SEARCH --}}
    <form action="{{ route('penjualan.index') }}"
          method="GET"
          class="sales-search mb-4">

        <div class="input-group">

            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                class="form-control border-0 shadow-none"
                placeholder="Cari transaksi atau nama kasir...">

            <button
                type="submit"
                class="btn rounded-pill px-4"
                style="background:#f8dce4;color:#a9576c;">

                <i class="bi bi-search"></i>
                Cari

            </button>

        </div>

    </form>


    {{-- TABEL PENJUALAN --}}
    <div class="sales-table-wrapper">

        <div class="table-responsive">

            <table class="table sales-table align-middle">

                <thead>

                    <tr>

                        <th width="60">
                            #
                        </th>

                        <th>
                            Tanggal Transaksi
                        </th>

                        <th>
                            Kasir
                        </th>

                        <th>
                            Total Pembayaran
                        </th>

                        <th>
                            Pembayaran
                        </th>

                        <th>
                            Status
                        </th>

                        <th class="text-center">
                            Aksi
                        </th>

                    </tr>

                </thead>


                <tbody>

                    @forelse($sales as $sale)

                    <tr>

                        {{-- NOMOR --}}
                        <th class="transaction-number">

                            {{ $sales->firstItem() + $loop->index }}

                        </th>


                        {{-- TANGGAL --}}
                        <td>

                            <div class="date-text">

                                {{ $sale->created_at->translatedFormat('d M Y') }}

                            </div>

                            <div class="time-text">

                                {{ $sale->created_at->format('H:i') }}

                            </div>

                        </td>


                        {{-- KASIR --}}
                        <td>

                            <span class="cashier">

                                {{ $sale->user->name }}

                            </span>

                        </td>


                        {{-- TOTAL --}}
                        <td>

                            <span class="total-price">

                                Rp {{ number_format($sale->total_pembayaran,0,',','.') }}

                            </span>

                        </td>


                        {{-- METODE PEMBAYARAN --}}
                        <td>

                            @if($sale->metode_pembayaran == 'CASH')

                                <span class="badge-soft badge-cash">
                                    Cash
                                </span>

                            @elseif($sale->metode_pembayaran == 'TRANSFER')

                                <span class="badge-soft badge-transfer">
                                    Transfer
                                </span>

                            @else

                                <span class="badge-soft badge-qris">
                                    QRIS
                                </span>

                            @endif

                        </td>


                        {{-- STATUS --}}
                        <td>

                            @if($sale->status == 'OPEN')

                                <span class="badge-soft badge-open">
                                    Belum Selesai
                                </span>

                            @else

                                <span class="badge-soft badge-completed">
                                    Selesai
                                </span>

                            @endif

                        </td>


                        {{-- AKSI --}}
                        <td>

                            <div class="d-flex justify-content-center gap-2 flex-wrap">

                                {{-- DETAIL --}}
                                <a href="{{ route('penjualan.show', $sale) }}"
                                   class="btn btn-detail">

                                    <i class="bi bi-receipt"></i>
                                    Detail

                                </a>


                                {{-- EDIT --}}
                                @can('view', $sale)

                                    <a href="{{ route('penjualan.edit', $sale) }}"
                                       class="btn btn-edit">

                                        <i class="bi bi-pencil"></i>
                                        Lanjutkan

                                    </a>

                                @endcan


                                {{-- HAPUS --}}
                                @can('delete', $sale)

                                    <form
                                        action="{{ route('penjualan.destroy', $sale) }}"
                                        method="POST"
                                        class="d-inline">

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="btn btn-delete"
                                            onclick="return confirm('Apakah anda yakin akan menghapus penjualan ini?')">

                                            <i class="bi bi-trash"></i>
                                            Hapus

                                        </button>

                                    </form>

                                @endcan

                            </div>

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="7">

                            <div class="empty-box text-center">

                                <div style="font-size:55px;">
                                    🍰
                                </div>

                                <h5 class="fw-bold mt-3">
                                    Belum ada transaksi
                                </h5>

                                <p class="text-muted mb-0">
                                    Data penjualan akan muncul di sini.
                                </p>

                            </div>

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>


    {{-- PAGINATION --}}
    <div class="d-flex justify-content-center mt-4">

        {{ $sales->links() }}

    </div>

</div>

@endsection