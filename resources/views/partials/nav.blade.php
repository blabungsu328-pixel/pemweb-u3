
<nav class="nav" aria-label="Main Navigation">

    {{-- BRAND --}}
    <a href="{{ route('home') }}" class="brand">
        <span class="brand-icon">S</span>
        <span class="brand-name">StudySpace</span>
    </a>

    {{-- MAIN NAVIGATION --}}
    <div class="nav-links">

        <a href="{{ route('home') }}"
           class="{{ request()->routeIs('home') ? 'active' : '' }}">
            Home
        </a>

        @auth
            <a href="{{ route('dashboard') }}"
               class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                Dashboard
            </a>

            <a href="{{ route('articles.index') }}"
               class="{{ request()->routeIs('articles.*') ? 'active' : '' }}">
                My Notes
            </a>
        @endauth

    </div>

    {{-- USER MENU --}}
    <div class="nav-user">

        @auth
            <span class="user-greeting">
                Hi, {{ auth()->user()->name }}
            </span>

            <form method="POST"
                  action="{{ route('logout') }}"
                  class="inline">
                @csrf

                <button type="submit" class="btn-logout">
                    Logout
                </button>
            </form>
        @endauth

        @guest
            <a href="{{ route('login') }}"
               class="login-link {{ request()->routeIs('login') ? 'active' : '' }}">
                Login
            </a>

            <a href="{{ route('register') }}" class="btn-register">
                Get Started
            </a>
        @endguest

    </div>

</nav>
