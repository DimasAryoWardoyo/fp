<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>Kendali</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <title>@yield('title')</title>

    {{-- Style --}}
    @stack('prepend-style')
    @include('includes.style')
    @stack('addon-style')

    @section('title', 'Login')

    @include('includes.navbar')

    @section('title', 'Login')

    <div class="page-content page-auth" id="register">
        <div class="section-store-auth" data-aos="fade-up">
            <div class="container">
                <div class="row align-items-center justify-content-center row-login">
                    <div class="col-lg-5">
                        <h2>Memulai untuk member baru</h2>
                        <form action="{{ route('register') }}" method="POST" class="mt-3">
                            @csrf
                            <div class="form-group">
                                <label>Full Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name') }}" autofocus required>
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Email Address</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required>
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    name="password" required>
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Konfirmasi Password</label>
                                <input type="password" class="form-control" name="password_confirmation" required>
                            </div>
                            <button type="submit" class="btn btn-success btn-block w-100 mt-4">
                                Mendaftar sekarang juga
                            </button>
                            <a href="{{ route('login') }}" class="btn btn-signup btn-block mt-2">
                                Sign Up
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript -->


    {{-- Script --}}
    @stack('prepend-script')
    @include('includes.script')
    @stack('addon-script')

    </body>

</html>