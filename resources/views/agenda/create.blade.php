@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <h2>Buat Agenda Baru</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Oops!</strong> Ada kesalahan dalam input Anda.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('agenda.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="nama_agenda" class="form-label">Nama Agenda</label>
                <input type="text" name="nama_agenda" class="form-control" value="{{ old('nama_agenda') }}" required>
            </div>

            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" rows="4" required>{{ old('deskripsi') }}</textarea>
            </div>

            <div class="mb-3">
                <label for="waktu_mulai" class="form-label">Waktu Mulai</label>
                <input type="datetime-local" name="waktu_mulai" class="form-control" value="{{ old('waktu_mulai') }}"
                    required>
            </div>

            <div class="mb-3">
                <label for="waktu_selesai" class="form-label">Waktu Selesai</label>
                <input type="datetime-local" name="waktu_selesai" class="form-control" value="{{ old('waktu_selesai') }}"
                    required>
            </div>

            <div class="mb-3">
                <label for="lokasi" class="form-label">Lokasi</label>
                <input type="text" name="lokasi" class="form-control" value="{{ old('lokasi') }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan Agenda</button>
            <a href="{{ route('agenda.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection