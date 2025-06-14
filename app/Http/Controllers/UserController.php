<?php

namespace App\Http\Controllers;

use App\Models\Identitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class UserController extends Controller
{
    public function editProfile()
    {
        return view('user.edit-profile', ['user' => Auth::user()]);
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6|confirmed',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('identitas.index')->with('success', 'Profil berhasil diperbarui');
    }
    // Daftar semua user (hanya admin)
    public function index()
    {
        if (Gate::denies('admin')) {
            abort(403);
        }

        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    // Tampilkan form edit user
    public function edit($id)
    {
        if (Gate::denies('admin')) {
            abort(403);
        }

        $user = User::with('identitas')->findOrFail($id); // ambil user + relasi identitas
        return view('admin.users.edit', compact('user'));
    }


    // Update user
    public function update(Request $request, $id)
    {
        if (Gate::denies('admin')) {
            abort(403);
        }

        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required|in:admin,anggota',
            'password' => 'nullable|min:6|confirmed',
            'no_whatsapp' => 'required|string|max:20',
            'tanggal_lahir' => 'required|date',
            'status' => 'required|in:aktif,tidak',
            'alasan' => 'nullable|in:sekolah di luar kota,bekerja di luar kota',
        ]);

        // Update data user
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        // Update atau buat identitas jika belum ada
        $user->identitas()->updateOrCreate(
            ['user_id' => $user->id],
            [
                'no_whatsapp' => $request->no_whatsapp,
                'tanggal_lahir' => $request->tanggal_lahir,
                'status' => $request->status,
                'alasan' => $request->alasan,
            ]
        );

        return redirect()->route('admin.users.index')->with('success', 'User berhasil diperbarui');
    }


    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        if (Gate::denies('admin')) {
            abort(403);
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'role' => 'required|in:admin,anggota',
            'password' => 'required|min:6|confirmed',
            'no_whatsapp' => 'required|string|max:20',
            'tanggal_lahir' => 'required|date',
            'status' => 'required|in:aktif,tidak',
            'alasan' => 'nullable|in:sekolah di luar kota,bekerja di luar kota',
        ]);

        // Buat user terlebih dahulu
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);

        // Buat identitas dengan user_id dari user yang baru dibuat
        Identitas::create([
            'user_id' => $user->id,
            'no_whatsapp' => $request->no_whatsapp,
            'tanggal_lahir' => $request->tanggal_lahir,
            'status' => $request->status,
            'alasan' => $request->alasan,
        ]);

        return redirect()->route('admin.users.index')->with('success', 'User baru berhasil ditambahkan');
    }


    // Hapus user
    public function destroy($id)
    {
        if (Gate::denies('admin')) {
            abort(403);
        }

        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'User berhasil dihapus');
    }

    // detail user (hanya admin)
    public function show($id)
    {
        if (Gate::denies('admin')) {
            abort(403);
        }

        $user = User::with('identitas')->findOrFail($id);

        return view('admin.users.show', compact('user'));
    }

}