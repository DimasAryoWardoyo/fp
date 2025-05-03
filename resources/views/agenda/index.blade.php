@extends('layouts.dashboard')

@section('content')
    <div class="section-content section-dashboard-home">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Agenda</h2>
                <p class="dashboard-subtitle">Kelola dan Hadiri Agenda dengan Baik!</p>
            </div>
            <div class="dashboard-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card shadow-sm border-0 mb-3">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h5>Agenda</h5>
                                    <div>
                                        @can('admin')
                                            <a href="{{ route('agenda.create') }}" class="btn btn-warning">
                                                Tambah Agenda <i class="fa fa-plus-square" aria-hidden="true"></i>
                                            </a>
                                        @endcan
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <thead class="table-secondary">
                                            <tr class="text-center">
                                                <th scope="col" style="width: 20%;">Tanggal</th>
                                                <th scope="col" style="width: 40%;">Agenda</th>
                                                <th scope="col" style="width: 30%;">Lokasi</th>
                                                <th scope="col" style="width: 10%;">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($agenda as $agenda)
                                                <tr>
                                                    <td class="text-nowrap text-center">
                                                        {{ $agenda->waktu_mulai->format('d-m-Y (H:i)') }}
                                                    </td>
                                                    <td class="text-truncate"
                                                        style="max-width: 300px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                                        {{ $agenda->nama_agenda }}
                                                    </td>
                                                    <td class="text-truncate text-center"
                                                        style="max-width: 250px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                                        {{ $agenda->lokasi }}
                                                    </td>
                                                    <td class="text-center">
                                                        <a href="{{ route('agenda.show', $agenda->id) }}"
                                                            class="btn btn-success btn-sm">
                                                            Detil <i class="fa fa-eye"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <!-- Jika tidak ada agenda -->
                                @if($agenda === null)
                                    <p>Agenda tidak ditemukan.</p>
                                @else
                                    {{-- tampilkan agenda --}}
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection