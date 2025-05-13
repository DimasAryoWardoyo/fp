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
                    {{-- <div class="col-md-4 col-lg-4 mb-3">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body text-center bg-warning rounded">
                                <a href="{{ route('admin.content.edit') }}" class="btn btn-warning text-white w-100">
                                    Edit Konten
                                </a>
                            </div>
                        </div>
                    </div> --}}

                    <div class="col-12 mt-2">
                        <div class="card shadow-sm border-0">
                            <div class="card-body">
                                <div class="table-responsive">
                                    @if(session('success'))
                                        <div class="alert alert-success">{{ session('success') }}</div>
                                    @endif

                                    <table class="table table-bordered text-center align-middle">
                                        <thead>
                                            <tr>
                                                <th>Kategori</th>
                                                <th>Nama Konten</th>
                                                <th>Gambar</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($kontens as $konten)
                                                <tr>
                                                    <td>{{ $konten->kategori->nama_kategori }}</td>
                                                    <td>{{ $konten->nama_konten }}</td>
                                                    <td>
                                                        <img src="{{ asset('storage/' . $konten->gambar1) }}" width="80">
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('admin.content.edit', $konten->id) }}"
                                                            class="btn btn-warning">Edit</a>
                                                        <form action="{{ route('admin.content.destroy', $konten->id) }}"
                                                            method="POST" style="display:inline-block;">
                                                            @csrf @method('DELETE')
                                                            <button onclick="return confirm('Yakin ingin menghapus?')"
                                                                class="btn btn-danger">Hapus</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
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