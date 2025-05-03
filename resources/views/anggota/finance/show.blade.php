@extends('layouts.dashboard')

@section('content')
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading mb-4">
                <h2 class="dashboard-title">Detail Pengeluaran</h2>
                <p class="dashboard-subtitle">Lihat detail pengeluaran Anda</p>
            </div>
            <div class="dashboard-content">
                <div class="card mt-4 mb-2">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tbody>
                                {{-- Kegiatan --}}
                                <tr>
                                    <th style="width: 20%">Kegiatan</th>
                                    <td>{{ $pengeluaran->kegiatan }}</td>
                                </tr>

                                {{-- Tanggal --}}
                                <tr>
                                    <th>Tanggal</th>
                                    <td>{{ \Carbon\Carbon::parse($pengeluaran->tanggal)->format('d M Y') }}</td>
                                </tr>

                                {{-- Jumlah --}}
                                <tr>
                                    <th>Jumlah</th>
                                    <td>Rp {{ number_format($pengeluaran->jumlah, 0, ',', '.') }}</td>
                                </tr>
                                <tr>
                                    <th>Deskripsi</th>
                                    <td>{{ $pengeluaran->deskripsi }}</td>
                                </tr>

                                {{-- Bukti --}}
                                <tr>
                                    <th>Bukti</th>
                                    <td>
                                        @if ($pengeluaran->bukti)
                                            @php $ext = pathinfo($pengeluaran->bukti, PATHINFO_EXTENSION); @endphp
                                            @if (in_array($ext, ['jpg', 'jpeg', 'png']))
                                                <img src="{{ asset('storage/' . $pengeluaran->bukti) }}" alt="Bukti" width="200"
                                                    class="img-thumbnail">
                                            @else
                                                <a href="{{ asset('storage/' . $pengeluaran->bukti) }}" target="_blank"
                                                    class="btn btn-sm btn-outline-primary">
                                                    Lihat Bukti
                                                </a>
                                            @endif
                                        @else
                                            <span class="text-muted">Tidak ada bukti</span>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        {{-- Tombol Kembali --}}
                        <a href="{{ route('overview') }}" class="btn btn-danger mt-3">
                            Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection