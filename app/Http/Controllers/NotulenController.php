<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Notulen;
use Illuminate\Http\Request;

class NotulenController extends Controller
{
    // Form untuk menambahkan notulen (hanya admin dan hanya jika agenda selesai)
    public function create(Request $request)
    {
        $agenda_id = $request->agenda_id;
        return view('notulen.create', compact('agenda_id'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'agenda_id' => 'required|exists:agendas,id',
            'notulen' => 'required|string'
        ]);

        Notulen::create($request->all());
        return redirect()->route('agenda.show', $request->agenda_id)->with('success', 'Notulen berhasil ditambahkan');
    }

}
