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
            'kategori' => 'required|in:kegiatan,rapat',
            'deskripsi' => 'required',
            'waktu_mulai' => 'required|date',
            'waktu_selesai' => 'required|date|after:waktu_mulai',
            'lokasi' => 'required|string',
        ]);

        if ($request->kategori === 'kegiatan') {
            $request->validate([
                'foto' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            ]);
        } else {
            $request->validate([
                'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            ]);
        }

        $data = $request->only([
            'nama_agenda',
            'kategori',
            'deskripsi',
            'waktu_mulai',
            'waktu_selesai',
            'lokasi'
        ]);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('foto_agenda', 'public');
        }

        Agenda::create($data);

        return redirect()->route('agenda.index')->with('success', 'Agenda berhasil dibuat');
    }


}
