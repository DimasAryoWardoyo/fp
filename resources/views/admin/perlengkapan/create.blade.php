@extends('layouts.dashboard')

@section('content')
    {{-- Content --}}
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading mb-4">
                <h2 class="dashboard-title">Tambah Barang</h2>
                <p class="dashboard-subtitle">Masukkan data perlengkapan baru</p>
            </div>

            <div class="dashboard-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card shadow-sm border-0">
                            <div class="card-body">
                                <form method="POST" action="{{ route('admin.perlengkapan.store') }}"
                                    enctype="multipart/form-data">
                                    @csrf

                                    {{-- Nama Barang --}}
                                    <div class="mb-3">
                                        <label for="nama_barang" class="form-label">Nama Barang</label>
                                        <input type="text" name="nama_barang" class="form-control" required>
                                    </div>

                                    {{-- Jumlah Barang --}}
                                    <div class="mb-3">
                                        <label for="jumlah_barang" class="form-label">Jumlah Barang</label>
                                        <input type="number" name="jumlah_barang" class="form-control" required>
                                    </div>

                                    {{-- Keterangan --}}
                                    <div class="mb-3">
                                        <label for="keterangan" class="form-label">Keterangan</label>
                                        <textarea name="keterangan" class="form-control" rows="3" required></textarea>
                                    </div>

                                    {{-- Foto Barang --}}
                                    <div class="mb-3">
                                        <label for="foto_barang" class="form-label">Foto Barang</label>
                                        <input type="file" name="foto_barang" class="form-control" required>
                                    </div>

                                    {{-- Tombol Simpan --}}
                                    <div class="d-flex justify-content-between">
                                        <a href="{{ route('admin.perlengkapan.index') }}"
                                            class="btn btn-danger ms-2">Batal</a>
                                        <button type="submit" class="btn btn-success">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection