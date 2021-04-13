<aside class="menu">
    <ul class="menu-list">
        <li><a class="{{ request()->routeIs('home') ? 'is-active' : ''  }}" href="{{ route('home') }}">Начало</a></li>
    </ul>
    <p class="menu-label">Профил</p>
    <ul class="menu-list">
        <li><a class="{{ request()->routeIs('profiles.*') ? 'is-active' : ''  }}" href="{{ route('profiles.index') }}">Профил</a></li>
    </ul>
    <p class="menu-label">Настройки</p>
    <ul class="menu-list">
        <li><a class="{{ request()->routeIs('settings.password.edit') ? 'is-active' : ''  }}" href="{{ route('settings.password.edit') }}">Парола</a></li>
    </ul>
</aside>
