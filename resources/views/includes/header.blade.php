<header class="header">
    <!-- Links -->
    <div class="header-left">
        <!-- Dumie Profile -->
        <img src="{{ asset('images/pf.jpg') }}" alt="Profile Image" class="profile-img">
        
        <!-- Navigation Links -->
        <nav>
            <ul class="nav-links">
                <li><a href="/">Home</a></li>
                <li><a href="/about">Over mij</a></li>
                <li><a href="{{ route('projects.index') }}">Projecten</a></li>
                <li><a href="/contact">Contact</a></li>
            </ul>
        </nav>
    </div>

    <!-- Recht : Auth Links -->
    <div class="header-right">
        @auth
            <div class="auth-info">
                <span>Welkom, {{ Auth::user()->name }}!</span>
                <form method="POST" action="{{ route('logout') }}" class="logout-form">
                    @csrf
                    <button type="submit">Uitloggen</button>
                </form>
            </div>
        @else
            <a href="{{ route('login') }}" class="login-link">Inloggen</a>
        @endauth
    </div>
</header>
