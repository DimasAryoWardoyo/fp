<!-- resources/views/broadcast/form.blade.php -->
@extends('layouts.dashboard')

@section('content')
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Broadcast WhatsApp</h2>
                <p class="dashboard-subtitle">Tulis informasi Ke semua anggota</p>
            </div>
            <div class="dashboard-content">
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <form action="{{ route('broadcast.send') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="message" class="form-label">Pesan</label>
                        <textarea name="message" id="message" rows="5" class="form-control"
                            placeholder="Tulis isi pesan...">{{ old('message') }}</textarea>
                        @error('message')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Kirim Pesan</button>
                </form>
            </div>
        </div>
    </div>
@endsection