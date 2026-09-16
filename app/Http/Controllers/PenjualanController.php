<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Models\Penjualan;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SearchRequest $request)
    {
        $user = Auth::user();
        $keyword = $request->input('search');

        $sales = Penjualan::query()

            // Filter berdasarkan role
            ->when($user->role->name === 'kasir', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })

            // Search nama user
            ->when($keyword, function ($query) use ($keyword) {
                $query->whereHas('user', function ($q) use ($keyword) {
                    $q->where('name', 'like', '%' . $keyword . '%');
                });
            })

            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('penjualan.index', compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(SearchRequest $request)
    {
        $sale = Penjualan::where('user_id', Auth::id())
            ->where('status', 'OPEN')
            ->first();

        if (!$sale) {
            $sale = Penjualan::create([
                'user_id' => Auth::id(),
                'status' => 'OPEN',
                'total_pembayaran' => 0,
                'metode_pembayaran' => 'CASH',
            ]);
        }

        $keyword = $request->input('search');

        if ($keyword) {
            $products = Produk::when($keyword, function ($query) use ($keyword) {
                $query->where('nama', 'like', '%' . $keyword . '%');
            })
                ->orderBy('nama')
                ->get();
        } else {
            $products = Produk::orderBy('nama')->get();
        }

        $mode = 'create';

        return view('penjualan.pos', compact(
            'sale',
            'products',
            'mode'
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Penjualan $penjualan)
    {
        $sale = $penjualan;

        $sale->load('itemPenjualan');

        $products = Produk::orderBy('nama')->get();

        $mode = 'view';

        return view('penjualan.detail', compact(
            'sale',
            'products',
            'mode'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penjualan $penjualan)
    {
        $sale = $penjualan;

        abort_if($sale->status === 'COMPLETED', 403);

        $sale->load('itemPenjualan');

        $products = Produk::orderBy('nama')->get();

        $mode = 'edit';

        return view('penjualan.pos', compact(
            'sale',
            'products',
            'mode'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Penjualan $penjualan)
    {
        // Validasi metode pembayaran
        $request->validate([
            'payment_method' => 'required|in:CASH,QRIS,TRANSFER',

            // Tidak wajib untuk QRIS / TRANSFER
            'uang_dibayar' => 'nullable|numeric|min:0',
        ]);

        // Pastikan transaksi masih OPEN
        if ($penjualan->status !== 'OPEN') {
            return back()->withErrors([
                'error' => 'Transaksi sudah diproses.'
            ]);
        }

        // Pastikan keranjang tidak kosong
        if ($penjualan->itemPenjualan()->count() === 0) {
            return back()->withErrors([
                'error' => 'Keranjang masih kosong.'
            ]);
        }

        try {

            DB::transaction(function () use ($penjualan, $request) {

                // Hitung ulang total dari item keranjang
                $total = $penjualan->itemPenjualan()->sum('subtotal');

                /*
                |--------------------------------------------------------------------------
                | PEMBAYARAN QRIS
                |--------------------------------------------------------------------------
                | Untuk QRIS tidak perlu input uang_dibayar.
                | Sistem otomatis menganggap pembayaran sesuai total.
                */
                if ($request->payment_method === 'QRIS') {

                    $uangDibayar = $total;
                    $kembalian = 0;

                /*
                |--------------------------------------------------------------------------
                | PEMBAYARAN TRANSFER
                |--------------------------------------------------------------------------
                */
                } elseif ($request->payment_method === 'TRANSFER') {

                    $uangDibayar = $total;
                    $kembalian = 0;

                /*
                |--------------------------------------------------------------------------
                | PEMBAYARAN CASH
                |--------------------------------------------------------------------------
                */
                } else {

                    $uangDibayar = $request->uang_dibayar;

                    // Pastikan uang dibayar diisi
                    if ($uangDibayar === null) {
                        throw new \Exception(
                            'Uang yang dibayarkan wajib diisi untuk pembayaran CASH.'
                        );
                    }

                    // Pastikan uang cukup
                    if ($uangDibayar < $total) {
                        throw new \Exception(
                            'Uang yang dibayarkan kurang dari total pembayaran.'
                        );
                    }

                    // Hitung kembalian
                    $kembalian = $uangDibayar - $total;
                }

                // Simpan transaksi
                $penjualan->update([
                    'metode_pembayaran' => $request->payment_method,
                    'total_pembayaran' => $total,
                    'uang_dibayar' => $uangDibayar,
                    'kembalian' => $kembalian,
                    'status' => 'COMPLETED',
                ]);
            });

        } catch (\Exception $e) {

            return back()->withErrors([
                'error' => $e->getMessage()
            ]);
        }

        return redirect()
            ->route('penjualan.index')
            ->with('success', 'Transaksi berhasil diselesaikan.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penjualan $penjualan)
    {
        $this->authorize('delete', $penjualan);

        // Pastikan hanya transaksi OPEN
        if ($penjualan->status !== 'OPEN') {
            return redirect()
                ->route('penjualan.index')
                ->withErrors([
                    'error' => 'Transaksi sudah selesai tidak bisa dibatalkan.'
                ]);
        }

        DB::transaction(function () use ($penjualan) {

            foreach ($penjualan->itemPenjualan as $item) {

                // Kembalikan stok
                $item->produk->increment(
                    'stok',
                    $item->kuantitas
                );
            }

            // Hapus item penjualan
            $penjualan->itemPenjualan()->delete();

            // Hapus penjualan
            $penjualan->delete();
        });

        return redirect()
            ->route('penjualan.index')
            ->with('success', 'Transaksi berhasil dibatalkan.');
    }
}