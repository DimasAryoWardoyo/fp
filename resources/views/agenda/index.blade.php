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
                        <div class="card mb-2">
                            <div class="card-body">
                                <div class="dashboard-card-subtitle mb-2">
                                    Agenda
                                    @can('admin')
                                    <button class="btn btn-warning float-end ">Tambah Agenda <i class="fa fa-plus-square"
                                            aria-hidden="true"></i></button>
                                    @endcan
                                    <button class="btn btn-warning float-end mr-3">Kehadiran <i class="fa fa-address-card"
                                            aria-hidden="true"></i>
                                    </button>
                                </div>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Tanggal</th>
                                            <th scope="col">Agenda</th>
                                            <th scope="col">Lokasi</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>10-14-2025</td>
                                            <td>Rapat anggota Pemilu</td>
                                            <td>Condongcatur</td>
                                            <td><button class="btn btn-success">detil</button></td>
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
@endsection