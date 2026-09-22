<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KartuUcapan extends Model
{
    protected $fillable = [
    'custom_cake_id',
    'nama_penerima',
    'isi_ucapan',
    'tema',
    'catatan',
    'status',
    ];
}
