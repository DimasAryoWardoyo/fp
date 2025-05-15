<?php

namespace App\Http\Controllers;

use App\Models\Kas;
use App\Models\DanaLain;
use App\Models\Pengeluaran;
use Illuminate\Support\Facades\Auth;

class AnggotaFinanceController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Kas pribadi user
        $kasSaya = Kas::where('user_id', auth()->id())->get();

        $totalKas = Kas::sum('jumlah');

        // Total semua pemasukan (kas semua user + dana lain)
        $totalPemasukan =  DanaLain::sum('jumlah');

        // Total semua pengeluaran
        $totalPengeluaran = Pengeluaran::sum('jumlah');

        // Saldo saat ini
        $saldo = $totalPemasukan + $totalKas;

        // Daftar pengeluaran untuk ditampilkan
        $pengeluaran = Pengeluaran::latest()->get();

        return view('anggota.finance.overview', compact(
            'kasSaya',
            'totalPemasukan',
            'totalPengeluaran',
            'saldo',
            'totalKas',
            'pengeluaran'
        ));
    }
    public function show($id)
    {
        $pengeluaran = Pengeluaran::findOrFail($id);

        return view('anggota.finance.show', compact('pengeluaran'));
    }
}
