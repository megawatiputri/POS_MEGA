<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('kartu_ucapans', function (Blueprint $table) {
            $table->foreignId('custom_cake_id')
                ->nullable()
                ->after('id')
                ->constrained('custom_cakes')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('kartu_ucapans', function (Blueprint $table) {
            $table->dropForeign(['custom_cake_id']);
            $table->dropColumn('custom_cake_id');
        });
    }
};
