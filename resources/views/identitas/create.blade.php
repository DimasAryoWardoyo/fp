@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <h2>Tambah Identitas</h2>
        <form action="{{ route('identitas.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>User</label>
                <select name="user_id" class="form-control">
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label>No WhatsApp</label>
                <input type="text" name="no_whatsapp" class="form-control">
            </div>
            <div class="mb-3">
                <label>Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" class="form-control">
            </div>
            <div class="mb-3">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="aktif">Aktif</option>
                    <option value="tidak">Tidak</option>
                </select>
            </div>
            <div class="mb-3">
                <label>Alasan</label>
                <select name="alasan" class="form-control">
                    <option value="">-</option>
                    <option value="sekolah di luar kota">Sekolah di luar kota</option>
                    <option value="bekerja di luar kota">Bekerja di luar kota</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection