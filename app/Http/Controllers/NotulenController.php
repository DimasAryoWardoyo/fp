<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Notulen;
use Illuminate\Http\Request;

class NotulenController extends Controller
{
    // Tampilkan form tambah notulen
    public function create(Request $request)
    {
        $agenda_id = $request->agenda_id;
        return view('notulen.create', compact('agenda_id'));
    }

    // Simpan notulen baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'agenda_id' => 'required|exists:agendas,id',
            'pembicara' => 'required|string|max:255',
            'poin_pembahasan' => 'required|string',
            'notulen' => 'required|string',
        ]);

        Notulen::create([
            'agenda_id' => $request->agenda_id,
            'pembicara' => $request->pembicara,
            'poin_pembahasan' => $request->poin_pembahasan,
            'notulen' => $request->notulen,
        ]);


        return redirect()->route('agenda.show', $request->agenda_id)
            ->with('success', 'Notulen berhasil disimpan.');
    }

    // Tampilkan form edit notulen
    public function edit(Notulen $notulen)
    {
        return view('notulen.edit', compact('notulen'));
    }

    // Update notulen yang sudah ada
    public function update(Request $request, Notulen $notulen)
    {
        $request->validate([
            'pembicara' => 'required|string|max:255',
            'notulen' => 'required|string',
            'poin_pembahasan' => 'nullable|string',
            'kesimpulan' => 'required|string',
        ]);

        $notulen->update([
            'pembicara' => $request->pembicara,
            'notulen' => $request->notulen,
            'poin_pembahasan' => $request->poin_pembahasan,
            'kesimpulan' => $request->kesimpulan,
        ]);

        return redirect()->route('agenda.show', $notulen->agenda_id)->with('success', 'Notulen berhasil diperbarui.');
    }

    // Tampilkan detail notulen
    public function show($id)
    {
        $notulen = Notulen::with('agenda')->findOrFail($id);
        return view('notulen.show', compact('notulen'));
    }
}
