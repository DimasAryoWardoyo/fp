@extends('layouts.dashboard')

@section('content')
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">
                    Edit Konten
                </h2>
                <p class="dashboard-subtitle">
                    Edit konten yang ada di website Karang Taruna
                </p>
            </div>
            <div class="dashboard-content">
                <div class="row">
                    <div class="col-md-4 col-lg-4 mb-3">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body text-center bg-success rounded">
                                <a href="{{ route('admin.content.kategori') }}" class="btn btn-success w-100">
                                    + Tambah Category
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4 mb-3">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body text-center bg-primary rounded">
                                <a href="{{ route('admin.content.create') }}" class="btn btn-primary w-100">
                                    + Tambah Konten
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4 mb-3">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body text-center bg-warning rounded">
                                <a href="{{ route('admin.content.banneer-create') }}"
                                    class="btn btn-warning text-white w-100">
                                    + Gambar Banner
                                </a>
                            </div>
                        </div>
                    </div>

                    {{-- =========================== Banner =========================== --}}
                    <div class="col-12 mt-2">
                        <div class="card shadow-sm border-0">
                            <div class="card-body">
                                <h5 class="mb-3">Daftar Banner</h5>

                                @if(session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                <div class="table-responsive">
                                    <table class="table table-bordered text-center align-middle">
                                        <thead class="table-light">
                                            <tr>
                                                <th>No</th>
                                                <th>Gambar</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($banners as $banner)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>
                                                        <img src="{{ asset('storage/' . $banner->gambar) }}"
                                                            class="img-thumbnail"
                                                            style="max-width: 150px; max-height: 100px; object-fit: cover;"
                                                            alt="Banner">

                                                    </td>
                                                    <td>
                                                        <a href="{{ route('admin.content.banner.edit', $banner->id) }}"
                                                            class="btn btn-warning btn-sm">Edit</a>
                                                        <form action="{{ route('admin.content.banner.destroy', $banner->id) }}"
                                                            method="POST" style="display:inline-block;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm"
                                                                onclick="return confirm('Hapus banner ini?')">
                                                                Hapus
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="3" class="text-center">Tidak ada banner</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- =========================== Kategori =========================== --}}
                    <div class="col-12 mt-2">
                        <div class="card shadow-sm border-0">
                            <div class="card-body">
                                <h5 class="mb-3">Daftar Kategori</h5>

                                @if(session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                <div class="table-responsive">
                                    <table class="table table-bordered text-center align-middle">
                                        <thead class="table-light">
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Kategori</th>
                                                <th>Gambar</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($kategoris as $kategori)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $kategori->nama_kategori }}</td>
                                                    <td>
                                                        @if($kategori->gambar_kategori)
                                                            <img src="{{ asset('storage/' . $kategori->gambar_kategori) }}"
                                                                class="img-thumbnail"
                                                                style="max-width: 100px; max-height: 100px; object-fit: cover;"
                                                                alt="{{ $kategori->nama_kategori }}">

                                                        @else
                                                            <span class="text-muted">Tidak ada gambar</span>
                                                        @endif
                                                    </td>

                                                    <td>
                                                        <a href="{{ route('admin.content.kategori.edit', $kategori->id) }}"
                                                            class="btn btn-warning btn-sm">Edit</a>
                                                        <form
                                                            action="{{ route('admin.content.kategori.destroy', $kategori->id) }}"
                                                            method="POST" style="display:inline-block;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm"
                                                                onclick="return confirm('Yakin ingin menghapus kategori ini?')">
                                                                Hapus
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="4" class="text-center">Tidak ada kategori</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>


                    {{-- =========================== Konten =========================== --}}
                    <div class="col-12 mt-2">
                        <div class="card shadow-sm border-0">
                            <div class="card-body">
                                <div class="table-responsive">
                                    @if(session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif

                                    <table class="table table-bordered text-center align-middle">
                                        <thead class="table-light">
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Konten</th>
                                                <th>Gambar</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($kontens as $konten)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $konten->nama_konten }}</td>
                                                    <td>
                                                        <img src="{{ asset('storage/' . $konten->gambar1) }}"
                                                            class="img-thumbnail"
                                                            style="max-width: 100px; max-height: 100px; object-fit: cover;"
                                                            alt="Gambar Konten">
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('admin.content.edit', $konten->id) }}"
                                                            class="btn btn-warning btn-sm">Edit</a>
                                                        <form action="{{ route('admin.content.destroy', $konten->id) }}"
                                                            method="POST" style="display:inline-block;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm"
                                                                onclick="return confirm('Yakin ingin menghapus?')">
                                                                Hapus
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="4" class="text-center">Tidak ada konten</td>
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