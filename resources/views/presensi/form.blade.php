@extends('layouts.dashboard')

@section('content')
    <div class="container mt-4">
        <h3 class="mb-3">Presensi Agenda: <strong>{{ $agenda->nama_agenda }}</strong></h3>

        {{-- Notifikasi Sukses atau Error --}}
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @elseif (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        {{-- Form Presensi --}}
        <form action="{{ route('presensi.store', $agenda->id) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="token" class="form-label">Masukkan Token Presensi</label>
                <input type="text" name="token" id="token" class="form-control" placeholder="Contoh: 123ABC" required>
                @error('token')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Absen Sekarang</button>
        </form>
    </div>
@endsection