@csrf

<div class="card border-0 shadow-sm rounded-4">
    <div class="card-header bg-white border-0 pt-4">
        <h4 class="fw-bold mb-1">👤 Data Pengguna</h4>
        <small class="text-muted">
            Lengkapi informasi akun pengguna.
        </small>
    </div>

    <div class="card-body p-4">

        <div class="mb-3">
            <label class="form-label fw-semibold">
                Nama Lengkap
            </label>

            <input
                type="text"
                name="name"
                class="form-control form-control-lg rounded-3 @error('name') is-invalid @enderror"
                placeholder="Masukkan nama..."
                value="{{ old('name', $user->name ?? '') }}">

            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>


        <div class="mb-3">
            <label class="form-label fw-semibold">
                Email
            </label>

            <input
                type="email"
                name="email"
                class="form-control form-control-lg rounded-3 @error('email') is-invalid @enderror"
                placeholder="Masukkan email..."
                value="{{ old('email', $user->email ?? '') }}">

            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>


        <div class="mb-3">
            <label class="form-label fw-semibold">
                Password
            </label>

            <input
                type="password"
                name="password"
                class="form-control form-control-lg rounded-3 @error('password') is-invalid @enderror"
                placeholder="Masukkan password">

            @if(isset($user))
                <small class="text-muted">
                    Kosongkan jika tidak ingin mengubah password.
                </small>
            @endif

            @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>


        <div class="mb-4">
            <label class="form-label fw-semibold">
                Role
            </label>

            <select
                name="role_id"
                class="form-select form-select-lg rounded-3 @error('role_id') is-invalid @enderror">

                <option value="">-- Pilih Role --</option>

                @foreach($roles as $role)
                    <option
                        value="{{ $role->id }}"
                        @selected(old('role_id', $user->role_id ?? '') == $role->id)>

                        {{ ucfirst($role->name) }}

                    </option>
                @endforeach

            </select>

            @error('role_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>


        <div class="d-flex gap-2">

            <button class="btn btn-success rounded-pill px-4">
                Simpan
            </button>

            <a href="{{ route('admin.users') }}"
               class="btn btn-outline-secondary rounded-pill px-4">

                ← Kembali

            </a>

        </div>

    </div>
</div>