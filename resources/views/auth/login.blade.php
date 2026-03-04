<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - EVENTSETU</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
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
                <li class="navbar-button">
                    <a href="{{ route('register') }}" class="btn btn-secondary btn-sm">Register</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Login Section -->
    <section style="min-height: 100vh; display: flex; align-items: center; justify-content: center; 
                    background: linear-gradient(135deg, var(--primary-cream), var(--white)); 
                    padding: 120px 1rem 2rem;">
        <div class="container container-narrow">
            <div class="card" style="max-width: 500px; margin: 0 auto; box-shadow: var(--shadow-2xl);">
                <!-- Header -->
                <div class="text-center" style="margin-bottom: 2rem;">
                    <h2 class="text-gradient" style="margin-bottom: 0.5rem;">Welcome Back!</h2>
                    <p style="color: var(--gray-600); margin: 0;">Login to manage your events</p>
                </div>

                <!-- Session Status -->
                @if (session('status'))
                    <div style="background: var(--success); color: white; padding: 1rem; border-radius: var(--radius-md); margin-bottom: 1.5rem;">
                        {{ session('status') }}
                    </div>
                @endif

                <!-- Login Form -->
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email Address -->
                    <div style="margin-bottom: 1.5rem;">
                        <label for="email" style="display: block; font-weight: 600; margin-bottom: 0.5rem; color: var(--primary-dark);">
                            📧 Email
                        </label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                               style="width: 100%; padding: 0.875rem; border: 2px solid var(--gray-300); 
                                      border-radius: var(--radius-lg); font-size: 1rem; font-family: var(--font-primary);
                                      transition: all var(--transition-base);"
                               placeholder="your@email.com"
                               onfocus="this.style.borderColor='var(--primary-gold)'"
                               onblur="this.style.borderColor='var(--gray-300)'">
                        @error('email')
                            <p style="color: var(--error); font-size: 0.875rem; margin-top: 0.5rem;">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div style="margin-bottom: 1.5rem;">
                        <label for="password" style="display: block; font-weight: 600; margin-bottom: 0.5rem; color: var(--primary-dark);">
                            🔒 Password
                        </label>
                        <input id="password" type="password" name="password" required
                               style="width: 100%; padding: 0.875rem; border: 2px solid var(--gray-300); 
                                      border-radius: var(--radius-lg); font-size: 1rem; font-family: var(--font-primary);
                                      transition: all var(--transition-base);"
                               placeholder="Enter your password"
                               onfocus="this.style.borderColor='var(--primary-gold)'"
                               onblur="this.style.borderColor='var(--gray-300)'">
                        @error('password')
                            <p style="color: var(--error); font-size: 0.875rem; margin-top: 0.5rem;">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Remember Me -->
                    <div style="margin-bottom: 1.5rem;">
                        <label style="display: flex; align-items: center; cursor: pointer;">
                            <input type="checkbox" name="remember" 
                                   style="width: 18px; height: 18px; margin-right: 0.5rem; cursor: pointer;">
                            <span style="color: var(--gray-700);">Remember me</span>
                        </label>
                    </div>

                    <!-- Actions -->
                    <div style="display: flex; flex-direction: column; gap: 1rem;">
                        <button type="submit" class="btn btn-primary btn-lg" style="width: 100%;">
                            🚀 Login
                        </button>

                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" 
                               style="text-align: center; color: var(--primary-gold); font-weight: 500; font-size: 0.875rem;">
                                Forgot your password?
                            </a>
                        @endif
                    </div>
                </form>

                <!-- Register Link -->
                <div style="text-align: center; margin-top: 2rem; padding-top: 1.5rem; border-top: 1px solid var(--gray-200);">
                    <p style="color: var(--gray-600); margin: 0;">
                        Don't have an account? 
                        <a href="{{ route('register') }}" style="color: var(--primary-gold); font-weight: 600;">
                            Register here
                        </a>
                    </p>
                </div>
            </div>

            <!-- Test Credentials -->
            <div class="card" style="max-width: 500px; margin: 2rem auto 0; background: linear-gradient(135deg, #DBEAFE, #FEF3C7);">
                <h4 style="color: var(--primary-dark); margin-bottom: 1rem; font-size: 1rem;">🔑 Test Credentials</h4>
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(150px, 1fr)); gap: 0.75rem; font-size: 0.875rem;">
                    <div>
                        <strong>Admin:</strong><br>
                        admin@test.com<br>
                        password
                    </div>
                    <div>
                        <strong>Client:</strong><br>
                        client@test.com<br>
                        password
                    </div>
                    <div>
                        <strong>Vendor:</strong><br>
                        dj@test.com<br>
                        password
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-bottom">
                <p style="color:#D4AF37">&copy; 2026 EVENTSETU. All rights reserved. | Built with ❤️ in India</p>
            </div>
        </div>
    </footer>
</body>

</html>
