@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <h2>Detail Notulen</h2>

        <div class="card mb-4">
            <div class="card-body">
                {{-- Pembicara --}}
                <p><strong>Pembicara:</strong> {{ $notulen->pembicara }}</p>

                {{-- Notulen --}}
                <p><strong>Notulen:</strong></p>
                <div class="border p-3 bg-light mb-3">
                    {!! nl2br(e($notulen->notulen)) !!}
                </div>

                {{-- Poin Pembahasan --}}
                @if(!empty($notulen->poin_pembahasan))
                    <p><strong>Poin Pembahasan:</strong></p>
                    <div class="border p-3 bg-light mb-3">
                        {!! nl2br(e($notulen->poin_pembahasan)) !!}
                    </div>
                @endif

                {{-- Kesimpulan --}}
                <p><strong>Kesimpulan:</strong></p>
                <div class="border p-3 bg-light">
                    {!! nl2br(e($notulen->kesimpulan)) !!}
                </div>
            </div>
        </div>

        <a href="{{ route('agenda.show', $notulen->agenda_id) }}" class="btn btn-secondary">Kembali ke Detail Agenda</a>
    </div>
@endsection