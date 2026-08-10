@extends('layouts.app')

@section('title', 'Tambah User')

@section('content')
<h4>Tambah Pengguna</h4>

<form action="{{ route('admin.users.store') }}" method="POST">
@include('users._form')
</form>
@endsection
