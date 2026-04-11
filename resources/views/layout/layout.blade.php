<!DOCTYPE html>
<html lang="en" data-theme="theme-emerald">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prime Mart - Your Shopping Destination</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome 4 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Google Fonts - Distinctive pairing -->
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>

<body>

    <!-- ========== THEME SWITCHER ========== -->
    <div class="theme-switcher" id="themeSwitcher">
        <button class="theme-toggle-btn" id="themeToggleBtn" title="Change Theme">
            <i class="fa fa-paint-brush"></i>
        </button>
        <div class="theme-panel" id="themePanel">
            <p class="theme-title">Choose Theme</p>
            <div class="theme-options">
                <button class="theme-dot active" data-theme="theme-emerald" title="Emerald" style="background:#00b894"></button>
                <button class="theme-dot" data-theme="theme-ocean" title="Ocean" style="background:#0984e3"></button>
                <button class="theme-dot" data-theme="theme-sunset" title="Sunset" style="background:#e17055"></button>
                <button class="theme-dot" data-theme="theme-violet" title="Violet" style="background:#6c5ce7"></button>
                <button class="theme-dot" data-theme="theme-ruby" title="Ruby" style="background:#d63031"></button>
                <button class="theme-dot" data-theme="theme-gold" title="Gold" style="background:#fdcb6e"></button>
            </div>
            <div class="mode-toggle mt-2">
                <button class="mode-btn" id="darkModeBtn">
                    <i class="fa fa-moon-o"></i> Dark
                </button>
                <button class="mode-btn active" id="lightModeBtn">
                    <i class="fa fa-sun-o"></i> Light
                </button>
            </div>
        </div>
    </div>
    <!-- ========== THEME SWITCHER END ========== -->

    <!-- ========== HEADER START ========== -->
    <nav class="navbar navbar-geo sticky-top">
        <div class="navbar-geo-inner">

            <!-- Logo Block (Geometric Cut) -->
            <a class="navbar-geo-brand" href="#">
                Prime<span>Mart</span>
            </a>

            <!-- Mobile Toggle -->
            <button class="navbar-geo-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>

            <!-- Nav Links + Actions -->
            <div class="collapse navbar-collapse navbar-geo-collapse" id="mainNavbar">

                <!-- Center Links -->
                <ul class="navbar-geo-links">
                    <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="#"><i class="fa fa-shopping-bag"></i> Products</a></li>
                    <li><a href="#"><i class="fa fa-envelope"></i> Contact</a></li>
                    <li><a href="#"><i class="fa fa-info-circle"></i> About</a></li>
                </ul>

                <!-- Right Actions -->
                <div class="navbar-geo-actions">
                    @guest
                        <a href="{{ route('register') }}" class="geo-link-btn">
                            <i class="fa fa-user-plus"></i> Register
                        </a>
                        <a href="{{ route('login') }}" class="geo-solid-btn">
                            <i class="fa fa-sign-in"></i> Login
                        </a>
                    @endguest

                    @auth
                        <!-- Orders -->
                        <a href="#" class="geo-link-btn">
                            <i class="fa fa-truck"></i> Orders
                        </a>

                        <!-- Cart -->
                        <a href="#" class="geo-link-btn geo-cart-wrap">
                            <i class="fa fa-shopping-cart"></i> Cart
                            <span class="geo-badge">3</span>
                        </a>

                        <!-- User Dropdown -->
                        <div class="dropdown">
                            <a class="geo-solid-btn dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                <i class="fa fa-user-circle"></i> {{ Auth::user()->name ?? 'User' }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end geo-dropdown">
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <i class="fa fa-user"></i> Profile
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <i class="fa fa-dashboard"></i> Dashboard
                                    </a>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item">
                                            <i class="fa fa-sign-out"></i> Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @endauth
                </div>

            </div>
        </div>
    </nav>
    <!-- ========== HEADER END ========== -->

    <!-- ========== MAIN CONTENT START ========== -->
    <main class="main-content">
        @yield('content')
    </main>
    <!-- ========== MAIN CONTENT END ========== -->

    <!-- ========== FOOTER START ========== -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <!-- About Column -->
                <div class="col-md-4 mb-4">
                    <h5 class="footer-brand">Prime<span>Mart</span></h5>
                    <p class="footer-desc">
                        Your trusted online shopping partner. Quality products at best prices with fast delivery across Pakistan.
                    </p>
                    <div class="social-icons">
                        <a href="#" aria-label="Facebook"><i class="fa fa-facebook"></i></a>
                        <a href="#" aria-label="Twitter"><i class="fa fa-twitter"></i></a>
                        <a href="#" aria-label="Instagram"><i class="fa fa-instagram"></i></a>
                        <a href="#" aria-label="YouTube"><i class="fa fa-youtube"></i></a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="col-md-2 mb-4">
                    <h5>Quick Links</h5>
                    <ul class="footer-links">
                        <li><a href="#"><i class="fa fa-angle-right"></i> Home</a></li>
                        <li><a href="#"><i class="fa fa-angle-right"></i> Products</a></li>
                        <li><a href="#"><i class="fa fa-angle-right"></i> Offers</a></li>
                        <li><a href="#"><i class="fa fa-angle-right"></i> New Arrivals</a></li>
                    </ul>
                </div>

                <!-- Customer Service -->
                <div class="col-md-3 mb-4">
                    <h5>Customer Service</h5>
                    <ul class="footer-links">
                        <li><a href="#"><i class="fa fa-angle-right"></i> Contact Us</a></li>
                        <li><a href="#"><i class="fa fa-angle-right"></i> About Us</a></li>
                        <li><a href="#"><i class="fa fa-angle-right"></i> Returns Policy</a></li>
                        <li><a href="#"><i class="fa fa-angle-right"></i> FAQ</a></li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div class="col-md-3 mb-4">
                    <h5>Get in Touch</h5>
                    <ul class="footer-links contact-list">
                        <li><i class="fa fa-map-marker"></i> 123, Main Street, City</li>
                        <li><i class="fa fa-phone"></i> +92 300 1234567</li>
                        <li><i class="fa fa-envelope"></i> support@primemart.com</li>
                        <li><i class="fa fa-clock-o"></i> 9:00 AM - 9:00 PM</li>
                    </ul>
                </div>
            </div>

            <div class="footer-bottom">
                <p>&copy; 2025 Prime Mart. All Rights Reserved. | Designed with <i class="fa fa-heart"></i> for You</p>
            </div>
        </div>
    </footer>
    <!-- ========== FOOTER END ========== -->

    <!-- Back to Top Button -->
    <button class="back-to-top" id="backToTop" title="Back to Top">
        <i class="fa fa-chevron-up"></i>
    </button>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Theme Switcher JS (Vanilla, Lightweight) -->
    <script>
        (function () {
            const html = document.documentElement;
            const themeToggleBtn = document.getElementById('themeToggleBtn');
            const themePanel = document.getElementById('themePanel');
            const themeDots = document.querySelectorAll('.theme-dot');
            const darkBtn = document.getElementById('darkModeBtn');
            const lightBtn = document.getElementById('lightModeBtn');
            const backToTop = document.getElementById('backToTop');

            // Load saved preferences
            const savedTheme = localStorage.getItem('pm_theme') || 'theme-emerald';
            const savedMode = localStorage.getItem('pm_mode') || 'light';

            applyTheme(savedTheme);
            applyMode(savedMode);

            // Toggle Panel
            themeToggleBtn.addEventListener('click', function (e) {
                e.stopPropagation();
                themePanel.classList.toggle('show');
            });

            document.addEventListener('click', function () {
                themePanel.classList.remove('show');
            });

            themePanel.addEventListener('click', function (e) {
                e.stopPropagation();
            });

            // Theme Dots
            themeDots.forEach(function (dot) {
                dot.addEventListener('click', function () {
                    const theme = this.getAttribute('data-theme');
                    themeDots.forEach(d => d.classList.remove('active'));
                    this.classList.add('active');
                    applyTheme(theme);
                    localStorage.setItem('pm_theme', theme);
                });
            });

            // Dark/Light Mode
            darkBtn.addEventListener('click', function () {
                applyMode('dark');
                localStorage.setItem('pm_mode', 'dark');
            });

            lightBtn.addEventListener('click', function () {
                applyMode('light');
                localStorage.setItem('pm_mode', 'light');
            });

            // Back to Top
            window.addEventListener('scroll', function () {
                if (window.scrollY > 300) {
                    backToTop.classList.add('show');
                } else {
                    backToTop.classList.remove('show');
                }
            }, { passive: true });

            backToTop.addEventListener('click', function () {
                window.scrollTo({ top: 0, behavior: 'smooth' });
            });

            // Navbar scroll effect
            var navbar = document.querySelector('.navbar-geo');
            window.addEventListener('scroll', function () {
                if (window.scrollY > 50) {
                    navbar.classList.add('scrolled');
                } else {
                    navbar.classList.remove('scrolled');
                }
            }, { passive: true });

            function applyTheme(theme) {
                html.setAttribute('data-theme', theme);
                // Update active dot
                themeDots.forEach(function (dot) {
                    dot.classList.toggle('active', dot.getAttribute('data-theme') === theme);
                });
            }

            function applyMode(mode) {
                html.setAttribute('data-mode', mode);
                if (mode === 'dark') {
                    darkBtn.classList.add('active');
                    lightBtn.classList.remove('active');
                } else {
                    lightBtn.classList.add('active');
                    darkBtn.classList.remove('active');
                }
            }

        })();
    </script>

</body>
</html>