<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'EVENTSETU') }} - @yield('title', 'Dashboard')</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- AOS Animation Library -->
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">

    @stack('styles')
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar" id="navbar">
        <div class="navbar-container">
            <a href="/" class="navbar-logo">
                <img src="{{ asset('assets/images/logo.png') }}" alt="EVENTSETU Logo">
                <span>EVENTSETU</span>
            </a>

            <ul class="navbar-menu" id="navbarMenu">
                @auth
                    <li><a href="{{ route('dashboard') }}" class="navbar-link">Dashboard</a></li>
                    
                    @if(auth()->user()->role === 'client')
                        <li><a href="{{ route('client.requests.index') }}" class="navbar-link">My Requests</a></li>
                        <li><a href="{{ route('client.requests.create') }}" class="navbar-link">New Request</a></li>
                    @endif

                    @if(auth()->user()->role === 'admin')
                        <li><a href="{{ route('admin.requests.index') }}" class="navbar-link">All Requests</a></li>
                    @endif

                    @if(auth()->user()->role === 'vendor')
                        <li><a href="{{ route('vendor.dashboard') }}" class="navbar-link">Dashboard</a></li>
                        <li><a href="{{ route('vendor.profile') }}" class="navbar-link">Profile</a></li>
                    @endif

                    <li class="navbar-button">
                        <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                            @csrf
                            <button type="submit" class="btn btn-secondary btn-sm"
                                style="border: none; background: var(--primary-gold); color: var(--white); cursor: pointer;">
                                Logout ({{ auth()->user()->name }})
                            </button>
                        </form>
                    </li>
                @else
                    <li class="navbar-button">
                        <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                    </li>
                    <li class="navbar-button">
                        <a href="{{ route('register') }}" class="btn btn-secondary">Register</a>
                    </li>
                @endauth
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <main style="padding-top: 100px; min-height: calc(100vh - 400px);">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3>EVENTSETU</h3>
                    <p>The Bridge to Perfect Events</p>
                    <p>India's trusted event management marketplace connecting customers with verified vendors.</p>
                </div>

                <div class="footer-section">
                    <h3>Contact Us</h3>
                    <p>📞 +91 9876543210</p>
                    <p>📧 contact@eventsetu.com</p>
                    <div class="footer-social">
                        <a href="#" class="social-icon" aria-label="Instagram">📷</a>
                        <a href="#" class="social-icon" aria-label="Facebook">👤</a>
                        <a href="#" class="social-icon" aria-label="Twitter">🐦</a>
                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <p style="color:#D4AF37">&copy; 2026 EVENTSETU. All rights reserved. | Built with ❤️ in India</p>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        // Initialize AOS
        AOS.init({
            duration: 800,
            once: true,
            offset: 100
        });
    </script>

    @stack('scripts')
</body>

</html>
