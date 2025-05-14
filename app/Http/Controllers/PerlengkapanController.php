<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Perlengkapan;
use Auth;
use Illuminate\Http\Request;

class PerlengkapanController extends Controller
{
    // Tampilkan semua barang
    public function index()
    {
        $perlengkapans = Perlengkapan::all();
        return view('perlengkapan.index', compact('perlengkapans'));
    }

    // Detail barang
    public function show(Perlengkapan $perlengkapan)
    {
        return view('perlengkapan.show', compact('perlengkapan'));
    }

    // Admin - form tambah barang
    public function create()
    {
        return view('perlengkapan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'deskripsi' => 'nullable|string',
            'stok' => 'required|integer|min:1',
        ]);

        Perlengkapan::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'stok' => $request->stok,
            'stok_awal' => $request->stok, // otomatis isi stok_awal
        ]);

        return redirect()->route('perlengkapan.index')->with('success', 'Perlengkapan berhasil ditambahkan.');
    }


    // Admin - edit barang
    public function edit(Perlengkapan $perlengkapan)
    {
        return view('perlengkapan.edit', compact('perlengkapan'));
    }

    public function update(Request $request, Perlengkapan $perlengkapan)
    {
        $request->validate([
            'nama' => 'required',
            'stok' => 'required|integer|min:0',
        ]);

        $perlengkapan->update($request->all());

        return redirect()->route('perlengkapan.index')->with('success', 'Barang diperbarui');
    }

    public function destroy(Perlengkapan $perlengkapan)
    {
        $perlengkapan->delete();
        return redirect()->route('perlengkapan.index')->with('success', 'Barang dihapus');
    }
}