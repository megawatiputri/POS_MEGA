@extends('layouts.app')

@section('title', 'Produk')

@section('content')

<div class="container py-4">

    <!-- Header -->
    <div class="p-4 rounded-4 shadow-sm mb-4" style="background: linear-gradient(135deg,#ffd6e0,#fff3e6);">

        <div class="d-flex justify-content-between align-items-center flex-wrap">

            <div>
                <h2 class="fw-bold mb-1">
                    🎂 Sweet Cake Bakery
                </h2>

                <p class="text-muted mb-0">
                    Kelola seluruh produk cake dengan mudah.
                </p>
            </div>

            @can('create', App\Models\Produk::class)

            <a href="{{ route('produk.create') }}"
                class="btn btn-success rounded-pill px-4">

                 Tambah Produk

            </a>

            @endcan

        </div>

    </div>

    <!-- Search -->

    <form action="{{ route('produk.index') }}" method="GET">

        <div class="input-group shadow-sm mb-4">

            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                class="form-control"
                placeholder="Cari nama cake...">

            <button class="btn btn-outline-danger">

                 Cari

            </button>

        </div>

    </form>

    <!-- Daftar Produk -->

    <div class="row g-4">

    @forelse($products as $product)

        <div class="col-lg-4 col-md-6">

            <div class="card border-0 shadow h-100 rounded-4">

    <!-- FOTO -->

    @if($product->foto)

<img
    src="{{ asset('storage/'.$product->foto) }}"
    class="card-img-top"
    style="height:230px; object-fit:cover;">

@else

<img
    src="https://placehold.co/600x400/f8d7da/6c757d?text=No+Image"
    class="card-img-top"
    style="height:230px; object-fit:cover;">

@endif


<div class="card-body">

    <h4 class="fw-bold">

         {{ $product->nama }}

    </h4>

    <p class="text-muted mb-2">

        Dibuat oleh :
        <strong>{{ $product->user->name }}</strong>

    </p>

    <hr>

    <h5 class="text-danger fw-bold">

        Rp {{ number_format($product->harga_jual,0,',','.') }}

    </h5>

    <small class="text-muted">

        Harga Beli :
        Rp {{ number_format($product->harga_beli,0,',','.') }}

    </small>

    <br><br>

    @if($product->stok > 10)

        <span class="badge bg-success fs-6">

             Stok Aman :
            {{ $product->stok }}

        </span>

    @elseif($product->stok > 0)

        <span class="badge bg-warning text-dark fs-6">

            ⚠ Stok Menipis :
            {{ $product->stok }}

        </span>

    @else

        <span class="badge bg-danger fs-6">

             Habis

        </span>

    @endif

    <hr>

    <div class="d-grid gap-2">

      @can('update', $product)
<a href="{{ route('produk.show', $product) }}"
    class="btn btn-info text-white rounded-pill">
     Detail
</a>
@endcan

@can('update', $product)
<a href="{{ route('produk.edit', $product) }}"
    class="btn btn-warning rounded-pill">
     Edit
</a>
@endcan

@can('delete', $product)
<form action="{{ route('produk.destroy', $product) }}"
      method="POST">

    @csrf
    @method('DELETE')

    <button
        type="submit"
        class="btn btn-danger rounded-pill w-100"
        onclick="return confirm('Yakin ingin menghapus produk ini?')">
         Hapus

    </button>

</form>
@endcan

    </div>

</div>

</div>

</div>

@empty

<div class="col-12">

    <div class="alert alert-warning text-center shadow-sm">

        <h4>🍰 Produk Belum Tersedia</h4>

        <p class="mb-0">
            Silakan tambahkan produk cake terlebih dahulu.
        </p>

    </div>

</div>

@endforelse

</div>

<div class="d-flex justify-content-center mt-5">

    {{ $products->links() }}

</div>

</div>

@endsection
               