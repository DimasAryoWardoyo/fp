<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
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
