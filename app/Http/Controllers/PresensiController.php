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

        // Cek waktu acara valid (opsional)
        if (now()->lt($agenda->waktu_mulai) || now()->gt($agenda->waktu_selesai)) {
            return redirect()->back()->with('error', 'Waktu presensi belum tersedia.');
        }

        // Update agar presensi terbuka
        $agenda->presensi_open = true;
        $agenda->save();

        // Admin auto presensi
        Presensi::updateOrCreate(
            [
                'agenda_id' => $agenda->id,
                'user_id' => Auth::id(),
            ],
            [
                'waktu_presensi' => now(),
                'token_yang_dipakai' => substr(str()->random(6), 0, 6),
            ],
        );

        return redirect()->route('agenda.show', $agenda->id)->with('success', 'Presensi dibuka.');
    }

    // Admin menutup sesi presensi
    public function close($id)
    {
        $agenda = Agenda::findOrFail($id);

        // Tutup presensi
        $agenda->presensi_open = false;
        $agenda->save();

        return redirect()->route('agenda.show', $agenda->id)->with('success', 'Presensi telah ditutup.');
    }

    // Anggota melakukan presensi dengan validasi token
    public function store(Request $request, $id)
    {
        $agenda = Agenda::findOrFail($id);

        // Validasi status agenda dan presensi
        if (now()->lt($agenda->waktu_mulai) || now()->gt($agenda->waktu_selesai) || !$agenda->presensi_open) {
            return redirect()->back()->with('error', 'Presensi tidak tersedia saat ini.');
        }

        $request->validate([
            'token' => 'required|string',
        ]);

        $validToken = substr($agenda->generateToken(), 0, 6);

        if ($request->token !== $validToken) {
            return redirect()->back()->with('error', 'Token tidak valid atau sudah kedaluwarsa.');
        }

        Presensi::updateOrCreate(
            [
                'agenda_id' => $agenda->id,
                'user_id' => Auth::id(),
            ],
            [
                'waktu_presensi' => now(),
                'token_yang_dipakai' => $request->token,
            ],
        );

        return redirect()->back()->with('success', 'Presensi berhasil dilakukan.');
    }

    // Menampilkan daftar presensi untuk admin
    public function index($id)
    {
        $agenda = Agenda::findOrFail($id);
        $presensi = $agenda->presensis; // relasi presensis harus ada di model Agenda

        return view('presensi.index', compact('agenda', 'presensi'));
    }

    // Form presensi untuk anggota
    public function form($id)
    {
        $agenda = Agenda::findOrFail($id);

        // Tutup otomatis jika waktu selesai sudah lewat
        if (now()->gt($agenda->waktu_selesai)) {
            $agenda->update(['presensi_open' => false]);
            return redirect()->back()->with('error', 'Presensi sudah berakhir.');
        }

        // Pastikan presensi sudah dibuka
        if (!$agenda->presensi_open) {
            return redirect()->back()->with('error', 'Presensi belum dibuka.');
        }

        return view('presensi.form', compact('agenda'));
    }
}
