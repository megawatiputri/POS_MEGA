<nav class="navbar navbar-expand-lg shadow-sm" style="background:#ffb6c1;">

    <div class="container">

        <a class="navbar-brand fw-bold text-white" href="{{ route('beranda') }}">
            🎂 Sweet Cake Bakery
        </a>

        <button class="navbar-toggler bg-white"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#menu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="menu">

            <ul class="navbar-nav ms-auto">

                <li class="nav-item">
                    <a class="nav-link text-white {{ Request::is('beranda') ? 'fw-bold' : '' }}"
                        href="{{ route('beranda') }}">
                        <i class="bi bi-house-fill"></i>
                        Beranda
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white {{ Request::is('admin/users') ? 'fw-bold' : '' }}"
                        href="{{ route('admin.users') }}">
                        <i class="bi bi-people-fill"></i>
                        Pengguna
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white {{ Request::is('produk*') ? 'fw-bold' : '' }}"
                        href="{{ route('produk.index') }}">
                        <i class="bi bi-cake2-fill"></i>
                        Produk
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white {{ Request::is('penjualan*') ? 'fw-bold' : '' }}"
                        href="{{ route('penjualan.index') }}">
                        <i class="bi bi-cart-fill"></i>
                        Penjualan
                    </a>
                </li>

                <li class="nav-item ms-3">

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf

                        <button class="btn btn-danger rounded-pill">
                            <i class="bi bi-box-arrow-right"></i>
                            Keluar
                        </button>

                    </form>

                </li>

            </ul>

        </div>

    </div>

</nav>