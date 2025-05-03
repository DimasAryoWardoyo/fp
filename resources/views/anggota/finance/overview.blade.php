@extends('layouts.dashboard')

@section('content')
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading mb-4">
                <h2 class="dashboard-title">Ringkasan Keuangan</h2>
                <p class="dashboard-subtitle">Lihat ringkasan keuangan Anda</p>
            </div>
            <div class="dashboard-content">
                <div class="row">
                    {{-- Ringkasan Keuangan --}}
                    <div class="col-md-3 mb-3">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body">
                                <h6 class="text-muted">Total Pemasukan</h6>
                                <h5 class="text-success">Rp {{ number_format($totalPemasukan, 0, ',', '.') }}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body">
                                <h6 class="text-muted">Kas Saya</h6>
                                <h5 class="text-info">Rp {{ number_format($kasSaya, 0, ',', '.') }}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body">
                                <h6 class="text-muted">Total Pengeluaran</h6>
                                <h5 class="text-danger">Rp {{ number_format($totalPengeluaran, 0, ',', '.') }}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body">
                                <h6 class="text-muted">Saldo Saat Ini</h6>
                                <h5 class="text-primary">Rp {{ number_format($saldo, 0, ',', '.') }}</h5>
                            </div>
                        </div>
                    </div>

                    {{-- Tabel Pengeluaran --}}
                        <div class="card-body">
                            <h5 class="mb-3">Detail Pengeluaran</h5>
                            <div class="table-responsive">
                                <table class="table table-bordered rounded text-center align-middle">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>Kegiatan</th>
                                            <th>Jumlah</th>
                                            <th>Bukti</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($pengeluaran as $item)
                                            <tr>
                                                <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d/m/Y') }}</td>
                                                <td>{{ $item->kegiatan }}</td>
                                                <td>Rp {{ number_format($item->jumlah, 0, ',', '.') }}</td>
                                                <td>
                                                    @if ($item->bukti)
                                                        @php $ext = pathinfo($item->bukti, PATHINFO_EXTENSION); @endphp
                                                        @if (in_array($ext, ['jpg', 'jpeg', 'png']))
                                                            <img src="{{ asset('storage/' . $item->bukti) }}" alt="Bukti" width="100"
                                                                class="img-thumbnail">
                                                        @else
                                                            <a href="{{ asset('storage/' . $item->bukti) }}" target="_blank"
                                                                class="btn btn-sm btn-outline-primary">
                                                                Lihat Bukti
                                                            </a>
                                                        @endif
                                                    @else
                                                        <span class="text-muted">-</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('anggota.pengeluaran.show', $item->id) }}"
                                                        class="btn btn-sm btn-primary">
                                                        Detail
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-muted">Belum ada pengeluaran</td>
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
@endsection