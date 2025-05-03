<?php

namespace App\Http\Controllers;

use App\Models\Perlengkapan;
use Illuminate\Http\Request;

class PerlengkapanController extends Controller
{
    public function index() {
        $perlengkapan = Perlengkapan::all();
        return view('admin.perlengkapan.index', compact('perlengkapan'));
    }

    public function create() {
        return view('admin.perlengkapan.create');
    }

    public function store(Request $request) {
        $request->validate([
            'nama_barang' => 'required|string',
            'jumlah_barang' => 'required|integer',
            'keterangan' => 'nullable|string',
            'foto_barang' => 'nullable|image|mimes:jpg,jpeg,png'
        ]);

        $fotoPath = $request->file('foto_barang') ? $request->file('foto_barang')->store('perlengkapan', 'public') : null;

        Perlengkapan::create([
            'nama_barang' => $request->nama_barang,
            'jumlah_barang' => $request->jumlah_barang,
            'keterangan' => $request->keterangan,
            'foto_barang' => $fotoPath,
        ]);

        return redirect()->route('admin.perlengkapan.index')->with('success', 'Barang berhasil ditambahkan.');
    }

    public function destroy($id) {
        $barang = Perlengkapan::findOrFail($id);
        if ($barang->foto_barang) {
            \Storage::disk('public')->delete($barang->foto_barang);
        }
        $barang->delete();
        return redirect()->back()->with('success', 'Barang berhasil dihapus.');
    }

    public function anggotaIndex() {
        $perlengkapan = Perlengkapan::all();
        return view('anggota.perlengkapan.index', compact('perlengkapan'));
    }
}
