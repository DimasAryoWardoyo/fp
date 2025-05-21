@extends('layouts.dashboard')
@section('title', 'Dashboard - Karang Taruna Klaten Asyik')

@section('content')
    {{-- Content --}}
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">
                    Dashboard {{ Auth::user()->role == 'admin' ? 'Admin' : 'Anggota' }}
                </h2>
                <p class="dashboard-subtitle">
                    Selamat datang, {{ Auth::user()->name }}
                </p>
            </div>
            <div class="dashboard-content">
                <div class="row">
                    {{-- Tampilan untuk admin --}}
                    @if(Auth::user()->role == 'admin')
                        @php
                            $adminCards = [
                                ['title' => 'Total Kas', 'value' => $totalKas],
                                ['title' => 'Total Saldo', 'value' => $danaLain],
                                ['title' => 'Total Pengeluaran', 'value' => $totalPengeluaran],
                                ['title' => 'Jumlah Anggota', 'value' => $anggota, 'isCurrency' => false],
                            ];
                        @endphp

                        @foreach ($adminCards as $card)
                                <div class="col-md-3">
                                    <div class="card mb-2">
                                        <div class="card-body">
                                            <div class="dashboard-card-title">{{ $card['title'] }}</div>
                                            <div class="dashboard-card-subtitle">
                                                {{ isset($card['isCurrency']) && $card['isCurrency'] === false
                            ? $card['value']
                            : 'Rp ' . number_format($card['value'], 0, ',', '.') }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        @endforeach

                        {{-- Tampilan untuk anggota --}}
                    @else
                        @php
                            $anggotaCards = [
                                ['title' => 'Saldo Kas', 'value' => $totalKas],
                                ['title' => 'Saldo Lain', 'value' => $danaLain],
                                ['title' => 'Total Pengeluaran', 'value' => $totalPengeluaran],
                            ];
                        @endphp

                        @foreach ($anggotaCards as $card)
                            <div class="col-md-3">
                                <div class="card mb-2">
                                    <div class="card-body">
                                        <div class="dashboard-card-title">{{ $card['title'] }}</div>
                                        <div class="dashboard-card-subtitle">
                                            Rp {{ number_format($card['value'], 0, ',', '.') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif

                    {{-- Menampilkan kegiatan yang akan diselenggarakan --}}
                    <div class="col-md-12 mt-2">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="mb-4">Kegiatan Yang Akan Diselenggarakan</h5>
                                @forelse ($events as $event)
                                    @if(in_array($event->status, ['Akan Datang', 'Sedang Berlangsung']))
                                        <div class="row bg-light mb-2 p-3 rounded shadow-sm align-items-center">
                                            <div class="col-md-3">
                                                <div class="card-list text-truncate">{{ $event->nama_agenda }}</div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="card-list text-truncate">{{ $event->lokasi }}</div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="card-list text-truncate">
                                                    {{ \Carbon\Carbon::parse($event->waktu_mulai)->format('d F Y') }}
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                @if($event->status == 'Akan Datang')
                                                    <h5><span class="badge badge-warning text-dark">Akan Datang</span></h5>
                                                @elseif($event->status == 'Sedang Berlangsung')
                                                    <h5><span class="badge badge-success">Sedang Berlangsung</span></h5>
                                                @endif
                                            </div>
                                            <div class="col-md-1">
                                                <a class="text-black p-3" href="{{ route('agenda.show', $event->id) }}">
                                                    <i class="fa fa-chevron-right" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                        </div>
                                    @endif
                                @empty
                                    <div class="text-center py-4">Belum ada kegiatan yang akan datang.</div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection