<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('custom_cakes', function (Blueprint $table) {
            $table->id();

            $table->string('nama_pembeli');
            $table->string('no_hp');
            $table->string('jenis_cake');
            $table->string('rasa');
            $table->string('ukuran');
            $table->text('desain')->nullable();
            $table->string('tulisan')->nullable();
            $table->date('tanggal_dibutuhkan');
            $table->text('catatan')->nullable();
            $table->string('status')->default('PENDING');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('custom_cakes');
    }
};
