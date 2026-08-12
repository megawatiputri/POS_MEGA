@extends('layouts.app')

@section('title', 'Produk')

@section('content')

<style>
    .product-page {
        max-width: 1200px;
        margin: auto;
    }

    .bakery-header {
        background: #fff1f2;
        border: 1px solid #f8dfe3;
        border-radius: 18px;
        padding: 22px 26px;
        margin-bottom: 22px;
    }

    .bakery-header h2 {
        color: #3b3032;
        font-weight: 700;
        margin-bottom: 4px;
    }

    .bakery-header p {
        color: #8a777b;
        margin: 0;
    }

    .btn-add {
        background: #e99aaa;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 25px;
        font-weight: 500;
    }

    .btn-add:hover {
        background: #df8799;
        color: white;
    }

    .search-box {
        border: 1px solid #eadfe1;
        border-radius: 25px;
        overflow: hidden;
        background: white;
        margin-bottom: 25px;
    }

    .search-box input {
        border: none;
        box-shadow: none !important;
        padding-left: 18px;
    }

    .search-box button {
        border: none;
        background: #f9e4e7;
        color: #a85c6c;
        padding: 0 22px;
    }

    .product-card {
        background: #ffffff;
        border: 1px solid #eee4e5;
        border-radius: 18px;
        overflow: hidden;
        height: 100%;
        transition: 0.2s ease;
    }

    .product-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(80, 50, 55, 0.10);
    }

    .product-image {
        width: 100%;
        height: 235px;
        object-fit: cover;
        display: block;
    }

    .product-body {
        padding: 18px;
    }

    .product-name {
        color: #30282a;
        font-size: 21px;
        font-weight: 700;
        margin-bottom: 5px;
    }

    .product-owner {
        color: #8b7b7f;
        font-size: 14px;
        margin-bottom: 15px;
    }

    .product-price {
        color: #c95f72;
        font-size: 21px;
        font-weight: 700;
        margin-bottom: 3px;
    }

    .product-buy-price {
        color: #9b8c90;
        font-size: 13px;
    }

    .stock {
        display: inline-block;
        margin-top: 14px;
        padding: 5px 11px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
    }

    .stock-safe {
        background: #edf7f1;
        color: #4f8b68;
    }

    .stock-low {
        background: #fff5df;
        color: #a87b32;
    }

    .stock-empty {
        background: #fcebed;
        color: #b85b68;
    }

    .product-footer {
        border-top: 1px solid #eee6e7;
        margin-top: 17px;
        padding-top: 14px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .btn-detail {
        background: #f6e4e7;
        color: #a85c6c;
        border: none;
        border-radius: 20px;
        padding: 7px 18px;
        font-size: 13px;
        font-weight: 600;
    }

    .btn-detail:hover {
        background: #efd2d7;
        color: #914b5a;
    }

    .product-actions {
        display: flex;
        gap: 12px;
        align-items: center;
    }

    .action-link {
        text-decoration: none;
        font-size: 13px;
        color: #8d7d81;
    }

    .action-link:hover {
        color: #b85c6d;
    }

    .delete-link {
        background: none;
        border: none;
        padding: 0;
        color: #a88f94;
        font-size: 13px;
    }

    .delete-link:hover {
        color: #c65d6d;
    }

    .empty-product {
        background: #fff;
        border: 1px solid #eee3e5;
        border-radius: 18px;
        padding: 45px 20px;
        text-align: center;
        color: #8c7d81;
    }
</style>

<div class="product-page">

    {{-- HEADER --}}
    <div class="bakery-header">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">

            <div>
                <h2>🎂 Sweet Cake Bakery</h2>
                <p>Koleksi cake yang tersedia di toko.</p>
            </div>

            @can('create', App\Models\Produk::class)
                <a href="{{ route('produk.create') }}" class="btn btn-add">
                    Tambah Produk
                </a>
            @endcan

        </div>
    </div>


    {{-- SEARCH --}}
    <form action="{{ route('produk.index') }}" method="GET">
        <div class="input-group search-box">

            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                class="form-control"
                placeholder="Cari nama cake...">

            <button type="submit">
                Cari
            </button>

        </div>
    </form>


    {{-- PRODUK --}}
    <div class="row g-4">

        @forelse($products as $product)

            <div class="col-lg-4 col-md-6">

                <div class="product-card">

                    {{-- FOTO --}}
                    @if($product->foto)

                        <img
                            src="{{ asset('storage/'.$product->foto) }}"
                            class="product-image"
                            alt="{{ $product->nama }}">

                    @else

                        <img
                            src="https://placehold.co/600x400/f8e8eb/8b6f75?text=Sweet+Cake"
                            class="product-image"
                            alt="No Image">

                    @endif


                    {{-- INFORMASI --}}
                    <div class="product-body">

                        <div class="product-name">
                            {{ $product->nama }}
                        </div>

                        <div class="product-owner">
                            Dibuat oleh
                            <strong>{{ $product->user->name }}</strong>
                        </div>


                        <div class="product-price">
                            Rp {{ number_format($product->harga_jual, 0, ',', '.') }}
                        </div>


                        {{-- STOK --}}
                        @if($product->stok > 10)

                            <span class="stock stock-safe">
                                Stok tersedia · {{ $product->stok }}
                            </span>

                        @elseif($product->stok > 0)

                            <span class="stock stock-low">
                                Stok menipis · {{ $product->stok }}
                            </span>

                        @else

                            <span class="stock stock-empty">
                                Stok habis
                            </span>

                        @endif


                        {{-- AKSI --}}
                        <div class="product-footer">

                            @can('view', $product)

                                <a
                                    href="{{ route('produk.show', $product) }}"
                                    class="btn-detail">
                                    Lihat
                                </a>

                            @endcan


                            <div class="product-actions">

                                @can('update', $product)

                                    <a
                                        href="{{ route('produk.edit', $product) }}"
                                        class="action-link">
                                        Edit
                                    </a>

                                @endcan


                                @can('delete', $product)

                                    <form
                                        action="{{ route('produk.destroy', $product) }}"
                                        method="POST"
                                        class="d-inline">

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="delete-link"
                                            onclick="return confirm('Yakin ingin menghapus produk ini?')">
                                            Hapus
                                        </button>

                                    </form>

                                @endcan

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        @empty

            <div class="col-12">

                <div class="empty-product">

                    <div style="font-size: 42px;">
                        🍰
                    </div>

                    <h5 class="mt-3">
                        Belum ada produk cake
                    </h5>

                    <p class="mb-0">
                        Tambahkan produk untuk mulai mengelola koleksi cake.
                    </p>

                </div>

            </div>

        @endforelse

    </div>


    {{-- PAGINATION --}}
    <div class="d-flex justify-content-center mt-4">

        {{ $products->links() }}

    </div>

</div>

@endsection