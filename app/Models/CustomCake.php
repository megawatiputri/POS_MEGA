<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomCake extends Model
{
    protected $fillable = [
        'nama_pembeli',
        'no_hp',
        'jenis_cake',
        'rasa',
        'ukuran',
        'desain',
        'tulisan',
        'tanggal_dibutuhkan',
        'catatan',
        'status',
    ];
}
