<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Konten;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContentController extends Controller
{
    // Menampilkan halaman utama content
    public function index()
    {
        $kontens = Konten::with('kategori')->latest()->get();
        return view('content.index', compact('kontens'));
    }

    // ================== KATEGORI =====================

    public function createCategory()
    {
        return view('content.category.create');
    }

    public function storeCategory(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'gambar_kategori' => 'required|image|mimes:jpg,jpeg,png,svg|max:2048',
        ]);

        $path = $request->file('gambar_kategori')->store('kategori', 'public');

        Kategori::create([
            'nama_kategori' => $request->nama_kategori,
            'gambar_kategori' => $path,
        ]);

        return redirect()->route('admin.content.index')->with('success', 'Kategori berhasil ditambahkan.');
    }

    // ================== KONTEN =====================

    public function create()
    {
        $kategoris = Kategori::all();
        return view('content.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori_id' => 'required|exists:kategoris,id',
            'nama_konten' => 'required|string|max:255',
            'tanggal_konten' => 'required|date',
            'deskripsi' => 'required|string',
            'gambar1' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'gambar2' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'gambar3' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only(['kategori_id', 'nama_konten', 'tanggal_konten', 'deskripsi']);

        $data['gambar1'] = $request->file('gambar1')->store('konten', 'public');
        $data['gambar2'] = $request->file('gambar2')->store('konten', 'public');
        $data['gambar3'] = $request->file('gambar3')->store('konten', 'public');

        Konten::create($data);

        return redirect()->route('admin.content.index')->with('success', 'Konten berhasil ditambahkan.');
    }

    public function show($id)
    {
        $konten = Konten::with('kategori')->findOrFail($id);
        return view('content.show', compact('konten'));
    }

    public function edit($id)
    {
        $konten = Konten::findOrFail($id);
        $kategoris = Kategori::all();
        return view('content.edit', compact('konten', 'kategoris'));
    }

    public function update(Request $request, $id)
    {
        $konten = Konten::findOrFail($id);

        $request->validate([
            'kategori_id' => 'required|exists:kategoris,id',
            'nama_konten' => 'required|string|max:255',
            'tanggal_konten' => 'required|date',
            'deskripsi' => 'required|string',
            'gambar1' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'gambar2' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'gambar3' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $konten->kategori_id = $request->kategori_id;
        $konten->nama_konten = $request->nama_konten;
        $konten->tanggal_konten = $request->tanggal_konten;
        $konten->deskripsi = $request->deskripsi;

        foreach (['gambar1', 'gambar2', 'gambar3'] as $gambarField) {
            if ($request->hasFile($gambarField)) {
                Storage::disk('public')->delete($konten->$gambarField);
                $konten->$gambarField = $request->file($gambarField)->store('konten', 'public');
            }
        }

        $konten->save();

        return redirect()->route('admin.content.index')->with('success', 'Konten berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $konten = Konten::findOrFail($id);

        foreach (['gambar1', 'gambar2', 'gambar3'] as $gambarField) {
            if ($konten->$gambarField) {
                Storage::disk('public')->delete($konten->$gambarField);
            }
        }

        $konten->delete();

        return redirect()->route('admin.content.index')->with('success', 'Konten berhasil dihapus.');
    }
}
