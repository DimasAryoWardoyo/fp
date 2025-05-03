@extends('layouts.dashboard')

@section('content')
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Tambah Kas Pribadi</h2>
                <p class="dashboard-subtitle">Sesuaikan dengan kebutuhan anda</p>
            </div>
            <div class="dashboard-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card shadow-sm border-0 mb-3">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    @if(session('success'))
                                        <div class="alert alert-success">{{ session('success') }}</div>
                                    @endif
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover">
                                            <thead class="table-secondary">
                                                <tr class="text-center">
                                                    <th>Nama</th>
                                                    <th>kas masuk</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($users as $user)
                                                    <tr>
                                                        <td>{{ $user->name }}</td>
                                                        <td>Rp {{ number_format($user->kas_sum_jumlah ?? 0, 0, ',', '.') }}</td>

                                                        <td class="text-center">
                                                            <a href="{{ route('admin.finance.select', $user->id) }}"
                                                                class="btn btn-sm btn-success">
                                                                Tambah Kas
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
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
    </div>

@endsection