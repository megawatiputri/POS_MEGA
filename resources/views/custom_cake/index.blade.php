@extends('layouts.app')

@section('title', 'Request Custom Cake')

@section('content')

<div class="container py-4">

    <div class="p-4 rounded-4 shadow-sm mb-4"
         style="background:linear-gradient(135deg,#ffd6e0,#fff3e6);">

        <h2 class="fw-bold mb-1">
            🎂 Request Custom Cake
        </h2>

        <p class="text-muted mb-0">
            Daftar permintaan custom cake dari pembeli.
        </p>

        <a href="{{ route('custom-cake.create') }}"
            class="btn btn-success rounded-pill mt-3">
                <i class="bi bi-plus-circle me-1"></i>
                Buat Request Custom Cake
        </a>

    </div>

    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-body p-4">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Pembeli</th>
                            <th>No. HP</th>
                            <th>Jenis Cake</th>
                            <th>Rasa</th>
                            <th>Ukuran</th>
                            <th>Tanggal Dibutuhkan</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($customCakes as $cake)

                            <tr>

                                <td>
                                    {{ $loop->iteration }}
                                </td>

                                <td class="fw-semibold">
                                    {{ $cake->nama_pembeli }}
                                </td>

                                <td>
                                    {{ $cake->no_hp }}
                                </td>

                                <td>
                                    {{ $cake->jenis_cake }}
                                </td>

                                <td>
                                    {{ $cake->rasa }}
                                </td>

                                <td>
                                    {{ $cake->ukuran }}
                                </td>

                                <td>
                                    {{ \Carbon\Carbon::parse($cake->tanggal_dibutuhkan)->format('d-m-Y') }}
                                </td>

                                <td>
                                    <span class="badge rounded-pill bg-warning text-dark">
                                        {{ $cake->status }}
                                    </span>
                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="8" class="text-center text-muted py-4">
                                    Belum ada request custom cake.
                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection