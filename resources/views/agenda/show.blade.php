@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <h2>Detail Agenda</h2>

        <div class="card mb-4">
            <div class="card-body">
                <h4 class="card-title">{{ $agenda->nama_agenda }}</h4>
                <p><strong>Deskripsi:</strong> {{ $agenda->deskripsi }}</p>
                <p><strong>Lokasi:</strong> {{ $agenda->lokasi }}</p>
                <p>
                    <strong>Waktu Mulai:</strong>
                    {{ \Carbon\Carbon::parse($agenda->waktu_mulai)->format('d-m-Y H:i') }}
                </p>
                <p>
                    <strong>Waktu Selesai:</strong>
                    {{ \Carbon\Carbon::parse($agenda->waktu_selesai)->format('d-m-Y H:i') }}
                </p>

                @php
                    $user = Auth::user(); // pastikan user login
                    $now = now();
                    $start = $agenda->waktu_mulai;
                    $end = $agenda->waktu_selesai;
                @endphp

                @if ($now->between($start, $end))
                    <div class="alert alert-success">
                        <strong>Acara sedang berlangsung.</strong>
                    </div>

                    {{-- Jika user admin --}}
                    @if($user->role === 'admin')
                        @if ($agenda->presensi_open)
                            <form action="{{ route('presensi.close', $agenda->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger">Tutup Presensi</button>
                            </form>
                        @else
                            <form action="{{ route('presensi.open', $agenda->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-success">Buka Presensi</button>
                            </form>
                        @endif

                        @if($agenda->presensi_open)
                            <p class="mt-3">
                                <strong>Kode Presensi:</strong> {{ substr($agenda->generateToken(), 0, 6) }} <br>
                                <small>Refresh halaman untuk mendapatkan kode terbaru (otomatis berubah tiap 1 menit)</small>
                            </p>
                        @endif

                        {{-- Jika user anggota --}}
                    @elseif($user->role === 'anggota')
                        @if($agenda->presensi_open)
                            <a href="{{ route('presensi.form', $agenda->id) }}" class="btn btn-primary">Absen Sekarang</a>
                        @else
                            <p class="text-muted">Presensi belum dibuka.</p>
                        @endif
                    @endif

                @elseif ($now->lt($start))
                    <div class="alert alert-info">
                        <strong>Acara belum dimulai.</strong>
                    </div>
                @elseif ($now->gt($end))
                    <div class="alert alert-secondary">
                        <strong>Acara telah selesai.</strong>
                    </div>
                @endif


            </div>

            @php
                $notulen = $agenda->notulen; // pastikan eager loaded atau relasi satu-satu
            @endphp

            <div class="mt-4">
                @if(Auth::check() && Auth::user()->role === 'admin')
                    {{-- Admin bisa tambah atau ubah notulen --}}
                    @if ($notulen)
                        <a href="{{ route('notulen.edit', $notulen->id) }}" class="btn btn-warning">
                            Edit Notulen
                        </a>
                    @else
                        <a href="{{ route('notulen.create', ['agenda_id' => $agenda->id]) }}" class="btn btn-success">
                            Tambah Notulen
                        </a>
                    @endif
                @else
                    {{-- Anggota hanya bisa melihat jika notulen sudah ada --}}
                    @if ($notulen)
                        <a href="{{ route('notulen.show', $notulen->id) }}" class="btn btn-info">
                            Lihat Notulen
                        </a>
                    @endif
                @endif
            </div>

        </div>

        <a href="{{ route('agenda.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
@endsection