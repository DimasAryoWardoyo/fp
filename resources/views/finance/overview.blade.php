@extends('layouts.dashboard')

@section('content')

    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Ringkasan Keuangan Saya</h2>
            </div>
            <div class="dashboard-content">
                <div class="row">
                    <div class="col-md-12 mt-2">
                        <div class="card shadow-sm border-0 mb-3">
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <div class="alert alert-success">
                                            <strong>Total Pemasukan:</strong><br>
                                            Rp {{ number_format($totalMasuk, 0, ',', '.') }}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="alert alert-danger">
                                            <strong>Total Pengeluaran:</strong><br>
                                            Rp {{ number_format($totalKeluar, 0, ',', '.') }}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="alert alert-info">
                                            <strong>Saldo Akhir:</strong><br>
                                            Rp {{ number_format($totalMasuk - $totalKeluar, 0, ',', '.') }}
                                        </div>
                                    </div>
                                </div>

                                <h5>Detail Transaksi Anda</h5>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>Jenis</th>
                                            <th>Kategori</th>
                                            <th>Jumlah</th>
                                            <th>Deskripsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($kas as $item)
                                            <tr>
                                                <td>{{ $item->tanggal }}</td>
                                                <td>{{ ucfirst($item->type) }}</td>
                                                <td>{{ $item->kategori }}</td>
                                                <td>Rp {{ number_format($item->jumlah, 0, ',', '.') }}</td>
                                                <td>{{ $item->deskripsi }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center">Belum ada data.</td>
                                            </tr>
                                        @endforelse
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