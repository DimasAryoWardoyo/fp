<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $anggota = User::where('role', 'anggota')->count();
        $admin = User::where('role', 'admin')->count();
        return view('dashboard.index', [
            'anggota' => $anggota,
            'admin' => $admin,
        ]);
    }
}
