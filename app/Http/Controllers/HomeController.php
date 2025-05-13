<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Konten;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil semua konten terbaru dan semua kategori
        $kontens = Konten::latest()->get();
        $kategoris = Kategori::all();

        return view('page.home', compact('kontens', 'kategoris'));
    }

    /**
     * Tampilkan konten berdasarkan kategori.
     *
     * @param int $id
     */
    public function kategori($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kontens = Konten::where('kategori_id', $id)->latest()->get();
        $categories = Kategori::all(); // TAMBAHKAN INI

        return view('page.kategori', compact('kategori', 'kontens', 'categories'));
    }
    
    public function show($id)
    {
        $konten = Konten::with('kategori')->findOrFail($id);
        return view('page.detail', compact('konten'));
    }

}