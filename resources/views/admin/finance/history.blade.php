@extends('layouts.dashboard')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Histori Transaksi</h1>

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