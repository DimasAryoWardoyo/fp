<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Presensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PresensiController extends Controller
{
    // Admin membuka sesi presensi dan otomatis tercatat hadir
    public function open($id)
    {
        $agenda = Agenda::findOrFail($id);
        $user = Auth::user();

        // Update status buka presensi
        $agenda->update(['presensi_open' => true]);

        // Admin langsung otomatis tercatat hadir
        Presensi::updateOrCreate([
            'agenda_id' => $agenda->id,
            'user_id' => $user->id,
        ], [
            'waktu_presensi' => now(),
            'token_yang_dipakai' => substr($agenda->generateToken(), 0, 6)
        ]);

        return redirect()->back()->with('success', 'Presensi dibuka dan Anda tercatat hadir.');
    }

    // Admin menutup sesi presensi
    public function close($id)
    {
        $agenda = Agenda::findOrFail($id);
        $agenda->update(['presensi_open' => false]);
        return redirect()->back()->with('success', 'Presensi ditutup');
    }

    // Anggota melakukan presensi dengan validasi token
    public function store(Request $request, $id)
    {
        $agenda = Agenda::findOrFail($id);

        if ($agenda->status !== 'Sedang Berlangsung' || !$agenda->presensi_open) {
            return redirect()->back()->with('error', 'Agenda tidak sedang berlangsung atau presensi belum dibuka');
        }

        $request->validate([
            'token' => 'required|string'
        ]);

        $validToken = substr($agenda->generateToken(), 0, 6); // gunakan 6 digit token

        if ($request->token !== $validToken) {
            return redirect()->back()->with('error', 'Token tidak valid atau sudah kadaluarsa');
        }

        Presensi::updateOrCreate([
            'agenda_id' => $agenda->id,
            'user_id' => auth()->id(),
        ], [
            'waktu_presensi' => now(),
            'token_yang_dipakai' => $request->token
        ]);

        return redirect()->back()->with('success', 'Presensi berhasil');
    }

    // Menampilkan daftar presensi untuk admin
    public function index($id)
    {
        $agenda = Agenda::findOrFail($id);
        $presensi = $agenda->presensis; // fix: gunakan relasi plural
        return view('presensi.index', compact('agenda', 'presensi'));
    }

    // Form presensi anggota
    public function form($id)
    {
        $agenda = Agenda::findOrFail($id);

        // hanya bisa mengakses jika presensi sedang dibuka dan acara berlangsung
        if (now()->gt($agenda->waktu_selesai)) {
            $agenda->update(['presensi_open' => false]);
            return redirect()->back()->with('error', 'Presensi sudah berakhir.');
        }

        return view('presensi.form', compact('agenda'));
    }
}
