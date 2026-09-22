<?php

namespace App\Http\Controllers;

use App\Models\CustomCake;
use App\Models\KartuUcapan;
use Illuminate\Http\Request;

class CustomCakeController extends Controller
{
    public function create()
    {
        return view('custom_cake.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pembeli' => 'required',
            'no_hp' => 'required',
            'jenis_cake' => 'required',
            'rasa' => 'required',
            'ukuran' => 'required',
            'tanggal_dibutuhkan' => 'required|date',
            'desain' => 'nullable',
            'tulisan' => 'nullable',
            'catatan' => 'nullable',

            // Kartu Ucapan
            'nama_penerima' => 'nullable',
            'isi_ucapan' => 'nullable',
            'tema' => 'nullable',
            'catatan_kartu' => 'nullable',
        ]);

        // Simpan Custom Cake
        $customCake = CustomCake::create([
            'nama_pembeli' => $request->nama_pembeli,
            'no_hp' => $request->no_hp,
            'jenis_cake' => $request->jenis_cake,
            'rasa' => $request->rasa,
            'ukuran' => $request->ukuran,
            'desain' => $request->desain,
            'tulisan' => $request->tulisan,
            'tanggal_dibutuhkan' => $request->tanggal_dibutuhkan,
            'catatan' => $request->catatan,
        ]);

        // Simpan Kartu Ucapan jika diisi
        if (
            $request->filled('nama_penerima') ||
            $request->filled('isi_ucapan') ||
            $request->filled('tema') ||
            $request->filled('catatan_kartu')
        ) {
            KartuUcapan::create([
                'custom_cake_id' => $customCake->id,
                'nama_penerima' => $request->nama_penerima,
                'isi_ucapan' => $request->isi_ucapan,
                'tema' => $request->tema,
                'catatan' => $request->catatan_kartu,
            ]);
        }

        return redirect()
            ->route('custom-cake.create')
            ->with('success', 'Request custom cake berhasil dikirim! 🎂💌');
    }
}