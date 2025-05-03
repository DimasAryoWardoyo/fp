<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\DanaLain;
use App\Models\Kas;
use App\Models\Pengeluaran;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->role === 'admin') {
            $totalKas = Kas::sum('jumlah') + DanaLain::sum('jumlah');
            $totalPengeluaran = Pengeluaran::sum('jumlah');
            $saldo = $totalKas - $totalPengeluaran;
            $anggota = User::where('role', 'anggota')->count();
            $kasSaya = $totalKas; // agar bisa dipakai di tampilan admin
        } else {
            $totalKas = Kas::sum('jumlah') + DanaLain::sum('jumlah');
            $kasSaya = Kas::where('user_id', $user->id)->sum('jumlah');
            $totalPengeluaran = Pengeluaran::sum('jumlah');
            $saldo = $totalKas - $totalPengeluaran;
            $anggota = null;
        }

        // Ambil agenda yang belum selesai dan statusnya Akan Datang / Sedang Berlangsung
        $events = Agenda::whereDate('waktu_selesai', '>=', now())
            ->orderBy('waktu_mulai', 'asc')
            ->orderBy('nama_agenda', 'asc')
            ->orderBy('lokasi', 'asc')
            ->get()
            ->filter(function ($agenda) {
                return in_array($agenda->status, ['Akan Datang', 'Sedang Berlangsung']);
            });

        return view('dashboard.index', compact(
            'kasSaya',
            'totalPengeluaran',
            'saldo',
            'anggota',
            'events'
        ));
    }
}
