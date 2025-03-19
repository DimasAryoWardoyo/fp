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

    <div class="page-content align-items-center">
        <div class="section-store-auth" data-aos="fade-up">
            <div class="container">
                <div class="row align-items-center row-login">
                    <div class="col-lg-6 text-center">
                        <img src="{{ url('/images/logo.svg') }}" class="w-50 mb-4 mb-lg-none" alt="Logo" />
                    </div>
                    <div class="col-lg-5">
                        <h2>
                            Silahkan masuk, <br />
                            untuk melakukan Konsultasi
                        </h2>
                        <form action="{{ route('login') }}" method="POST" class="mt-3">
                            @csrf
                            <div class="form-group">
                                <label>Email Address</label>
                                <input type="email" name="email"
                                    class="form-control w-100 @error('email') is-invalid @enderror"
                                    value="{{ old('email') }}" required>
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password"
                                    class="form-control w-100 @error('password') is-invalid @enderror" required>
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-success btn-block w-100 mt-4">
                                Sign In to My Account
                            </button>
                            <a href="{{ route('register') }}" class="btn btn-signup btn-block w-100 mt-2">
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