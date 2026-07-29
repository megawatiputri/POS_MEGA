@extends('layouts.app')

@section('title', 'POS')

@section('content')

@if(session('errors'))
        <div class="alert alert-danger">
            {{ session('errors') }}
        </div>
    @endif

    <div class="banner mb-4">
    <div class="d-flex justify-content-between align-items-center">

        <div>
            <h2 class="fw-bold mb-1">
                🍰 Kasir Sweet Cake Bakery
            </h2>

            <p class="text-muted mb-0">
                Tambahkan produk cake ke keranjang belanja.
            </p>
        </div>

        <div>
            <span class="badge bg-danger fs-6">
                Status :
                {{ $sale->status }}
            </span>
        </div>

    </div>
</div>

<h4 class="mb-3">Tambah dan Edit</h4>

<div class="row">

    {{-- ===== PRODUK ===== --}}
        <div class="col-md-6">
        <div class="card shadow-lg border-0 rounded-4">
            <div class="card-header bg-white border-0 pt-4">
                <h4 class="fw-bold text-danger mb-0">
                    🍰 Daftar Produk Cake
                </h4>
                <small class="text-muted">
                    Pilih produk yang ingin dibeli pelanggan
                </small>
            </div>

            <div class="card-body p-4" style="max-height:70vh; overflow:auto">

                <div class="mb-3">
                    <form method="GET" action="{{ route('penjualan.create') }}">
                        <input
                            type="text"
                            name="search"
                            value="{{ request('search') }}"
                            class="form-control"
                            placeholder="Cari produk..."
                            onkeyup="this.form.submit()">
                    </form>
                </div>

                @foreach ($products as $product)
                    <form method="POST"
                          action="{{ route('itempenjualan.store') }}"
                          class="row mb-2">
                        @csrf

                        <input type="hidden" name="product_id" value="{{ $product->id }}">

                        <div class="col-8">
                            <button
                                type="submit"
                                class="btn btn-light border shadow-sm rounded-4 w-100 text-start p-3 {{ $sale->status === 'COMPLETED' ? 'disabled' : '' }}"
                                {{ $sale->status === 'COMPLETED' ? 'disabled' : '' }}>
                                <div class="d-flex align-items-center gap-2">

                                    @if($product->foto)

                                        <img src="{{ asset('storage/'.$product->foto) }}"
                                            class="rounded-4"
                                            style="width:70px;height:70px;object-fit:cover;">

                                        @else

                                        <div class="bg-light rounded-4 d-flex align-items-center justify-content-center"
                                            style="width:70px;height:70px;">

                                        🍰

                                        </div>

                                    @endif
                                    <div>
                                       <div class="fw-bold">
                                            {{ $product->nama }}
                                        </div>

                                        <div class="text-success fw-semibold">
                                             Rp {{ number_format($product->harga_jual,0,',','.') }}
                                        </div>

                                        <small class="text-secondary">
                                             Stok : {{ $product->stok }}
                                        </small>
                                    </div>

                                </div>
                            </button>
                        </div>

                        <div class="col-2">
                            <input type="number"
                                   name="quantity"
                                   value="1"
                                   min="1"
                                   class="form-control"
                                   {{ $sale->status === 'COMPLETED' ? 'readonly' : '' }}>
                        </div>

                        <div class="col-2 d-flex align-items-center">
                            <button
                                type="submit"
                                class="btn btn-primary rounded-circle {{ $sale->status === 'COMPLETED' ? 'disabled' : '' }}"
                                style="width:45px; height:45px;"
                                {{ $sale->status === 'COMPLETED' ? 'disabled' : '' }}>
                                <i class="bi bi-plus-lg"></i>
                            </button>
                        </div>
                    </form>
                @endforeach

            </div>
        </div>
    </div>

    {{-- ===== KERANJANG ===== --}}
    <div class="col-md-6">
    <div class="card shadow-lg border-0 rounded-4">

        <div class="card-header bg-white border-0 pt-4">
            <h4 class="fw-bold text-success mb-0">
                🛒 Keranjang Belanja
            </h4>
            <small class="text-muted">
                Daftar produk yang dipilih pelanggan
            </small>
        </div>
            <table class="table table-bordered mb-0">
                <thead>
                    <tr>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Qty</th>
                        <th>Subtotal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse ($sale->itempenjualan as $item)
                        <tr>
                            <td>{{ $item->produk->nama }}</td>
                            <td>Rp.{{ number_format($item->produk->harga_jual) }}</td>
                            <td>
                                <form method="POST" action="{{ route('itempenjualan.update', $item->id) }}">
                                    @csrf @method('PUT')
                                    <input type="number"
                                           name="quantity"
                                           value="{{ $item->kuantitas }}"
                                           class="form-control form-control-sm">
                                </form>
                            </td>
                            <td>Rp {{ number_format($item->subtotal) }}</td>
                            <td>
                                @can('delete', $item)
                                <form method="POST" action="{{ route('itempenjualan.destroy', $item->id) }}">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                                @endcan
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">
                                Keranjang kosong
                            </td>
                        </tr>
                    @endforelse

                </tbody>
            </table>

            <div class="card-footer">

                 <div class="text-center mb-3">

                        <h6 class="text-muted">
                            Total Pembayaran
                        </h6>

                        <h2 class="fw-bold text-success">
                            Rp {{ number_format($sale->total_pembayaran,0,',','.') }}
                        </h2>

                 </div>

                <form method="POST" 
                        action="{{ route('penjualan.update', $sale->id) }}"
                        onsubmit="return confirm('Yakin ingin checkout?')" class="mt-2">
                    @csrf
                    @method('PUT')
                    <select name="payment_method" class="form-select mb-2">
                        <option value="">Pilih Pembayaran</option>
                        <option value="CASH">CASH</option>
                        <option value="QRIS">QRIS</option>
                    </select>

                    <button class="btn btn-success btn-lg rounded-pill w-100 shadow">
                             Checkout Sekarang
                    </button>
                </form>
                @can('delete', $sale)
                <form action="{{ route('penjualan.destroy', $sale->id) }}"
                    method="POST" 
                        onsubmit="return confirm('Yakin ingin membatalkan transaksi?')">
                            @csrf
                            @method('DELETE')

                        <button class="btn btn-outline-danger rounded-pill w-100 mt-2">
                                Batalkan Transaksi
                        </button>
                </form>
                @endcan

            </div>
        </div>
    </div>

</div>

@endsection
