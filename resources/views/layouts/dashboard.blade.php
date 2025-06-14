<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title')</title>

    @stack('prepend-style')

    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/v/bs4/dt-1.10.21/datatables.min.css" rel="stylesheet" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link href="{{ url('/style/main.css') }}" rel="stylesheet" />

    @stack('addon-style')
</head>

<body>
    <div class="page-dashboard">
        <div class="d-flex" id="wrapper" data-aos="fade-right">
            {{-- Sidebar --}}
            <div class="list-group list-group-flush" id="sidebar-wrapper">
                <a href="{{ url('/') }}" class="sidebar-heading text-center py-3">
                    <img src="{{ url('/images/lg.png') }}" class="my-2" alt="Logo" style="max-width: 100px;">
                </a>
                <div class="list-group list-group-flush">
                    <a href="{{ route('dashboard') }}"
                        class="list-group-item list-group-item-action {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        Dashboard
                    </a>
                    <a href="{{ route('identitas.index') }}"
                        class="list-group-item list-group-item-action {{ request()->routeIs('identitas*') ? 'active' : '' }}">
                        Profile
                    </a>
                    <a href="{{ route('agenda.index') }}"
                        class="list-group-item list-group-item-action {{ request()->is('agenda*') || request()->is('admin/agenda*') ? 'active' : '' }}">
                        Agenda
                    </a>

                    {{-- Layout untuk Anggota --}}
                    @can('anggota')
                        <a href="{{ route('overview') }}"
                            class="list-group-item list-group-item-action {{ request()->is('overview*') ? 'active' : '' }}">
                            Keuangan
                        </a>
                    @endcan

                    <a href="{{ route('perlengkapan.index') }}"
                        class="list-group-item list-group-item-action {{ request()->is('perlengkapan*') || request()->is('peminjaman*') ? 'active' : '' }}">
                        Perlengkapan
                    </a>
                    <a href="{{ route('struktur.index') }}"
                        class="list-group-item list-group-item-action {{ request()->is('struktur') || request()->is('admin/struktur*') ? 'active' : '' }}">
                        Struktur Karang Taruna
                    </a>

                    {{-- Layout untuk Admin --}}
                    @can('admin')
                        <a href="{{ route('admin.finance.index') }}"
                            class="list-group-item list-group-item-action {{ request()->is('admin/finance*') ? 'active' : '' }}">
                            Kelola Keuangan
                        </a>
                        <a href="{{ url('/broadcast') }}"
                            class="list-group-item list-group-item-action {{ request()->is('broadcast') ? 'active' : '' }}">
                            Broadcast WA
                        </a>
                        <a href="{{ route('admin.users.index') }}"
                            class="list-group-item list-group-item-action {{ request()->is('admin/users*') ? 'active' : '' }}">
                            Kelola Anggota
                        </a>
                        <a href="{{ route('admin.content.index') }}"
                            class="list-group-item list-group-item-action {{ request()->is('admin/content*') ? 'active' : '' }}">
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

            {{-- Page Content --}}
            <div id="page-content-wrapper">
                {{-- Navbar --}}
                <nav class="navbar navbar-expand-lg navbar-light fixed-top" data-aos="fade-down">
                    <div class="container-fluid">
                        <button class="btn btn-secondary d-md-none mr-2" id="menu-togle">&laquo; Menu</button>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            {{-- Desktop Menu --}}
                            <ul class="navbar-nav ms-auto d-none d-lg-flex">
                                <li class="nav-item dropdown">
                                    <a class="nav-link" role="button" data-bs-toggle="dropdown">
                                        <img src="{{ url('/images/user/profile.gif') }}" alt=""
                                            class="rounded-circle me-2"
                                            style="width: 40px; height: 40px; object-fit: cover;">


                                        Hi, {{ Auth::user()->name }}
                                    </a>
                                </li>
                            </ul>
                            {{-- Mobile Menu --}}
                            <ul class="navbar-nav d-block d-lg-none">
                                <li class="nav-item">
                                    <a class="nav-link">Hi, {{ Auth::user()->name }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>

                {{-- Main Content --}}
                @yield('content')
            </div>
        </div>
    </div>

    {{-- Script --}}
    @stack('prepend-script')

    <!-- JavaScript -->
    <script src="{{ url('/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ url('/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/v/bs4/dt-1.10.21/datatables.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
        $("#menu-togle").click(function (e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
        $("#datatable").DataTable();
    </script>

    @stack('addon-script')
</body>

</html>