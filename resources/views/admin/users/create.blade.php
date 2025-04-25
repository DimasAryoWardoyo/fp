@extends('layouts.dashboard')

@section('content')
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Tambah User Baru</h2>
            </div>
            <div class="dashboard-content">
                <div class="row">
                    <div class="col-md-12 mt-2">
                        <div class="card shadow-sm border-0 mb-3">
                            <div class="card-body">
                                <form action="{{ route('users.store') }}" method="POST">
                                    @csrf

                                    <div class="mb-3">
                                        <label>Nama</label>
                                        <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                                            required>
                                    </div>

                                    <div class="mb-3">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control" value="{{ old('email') }}"
                                            required>
                                    </div>

                                    <div class="mb-3">
                                        <label>Role</label>
                                        <select name="role" class="form-control" required>
                                            <option value="anggota">Anggota</option>
                                            <option value="admin">Admin</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label>Password</label>
                                        <input type="password" name="password" class="form-control" required>
                                    </div>

                                    <div class="mb-3">
                                        <label>Konfirmasi Password</label>
                                        <input type="password" name="password_confirmation" class="form-control" required>
                                    </div>

                                    <button type="submit" class="btn btn-success">Simpan</button>
                                    <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Kembali</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection