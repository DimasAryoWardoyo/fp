@extends('layouts.dashboard')

@section('content')
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading mb-4">
                <h2 class="dashboard-title">Daftar Keuangan</h2>
                <p class="dashboard-subtitle">Kelola keuangan Karang Taruna</p>
            </div>

            <div class="dashboard-content">
                <div class="row">

                    {{-- Notifikasi --}}
                    @if(session('success'))
                        <div class="col-12">
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        </div>
                    @endif

                    {{-- Tombol Aksi --}}
                    <div class="col-md-3 col-lg-3 mb-3">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body text-center bg-success rounded">
                                <a href="{{ route('admin.finance.kas.create') }}" class="btn btn-success w-100">
                                    + add Kas
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-lg-3 mb-3">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body text-center bg-warning rounded">
                                <a href="{{ route('admin.finance.hutang') }}" class="btn btn-warning w-100">
                                    Lihat hutang
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-lg-3 mb-3">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body text-center bg-primary rounded">
                                <a href="{{ route('admin.finance.dana_lain.create') }}" class="btn btn-primary w-100">
                                    + add Dana Lain
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-lg-3 mb-3">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body text-center bg-danger rounded">
                                <a href="{{ route('admin.finance.pengeluaran.create') }}" class="btn btn-danger w-100">
                                    + add Pengeluaran
                                </a>
                            </div>
                        </div>
                    </div>

                    {{-- Ringkasan --}}
                    <div class="col-12 mt-2">
                        <div class="card shadow-sm border-0">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered text-center align-middle">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Total Kas</th>
                                                <th>Total Dana Lain</th>
                                                <th>Saldo Saat Ini</th>
                                                <th>Total Pengeluaran</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="rounded">
                                                    <h5>
                                                        Rp {{ number_format($totalKas, 0, ',', '.') }}
                                                    </h5>
                                                </td>
                                                <td class="rounded">
                                                    <h5>
                                                        Rp {{ number_format($saldoDanaLain, 0, ',', '.') }}
                                                    </h5>
                                                </td>
                                                <td class="rounded">
                                                    <h5>
                                                        Rp {{ number_format($saldoAkhir, 0, ',', '.') }}
                                                    </h5>
                                                </td>
                                                <td class="rounded">
                                                    <h5>
                                                        Rp {{ number_format($totalPengeluaran, 0, ',', '.') }}
                                                    </h5>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                {{-- Tabel Hutang --}}
                                <h5 class="mt-2">Daftar Hutang</h5>
                                <div class="table-responsive">
                                    <table class="table table-bordered text-center align-middle table-hover">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Nama</th>
                                                <th>Tanggal</th>
                                                <th>Jumlah</th>
                                                <th>Keterangan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($hutangs as $hutang)
                                                <tr>
                                                    <td>{{ $hutang->user->name }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($hutang->tanggal)->format('d M Y') }}</td>
                                                    <td class="text-danger font-weight-bold">Rp
                                                        -{{ number_format($hutang->jumlah, 0, ',', '.') }}</td>
                                                    <td>{{ $hutang->keterangan }}</td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="5" class="text-center text-muted">Tidak ada hutang
                                                        tercatat.</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>

                                {{-- Tabel Kas Saya --}}
                                <h5 class="mt-3">Kas Saya</h5>
                                <div class="table-responsive">
                                    <table class="table table-bordered text-center align-middle table-hover">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Tanggal</th>
                                                <th>Jumlah</th>
                                                <th>Deskripsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($kasSaya as $kas)
                                                <tr>
                                                    <td>{{ $kas->tanggal }}</td>
                                                    <td>Rp {{ number_format($kas->jumlah, 0, ',', '.') }}</td>
                                                    <td>{{ $kas->deskripsi }}</td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="5" class="text-center text-muted">Belum ada data kas.</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>

                                {{-- Tabel Pengeluaran --}}
                                <h5 class="mb-3 mt-3">Semua Pengeluaran</h5>
                                <div class="table-responsive">
                                    <table class="table table-bordered text-center align-middle table-hover">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Kegiatan</th>
                                                <th>Tanggal</th>
                                                <th>Jumlah</th>
                                                <th>Bukti</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($pengeluaran as $item)
                                                <tr>
                                                    <td>{{ $item->kegiatan }}</td>
                                                    <td>{{ $item->tanggal }}</td>
                                                    <td>{{ $item->jumlah }}</td>
                                                    <td>
                                                        @if ($item->bukti)
                                                            @php $ext = pathinfo($item->bukti, PATHINFO_EXTENSION); @endphp
                                                            @if (in_array($ext, ['jpg', 'jpeg', 'png']))
                                                                <img src="{{ asset('storage/' . $item->bukti) }}" alt="Bukti"
                                                                    width="100" class="img-thumbnail">
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
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="5" class="text-center text-muted">Tidak ada pengeluaran
                                                        tercatat.</td>
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
    </div>
@endsection