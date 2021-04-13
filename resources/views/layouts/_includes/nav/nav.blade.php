<nav class="navbar has-shadow is-spaced" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <a class="navbar-item" href="#">
            {{ config('app.name', 'Laravel') }}
        </a>

        <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false"
            data-target="navbarBasicExample">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>
    </div>

    <div id="navbarBasicExample" class="navbar-menu">
        <div class="navbar-start ">

            <a class="navbar-item" href="{{ route('welcome') }}">
                <span class="icon"><i class="fas fa-home"></i></span>
            </a>
        </div>
        <div class="navbar-end">
            @guest
            <a class="navbar-item" href="{{ route('login') }}">
                <span class="icon">
                    <i class="fas fa-sign-in-alt"></i>
                </span>
                <span>Вход</span>
            </a>
            <a class="navbar-item" href="{{ route('register')}}">
                <span class="icon">
                    <i class="fas fa-user-plus"></i>
                </span>
                <span>Регистрация</span>
            </a>
            @else
            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link">
                    <span class="icon">
                        <i class="fas fa-user"></i>
                    </span>
                    <span>{{ Str::limit(Auth::user()->name, 10, '...') }}</span>
                </a>

                <div class="navbar-dropdown">
                    <a href="{{ route('home') }}" class="navbar-item">
                        <span class="icon">
                            <i class="fas fa-chart-area"></i>
                        </span>
                        <span>Моятa зона</span>
                    </a>
                    <a href="{{ route('profiles.index') }}" class="navbar-item">
                        <span class="icon">
                            <i class="fas fa-user-circle"></i>
                        </span>
                        <span>Моят профил</span>
                    </a>
                    @role('administrator')
                    <a href="{{ route('manage.dashboard') }}" class="navbar-item">
                        <span class="icon">
                            <i class="fas fa-wrench"></i>
                        </span>
                        <span>Управлявай</span>
                    </a>
                    @endrole
                    <hr class="navbar-divider">
                    <a href="{{ url('/logout') }}" class="navbar-item">
                        <span class="icon">
                            <i class="fas fa-sign-out-alt"></i>
                        </span>
                        <span>
                            Излез
                        </span>
                    </a>
                </div>
            </div>
            @endguest
        </div>
    </div>
</nav>