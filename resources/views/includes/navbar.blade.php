<nav class="navbar navbar-expand-lg navbar-light navbar-store fixed-top navbar-fixed-top" data-aos="fade-down">
    <div class="container">
        <a href="/" class="navbar-brand">
            <img src="{{ url('/images/logo.svg') }}" alt="Logo" />
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            {{-- Dekstop Nav Menu --}}
            <ul class="navbar-nav ml-auto d-none d-lg-flex">
                <li class="nav-item active">
                    <a href="/" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="/" class="nav-link">Categories</a>
                </li>
                <li class="nav-item">
                    <a href="/" class="nav-link">Rewards</a>
                </li>

                @auth
                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}" class="nav-link">
                            Hi, {{ Auth::user()->name }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#">
                            <img src="{{ url('/images/user/profile.gif') }}" class="rounded-circle profile-picture"
                                alt="User Profile">
                        </a>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger nav-link px-4 text-white">Log Out</button>
                        </form>
                    </li>
                @else
                    <li class="nav-item">
                        <a href="{{ route('register') }}" class="nav-link">Sign Up</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="btn btn-success nav-link px-4 text-white">Sign In</a>
                    </li>
                @endauth
            </ul>

            {{-- Mobile Nav Menu --}}
            <ul class="navbar-nav d-block d-lg-none">
                @auth
                    <li class="nav-item active">
                        <a href="/" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="/" class="nav-link">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a href="/" class="nav-link">Rewards</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}" class="nav-link">
                            Hi, {{ Auth::user()->name }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger nav-link px-4 text-white">Log Out</button>
                        </form>
                    </li>
                @else
                    <li class="nav-item">
                        <a href="{{ route('register') }}" class="nav-link">Sign Up</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="btn btn-success nav-link px-4 text-white">Sign In</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>