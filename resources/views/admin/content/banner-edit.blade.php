@extends('layouts.dashboard')
@section('title', 'Edit Banner - Karang Taruna Klaten Asyik')

@section('content')
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading mb-4">
                <h2 class="dashboard-title">
                    Edit Gambar Banner
                </h2>
                <p class="dashboard-subtitle">
                    Ubah data gambar banner
                    <br> untuk memperbarui tampilan di halaman utama
                </p>
            </div>

            <div class="dashboard-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card shadow-sm border-0">
                            <div class="card-body">
                                <form method="POST" action="{{ route('admin.content.banner.update', $banner->id) }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    {{-- Gambar Banner Lama --}}
                                    <div class="mb-3">
                                        <label>Gambar Banner Saat Ini</label><br>
                                        <img src="{{ asset('storage/' . $banner->gambar) }}" class="img-fluid" width="300"
                                            alt="Banner Saat Ini">
                                    </div>

                                    {{-- Upload Gambar Baru --}}
                                    <div class="mb-3">
                                        <label>Ganti Gambar Banner</label>
                                        <input type="file" name="gambar_banner" class="form-control">
                                        <small class="text-muted">Biarkan kosong jika tidak ingin mengubah gambar</small>
                                    </div>

                                    {{-- Tombol Aksi --}}
                                    <div class="d-flex justify-content-between">
                                        <a href="{{ route('admin.content.index') }}" class="btn btn-danger ms-2">Batal</a>
                                        <button type="submit" class="btn btn-success">Update Banner</button>
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