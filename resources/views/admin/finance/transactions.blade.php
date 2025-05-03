@extends('layouts.dashboard')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Semua Transaksi</h1>

        <form action="{{ route('admin.finance.transactions.store') }}" method="POST" class="mb-6">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <select name="type" required class="border p-2 rounded">
                    <option value="">Pilih Tipe</option>
                    <option value="income">Pemasukan</option>
                    <option value="expense">Pengeluaran</option>
                </select>
                <input type="number" name="amount" placeholder="Jumlah (Rp)" required class="border p-2 rounded">
                <select name="category_id" required class="border p-2 rounded">
                    <option value="">Pilih Kategori</option>
                    @foreach(\App\Models\Category::all() as $category)
                        <option value="{{ $category->id }}">{{ $category->name }} ({{ ucfirst($category->type) }})</option>
                    @endforeach
                </select>
                <input type="text" name="description" placeholder="Deskripsi (Opsional)" class="border p-2 rounded">
            </div>
            <button type="submit" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded">Tambah Transaksi</button>
        </form>

        <table class="w-full bg-white rounded shadow">
            <thead>
                <tr>
                    <th class="border p-2">Tanggal</th>
                    <th class="border p-2">Tipe</th>
                    <th class="border p-2">Jumlah</th>
                    <th class="border p-2">Kategori</th>
                    <th class="border p-2">Deskripsi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transactions as $trx)
                    <tr>
                        <td class="border p-2">{{ $trx->created_at->format('d M Y') }}</td>
                        <td class="border p-2">{{ ucfirst($trx->type) }}</td>
                        <td class="border p-2">Rp {{ number_format($trx->amount, 0, ',', '.') }}</td>
                        <td class="border p-2">{{ $trx->category->name }}</td>
                        <td class="border p-2">{{ $trx->description }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection