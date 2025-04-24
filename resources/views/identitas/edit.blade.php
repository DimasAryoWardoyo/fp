@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <h2>Edit Identitas</h2>
        <form action="{{ route('identitas.update', $identitas->id) }}" method="POST" onsubmit="return confirm('Yakin ingin memperbarui data identitas ini?')">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>No WhatsApp</label>
                <input type="text" name="no_whatsapp" class="form-control" value="{{ old('no_whatsapp', $identitas->no_whatsapp) }}">
            </div>
            <div class="mb-3">
                <label>Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" class="form-control" value="{{ old('tanggal_lahir', $identitas->tanggal_lahir) }}">
            </div>
            <div class="mb-3">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="aktif" {{ $identitas->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="tidak" {{ $identitas->status == 'tidak' ? 'selected' : '' }}>Tidak</option>
                </select>
            </div>
            <div class="mb-3">
                <label>Alasan</label>
                <select name="alasan" class="form-control">
                    <option value="">-</option>
                    <option value="sekolah di luar kota" {{ $identitas->alasan == 'sekolah di luar kota' ? 'selected' : '' }}>Sekolah di luar kota</option>
                    <option value="bekerja di luar kota" {{ $identitas->alasan == 'bekerja di luar kota' ? 'selected' : '' }}>Bekerja di luar kota</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Perbarui</button>
        </form>
    </div>
@endsection
