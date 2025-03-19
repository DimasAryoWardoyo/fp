<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function index()
    {
        return view('agenda.index');
    }
    public function detail()
    {
        return view('agenda.detail');
    }
}
