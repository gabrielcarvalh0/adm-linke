<nav class="navbar navbar-expand-lg position-absolute top-0 z-index-3 w-100 shadow-none my-3  bg-white ">
    <div class="container">
        <div class="sidenav-header">

            <a class="navbar-brand m-0" href="{{ route('dashboard') }}">

                <img src="{{asset('assets/img/linke-png.png')}}" class="navbar-brand-img h-50" alt="...">
            </a>
        </div>
        <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon mt-2">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
            </span>
        </button>
        <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav mx-auto">
                @if (auth()->user())
                <li class="nav-item">
                    <a class="nav-link text-black d-flex align-items-center me-2 active" aria-current="page" href="{{ route('dashboard') }}">
                        <i class="fa fa-chart-pie opacity-6  me-1"></i>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-black me-2" href="{{ route('profile') }}">
                        <i class="fa fa-user opacity-6  me-1"></i>
                        Profile
                    </a>
                </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link text-black me-2" href="{{ auth()->user() ? route('static-sign-up') : route('sign-up') }}">
                        <i class="fas fa-user-circle opacity-6  me-1"></i>
                        Registro
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-black me-2" href="{{ auth()->user() ? route('sign-in') : route('login') }}">
                        <i class="fas fa-key opacity-6  me-1"></i>
                        Entrar
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>