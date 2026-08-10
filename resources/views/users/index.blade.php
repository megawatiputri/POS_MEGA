@extends('layouts.app')

@section('title', 'Pengguna')

@section('content')

<div class="container py-4">

    <!-- Header -->
    <div class="card border-0 shadow-sm rounded-4 mb-4">

        <div class="card-body d-flex justify-content-between align-items-center">

            <div>

                <h2 class="fw-bold mb-1">
                    👥 Manajemen Pengguna
                </h2>

                <p class="text-muted mb-0">
                    Kelola akun Admin dan Kasir Sweet Cake Bakery.
                </p>

            </div>

            <a href="{{ route('admin.users.create') }}"
               class="btn btn-lg text-white"
               style="background:#f472b6;border:none;border-radius:12px;">
                 Tambah pengguna
            </a>

        </div>

    </div>

    <!-- Search -->
    <div class="card border-0 shadow-sm rounded-4 mb-4">

        <div class="card-body">

            <form action="{{ route('admin.users') }}" method="GET">

                <div class="input-group">

                    <input
                        type="text"
                        name="search"
                        class="form-control rounded-start-pill"
                        placeholder=" Cari nama atau email..."
                        value="{{ request('search') }}">

                    <button
                        class="btn btn-outline-secondary rounded-end-pill"
                        type="submit">

                        Cari

                    </button>

                </div>

            </form>

        </div>

    </div>

    <!-- Table -->
    <div class="card border-0 shadow-sm rounded-4">

        <div class="table-responsive">

            <table class="table align-middle mb-0">

                <thead style="background:#ffe4ec;">

                <tr>

                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th class="text-center">Aksi</th>

                </tr>

                </thead>

                <tbody>

                @forelse($users as $user)

                <tr>

                    <td>{{ $users->firstItem() + $loop->index }}</td>

                    <td class="fw-semibold">
                        {{ $user->name }}
                    </td>

                    <td>{{ $user->email }}</td>

                    <td>

                        @if($user->role->name == 'admin')

                            <span class="badge bg-danger rounded-pill px-3">
                                Admin
                            </span>

                        @else

                            <span class="badge bg-primary rounded-pill px-3">
                                Kasir
                            </span>

                        @endif

                    </td>

                    <td class="text-center">

                        <a href="{{ route('admin.users.edit',$user) }}"
                           class="btn btn-warning btn-sm rounded-pill px-3">

                            Edit

                        </a>

                        <form action="{{ route('admin.users.destroy',$user) }}"
                              method="POST"
                              class="d-inline">

                            @csrf
                            @method('DELETE')

                            <button
                                class="btn btn-danger btn-sm rounded-pill px-3"
                                onclick="return confirm('Yakin ingin menghapus user ini?')">

                                Hapus

                            </button>

                        </form>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="5" class="text-center text-muted py-4">

                        Belum ada data pengguna.

                    </td>

                </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

    <div class="mt-3">

        {{ $users->links() }}

    </div>

</div>

@endsection