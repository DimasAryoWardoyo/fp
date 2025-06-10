@extends('layouts.dashboard')

@section('content')
    <div class="section-content section-dashboard-home">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2>Detail Agenda</h2>
            </div>
            <div class="dashboard-content">
                <div class="card mb-2 mt-4">
                    <div class="card-body">

                        <table class="table table-bordered table-striped mb-4">
                            <tr>
                                <td style="width: 180px;"><strong>Nama Agenda</strong></td>
                                <td>{{ $agenda->nama_agenda }}</td>
                            </tr>
                            <tr>
                                <td><strong>Kategori</strong></td>
                                <td>{{ ucfirst($agenda->kategori) }}</td>
                            </tr>
                            <tr>
                                <td><strong>Lokasi</strong></td>
                                <td>{{ $agenda->lokasi }}</td>
                            </tr>
                            <tr>
                                <td><strong>Waktu</strong></td>
                                <td>
                                    {{ \Carbon\Carbon::parse($agenda->waktu_mulai)->format('d-m-Y H:i') }}
                                    -
                                    {{ \Carbon\Carbon::parse($agenda->waktu_selesai)->format('d-m-Y H:i') }}
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Deskripsi</strong></td>
                                <td>{{ $agenda->deskripsi }}</td>
                            </tr>
                            <tr>
                                <td><strong>Foto</strong></td>
                                <td>
                                    @if($agenda->foto)
                                        <img src="{{ asset('storage/' . $agenda->foto) }}" alt="Foto Agenda"
                                            style="max-width: 300px;" class="img-fluid mt-2">
                                    @else
                                        -
                                    @endif
                                </td>
                            </tr>
                        </table>
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

                                    {{-- Daftar Presensi --}}
                                    @if($agenda->presensis->count())
                                        <div class="mt-4">
                                            <h5>Daftar Hadir Sementara:</h5>
                                            <table class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama</th>
                                                        <th>Waktu Presensi</th>
                                                        <th>Token</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($agenda->presensis as $i => $presensi)
                                                        <tr>
                                                            <td>{{ $i + 1 }}</td>
                                                            <td>{{ $presensi->user->name ?? 'Tidak diketahui' }}</td>
                                                            <td>{{ \Carbon\Carbon::parse($presensi->waktu_presensi)->format('d-m-Y H:i:s') }}
                                                            </td>
                                                            <td>{{ $presensi->token_yang_dipakai }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    @else
                                        <p class="text-muted mt-3">Belum ada yang melakukan presensi.</p>
                                    @endif
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

                            {{-- Tampilkan tombol daftar presensi --}}
                            <a href="{{ route('presensi.index', $agenda->id) }}" class="btn btn-primary mt-2">
                                Lihat Daftar Hadir
                            </a>
                        @endif

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
                                    <a href="{{ route('notulen.create', ['agenda_id' => $agenda->id]) }}" class="btn btn-warning">
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
                </div>
                <a href="{{ route('agenda.index') }}" class="btn btn-danger mb-4">Kembali</a>
            </div>
        </div>
    </div>
@endsection