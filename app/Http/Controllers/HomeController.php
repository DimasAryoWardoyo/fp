<?php

namespace App\Http\Controllers;

use App\Models\Identitas;
use App\Models\Kategori;
use App\Models\Konten;
use App\Models\Struktur;
use App\Models\User;
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

    public function kategoryPage()
    {
        $kategoris = Kategori::all();
        $kontens = Konten::all();
        return view('page.page_kategori', compact('kategoris', 'kontens'));
    }

    public function keanggotaan()
    {
        $user = User::with('identitas')->get();
        $strukturs = Struktur::with('user')->get();
        return view('page.keanggotaan', compact('strukturs', 'user'));
    }
    public function tentang()
    {
        return view('page.tentang_kami');
    }
}