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
                    <div class="col-md-6">
                        <div class="card mb-2">
                            <div class="card-body">
                                <div class="dashboard-card-subtitle">
                                    Akun
                                    <button class="btn btn-warning float-end">Edit <i class="fa fa-pencil-square"
                                            aria-hidden="true"></i></button>
                                </div>
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <th>Nama</th>
                                            <td class="text-truncate" style="max-width: 200px;">{{ Auth::user()->name }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td class="text-truncate" style="max-width: 200px;">{{ Auth::user()->email }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Role</th>
                                            <td class="text-truncate" style="max-width: 200px;">{{ Auth::user()->role }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card mb-2">
                            <div class="card-body">
                                <div class="dashboard-card-subtitle">
                                    Identitas
                                    <button class="btn btn-warning float-end">Edit <i class="fa fa-pencil-square"
                                            aria-hidden="true"></i></button>
                                </div>
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <th>Nomor HP</th>
                                            <td class="text-truncate" style="max-width: 200px;">
                                                {{ Auth::user()->identitas->no_whatsapp ?? 'Belum diisi' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Tanggal Lahir</th>
                                            <td class="text-truncate" style="max-width: 200px;">
                                                {{ Auth::user()->identitas->tanggal_lahir ?? 'Belum diisi' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Status</th>
                                            <td class="text-truncate" style="max-width: 200px;">
                                                {{ Auth::user()->identitas->status ?? 'Belum diisi' }}
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
@endsection