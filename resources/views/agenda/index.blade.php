@extends('layouts.dashboard')

@section('content')
    <div class="section-content section-dashboard-home">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Profile</h2>
                <p class="dashboard-subtitle">Kelola Identitas Anda Denang Benar!</p>
            </div>
            <div class="dashboard-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card shadow-sm border-0 mb-3">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h5>Agenda</h5>
                                    <div>
                                        <button class="btn btn-warning me-2">
                                            Kehadiran <i class="fa fa-address-card" aria-hidden="true"></i>
                                        </button>
                                        @can('admin')
                                            <button class="btn btn-warning">
                                                Tambah Agenda <i class="fa fa-plus-square" aria-hidden="true"></i>
                                            </button>
                                        @endcan
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <thead class="table-secondary">
                                            <tr class="text-center">
                                                <th scope="col" style="width: 20%;">Tanggal</th>
                                                <th scope="col" style="width: 40%;">Agenda</th>
                                                <th scope="col" style="width: 30%;">Lokasi</th>
                                                <th scope="col" style="width: 10%;">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-nowrap text-center">10-14-2025 (12.00)</td>
                                                <td class="text-truncate"
                                                    style="max-width: 300px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                                    Rapat anggota Pemilu dengan bapak presiden Jokowidodo aja deh
                                                </td>
                                                <td class="text-truncate text-center"
                                                    style="max-width: 250px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                                    Condongcatur
                                                </td>
                                                <td class="text-center">
                                                    <button class="btn btn-success btn-sm">
                                                        Detil <i class="fa fa-eye"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection