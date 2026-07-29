@extends('layouts.app')

@section('title', 'Login')

@section('content')

<div class="container" style="min-height:90vh;">
    <div class="row justify-content-center align-items-center h-100">

        <div class="col-lg-5 col-md-7">

            <div class="card shadow-lg border-0 rounded-4">

                <div class="card-body p-5">

                    <div class="text-center mb-4">

                        <div style="font-size:60px;">
                            🎂
                        </div>

                        <h2 class="fw-bold text-danger">
                            Sweet Cake Bakery
                        </h2>

                        <p class="text-muted">
                            Login untuk masuk ke Sistem POS
                        </p>

                    </div>

                    <form action="{{ route('auth') }}" method="POST">
                        @csrf

                        <div class="mb-3">

                            <label class="form-label fw-semibold">
                                Email
                            </label>

                            <input
                                type="email"
                                name="email"
                                class="form-control form-control-lg rounded-pill"
                                placeholder="Masukan Email">

                            @error('email')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror

                        </div>

                        <div class="mb-4">

                            <label class="form-label fw-semibold">
                                Password
                            </label>

                            <input
                                type="password"
                                name="password"
                                class="form-control form-control-lg rounded-pill"
                                placeholder="Masukan Password">

                            @error('password')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror

                        </div>

                        <button
                            class="btn btn-lg w-100 rounded-pill"
                            style="background:#ff6b9d;color:white;">

                            Login

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>
</div>

@endsection