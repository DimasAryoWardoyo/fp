@extends('layouts.dashboard')

@section('content')
    <div class="section-content section-dashboard-home">
        <div class="container-fluid">
            <div class="dashboard-heading mb-4">
                <h2>Daftar Perlengkapan</h2>
                <p class="text-muted">Berikut adalah daftar perlengkapan yang tersedia</p>
            </div>

            <div class="dashboard-content">
                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-body">
                        {{-- Tombol navigasi --}}
                        <div class="d-flex flex-wrap gap-2 mb-3">
                            @can('admin')
                                <a href="{{ route('perlengkapan.create') }}" class="btn btn-primary">
                                    <i class="bi bi-plus-circle me-1"></i> Tambah Barang
                                </a>
                                <a href="{{ route('peminjaman.tanggapan') }}" class="btn btn-success">
                                    <i class="bi bi-box-arrow-in-right me-1"></i> Pengajuan Peminjaman
                                </a>
                            @endcan
                            <a href="{{ route('peminjaman.index') }}" class="btn btn-primary">
                                <i class="bi bi-plus-circle me-1"></i> Ajukan Peminjaman
                            </a>
                        </div>

                        {{-- Tabel daftar perlengkapan --}}
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover align-middle">
                                <thead class="table-light text-center">
                                    <tr class="bg-light">
                                        <th>Nama</th>
                                        <th>Stok</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($perlengkapans as $item)
                                        <tr>
                                            <td>{{ $item->nama }}</td>
                                            <td class="text-center">{{ $item->stok }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('perlengkapan.show', $item->id) }}"
                                                    class="btn btn-sm btn-info me-1">
                                                    <i class="bi bi-eye"></i> Detail
                                                </a>

                                                @can('admin')
                                                    <a href="{{ route('perlengkapan.edit', $item->id) }}"
                                                        class="btn btn-sm btn-warning me-1">
                                                        <i class="bi bi-pencil-square"></i> Edit
                                                    </a>
                                                    <form method="POST" action="{{ route('perlengkapan.destroy', $item->id) }}"
                                                        class="d-inline"
                                                        onsubmit="return confirm('Yakin ingin menghapus perlengkapan ini?')">
                                                        @csrf @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger">
                                                            <i class="bi bi-trash"></i> Hapus
                                                        </button>
                                                    </form>
                                                @endcan
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="text-center text-muted">Belum ada perlengkapan tersedia.</td>
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