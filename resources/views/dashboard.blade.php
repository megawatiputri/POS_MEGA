@extends('layouts.app')

@section('title', 'Beranda')

@section('content')

<div class="container py-4">

    <!-- Banner -->
    <div class="p-5 mb-4 rounded-4 shadow" style="background:linear-gradient(135deg,#ffd6e0,#fff3e6);">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h1 class="fw-bold text-dark">🎂 Sweet Cake Bakery</h1>

                <p class="fs-5 text-secondary">
                    Selamat datang di Beranda Penjualan Cake
                </p>

                <small class="text-muted">
                    {{ $tanggalHariIni->translatedFormat('l, d F Y') }}
                </small>
            </div>
        </div>
    </div>

    @can('viewAny', App\Models\User::class)

    <h3 class="fw-bold mb-4">
         Ringkasan Penjualan Hari Ini
    </h3>

    <div class="row g-4">

        <div class="col-md-6">
            <div class="card border-0 shadow rounded-4 h-100">
                <div class="card-body text-center">

                    <h5 class="text-muted">
                         Total Penjualan
                    </h5>

                    <h2 class="fw-bold text-success">
                        Rp {{ number_format($ringkasan['total_penjualan']) }}
                    </h2>

                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card border-0 shadow rounded-4 h-100">
                <div class="card-body text-center">

                    <h5 class="text-muted">
                         Total Transaksi
                    </h5>

                    <h2 class="fw-bold text-primary">
                        {{ number_format($ringkasan['total_transaksi']) }}
                    </h2>

                </div>
            </div>
        </div>

    </div>

    <br>

    <h3 class="fw-bold mb-4">
         Metode Pembayaran
    </h3>

    <div class="row g-4">

        <div class="col-md-6">
            <div class="card border-0 shadow rounded-4">
                <div class="card-body text-center">

                    <h5 class="text-muted">
                         Pembayaran Tunai
                    </h5>

                    <h2 class="text-success fw-bold">
                        Rp {{ number_format($ringkasan['total_cash']) }}
                    </h2>

                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card border-0 shadow rounded-4">
                <div class="card-body text-center">

                    <h5 class="text-muted">
                         Pembayaran Non Tunai
                    </h5>

                    <h2 class="text-warning fw-bold">
                        Rp {{ number_format($ringkasan['total_non_tunai']) }}
                    </h2>

                </div>
            </div>
        </div>

    </div>

@endcan

<br>

<!-- =========================
     STATUS PERSEDIAAN PRODUK
========================== -->

<h3 class="fw-bold mb-4">
     Status Persediaan Produk
</h3>

<div class="row">

    <!-- Stok Rendah -->
    <div class="col-md-6">

        <div class="card shadow border-0 rounded-4 mb-4">

            <div class="card-header bg-warning text-dark fw-bold">
                 Produk Stok Rendah
            </div>

            <div class="card-body">

                <table class="table table-hover align-middle">

                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Nama Produk</th>
                            <th>Stok</th>
                        </tr>
                    </thead>

                    <tbody>

                    @forelse($produkStokRendah as $index => $produk)

                        <tr>
                            <td>{{ $produkStokRendah->firstItem()+$index }}</td>
                            <td>{{ $produk->nama }}</td>
                            <td>
                                <span class="badge bg-warning text-dark">
                                    {{ $produk->stok }}
                                </span>
                            </td>
                        </tr>

                    @empty

                        <tr>
                            <td colspan="3" class="text-center text-muted">
                                Semua stok masih aman 
                            </td>
                        </tr>

                    @endforelse

                    </tbody>

                </table>

                {{ $produkStokRendah->links() }}

            </div>

        </div>

    </div>

    <!-- Stok Habis -->

    <div class="col-md-6">

        <div class="card shadow border-0 rounded-4 mb-4">

            <div class="card-header bg-danger text-white fw-bold">
                 Produk Habis
            </div>

            <div class="card-body">

                <table class="table table-hover align-middle">

                    <thead class="table-light">

                    <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Stok</th>
                    </tr>

                    </thead>

                    <tbody>

                    @forelse($produkStokHabis as $index => $produk)

                    <tr>

                        <td>{{ $produkStokHabis->firstItem()+$index }}</td>

                        <td>{{ $produk->nama }}</td>

                        <td>
                            <span class="badge bg-danger">
                                {{ $produk->stok }}
                            </span>
                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="3" class="text-center text-muted">
                            Tidak ada produk yang habis 
                        </td>

                    </tr>

                    @endforelse

                    </tbody>

                </table>

                {{ $produkStokHabis->links() }}

            </div>

        </div>

    </div>

</div>

<!-- =========================
        PRODUK TERLARIS
========================== -->

<h3 class="fw-bold mb-3">
     Produk Terlaris
</h3>

<div class="card shadow border-0 rounded-4">

    <div class="card-body">

        <table class="table table-hover align-middle">

            <thead class="table-light">

                <tr>
                    <th>Nama Produk</th>
                    <th>Stok</th>
                    <th>Terjual</th>
                </tr>

            </thead>

            <tbody>

            @forelse($produkTerlaris as $produk)

                <tr>

                    <td>🍰 {{ $produk->nama }}</td>

                    <td>{{ $produk->stok }}</td>

                    <td>

                        <span class="badge bg-success">
                            {{ $produk->total_terjual }}
                        </span>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="3" class="text-center text-muted">
                        Belum ada data produk terlaris.
                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

</div>

@endsection