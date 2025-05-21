@extends('layouts.dashboard')

@section('content')
    <div class="container mt-4">
        <h2>Edit Konten</h2>

        <form method="POST" action="{{ route('admin.content.update', $konten->id) }}" enctype="multipart/form-data">
            @csrf @method('PUT')

            <div class="mb-3">
                <label>Kategori</label>
                <select name="kategori_id" class="form-control" required>
                    @foreach($kategoris as $kategori)
                        <option value="{{ $kategori->id }}" {{ $konten->kategori_id == $kategori->id ? 'selected' : '' }}>
                            {{ $kategori->nama_kategori }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Nama Konten</label>
                <input type="text" name="nama_konten" class="form-control" value="{{ $konten->nama_konten }}" required>
            </div>

            <div class="mb-3">
                <label>Tanggal Konten</label>
                <input type="date" name="tanggal_konten" class="form-control" value="{{ $konten->tanggal_konten }}"
                    required>
            </div>

            <div class="mb-3">
                <label>Deskripsi</label>
                <textarea name="deskripsi" class="form-control" rows="4" required>{{ $konten->deskripsi }}</textarea>
            </div>

            @foreach(['gambar1', 'gambar2', 'gambar3'] as $gambar)
                <div class="mb-3">
                    <label>Gambar Lama ({{ $gambar }})</label><br>
                    <img src="{{ asset('storage/' . $konten->$gambar) }}" width="100">
                    <br><label>Ganti Gambar (opsional)</label>
                    <input type="file" name="{{ $gambar }}" class="form-control">
                </div>
            @endforeach

            {{-- Tombol Aksi --}}
            <div class="d-flex justify-content-between">
                <a href="{{ route('admin.content.index') }}" class="btn btn-danger">Batal</a>
                <button type="submit" class="btn btn-success">Simpan Perubahan</button>
            </div>
        </form>
    </div>
@endsection