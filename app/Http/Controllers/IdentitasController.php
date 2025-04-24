<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Identitas;
use App\Models\User;

class IdentitasController extends Controller
{
    public function index()
    {
        return view('identitas.index');
    }

    public function create()
    {
        $users = User::doesntHave('identitas')->get();
        return view('identitas.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|unique:identitas,user_id',
            'no_whatsapp' => 'required|string|max:20',
            'tanggal_lahir' => 'required|date',
            'status' => 'required|in:aktif,tidak',
            'alasan' => 'nullable|in:sekolah di luar kota,bekerja di luar kota',
        ]);

        Identitas::create($request->all());

        return redirect()->route('identitas.index')->with('success', 'Identitas berhasil ditambahkan');
    }

    public function edit(Identitas $identitas)
    {
        if (auth()->user()->id !== $identitas->user_id) {
            abort(403);
        }

        return view('identitas.edit', compact('identitas'));
    }

    public function update(Request $request, Identitas $identitas)
    {
        if (auth()->user()->id !== $identitas->user_id) {
            abort(403);
        }

        $request->validate([
            'no_whatsapp' => 'required|string|max:20',
            'tanggal_lahir' => 'required|date',
            'status' => 'required|in:aktif,tidak',
            'alasan' => 'nullable|in:sekolah di luar kota,bekerja di luar kota',
        ]);

        $identitas->update($request->all());

        return redirect()->route('identitas.index')->with('success', 'Identitas berhasil diperbarui');
    }

    public function destroy(Identitas $identitas)
    {
        if (auth()->user()->id !== $identitas->user_id) {
            abort(403);
        }

        $identitas->delete();
        return redirect()->route('identitas.index')->with('success', 'Identitas berhasil dihapus');
    }
}