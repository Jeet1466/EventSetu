<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - EVENTSETU</title>

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
                    <a href="{{ route('login') }}" class="btn btn-secondary btn-sm">Login</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Register Section -->
    <section style="min-height: 100vh; display: flex; align-items: center; justify-content: center; 
                    background: linear-gradient(135deg, var(--primary-cream), var(--white)); 
                    padding: 120px 1rem 2rem;">
        <div class="container container-narrow">
            <div class="card" style="max-width: 500px; margin: 0 auto; box-shadow: var(--shadow-2xl);">
                <!-- Header -->
                <div class="text-center" style="margin-bottom: 2rem;">
                    <h2 class="text-gradient" style="margin-bottom: 0.5rem;">Create Account</h2>
                    <p style="color: var(--gray-600); margin: 0;">Join EVENTSETU to plan perfect events</p>
                </div>

                <!-- Register Form -->
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Name -->
                    <div style="margin-bottom: 1.5rem;">
                        <label for="name" style="display: block; font-weight: 600; margin-bottom: 0.5rem; color: var(--primary-dark);">
                            👤 Name
                        </label>
                        <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                               style="width: 100%; padding: 0.875rem; border: 2px solid var(--gray-300); 
                                      border-radius: var(--radius-lg); font-size: 1rem; font-family: var(--font-primary);
                                      transition: all var(--transition-base);"
                               placeholder="Your full name"
                               onfocus="this.style.borderColor='var(--primary-gold)'"
                               onblur="this.style.borderColor='var(--gray-300)'">
                        @error('name')
                            <p style="color: var(--error); font-size: 0.875rem; margin-top: 0.5rem;">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div style="margin-bottom: 1.5rem;">
                        <label for="email" style="display: block; font-weight: 600; margin-bottom: 0.5rem; color: var(--primary-dark);">
                            📧 Email
                        </label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required
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

                    <!-- Role Selection -->
                    <div style="margin-bottom: 1.5rem;">
                        <label for="role" style="display: block; font-weight: 600; margin-bottom: 0.5rem; color: var(--primary-dark);">
                            🎯 I want to register as
                        </label>
                        <select id="role" name="role" required
                                style="width: 100%; padding: 0.875rem; border: 2px solid var(--gray-300); 
                                       border-radius: var(--radius-lg); font-size: 1rem; font-family: var(--font-primary);
                                       transition: all var(--transition-base); background: white;"
                                onfocus="this.style.borderColor='var(--primary-gold)'"
                                onblur="this.style.borderColor='var(--gray-300)'">
                            <option value="client">Client (Looking for vendors)</option>
                            <option value="vendor">Vendor (Providing services)</option>
                        </select>
                        @error('role')
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
                               placeholder="Create a strong password"
                               onfocus="this.style.borderColor='var(--primary-gold)'"
                               onblur="this.style.borderColor='var(--gray-300)'">
                        @error('password')
                            <p style="color: var(--error); font-size: 0.875rem; margin-top: 0.5rem;">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div style="margin-bottom: 1.5rem;">
                        <label for="password_confirmation" style="display: block; font-weight: 600; margin-bottom: 0.5rem; color: var(--primary-dark);">
                            🔒 Confirm Password
                        </label>
                        <input id="password_confirmation" type="password" name="password_confirmation" required
                               style="width: 100%; padding: 0.875rem; border: 2px solid var(--gray-300); 
                                      border-radius: var(--radius-lg); font-size: 1rem; font-family: var(--font-primary);
                                      transition: all var(--transition-base);"
                               placeholder="Confirm your password"
                               onfocus="this.style.borderColor='var(--primary-gold)'"
                               onblur="this.style.borderColor='var(--gray-300)'">
                        @error('password_confirmation')
                            <p style="color: var(--error); font-size: 0.875rem; margin-top: 0.5rem;">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary btn-lg" style="width: 100%;">
                        🚀 Create Account
                    </button>
                </form>

                <!-- Login Link -->
                <div style="text-align: center; margin-top: 2rem; padding-top: 1.5rem; border-top: 1px solid var(--gray-200);">
                    <p style="color: var(--gray-600); margin: 0;">
                        Already have an account? 
                        <a href="{{ route('login') }}" style="color: var(--primary-gold); font-weight: 600;">
                            Login here
                        </a>
                    </p>
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
