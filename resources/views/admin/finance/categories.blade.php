@extends('layouts.dashboard')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Kategori Keuangan</h1>

        <form action="{{ route('admin.finance.categories.store') }}" method="POST" class="mb-6">
            @csrf
            <div class="flex flex-col md:flex-row gap-4">
                <input type="text" name="name" placeholder="Nama Kategori" required class="border p-2 rounded">
                <select name="type" required class="border p-2 rounded">
                    <option value="">Tipe</option>
                    <option value="income">Pemasukan</option>
                    <option value="expense">Pengeluaran</option>
                </select>
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Tambah</button>
            </div>
        </form>

        <table class="w-full bg-white rounded shadow">
            <thead>
                <tr>
                    <th class="border p-2">Nama</th>
                    <th class="border p-2">Tipe</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $cat)
                    <tr>
                        <td class="border p-2">{{ $cat->name }}</td>
                        <td class="border p-2">{{ ucfirst($cat->type) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection