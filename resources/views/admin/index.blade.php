@extends('layouts.dashboard')

@section('content')
    {{-- Content --}}
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                @can('admin')
                    <h2 class="dashboard-title">Dashboard Admin</h2>
                @endcan
                @can('anggota')
                    <h2 class="dashboard-title">Dashboard Anggota</h2>
                @endcan
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
                </div>
            </div>
        </div>
    </div>
@endsection