@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <h2>Edit Notulen</h2>

        <form action="{{ route('notulen.update', $notulen->id) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- Pembicara --}}
            <div class="mb-3">
                <label for="pembicara" class="form-label">Pembicara</label>
                <input type="text" name="pembicara" id="pembicara"
                    class="form-control @error('pembicara') is-invalid @enderror"
                    value="{{ old('pembicara', $notulen->pembicara) }}" required>

                @error('pembicara')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Isi Notulen --}}
            <div class="mb-3">
                <label for="notulen" class="form-label">Isi Notulen</label>
                <textarea name="notulen" id="notulen" rows="6" class="form-control @error('notulen') is-invalid @enderror"
                    required>{{ old('notulen', $notulen->notulen) }}</textarea>

                @error('notulen')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Poin Pembahasan --}}
            <div class="mb-3">
                <label for="poin_pembahasan" class="form-label">Poin Pembahasan</label>
                <textarea name="poin_pembahasan" id="poin_pembahasan" rows="4"
                    class="form-control @error('poin_pembahasan') is-invalid @enderror">{{ old('poin_pembahasan', $notulen->poin_pembahasan) }}</textarea>

                @error('poin_pembahasan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Kesimpulan --}}
            <div class="mb-3">
                <label for="kesimpulan" class="form-label">Kesimpulan</label>
                <textarea name="kesimpulan" id="kesimpulan" rows="4"
                    class="form-control @error('kesimpulan') is-invalid @enderror"
                    required>{{ old('kesimpulan', $notulen->kesimpulan) }}</textarea>

                @error('kesimpulan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="{{ route('agenda.show', $notulen->agenda_id) }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection