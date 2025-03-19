<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>@yield('title')</title>

    @stack('prepend-style')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.21/datatables.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link href="{{ url('/style/main.css') }}" rel="stylesheet" />
    @stack('addon-style')
</head>

<body>

    <div class="page-dashboard">
        <div class="d-flex" id="wrapper" data-aos="fade-right">
            {{-- Sidebar --}}

            <div class="list-group list-group-flush" id="sidebar-wrapper">
                <div class="sidebar-heading text-center py-3">
                    <img src="{{ url('/images/logo.svg') }}" class="my-2" alt="Logo" style="max-width: 100px;">
                </div>
                <div class="list-group list-group-flush">

                    <a href="{{ route('dashboard') }}"
                        class="list-group-item list-group-item-action {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        Dashboard
                    </a>
                    <a href="{{ route('identitas.index') }}"
                        class="list-group-item list-group-item-action {{ request()->routeIs('identitas.index') ? 'active' : '' }}">
                        Profile
                    </a>
                    {{-- Anggota Layouts --}}
                    @can('anggota')
                        <a href="{{ route('agenda.index') }}"
                            class="list-group-item list-group-item-action {{ request()->is('agenda') ? 'active' : '' }}">
                            Agenda Rapat
                        </a>
                        <a href="{{ route('struktur.index') }}"
                            class="list-group-item list-group-item-action {{ request()->is('struktur') ? 'active' : '' }}">
                            Struktur Karang Taruna
                        </a>

                        <a href="#" class="list-group-item list-group-item-action {{ request()->is('/') ? 'active' : '' }}">
                            Pemberitahuan
                        </a>

                        {{-- <a href="#"
                            class="list-group-item list-group-item-action {{ request()->is('/') ? 'active' : '' }}">
                            Informassi Keuangan
                        </a> --}}
                    @endcan
                    {{-- Admin Layouts --}}
                    @can('admin')
                        <a href="#"
                            class="list-group-item list-group-item-action {{ request()->is('admin/testimonials') ? 'active' : '' }}">
                            Informasi Keuangan
                        </a>

                        <a href="#" class="list-group-item list-group-item-action {{ request()->is('/') ? 'active' : '' }}">
                            Agenda
                        </a>

                        <a href="#" class="list-group-item list-group-item-action {{ request()->is('/') ? 'active' : '' }}">
                            Kelola Anggota
                        </a>

                        <a href="#" class="list-group-item list-group-item-action {{ request()->is('/') ? 'active' : '' }}">
                            Edit Konten
                        </a>
                    @endcan
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button class="list-group-item list-group-item-action" type="submit">
                            <i class="fas fa-sign-out-alt me-2"></i> Logout
                        </button>
                    </form>
                </div>
            </div>

            <!-- Page Content -->
            <div id="page-content-wrapper">
                {{-- Nvbar --}}
                <nav class="navbar navbar-expand-lg navbar-light navbar-store fixed-top" data-aos="fade-down">
                    <div class="container-fluid">
                        <button class="btn btn-secondary d-md-none mr-auto mr-2" id="menu-togle">
                            &laquo; Menu
                        </button>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <!-- Dekstop Menu -->
                            <ul class="navbar-nav d-none mr-5 d-lg-flex ml-auto">
                                <li class="nav-tem dropdown">
                                    <a class="nav-link" id="navbarDropdown" role="button" data-toggle="dropdown">
                                        <img src="{{ url('/images/user/profile.gif') }}" alt=""
                                            class="rounded-circle mr-2 profile-picture">
                                        Hi, {{ Auth::user()->name }}
                                    </a>
                                </li>
                            </ul>
                            <!-- Mobile Menu -->
                            <ul class="navbar-nav d-block d-lg-none">
                                <li class="nav-item">
                                    <a class="nav-link">
                                        Hi, {{ Auth::user()->name }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>

                {{-- Content --}}
                @yield('content')

            </div>
        </div>
    </div>

    {{-- script --}}
    @stack('prepend-script')

    <!-- Bootstrap core JavaScript -->
    <script src="{{ url('/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ url('/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
        </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.21/datatables.min.js"></script>
    <script>
        $("#datatable").DataTable();
    </script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script>
        $("#menu-togle").click(function (e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>
    @stack('addon-script')

</body>

</html>