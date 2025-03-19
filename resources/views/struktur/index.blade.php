@extends('layouts.dashboard')

@section('content')
    <div class="section-content section-dashboard-home">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Struktur Organisasi Karang Taruna</h2>
                <p class="dashboard-subtitle">Kelola Identitas Anda Dengan Benar!</p>
            </div>

            <div class="dashboard-content">

                <!-- Ketua -->
                <div class="text-center">
                    <div class="card border mx-auto" style="width: 250px;">
                        <div class="card-body bg-warning  rounded">
                            <h5 class="card-title fw-bold">Ketua</h5>
                            <p class="card-text">Dimas Aryo Wardoyo</p>
                        </div>
                    </div>
                </div>

                <!-- Garis ke Wakil Ketua -->
                <div class="d-flex justify-content-center">
                    <div class="border-start bg-dark" style="height: 40px; width: 3px;"></div>
                </div>

                <!-- Wakil Ketua -->
                <div class="text-center">
                    <div class="card border mx-auto" style="width: 250px;">
                        <div class="card-body bg-info  rounded">
                            <h5 class="card-title fw-bold">Wakil Ketua</h5>
                            <p class="card-text">Dimas Aryo Wardoyo</p>
                        </div>
                    </div>
                </div>

                <!-- Garis penghubung ke Sekretaris & Bendahara -->
                <div class="d-flex justify-content-center">
                    <div class="border-start bg-dark" style="height: 40px; width: 3px;"></div>
                </div>

                <!-- Garis horizontal sebelum Sekretaris & Bendahara -->
                <div class="d-flex justify-content-center">
                    <div class="border border-dark bg-dark" style="width: 40%; height: 2px;"></div>
                </div>

                <!-- Sekretaris dan Bendahara -->
                <div class="row justify-content-center mt-2">
                    <div class="col-md-4 col-12 d-flex justify-content-center">
                        <div class="card border" style="width: 250px;">
                            <div class="card-body bg-success  rounded text-center">
                                <h5 class="card-title fw-bold">Sekretaris</h5>
                                <p class="card-text">Dimas Aryo Wardoyo</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-12 d-flex justify-content-center">
                        <div class="card border" style="width: 250px;">
                            <div class="card-body bg-success rounded text-center">
                                <h5 class="card-title fw-bold">Bendahara</h5>
                                <p class="card-text">Dimas Aryo Wardoyo</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection