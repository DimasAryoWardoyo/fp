@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <h4>Tambah Pengeluaran</h4>
        <form action="{{ route('admin.finance.pengeluaran.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="kegiatan">Nama Kegiatan</label>
                <input type="text" name="kegiatan" class="form-control" required>
            </div>
            <div class="form-group mt-2">
                <label for="tanggal">Tanggal</label>
                <input type="date" name="tanggal" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="jumlah">Jumlah Pengeluaran</label>
                <input type="number" name="jumlah" class="form-control" required>
            </div>
            <div class="form-group mt-2">
                <label for="deskripsi">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" rows="3" required></textarea>
            </div>
            <div class="form-group mt-2">
                <label for="bukti">Upload Bukti (Opsional)</label>
                <input type="file" name="bukti" class="form-control" accept=".jpg,.jpeg,.png,.pdf">
            </div>
            <button type="submit" class="btn btn-danger mt-3">Simpan</button>
            <a href="{{ route('admin.finance.index') }}" class="btn btn-secondary mt-3">Kembali</a>
        </form>
    </div>
@endsection