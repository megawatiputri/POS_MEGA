<?php

namespace App\Http\Controllers;

use App\Models\KartuUcapan;
use Illuminate\Http\Request;

class KartuUcapanController extends Controller
{
    public function create()
    {
        return view('kartu_ucapan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_penerima' => 'required',
            'isi_ucapan' => 'required',
            'tema' => 'nullable',
            'catatan' => 'nullable',
        ]);

        KartuUcapan::create([
            'nama_penerima' => $request->nama_penerima,
            'isi_ucapan' => $request->isi_ucapan,
            'tema' => $request->tema,
            'catatan' => $request->catatan,
        ]);

        return redirect()
            ->route('kartu-ucapan.create')
            ->with('success', 'Kartu ucapan berhasil dibuat! 💌');
    }
}
