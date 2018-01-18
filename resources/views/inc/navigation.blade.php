<nav class="navbar sticky-top navbar-expand-md navbar-dark bg-info">
    <div class="container">
        <a class="navbar-brand mr-5" href="{{ url('/') }}">Arte</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('works')}}">Prace</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('awards')}}">Nagrody</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('policy')}}" class="nav-link">Regulamin</a>
                </li>
                @auth
                    <li class="nav-item">
                        <a href="{{route('home')}}" class="nav-link">Moje konto</a>
                    </li>
                @endauth
            </ul>

            <!--Prawa strona nawigacji-->
            @guest
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="nav-link">Logowanie</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('register') }}" class="nav-link">Rejestracja</a>
                    </li>
                </ul>
            @else
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <div class="dropdown">
                            <a class="nav-link dropdown-toggle"
                               data-toggle="dropdown">{{ Auth::user()->firstName.' '.Auth::user()->lastName }}</a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="{{route('settings')}}" class="dropdown-item">Ustawienia</a>
                                @if(Auth::user()->isAdmin())
                                    <a href="{{route('admin')}}" class="dropdown-item">Panel administratora</a>
                                @endif
                                <div class="dropdown-divider"></div>
                                <a href="{{ route('logout') }}" class="dropdown-item">Wyloguj</a>
                            </div>
                        </div>
                    </li>
                </ul>

            @endguest
        </div>
    </div>
</nav>