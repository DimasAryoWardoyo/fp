@extends('layouts.dashboard')
@section('title', 'Edit Kategori - Karang Taruna Klaten Asyik')

@section('content')
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading mb-4">
                <h2 class="dashboard-title">Edit Kategori</h2>
                <p class="dashboard-subtitle">Ubah data kategori yang sudah ada</p>
            </div>

            <div class="dashboard-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card shadow-sm border-0">
                            <div class="card-body">
                                <form action="{{ route('admin.content.kategori.update', $kategori->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    {{-- Nama Kategori --}}
                                    <div class="mb-3">
                                        <label for="nama_kategori" class="form-label">Nama Kategori</label>
                                        <input type="text" name="nama_kategori" id="nama_kategori" class="form-control"
                                            value="{{ old('nama_kategori', $kategori->nama_kategori) }}" required>
                                    </div>

                                    {{-- Gambar --}}
                                    <div class="mb-3">
                                        <label for="gambar" class="form-label">Gambar Kategori (opsional)</label>
                                        <input type="file" name="gambar_kategori" id="gambar_kategori" class="form-control">
                                        @if ($kategori->gambar_kategori)
                                            <div class="mt-2">
                                                <p class="mb-1">Gambar saat ini:</p>
                                                <img src="{{ asset('storage/' . $kategori->gambar_kategori) }}" width="150"
                                                    class="img-thumbnail">
                                            </div>
                                        @endif
                                    </div>

                                    {{-- Tombol Aksi --}}
                                    <div class="d-flex justify-content-between">
                                        <a href="{{ route('admin.content.index') }}" class="btn btn-danger">Batal</a>
                                        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
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