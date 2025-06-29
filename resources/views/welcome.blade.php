<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TiketMu - Platform Tiket Event Terpercaya</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Custom Styles -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');

        * {
            font-family: 'Inter', sans-serif;
        }

        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .hero-pattern {
            background-image: radial-gradient(circle at 25px 25px, rgba(255,255,255,.2) 2px, transparent 0),
                              radial-gradient(circle at 75px 75px, rgba(255,255,255,.2) 2px, transparent 0);
            background-size: 100px 100px;
        }

        .card-hover {
            transition: all 0.3s ease;
        }

        .card-hover:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        }

        .floating {
            animation: floating 3s ease-in-out infinite;
        }

        @keyframes floating {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }

        .fade-in {
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.6s ease;
        }

        .fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>
<body class="bg-purple-50">
    <!-- Navigation -->
    <nav class="fixed w-full z-50 bg-white/95 backdrop-blur-sm border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <h1 class="text-2xl font-bold bg-gradient-to-r from-purple-600 to-blue-600 bg-clip-text text-transparent">
                            TiketMu
                        </h1>
                    </div>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <a href="#home" class="text-gray-900 hover:text-purple-600 px-3 py-2 text-sm font-medium transition-colors">Home</a>
                        <a href="#events" class="text-gray-600 hover:text-purple-600 px-3 py-2 text-sm font-medium transition-colors">Events</a>
                        <a href="#about" class="text-gray-600 hover:text-purple-600 px-3 py-2 text-sm font-medium transition-colors">About</a>
                        <a href="#contact" class="text-gray-600 hover:text-purple-600 px-3 py-2 text-sm font-medium transition-colors">Contact</a>
                    </div>
                </div>

                <!-- Auth Buttons -->
                <div class="hidden md:flex items-center space-x-4">
                    <button class="text-gray-600 hover:text-purple-600 px-3 py-2 text-sm font-medium transition-colors">
                        Login
                    </button>
                    <button class="bg-gradient-to-r from-purple-600 to-blue-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:shadow-lg transition-all">
                        Register
                    </button>
                </div>

                <!-- Mobile menu button -->
                <div class="md:hidden">
                    <button id="mobile-menu-btn" class="text-gray-600 hover:text-purple-600">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-gray-200">
            <div class="px-2 pt-2 pb-3 space-y-1">
                <a href="#home" class="block px-3 py-2 text-base font-medium text-gray-900 hover:text-purple-600">Home</a>
                <a href="#events" class="block px-3 py-2 text-base font-medium text-gray-600 hover:text-purple-600">Events</a>
                <a href="#about" class="block px-3 py-2 text-base font-medium text-gray-600 hover:text-purple-600">About</a>
                <a href="#contact" class="block px-3 py-2 text-base font-medium text-gray-600 hover:text-purple-600">Contact</a>
                <div class="pt-4 pb-3 border-t border-gray-200">
                    <button class="block w-full text-left px-3 py-2 text-base font-medium text-gray-600 hover:text-purple-600">Login</button>
                    <button class="block w-full text-left px-3 py-2 text-base font-medium bg-gradient-to-r from-purple-600 to-blue-600 text-white rounded-lg mt-2">Register</button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="pt-16 min-h-screen gradient-bg hero-pattern flex items-center">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <div class="floating">
                    <h1 class="text-4xl md:text-6xl font-bold text-purple-600 mb-6 fade-in">
                        Temukan Event
                        <span class="bg-gradient-to-r from-yellow-400 to-orange-500 bg-clip-text text-transparent">
                            Impianmu
                        </span>
                    </h1>
                </div>
                <p class="text-xl md:text-2xl text-white/90 mb-8 max-w-3xl mx-auto fade-in">
                    Platform terpercaya untuk membeli tiket event, konser, festival, dan pertunjukan terbaik di Indonesia
                </p>

                <!-- Search Bar -->
                <div class="max-w-2xl mx-auto mb-8 fade-in">
                    <div class="relative">
                        <input type="text"
                               placeholder="Cari event, artis, atau lokasi..."
                               class="w-full px-6 py-4 pr-16 rounded-full text-gray-700 bg-white/95 backdrop-blur-sm border-0 focus:ring-4 focus:ring-white/30 focus:outline-none text-lg shadow-xl">
                        <button class="absolute right-2 top-2 bg-gradient-to-r from-purple-600 to-blue-600 text-white p-3 rounded-full hover:shadow-lg transition-all">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>

                <!-- CTA Buttons -->
                <div class="flex flex-col sm:flex-row gap-4 justify-center fade-in">
                    <button class="bg-white text-purple-600 px-8 py-4 rounded-full font-semibold text-lg hover:shadow-xl hover:scale-105 transition-all">
                        <i class="fas fa-calendar-alt mr-2"></i>
                        Jelajahi Event
                    </button>
                   <button class="bg-white text-purple-600 px-8 py-4 rounded-full font-semibold text-lg hover:shadow-xl hover:scale-105 transition-all">
                        <i class="fas fa-play mr-2"></i>
                        Lihat Video
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                <div class="fade-in">
                    <div class="text-3xl md:text-4xl font-bold text-purple-600 mb-2" data-counter="1000">0</div>
                    <div class="text-gray-600 font-medium">Events Available</div>
                </div>
                <div class="fade-in">
                    <div class="text-3xl md:text-4xl font-bold text-blue-600 mb-2" data-counter="50000">0</div>
                    <div class="text-gray-600 font-medium">Happy Customers</div>
                </div>
                <div class="fade-in">
                    <div class="text-3xl md:text-4xl font-bold text-green-600 mb-2" data-counter="100">0</div>
                    <div class="text-gray-600 font-medium">Cities</div>
                </div>
                <div class="fade-in">
                    <div class="text-3xl md:text-4xl font-bold text-orange-600 mb-2" data-counter="500">0</div>
                    <div class="text-gray-600 font-medium">Event Organizers</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Events -->
    <section id="events" class="py-20 bg-purple-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4 fade-in">Event Populer</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto fade-in">
                    Jangan sampai terlewat! Event-event terpopuler yang sedang trending saat ini
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Event Card 1 -->
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden card-hover fade-in">
                    <div class="relative">
                        <div class="h-48 bg-gradient-to-r from-pink-500 to-purple-600"></div>
                        <div class="absolute top-4 left-4 bg-red-500 text-white px-3 py-1 rounded-full text-sm font-semibold">
                            TRENDING
                        </div>
                        <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm p-2 rounded-full">
                            <i class="fas fa-heart text-gray-400 hover:text-red-500 cursor-pointer transition-colors"></i>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-3">
                            <span class="bg-purple-100 text-purple-800 px-3 py-1 rounded-full text-sm font-medium">Konser</span>
                            <span class="text-gray-500 text-sm">
                                <i class="fas fa-calendar-alt mr-1"></i>
                                25 Jul 2025
                            </span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Konser Musik Indonesia</h3>
                        <p class="text-gray-600 mb-4">Jakarta Convention Center</p>
                        <div class="flex items-center justify-between">
                            <div class="text-2xl font-bold text-purple-600">Rp 150.000</div>
                            <button class="bg-gradient-to-r from-purple-600 to-blue-600 text-white px-6 py-2 rounded-full font-medium hover:shadow-lg transition-all">
                                Beli Tiket
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Event Card 2 -->
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden card-hover fade-in">
                    <div class="relative">
                        <div class="h-48 bg-gradient-to-r from-blue-500 to-teal-600"></div>
                        <div class="absolute top-4 left-4 bg-green-500 text-white px-3 py-1 rounded-full text-sm font-semibold">
                            AVAILABLE
                        </div>
                        <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm p-2 rounded-full">
                            <i class="fas fa-heart text-gray-400 hover:text-red-500 cursor-pointer transition-colors"></i>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-3">
                            <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm font-medium">Festival</span>
                            <span class="text-gray-500 text-sm">
                                <i class="fas fa-calendar-alt mr-1"></i>
                                10 Aug 2025
                            </span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Festival Kuliner Nusantara</h3>
                        <p class="text-gray-600 mb-4">Monas, Jakarta Pusat</p>
                        <div class="flex items-center justify-between">
                            <div class="text-2xl font-bold text-blue-600">Rp 75.000</div>
                            <button class="bg-gradient-to-r from-purple-600 to-blue-600 text-white px-6 py-2 rounded-full font-medium hover:shadow-lg transition-all">
                                Beli Tiket
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Event Card 3 -->
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden card-hover fade-in">
                    <div class="relative">
                        <div class="h-48 bg-gradient-to-r from-orange-500 to-red-600"></div>
                        <div class="absolute top-4 left-4 bg-orange-500 text-white px-3 py-1 rounded-full text-sm font-semibold">
                            HOT
                        </div>
                        <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm p-2 rounded-full">
                            <i class="fas fa-heart text-gray-400 hover:text-red-500 cursor-pointer transition-colors"></i>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-3">
                            <span class="bg-orange-100 text-orange-800 px-3 py-1 rounded-full text-sm font-medium">Workshop</span>
                            <span class="text-gray-500 text-sm">
                                <i class="fas fa-calendar-alt mr-1"></i>
                                20 Aug 2025
                            </span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Digital Marketing Masterclass</h3>
                        <p class="text-gray-600 mb-4">Online Event</p>
                        <div class="flex items-center justify-between">
                            <div class="text-2xl font-bold text-orange-600">Rp 299.000</div>
                            <button class="bg-gradient-to-r from-purple-600 to-blue-600 text-white px-6 py-2 rounded-full font-medium hover:shadow-lg transition-all">
                                Beli Tiket
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-12">
                <button class="bg-gradient-to-r from-purple-600 to-blue-600 text-white px-8 py-4 rounded-full font-semibold text-lg hover:shadow-xl hover:scale-105 transition-all">
                    Lihat Semua Event
                </button>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4 fade-in">Mengapa Pilih TiketMu?</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto fade-in">
                    Kami memberikan pengalaman terbaik dalam pembelian tiket event
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="text-center p-8 rounded-2xl hover:shadow-lg transition-all fade-in">
                    <div class="w-16 h-16 bg-gradient-to-r from-purple-600 to-blue-600 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-shield-alt text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">100% Aman & Terpercaya</h3>
                    <p class="text-gray-600">Transaksi dijamin aman dengan sistem keamanan berlapis dan garansi uang kembali</p>
                </div>

                <div class="text-center p-8 rounded-2xl hover:shadow-lg transition-all fade-in">
                    <div class="w-16 h-16 bg-gradient-to-r from-green-500 to-teal-600 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-mobile-alt text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">E-Ticket Instan</h3>
                    <p class="text-gray-600">Dapatkan tiket elektronik langsung setelah pembayaran berhasil melalui email dan WhatsApp</p>
                </div>

                <div class="text-center p-8 rounded-2xl hover:shadow-lg transition-all fade-in">
                    <div class="w-16 h-16 bg-gradient-to-r from-orange-500 to-red-600 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-headset text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Customer Support 24/7</h3>
                    <p class="text-gray-600">Tim support siap membantu Anda kapan saja melalui chat, telepon, atau email</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="py-16 gradient-bg">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-bold text-white mb-4 fade-in">Jangan Lewatkan Event Terbaru!</h2>
            <p class="text-xl text-white/90 mb-8 fade-in">
                Berlangganan newsletter untuk mendapatkan info event terbaru dan promo eksklusif
            </p>

            <div class="max-w-lg mx-auto fade-in">
                <div class="flex flex-col sm:flex-row gap-4">
                    <input type="email"
                           placeholder="Masukkan email Anda..."
                           class="flex-1 px-6 py-3 rounded-full text-gray-700 focus:ring-4 focus:ring-white/30 focus:outline-none">
                    <button class="bg-white text-purple-600 px-8 py-3 rounded-full font-semibold hover:shadow-lg hover:scale-105 transition-all">
                        Subscribe
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="col-span-1 md:col-span-2">
                    <h3 class="text-2xl font-bold bg-gradient-to-r from-purple-400 to-blue-400 bg-clip-text text-transparent mb-4">
                        TiketMu
                    </h3>
                    <p class="text-gray-400 mb-6 max-w-md">
                        Platform terpercaya untuk membeli tiket event, konser, festival, dan pertunjukan terbaik di Indonesia.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 bg-purple-600 rounded-full flex items-center justify-center hover:bg-purple-700 transition-colors">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-purple-600 rounded-full flex items-center justify-center hover:bg-purple-700 transition-colors">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-purple-600 rounded-full flex items-center justify-center hover:bg-purple-700 transition-colors">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-purple-600 rounded-full flex items-center justify-center hover:bg-purple-700 transition-colors">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>

                <div>
                    <h4 class="text-lg font-semibold mb-4">Quick Links</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Tentang Kami</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Cara Pesan</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Syarat & Ketentuan</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Kebijakan Privasi</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-lg font-semibold mb-4">Support</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Pusat Bantuan</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Hubungi Kami</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Live Chat</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">FAQ</a></li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-gray-800 mt-12 pt-8 text-center">
                <p class="text-gray-400">
                    © 2025 TiketMu. All rights reserved. Made with ❤️ in Indonesia
                </p>
            </div>
        </div>
    </footer>

    <!-- JavaScript -->
    <script>
        // Mobile Menu Toggle
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');

        mobileMenuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        // Smooth Scrolling
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Fade In Animation on Scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, observerOptions);

        document.querySelectorAll('.fade-in').forEach(el => {
            observer.observe(el);
        });

        // Counter Animation
        function animateCounter(element) {
            const target = parseInt(element.getAttribute('data-counter'));
            const duration = 2000;
            const step = target / (duration / 16);
            let current = 0;

            const timer = setInterval(() => {
                current += step;
                if (current >= target) {
                    current = target;
                    clearInterval(timer);
                }
                element.textContent = Math.floor(current).toLocaleString();
            }, 16);
        }

        // Trigger counter animation when visible
        const counterObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateCounter(entry.target);
                    counterObserver.unobserve(entry.target);
                }
            });
        }, observerOptions);

        document.querySelectorAll('[data-counter]').forEach(counter => {
            counterObserver.observe(counter);
        });

        // Heart toggle for event cards
        document.querySelectorAll('.fa-heart').forEach(heart => {
            heart.addEventListener('click', function() {
                this.classList.toggle('text-red-500');
                this.classList.toggle('text-gray-400');

                // Add bounce animation
                this.style.transform = 'scale(1.3)';
                setTimeout(() => {
                    this.style.transform = 'scale(1)';
                }, 150);
            });
        });

        // Search functionality
        const searchInput = document.querySelector('input[placeholder*="Cari event"]');
        const searchBtn = searchInput.nextElementSibling;

        searchBtn.addEventListener('click', () => {
            const query = searchInput.value.trim();
            if (query) {
                alert(`Pencarian untuk: "${query}"\n(Fitur ini akan terhubung ke backend)`);
            } else {
                searchInput.focus();
            }
        });

        searchInput.addEventListener('keypress', (e) => {
            if (e.key === 'Enter') {
                searchBtn.click();
            }
        });

        // Newsletter subscription
        const newsletterForm = document.querySelector('input[type="email"]');
        const subscribeBtn = newsletterForm.nextElementSibling;

        subscribeBtn.addEventListener('click', () => {
            const email = newsletterForm.value.trim();
            if (email && email.includes('@')) {
                alert(`Terima kasih! Email ${email} telah berhasil didaftarkan untuk newsletter.`);
                newsletterForm.value = '';
            } else {
                alert('Mohon masukkan email yang valid.');
                newsletterForm.focus();
            }
        });
    </script>
</body>
</html>
