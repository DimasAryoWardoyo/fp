@extends('layouts.dashboard')

{{-- DataTables CSS --}}
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">

@section('content')
    <div class="section-content section-dashboard-home">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h4>Daftar Hadir untuk: {{ $agenda->nama_agenda }}</h4>
                <p class="dashboard-subtitle">Lihat Daftar Hadir Agenda</p>
            </div>
        </div>

        <div class="dashboard-content">
            <div class="card mb-4 mt-4">
                <div class="card-body">
                    <div class="mb-3">
                    </div>

                    <table id="presensi-table" class="table table-bordered mt-3">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Waktu Presensi</th>
                                <th>Token</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($presensi as $index => $data)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $data->user->name ?? 'Tidak Diketahui' }}</td>
                                    <td>{{ $data->waktu_presensi }}</td>
                                    <td>{{ $data->token_yang_dipakai }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <a href="{{ route('agenda.index') }}" class="btn btn-secondary">Kembali</a>
    </div>

    {{-- JS Libraries --}}
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

    <script>
        $(document).ready(function() {
            const table = $('#presensi-table').DataTable({
                dom: 'Bfrtip',
                buttons: [{
                        extend: 'excelHtml5',
                        title: 'Daftar Presensi - {{ $agenda->nama_agenda }}',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'print',
                        title: 'Daftar Presensi - {{ $agenda->nama_agenda }}',
                        exportOptions: {
                            columns: ':visible'
                        }
                    }
                ],
                language: {
                    search: "Cari:",
                    lengthMenu: "Tampilkan _MENU_ entri",
                    info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                    paginate: {
                        next: "Berikutnya",
                        previous: "Sebelumnya"
                    },
                    zeroRecords: "Tidak ada data yang ditemukan"
                }
            });

            // Jalankan tombol berdasarkan index: 0 = excel, 1 = print
            $('#btn-excel').on('click', function() {
                table.button(0).trigger();
            });

            $('#btn-print').on('click', function() {
                table.button(1).trigger();
            });
        });
    </script>
@endsection
