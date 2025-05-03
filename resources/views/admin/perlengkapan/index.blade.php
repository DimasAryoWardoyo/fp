@extends('layouts.dashboard')

@section('content')
    {{-- Content --}}
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            {{-- Heading --}}
            <div class="dashboard-heading mb-4">
                <h2 class="dashboard-title">Daftar Perlengkapan</h2>
                <p class="dashboard-subtitle">Kelola perlengkapan secara efisien</p>
            </div>

            {{-- Content --}}
            <div class="dashboard-content">
                <div class="row">
                    <div class="col-12">
                        <div class="card shadow-sm border-0 mb-4">
                            <div class="card-body">
                                {{-- Tombol Tambah --}}
                                <a href="{{ route('admin.perlengkapan.create') }}" class="btn btn-warning mb-3">
                                    + Tambah Barang
                                </a>

                                {{-- Tabel --}}
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover text-center align-middle">
                                        <thead class="table-secondary">
                                            <tr>
                                                <th>Nama</th>
                                                <th>Jumlah</th>
                                                <th>Keterangan</th>
                                                <th>Foto</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($perlengkapan as $item)
                                                <tr>
                                                    <td>{{ $item->nama_barang }}</td>
                                                    <td>{{ $item->jumlah_barang }}</td>
                                                    <td>{{ $item->keterangan }}</td>
                                                    <td>
                                                        @if($item->foto_barang)
                                                            <img src="{{ asset('storage/' . $item->foto_barang) }}" width="100"
                                                                class="img-thumbnail">
                                                        @else
                                                            <span class="text-muted">Tidak ada foto</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <form action="{{ route('admin.perlengkapan.destroy', $item->id) }}"
                                                            method="POST"
                                                            onsubmit="return confirm('Yakin ingin menghapus barang ini?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger">
                                                                Hapus
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="5" class="text-muted">Belum ada perlengkapan.</td>
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