@extends('layouts.app')

@section('title', 'Pengguna')

@section('content')

<style>
    .users-page {
        max-width: 1200px;
        margin: auto;
    }

    .users-header {
        background: linear-gradient(135deg, #ffe1e8, #fff3e8);
        border-radius: 20px;
        padding: 28px 32px;
        margin-bottom: 22px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.05);
    }

    .users-header h2 {
        color: #333;
        font-weight: 700;
        margin-bottom: 5px;
    }

    .users-header p {
        color: #777;
        margin: 0;
    }

    .btn-add-user {
        background: #f47aa9;
        color: white;
        border: none;
        border-radius: 12px;
        padding: 11px 20px;
        font-weight: 600;
    }

    .btn-add-user:hover {
        background: #e96899;
        color: white;
    }

    .search-box {
        background: white;
        padding: 18px;
        border-radius: 18px;
        margin-bottom: 22px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.05);
    }

    .search-box .form-control {
        border: 1px solid #eadfe2;
        border-radius: 12px 0 0 12px;
        padding: 11px 16px;
    }

    .search-box .btn {
        border: 1px solid #eadfe2;
        border-radius: 0 12px 12px 0;
        background: #fff7f9;
        color: #d85b83;
    }

    .user-table {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0,0,0,0.05);
    }

    .user-table table {
        margin: 0;
    }

    .user-table thead {
        background: #fff4f6;
    }

    .user-table th {
        border: none;
        color: #777;
        font-size: 14px;
        font-weight: 600;
        padding: 17px;
    }

    .user-table td {
        padding: 16px 17px;
        border-color: #f2eeee;
        vertical-align: middle;
    }

    .user-name {
        font-weight: 600;
        color: #333;
    }

    .user-email {
        color: #777;
        font-size: 14px;
    }

    .role-badge {
        display: inline-block;
        padding: 6px 13px;
        border-radius: 20px;
        font-size: 13px;
        font-weight: 600;
    }

    .role-admin {
        background: #fff0f3;
        color: #d85b70;
    }

    .role-kasir {
        background: #eef8f5;
        color: #3b9b7a;
    }

    .btn-edit {
        background: #fff4d9;
        color: #b98500;
        border: none;
        border-radius: 9px;
        padding: 7px 14px;
        font-size: 13px;
        font-weight: 600;
    }

    .btn-edit:hover {
        background: #ffe8ad;
        color: #9a7200;
    }

    .btn-delete {
        background: #fff0f1;
        color: #d85b70;
        border: none;
        border-radius: 9px;
        padding: 7px 14px;
        font-size: 13px;
        font-weight: 600;
    }

    .btn-delete:hover {
        background: #ffe0e3;
        color: #c34459;
    }

    .empty-user {
        padding: 45px 20px !important;
        color: #999;
    }
</style>

<div class="users-page py-4">

    {{-- Header --}}
    <div class="users-header">

        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">

            <div>
                <h2>
                    👥 Tim Sweet Cake Bakery
                </h2>

                <p>
                    Kelola akun admin dan kasir toko.
                </p>
            </div>

            <a href="{{ route('admin.users.create') }}"
               class="btn btn-add-user">

                 Tambah Pengguna

            </a>

        </div>

    </div>


    {{-- Search --}}
    <div class="search-box">

        <form action="{{ route('admin.users') }}" method="GET">

            <div class="input-group">

                <input
                    type="text"
                    name="search"
                    class="form-control"
                    placeholder="Cari nama atau email..."
                    value="{{ request('search') }}">

                <button class="btn" type="submit">
                    Cari
                </button>

            </div>

        </form>

    </div>


    {{-- Daftar Pengguna --}}
    <div class="user-table">

        <div class="table-responsive">

            <table class="table align-middle">

                <thead>

                    <tr>
                        <th width="60">No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Jabatan</th>
                        <th class="text-center">Aksi</th>
                    </tr>

                </thead>

                <tbody>

                @forelse($users as $user)

                    <tr>

                        <td>
                            {{ $users->firstItem() + $loop->index }}
                        </td>

                        <td>
                            <div class="user-name">
                                {{ $user->name }}
                            </div>
                        </td>

                        <td>
                            <div class="user-email">
                                {{ $user->email }}
                            </div>
                        </td>

                        <td>

                            @if($user->role->name == 'admin')

                                <span class="role-badge role-admin">
                                    Admin
                                </span>

                            @else

                                <span class="role-badge role-kasir">
                                    Kasir
                                </span>

                            @endif

                        </td>

                        <td class="text-center">

                            <a href="{{ route('admin.users.edit', $user) }}"
                               class="btn-edit me-1">
                                Edit
                            </a>

                            <form
                                action="{{ route('admin.users.destroy', $user) }}"
                                method="POST"
                                class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="btn-delete"
                                    onclick="return confirm('Yakin ingin menghapus pengguna ini?')">

                                    Hapus

                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="5" class="text-center empty-user">

                            👥 Belum ada pengguna.

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>


    {{-- Pagination --}}
    <div class="mt-4 d-flex justify-content-center">

        {{ $users->links() }}

    </div>

</div>

@endsection