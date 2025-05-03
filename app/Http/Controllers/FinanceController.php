<?php

namespace App\Http\Controllers;

use App\Models\DanaLain;
use App\Models\Kas;
use App\Models\Pengeluaran;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class FinanceController extends Controller
{
    public function index()
    {
        $kasSaya = Kas::where('user_id', auth()->id())->get();

        // Total pemasukan = kas + dana lain
        $totalKas = Kas::sum('jumlah') + DanaLain::sum('jumlah');

        // Ambil semua pengeluaran
        $pengeluaran = Pengeluaran::all();

        // Hitung total pengeluaran
        $totalPengeluaran = Pengeluaran::sum('jumlah');

        // Hitung saldo akhir
        $saldo = $totalKas - $totalPengeluaran;

        return view('admin.finance.index', compact('kasSaya', 'totalKas', 'pengeluaran', 'totalPengeluaran', 'saldo'));
    }


    public function createKas()
    {
        $users = User::withSum('kas', 'jumlah')->get(); // pastikan relasi 'kas' dibuat
        return view('admin.finance.create_kas', compact('users'));
    }

    public function selectKas(User $user)
    {
        return view('admin.finance.form_create', compact('user'));
    }

    public function storeKas(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'tanggal' => 'required|date',
            'jumlah' => 'required|numeric',
            'deskripsi' => 'required|string',
        ]);

        Kas::create([
            'user_id' => $request->user_id,
            'tanggal' => $request->tanggal,
            'jumlah' => $request->jumlah,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('admin.finance.index')->with('success', 'Kas berhasil ditambahkan.');
    }


    public function createDanaLain()
    {
        return view('admin.finance.create_dana_lain');
    }

    public function storeDanaLain(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'jumlah' => 'required|numeric',
            'deskripsi' => 'required|string',
        ]);

        DanaLain::create($request->all());

        return redirect()->route('admin.finance.index')->with('success', 'Dana lain berhasil ditambahkan.');
    }

    public function createPengeluaran()
    {
        return view('admin.finance.create_pengeluaran');
    }

    public function storePengeluaran(Request $request)
    {
        $request->validate([
            'kegiatan' => 'required|string',
            'tanggal' => 'required|date',
            'deskripsi' => 'required|string',
            'jumlah' => 'required|numeric',
            'bukti' => 'nullable|file|mimes:jpg,jpeg,png,pdf',
        ]);

        $buktiPath = $request->file('bukti') ? $request->file('bukti')->store('bukti', 'public') : null;

        Pengeluaran::create([
            'kegiatan' => $request->kegiatan,
            'tanggal' => $request->tanggal,
            'deskripsi' => $request->deskripsi,
            'jumlah' => $request->jumlah,
            'bukti' => $buktiPath,
        ]);

        return redirect()->route('admin.finance.index')->with('success', 'Pengeluaran berhasil ditambahkan.');
    }
}
