@extends('layouts.app') {{-- Sesuaikan dengan nama file layout utama kamu --}}

@section('content')
<div class="container py-4">
    <div class="card border-0 shadow-sm rounded-4 style="background-color: #ffffff;">
        <!-- Header Banner Profil Toko -->
        <div class="p-5 text-center text-white rounded-top-4" style="background: linear-gradient(135deg, #ffb6c1, #ff94a4);">
            <div class="bg-white rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3 shadow" style="width: 100px; height: 100px; font-size: 50px;">
                🎂
            </div>
            <h2 class="fw-bold m-0">Sweet Cake Bakery</h2>
            <p class="m-0 mt-1 opacity-75">Mewujudkan Momen Manis Anda Sepenuh Hati</p>
        </div>

        <!-- Detail Informasi Toko -->
        <div class="card-body p-4">
            <h5 class="fw-bold mb-3" style="color: #d63384;">📌 Tentang Toko</h5>
            <p class="text-muted">
                <strong>Sweet Cake Bakery</strong> adalah toko kue dan roti yang menyajikan berbagai macam pilihan kue ulang tahun, pastry manis, roti segar, dan custom cake. Kami selalu mengutamakan bahan-bahan berkualitas tinggi, halal, dan tanpa bahan pengawet untuk cita rasa terbaik di setiap gigitan.
            </p>

            <hr class="my-4" style="border-color: #ffe4e8;">

            <h5 class="fw-bold mb-3" style="color: #d63384;">📞 Informasi & Kontak</h5>
            <div class="row g-3">
                <div class="col-md-6">
                    <div class="p-3 rounded-3" style="background-color: #fff0f3;">
                        <small class="text-muted d-block">Alamat Toko</small>
                        <strong>Jl. Manis No. 123, Tasikmalaya</strong>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="p-3 rounded-3" style="background-color: #fff0f3;">
                        <small class="text-muted d-block">Jam Operasional</small>
                        <strong>Senin - Minggu (08:00 - 21:00 WIB)</strong>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="p-3 rounded-3" style="background-color: #fff0f3;">
                        <small class="text-muted d-block">WhatsApp</small>
                        <strong>+62 812-3456-7890</strong>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="p-3 rounded-3" style="background-color: #fff0f3;">
                        <small class="text-muted d-block">Email</small>
                        <strong>info@sweetcakebakery.com</strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection