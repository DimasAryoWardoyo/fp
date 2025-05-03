@extends('layouts.dashboard')

@section('content')
    {{-- Content --}}
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            {{-- Heading --}}
            <div class="dashboard-heading mb-4">
                <h2 class="dashboard-title">Daftar Perlengkapan</h2>
                <p class="dashboard-subtitle">Berikut adalah daftar seluruh perlengkapan yang tersedia.</p>
            </div>

            {{-- Table Content --}}
            <div class="dashboard-content">
                <div class="row">
                    <div class="col-12">
                        <div class="card shadow-sm border-0 mb-3">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <thead class="table-secondary text-center">
                                            <tr>
                                                <th>Nama</th>
                                                <th>Jumlah</th>
                                                <th>Keterangan</th>
                                                <th>Foto</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($perlengkapan as $item)
                                                <tr class="text-center align-middle">
                                                    <td>{{ $item->nama_barang }}</td>
                                                    <td>{{ $item->jumlah_barang }}</td>
                                                    <td>{{ $item->keterangan }}</td>
                                                    <td>
                                                        @if($item->foto_barang)
                                                            <img src="{{ asset('storage/' . $item->foto_barang) }}"
                                                                alt="Foto {{ $item->nama_barang }}" width="100"
                                                                class="img-thumbnail">
                                                        @else
                                                            <span class="text-muted">-</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="4" class="text-center text-muted">Belum ada perlengkapan.</td>
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