@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <h3>Tambah Data Kas</h3>

        <form action="{{ route('admin.finance.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="type">Jenis Transaksi</label>
                <select name="type" class="form-control" required>
                    <option value="pemasukan">Pemasukan</option>
                    <option value="pengeluaran">Pengeluaran</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="kategori">Kategori</label>
                <input type="text" name="kategori" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="jumlah">Jumlah (Rp)</label>
                <input type="number" name="jumlah" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="tanggal">Tanggal</label>
                <input type="date" name="tanggal" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="deskripsi">Deskripsi (Opsional)</label>
                <textarea name="deskripsi" class="form-control" rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('admin.finance.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection