@extends('layouts.dashboard')

@section('content')
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading mb-4">
                <h2 class="dashboard-title">Detail User</h2>
            </div>

            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Nama</th>
                            <td>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <th>Role</th>
                            <td>{{ $user->role }}</td>
                        </tr>
                        @if ($user->identitas)
                            <tr>
                                <th>No WhatsApp</th>
                                <td>{{ $user->identitas->no_whatsapp }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Lahir</th>
                                <td>{{ $user->identitas->tanggal_lahir }}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>{{ $user->identitas->status }}</td>
                            </tr>
                            <tr>
                                <th>Alasan</th>
                                <td>{{ $user->identitas->alasan ?? '-' }}</td>
                            </tr>
                        @endif
                    </table>

                    <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
@endsection