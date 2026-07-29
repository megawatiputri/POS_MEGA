@extends('layouts.app')

@section('title', 'Penjualan')

@section('content')

@if(session('errors'))
        <div class="alert alert-danger">
          {{ session('errors') }}
        </div>
    @endif

<div class="p-4 rounded-4 shadow-sm mb-4"
style="background:linear-gradient(135deg,#ffd6e0,#fff3e6);">

    <div class="d-flex justify-content-between align-items-center">

        <div>

            <h2 class="fw-bold">
                🛒 Data Penjualan Cake
            </h2>

            <p class="text-muted mb-0">
                Kelola seluruh transaksi Sweet Cake Bakery.
            </p>

        </div>

        <a href="{{ route('penjualan.create') }}"
           class="btn btn-success rounded-pill">

             Tambah Penjualan

        </a>

    </div>

</div>

<form action="{{ route('penjualan.index') }}" method="GET" class="mb-4">
    <div class="input-group">
        <input
         type="text"
         name="search"
         value="{{ request('search') }}"
         class="form-control"
         placeholder="Cari transaksi..."
        <button class="btn btn-outline-danger" type="submit">
             Cari
        </button>
    </div>
</form>

<table class="table table-hover align-middle">
  <thead class="table-danger">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Tanggal Transaksi</th>
      <th scope="col">Kasir</th>
      <th scope="col">Total Pembayaran</th>
      <th scope="col">Metode Pembayaran</th>
      <th scope="col">Status</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    @forelse($sales as $sale)
    <tr>
      <th scope="row">{{$sales->firstItem() + $loop->index}}</th>
      <td>{{$sale->created_at->translatedFormat('d-m-Y H:i:s')}}</td>
      <td>{{$sale->user->name}}</td>
      <td class="fw-bold text-success">
          Rp {{ number_format($sale->total_pembayaran,0,',','.') }}
      </td>
      <td>
        @if($sale->metode_pembayaran == 'CASH')

          <span class="badge bg-success">
              Cash
          </span>

          @elseif($sale->metode_pembayaran == 'TRANSFER')

          <span class="badge bg-primary">
              Transfer
          </span>

          @else

           <span class="badge bg-warning text-dark">
            QRIS
          </span>

        @endif

      </td>
      <td>
        @if($sale->status == 'OPEN')

           <span class="badge bg-warning text-dark">
            OPEN
           </span>

          @else

           <span class="badge bg-success">
            COMPLETED
           </span>

        @endif
      </td>
      <td>
        <div class="d-flex flex-wrap gap-2">

            <a href="{{ route('penjualan.show', $sale) }}"
              class="btn btn-primary btn-sm rounded-pill">
                Detail
            </a>

            @can('view', $sale)
            <a href="{{ route('penjualan.edit', $sale) }}"
              class="btn btn-warning btn-sm rounded-pill">
                Edit
            </a>
            @endcan

            @can('delete', $sale)
            <form action="{{ route('penjualan.destroy', $sale) }}"
                  method="POST"
                  class="d-inline">

                @csrf
                @method('DELETE')

                <button
                    class="btn btn-danger btn-sm rounded-pill"
                    onclick="return confirm('Apakah anda yakin akan menghapus penjualan ini?')">

                    Hapus

                </button>

            </form>
            @endcan

        </div>
      </td>
    </tr>
    @empty
    <tr>
        <td collspan="6">Data Tidak Ditemukan</td>
    </tr>
    @endforelse
  </tbody>
</table>
{{$sales->links()}}
@endsection
