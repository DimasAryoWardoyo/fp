@extends('layouts.dashboard')

@section('content')
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Edit User</h2>
            </div>
            <div class="dashboard-content">
                <div class="row">
                    <div class="col-md-12 mt-2">
                        <div class="card shadow-sm border-0 mb-3">
                            <div class="card-body">
                                <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <label>Nama</label>
                                            <input type="text" name="name" class="form-control"
                                                value="{{ old('name', $user->name) }}" required>
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label>Email</label>
                                            <input type="email" name="email" class="form-control"
                                                value="{{ old('email', $user->email) }}" required>
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label>Role</label>
                                            <select name="role" class="form-control" required>
                                                <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>User
                                                </option>
                                                <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin
                                                </option>
                                            </select>
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label>Password (kosongkan jika tidak diubah)</label>
                                            <input type="password" name="password" class="form-control">
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label>Konfirmasi Password</label>
                                            <input type="password" name="password_confirmation" class="form-control">
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-between">
                                        <a href="{{ route('admin.users.index') }}"
                                            class="btn btn-danger">Kembali</a>
                                        <button type="submit" class="btn btn-success">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection