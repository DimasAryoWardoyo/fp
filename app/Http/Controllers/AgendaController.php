<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    // Menampilkan daftar agenda untuk semua pengguna
    public function index()
    {
        $agenda = Agenda::all();
        return view('agenda.index', compact('agenda'));
    }

    // Menampilkan detail agenda
    public function show($id)
    {
        $agenda = Agenda::findOrFail($id);
        return view('agenda.show', compact('agenda'));
    }

    // Form untuk menambahkan agenda (hanya admin)
    public function create()
    {
        return view('agenda.create');
    }

    // Menyimpan agenda baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_agenda' => 'required|string',
            'deskripsi' => 'required',
            'waktu_mulai' => 'required|date',
            'waktu_selesai' => 'required|date|after:waktu_mulai',
            'lokasi' => 'required|string',
        ]);

        Agenda::create($request->all());

        return redirect()->route('agenda.index')->with('success', 'Agenda berhasil dibuat');
    }
}
