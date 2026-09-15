<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('penjualan', function (Blueprint $table) {
            // Pengecekan agar tidak error jika kolom sudah ada
            if (!Schema::hasColumn('penjualan', 'uang_dibayar')) {
                $table->decimal('uang_dibayar', 15, 2)->default(0);
            }
            if (!Schema::hasColumn('penjualan', 'kembalian')) {
                $table->decimal('kembalian', 15, 2)->default(0);
            }
        });
    }

    public function down(): void
    {
        Schema::table('penjualan', function (Blueprint $table) {
            $table->dropColumn(['uang_dibayar', 'kembalian']);
        });
    }
};