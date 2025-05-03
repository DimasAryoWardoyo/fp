@extends('layouts.dashboard')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Anggaran</h1>

        <form action="{{ route('admin.finance.budget.store') }}" method="POST" class="mb-6">
            @csrf
            <div class="flex flex-col md:flex-row gap-4">
                <input type="number" name="amount" placeholder="Jumlah (Rp)" required class="border p-2 rounded">
                <input type="text" name="period" placeholder="Periode (contoh: April 2025)" required
                    class="border p-2 rounded">
                <button type="submit" class="bg-indigo-500 text-white px-4 py-2 rounded">Tambah Anggaran</button>
            </div>
        </form>

        <table class="w-full bg-white rounded shadow">
            <thead>
                <tr>
                    <th class="border p-2">Jumlah</th>
                    <th class="border p-2">Periode</th>
                </tr>
            </thead>
            <tbody>
                @foreach($budgets as $budget)
                    <tr>
                        <td class="border p-2">Rp {{ number_format($budget->amount, 0, ',', '.') }}</td>
                        <td class="border p-2">{{ $budget->period }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection