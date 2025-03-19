<?php

namespace App\Http\Controllers\Anggota;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    public function dashboard()
    {
        $anggota = User::where('role', 'anggota')->count();
        $admin = User::where('role', 'admin')->count();
        return view('anggota.index', [
            'anggota' => $anggota,
            'admin' => $admin,
        ]);
    }
}
