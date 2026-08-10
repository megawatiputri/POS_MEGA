@extends('layouts.app')

@section('title', 'Tambah Produk')

@section('content')

<div class="container py-4">

    <div class="card shadow-sm border-0 rounded-4">

        <div class="card-body p-4">

            <h3 class="fw-bold mb-1">
                🍰 Tambah Produk
            </h3>

            <p class="text-muted mb-4">
                Tambahkan produk baru ke katalog Sweet Cake Bakery.
            </p>

            <form action="{{ route('produk.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @include('produk._form')

            </form>

        </div>

    </div>

</div>

@endsection