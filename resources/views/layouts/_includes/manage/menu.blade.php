<aside class="menu">
    <ul class="menu-list">
        <li><a class="{{ request()->routeIs('manage.dashboard') ? 'is-active' : '' }}"
                href="{{ route('manage.dashboard') }}">Начало</a></li>
    </ul>
    <p class="menu-label">Администрация</p>
    <ul class="menu-list">
        <li><a class="{{ request()->routeIs('users.*') ? 'is-active' : ''  }}"
                href="{{ route('users.index') }}">Потребители</a></li>
    </ul>
    <ul class="menu-list">
        <li><a class="{{ request()->routeIs('permissions.*') ? 'is-active' : ''  }}"
                href="{{ route('permissions.index') }}">Права за достъп</a></li>
    </ul>
    <ul class="menu-list">
        <li><a class="{{ request()->routeIs('roles.*') ? 'is-active' : '' }}" href="{{ route('roles.index') }}">Роли</a>
        </li>
    </ul>
    <p class="menu-label">Статии</p>
    <ul class="menu-list">
        <li><a class="{{ request()->routeIs('manage.articles.*') ? 'is-active' : '' }}"
                href="{{ route('manage.articles.index') }}">Статии</a></li>
    </ul>
    <ul class="menu-list">
        <li><a class="{{ request()->routeIs('manage.categories.*') ? 'is-active' : '' }}"
                href="{{ route('manage.categories.index') }}">Категории</a></li>
    </ul>
    <ul class="menu-list">
        <li><a class="{{ request()->routeIs('manage.tags.*') ? 'is-active' : '' }} "
                href="{{ route('manage.tags.index') }}">Тагове</a></li>
    </ul>

</aside>
