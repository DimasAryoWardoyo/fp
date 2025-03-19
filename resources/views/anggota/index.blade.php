@extends('layouts.dashboard')

@section('content')
    {{-- Content --}}
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Dashboard Admin</h2>
                <p class="dashboard-subtitle">Lihat apa yang telah Anda buat hari ini!</p>
            </div>
            <div class="dashboard-content">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card mb-2">
                            <div class="card-body">
                                <div class="dashboard-card-title">
                                    Tunggakan
                                </div>
                                <div class="dashboard-card-subtitle">
                                    {{ $anggota }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-2">
                            <div class="card-body">
                                <div class="dashboard-card-title">
                                    Total Pesan
                                </div>
                                <div class="dashboard-card-subtitle">
                                    0
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-2">
                            <div class="card-body">
                                <div class="dashboard-card-title">
                                    Total Tim
                                </div>
                                <div class="dashboard-card-subtitle">
                                    0
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="dashboard-heading">
                        <h2 class="product-subtitle">Kegiatan Yang Akan Diselenggarakan</h2>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                {{-- @foreach ($events as $event) --}}
                                <div class="row mt-2">
                                    <div class="col-md-4">
                                        <div class="card-list text-truncate">
                                            {{-- {{ $event['title'] }} --}}
                                            Bersih desa dengan bapak camat sampungkota
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card-list text-truncate">
                                            {{-- {{ $event['location'] }} --}}
                                            lokasi yang adna maksud adalah daerah rumah saya
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card-list text-truncate">
                                            {{-- {{ \Carbon\Carbon::parse($event['date'])->format('d F, Y') }} --}}
                                            Tanggal Pelaksanaan yang adana maksuda adalah 12-12-2021
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <a class="text-black p-3" href="/">
                                            <i class="fa fa-chevron-right" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                                {{-- @endforeach --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection