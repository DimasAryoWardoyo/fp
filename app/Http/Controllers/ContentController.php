<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Kategori;
use App\Models\Konten;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContentController extends Controller
{
    // Menampilkan halaman utama content
    public function index()
    {
        $banners = Banner::latest()->get();
        $kontens = Konten::latest()->get();
        $kategoris = Kategori::all();
        return view('content.index', compact('kontens', 'banners', 'kategoris'));
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

    public function editCategory($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('admin.content.kategori-edit', compact('kategori'));
    }

    public function updateCategory(Request $request, $id)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $kategori = Kategori::findOrFail($id);
        $kategori->nama_kategori = $request->nama_kategori;

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($kategori->gambar && Storage::disk('public')->exists($kategori->gambar)) {
                Storage::disk('public')->delete($kategori->gambar);
            }

            $kategori->gambar = $request->file('gambar')->store('kategori', 'public');
        }

        $kategori->save();

        return redirect()->route('admin.content.index')->with('success', 'Kategori berhasil diperbarui.');
    }

    public function destroyCategory($id)
    {
        $kategori = Kategori::findOrFail($id);

        if ($kategori->gambar && Storage::disk('public')->exists($kategori->gambar)) {
            Storage::disk('public')->delete($kategori->gambar);
        }

        $kategori->delete();

        return back()->with('success', 'Kategori berhasil dihapus.');
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

    // ================== BANNER =====================

    public function bannerCreate()
    {
        return view('content.banner_create');
    }
    public function bannerStore(Request $request)
    {
        $request->validate([
            'gambar_banner' => 'required|image|mimes:jpg,jpeg,png,svg|max:5048',
        ]);

        $path = $request->file('gambar_banner')->store('banner', 'public');

        Banner::create([
            'gambar' => $path,
        ]);

        return redirect()->route('admin.content.index')->with('success', 'Banner berhasil ditambahkan.');
    }
    public function bannerEdit($id)
    {
        $banner = Banner::findOrFail($id);
        return view('admin.content.banner-edit', compact('banner'));
    }

    public function bannerUpdate(Request $request, $id)
    {
        $request->validate([
            'gambar_banner' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $banner = Banner::findOrFail($id);

        // Jika user upload gambar baru, hapus gambar lama dan simpan baru
        if ($request->hasFile('gambar_banner')) {
            Storage::disk('public')->delete($banner->gambar);

            $path = $request->file('gambar_banner')->store('banner', 'public');
            $banner->update(['gambar' => $path]);
        }

        return redirect()->route('admin.content.index')->with('success', 'Banner berhasil diupdate.');
    }
    public function bannerDestroy($id)
    {
        $banner = Banner::findOrFail($id);

        // Hapus file dari storage
        Storage::disk('public')->delete($banner->gambar);

        // Hapus data dari database
        $banner->delete();

        return redirect()->route('admin.content.index')->with('success', 'Banner berhasil dihapus.');
    }
}
