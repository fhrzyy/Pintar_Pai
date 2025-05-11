<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pintar Pai - Platform Pembelajaran Agama Islam</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .hero-section {
            background: linear-gradient(135deg, rgba(59, 58, 104, 0.28), rgba(0, 0, 0, 0.47)),
                url('https://plus.unsplash.com/premium_photo-1678558953671-c0d8a2d00501?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D') no-repeat center center;
            background-size: cover;
            position: relative;
        }

        .faq-answer {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-out;
        }

        .faq-answer.active {
            max-height: 200px;
        }

        .faq-icon {
            transition: transform 0.3s ease;
        }

        .faq-icon.active {
            transform: rotate(180deg);
        }

        /* Mobile menu animation */
        .mobile-menu {
            transition-property: opacity, transform;
            transition-duration: 300ms;
        }

        .mobile-menu.hidden {
            opacity: 0;
            transform: scale(0.95);
        }

        .mobile-menu.block {
            opacity: 1;
            transform: scale(1);
        }

        /* Hamburger animation */
        .hamburger-line {
            transition: all 0.3s ease;
        }
    </style>
</head>

<body class="bg-gray-50">
    <!-- Navbar -->
    <nav class="bg-white shadow-lg fixed w-full z-50" x-data="{ mobileMenuOpen: false }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <!-- Logo -->
                    <div class="flex-shrink-0 flex items-center">
                        <img src="{{ asset('img/Lms-Pai/FixLogo.png') }}" alt="LMS PAI Logo" class="h-14 w-auto">
                    </div>
                    <!-- Desktop Menu -->
                    <div class="hidden md:ml-6 md:flex md:space-x-8">
                        <a href="#home" class="inline-flex items-center px-1 pt-1 text-sm font-medium text-gray-500 hover:text-blue-600 hover:border-blue-600">
                            Home
                        </a>
                        <a href="#about" class="inline-flex items-center px-1 pt-1 text-sm font-medium text-gray-500 hover:text-blue-600 hover:border-blue-600">
                            About
                        </a>
                        <a href="#faq" class="inline-flex items-center px-1 pt-1 text-sm font-medium text-gray-500 hover:text-blue-600 hover:border-blue-600">
                            FAQ
                        </a>
                    </div>
                </div>
                <!-- Auth Buttons - Desktop -->
                <div class="hidden md:flex items-center space-x-4">
                    <a href="/login" class="text-gray-500 px-3 py-2 rounded-md text-sm font-medium hover:text-blue-600 hover:border-blue-600">Masuk</a>
                    <a href="/register" class="bg-gradient-to-b from-indigo-600 to-purple-700 px-4 py-2 rounded-md text-sm text-white font-medium transition duration-300 ease-in-out hover:opacity-90 hover:shadow-lg hover:scale-105">Daftar</a>
                </div>
                
                <!-- Hamburger Menu Button -->
                <div class="md:hidden flex items-center">
                    <button @click="mobileMenuOpen = !mobileMenuOpen" class="inline-flex items-center justify-center p-2 rounded-md text-gray-700 hover:text-blue-600 focus:outline-none">
                        <div class="w-6 h-6 relative">
                            <span class="hamburger-line absolute h-0.5 w-6 bg-current transform transition duration-300 ease-in-out" 
                                  :class="{'rotate-45 translate-y-1.5': mobileMenuOpen, 'translate-y-0': !mobileMenuOpen}"></span>
                            <span class="hamburger-line absolute h-0.5 w-6 bg-current transform transition duration-300 ease-in-out" 
                                  :class="{'opacity-0': mobileMenuOpen, 'translate-y-2': !mobileMenuOpen}"></span>
                            <span class="hamburger-line absolute h-0.5 w-6 bg-current transform transition duration-300 ease-in-out" 
                                  :class={'-rotate-45 translate-y-1.5': mobileMenuOpen, 'translate-y-4': !mobileMenuOpen}></span>
                        </div>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div x-show="mobileMenuOpen" 
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 scale-95"
             x-transition:enter-end="opacity-100 scale-100"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 scale-100"
             x-transition:leave-end="opacity-0 scale-95"
             class="md:hidden bg-white shadow-lg">
            <div class="px-2 pt-2 pb-3 space-y-1">
                <a href="#home" @click="mobileMenuOpen = false" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-gray-50">Home</a>
                <a href="#about" @click="mobileMenuOpen = false" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-gray-50">About</a>
                <a href="#faq" @click="mobileMenuOpen = false" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-gray-50">FAQ</a>
                <div class="pt-4 pb-3 border-t border-gray-200">
                    <div class="flex items-center px-3 gap-4">
                        <a href="/login" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-gray-50">Masuk</a>
                        <a href="/register" class="block bg-gradient-to-b from-indigo-600 to-purple-700 px-4 py-2 rounded-md text-base text-white font-medium">Daftar</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div id="home" class="hero-section relative bg-cover bg-center bg-no-repeat min-h-screen flex items-center justify-center text-center pt-16"
    style="background:linear-gradient('to left,white,black'), url('{{ asset('img/Lms-Pai/Akidah.png') }}');">
        <div class="rounded-xl p-4 md:p-10 max-w-3xl mx-auto w-full">
            <h1 class="text-3xl md:text-5xl font-bold text-white mb-6 leading-tight">
                Belajar Pendidikan Agama Islam dengan Cara yang Modern
            </h1>
            <p class="text-base md:text-lg text-white mb-8">
                Platform pembelajaran digital yang memudahkan Anda memahami ajaran Islam dengan materi berkualitas dan metode yang interaktif.
            </p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="{{ auth()->check() ? '/user/home' : '/login' }}"
                class="bg-gradient-to-r from-indigo-600 to-purple-700 text-white px-6 py-3 rounded-lg text-lg font-semibold hover:shadow-lg transition-all duration-300"
                id="startButton">
                Mulai Belajar
                </a>
                <a href="#about"
                class="border-2 border-white text-white px-6 py-3 rounded-lg text-lg font-semibold transition-all duration-300"
                id="learnButton">
                Pelajari Lebih Lanjut
                </a>
            </div>
            <script>
                const startBtn = document.getElementById('startButton');
                const learnBtn = document.getElementById('learnButton');

                startBtn.addEventListener('mouseenter', () => {
                    startBtn.style.transform = 'translateY(-5px) scale(1.05)';
                    startBtn.style.boxShadow = '0 10px 20px rgba(79, 70, 229, 0.3)';
                });

                startBtn.addEventListener('mouseleave', () => {
                    startBtn.style.transform = 'translateY(0) scale(1)';
                    startBtn.style.boxShadow = 'none';
                });

                learnBtn.addEventListener('mouseenter', () => {
                    learnBtn.style.transform = 'translateY(-5px)';
                    learnBtn.style.backgroundColor = 'rgba(255, 255, 255, 0.1)';
                });

                learnBtn.addEventListener('mouseleave', () => {
                    learnBtn.style.transform = 'translateY(0)';
                    learnBtn.style.backgroundColor = 'transparent';
                });
            </script>
        </div>
    </div>

    <!-- About Pintar PAI -->
    <section id="about" class="py-16 md:py-20 bg-white overflow-hidden">
        <div class="container mx-auto px-4">
            <div class="flex flex-col lg:flex-row items-center gap-8 md:gap-16">
                <!-- Ilustrasi & Visual -->
                <div class="w-full lg:w-1/2 relative">
                    <div class="relative z-10">
                        <div class="w-full h-64 md:h-96 bg-gradient-to-br from-indigo-100 to-blue-50 rounded-3xl overflow-hidden relative">
                            <!-- Abstract Shape Elements -->
                            <div class="absolute top-10 left-10 w-20 h-20 bg-blue-500 opacity-20 rounded-full"></div>
                            <div class="absolute bottom-20 right-10 w-16 h-16 bg-indigo-500 opacity-20 rounded-full"></div>
                            <div class="absolute top-1/2 left-1/3 w-24 h-24 bg-purple-500 opacity-10 rounded-full"></div>

                            <!-- Main Illustration - Icon Cluster -->
                            <div class="absolute inset-0 flex items-center justify-center">
                                <div class="grid grid-cols-3 gap-2 md:gap-4 transform rotate-12">
                                    <div class="w-12 h-12 md:w-16 md:h-16 bg-blue-500 rounded-xl flex items-center justify-center text-white">
                                        <i class="fas fa-book text-xl md:text-2xl"></i>
                                    </div>
                                    <div class="w-12 h-12 md:w-16 md:h-16 bg-indigo-600 rounded-xl flex items-center justify-center text-white">
                                        <i class="fas fa-graduation-cap text-xl md:text-2xl"></i>
                                    </div>
                                    <div class="w-12 h-12 md:w-16 md:h-16 bg-purple-500 rounded-xl flex items-center justify-center text-white">
                                        <i class="fas fa-mosque text-xl md:text-2xl"></i>
                                    </div>
                                    <div class="w-12 h-12 md:w-16 md:h-16 bg-emerald-500 rounded-xl flex items-center justify-center text-white">
                                        <i class="fas fa-star-and-crescent text-xl md:text-2xl"></i>
                                    </div>
                                    <div class="w-12 h-12 md:w-16 md:h-16 bg-yellow-500 rounded-xl flex items-center justify-center text-white">
                                        <i class="fas fa-pray text-xl md:text-2xl"></i>
                                    </div>
                                    <div class="w-12 h-12 md:w-16 md:h-16 bg-red-500 rounded-xl flex items-center justify-center text-white">
                                        <i class="fas fa-quran text-xl md:text-2xl"></i>
                                    </div>
                                    <div class="w-12 h-12 md:w-16 md:h-16 bg-pink-500 rounded-xl flex items-center justify-center text-white">
                                        <i class="fas fa-heart text-xl md:text-2xl"></i>
                                    </div>
                                    <div class="w-12 h-12 md:w-16 md:h-16 bg-teal-500 rounded-xl flex items-center justify-center text-white">
                                        <i class="fas fa-hands text-xl md:text-2xl"></i>
                                    </div>
                                    <div class="w-12 h-12 md:w-16 md:h-16 bg-blue-600 rounded-xl flex items-center justify-center text-white">
                                        <i class="fas fa-clipboard-check text-xl md:text-2xl"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Accent Elements -->
                    <div class="absolute -bottom-10 -left-10 w-36 h-36 bg-indigo-500 opacity-10 rounded-full blur-xl"></div>
                    <div class="absolute -top-10 -right-10 w-48 h-48 bg-blue-500 opacity-10 rounded-full blur-xl"></div>
                </div>

                <!-- Content -->
                <div class="w-full lg:w-1/2 mt-8 lg:mt-0">
                    <div class="mb-6">
                        <span class="text-indigo-600 font-semibold text-sm uppercase tracking-wider">Tentang Kami</span>
                        <h2 class="text-3xl md:text-4xl font-bold mt-2 mb-4 text-gray-800">Pintar PAI: Platform Pendidikan Agama Islam Modern</h2>
                    </div>

                    <p class="text-gray-600 mb-6 leading-relaxed">
                        Pintar PAI adalah platform pembelajaran digital yang dirancang untuk memudahkan siapa saja memahami dan mendalami ajaran Islam dengan metode modern, interaktif, dan menyenangkan. Kami memadukan teknologi terkini dengan konten pendidikan berkualitas untuk menghadirkan pengalaman belajar Islam yang relevan dengan kehidupan modern.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Program Unggulan -->
    <section class="py-16 md:py-20 bg-gray-50 overflow-hidden">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12 md:mb-16">
                <span class="text-indigo-600 font-semibold text-sm uppercase tracking-wider">Kurikulum Terpadu</span>
                <h2 class="text-3xl md:text-4xl font-bold mt-2 mb-4 text-gray-800">Program Unggulan Kami</h2>
                <p class="max-w-2xl mx-auto text-gray-600">Berbagai program belajar yang dirancang khusus untuk membantu Anda memahami dan mengamalkan ajaran Islam dengan mudah dan menyenangkan</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-8 max-w-6xl mx-auto">
                <!-- Module 1 -->
                <div class="relative group">
                    <div class="absolute inset-0 bg-gradient-to-r from-blue-500 to-indigo-500 rounded-2xl opacity-0 group-hover:opacity-100 transition-all duration-500 transform group-hover:scale-105 -z-10"></div>
                    <div class="flex flex-col sm:flex-row bg-white rounded-2xl p-6 transition-all duration-500 group-hover:translate-y-[-10px] group-hover:translate-x-[-10px] group-hover:shadow-2xl">
                        <div class="mb-4 sm:mb-0 sm:mr-6">
                            <div class="w-16 h-16 sm:w-20 sm:h-20 bg-blue-500 rounded-2xl flex items-center justify-center text-white text-2xl sm:text-3xl transform -rotate-6 group-hover:rotate-0 transition-all duration-300 mx-auto sm:mx-0">
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                        <div class="flex-1">
                            <div class="flex flex-wrap items-center mb-3 gap-2">
                                <span class="px-3 py-1 bg-blue-100 text-blue-600 rounded-full text-sm font-medium">Pemula</span>
                                <div class="flex items-center ml-auto space-x-2 text-sm text-gray-500">
                                    <span class="inline-flex items-center"><i class="fas fa-users mr-1"></i> 5000+</span>
                                </div>
                            </div>
                            <h3 class="text-xl font-bold text-gray-800 mb-2">Dasar-Dasar Islam</h3>
                            <p class="text-gray-600 mb-4">Program pengenalan dasar ajaran Islam untuk pemula.</p>
                            <div class="flex flex-wrap items-center text-sm text-gray-500 gap-4">
                                <span class="flex items-center"><i class="fas fa-book mr-1"></i> 24 Modul</span>
                                <span class="flex items-center"><i class="fas fa-clock mr-1"></i> 8 Minggu</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Module 2 -->
                <div class="relative group">
                    <div class="absolute inset-0 bg-gradient-to-r from-indigo-500 to-purple-500 rounded-2xl opacity-0 group-hover:opacity-100 transition-all duration-500 transform group-hover:scale-105 -z-10"></div>
                    <div class="flex flex-col sm:flex-row bg-white rounded-2xl p-6 transition-all duration-500 group-hover:translate-y-[-10px] group-hover:translate-x-[-10px] group-hover:shadow-2xl">
                        <div class="mb-4 sm:mb-0 sm:mr-6">
                            <div class="w-16 h-16 sm:w-20 sm:h-20 bg-indigo-500 rounded-2xl flex items-center justify-center text-white text-2xl sm:text-3xl transform rotate-6 group-hover:rotate-0 transition-all duration-300 mx-auto sm:mx-0">
                                <i class="fas fa-book-open"></i>
                            </div>
                        </div>
                        <div class="flex-1">
                            <div class="flex flex-wrap items-center mb-3 gap-2">
                                <span class="px-3 py-1 bg-indigo-100 text-indigo-600 rounded-full text-sm font-medium">Menengah</span>
                                <div class="flex items-center ml-auto space-x-2 text-sm text-gray-500">
                                    <span class="inline-flex items-center"><i class="fas fa-users mr-1"></i> 3200+</span>
                                </div>
                            </div>
                            <h3 class="text-xl font-bold text-gray-800 mb-2">Kajian Al-Qur'an Tematik</h3>
                            <p class="text-gray-600 mb-4">Mempelajari Al-Qur'an dengan pendekatan modern.</p>
                            <div class="flex flex-wrap items-center text-sm text-gray-500 gap-4">
                                <span class="flex items-center"><i class="fas fa-book mr-1"></i> 36 Modul</span>
                                <span class="flex items-center"><i class="fas fa-clock mr-1"></i> 12 Minggu</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Module 3 -->
                <div class="relative group">
                    <div class="absolute inset-0 bg-gradient-to-r from-purple-500 to-pink-500 rounded-2xl opacity-0 group-hover:opacity-100 transition-all duration-500 transform group-hover:scale-105 -z-10"></div>
                    <div class="flex flex-col sm:flex-row bg-white rounded-2xl p-6 transition-all duration-500 group-hover:translate-y-[-10px] group-hover:translate-x-[-10px] group-hover:shadow-2xl">
                        <div class="mb-4 sm:mb-0 sm:mr-6">
                            <div class="w-16 h-16 sm:w-20 sm:h-20 bg-purple-500 rounded-2xl flex items-center justify-center text-white text-2xl sm:text-3xl transform -rotate-6 group-hover:rotate-0 transition-all duration-300 mx-auto sm:mx-0">
                                <i class="fas fa-balance-scale"></i>
                            </div>
                        </div>
                        <div class="flex-1">
                            <div class="flex flex-wrap items-center mb-3 gap-2">
                                <span class="px-3 py-1 bg-purple-100 text-purple-600 rounded-full text-sm font-medium">Lanjutan</span>
                                <div class="flex items-center ml-auto space-x-2 text-sm text-gray-500">
                                    <span class="inline-flex items-center"><i class="fas fa-users mr-1"></i> 1800+</span>
                                </div>
                            </div>
                            <h3 class="text-xl font-bold text-gray-800 mb-2">Fikih Kontemporer</h3>
                            <p class="text-gray-600 mb-4">Kajian fikih dengan pendekatan moderat.</p>
                            <div class="flex flex-wrap items-center text-sm text-gray-500 gap-4">
                                <span class="flex items-center"><i class="fas fa-book mr-1"></i> 48 Modul</span>
                                <span class="flex items-center"><i class="fas fa-clock mr-1"></i> 16 Minggu</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Module 4 -->
                <div class="relative group">
                    <div class="absolute inset-0 bg-gradient-to-r from-emerald-500 to-teal-500 rounded-2xl opacity-0 group-hover:opacity-100 transition-all duration-500 transform group-hover:scale-105 -z-10"></div>
                    <div class="flex flex-col sm:flex-row bg-white rounded-2xl p-6 transition-all duration-500 group-hover:translate-y-[-10px] group-hover:translate-x-[-10px] group-hover:shadow-2xl">
                        <div class="mb-4 sm:mb-0 sm:mr-6">
                            <div class="w-16 h-16 sm:w-20 sm:h-20 bg-emerald-500 rounded-2xl flex items-center justify-center text-white text-2xl sm:text-3xl transform rotate-6 group-hover:rotate-0 transition-all duration-300 mx-auto sm:mx-0">
                                <i class="fas fa-hands-helping"></i>
                            </div>
                        </div>
                        <div class="flex-1">
                            <div class="flex flex-wrap items-center mb-3 gap-2">
                                <span class="px-3 py-1 bg-emerald-100 text-emerald-600 rounded-full text-sm font-medium">Spesial</span>
                                <div class="flex items-center ml-auto space-x-2 text-sm text-gray-500">
                                    <span class="inline-flex items-center"><i class="fas fa-users mr-1"></i> 2400+</span>
                                </div>
                            </div>
                            <h3 class="text-xl font-bold text-gray-800 mb-2">Islam & Masyarakat Modern</h3>
                            <p class="text-gray-600 mb-4">Program khusus tentang peran Islam modern.</p>
                            <div class="flex flex-wrap items-center text-sm text-gray-500 gap-4">
                                <span class="flex items-center"><i class="fas fa-book mr-1"></i> 32 Modul</span>
                                <span class="flex items-center"><i class="fas fa-clock mr-1"></i> 12 Minggu</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CTA Button with enhanced styling -->
            <div class="text-center mt-12 md:mt-16">
                <a href="#" class="inline-flex items-center px-6 py-3 md:px-8 md:py-4 bg-gradient-to-r from-blue-500 to-indigo-600 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transform transition-all duration-300 hover:scale-105">
                    <span class="mr-3">Lihat Semua Program</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 animate-bounce" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <!-- Interactive Features Section -->
    <section class="py-12 md:py-16 bg-white overflow-hidden">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12 md:mb-16">
                <span class="text-indigo-600 font-semibold text-sm uppercase tracking-wider">Belajar Interaktif</span>
                <h2 class="text-3xl md:text-4xl font-bold mt-2 mb-4 text-gray-800">Fitur Pembelajaran Modern</h2>
                <p class="max-w-2xl mx-auto text-gray-600">Nikmati pengalaman belajar yang menyenangkan dengan fitur-fitur interaktif yang memudahkan pemahaman Anda</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 md:gap-8">
                <!-- Feature Card 1 -->
                <div class="rounded-xl overflow-hidden group hover:bg-blue-50 transition-all duration-300 transform hover:-translate-y-2">
                    <div class="p-6 md:p-8">
                        <div class="w-14 h-14 md:w-16 md:h-16 bg-blue-100 rounded-2xl flex items-center justify-center text-blue-600 text-2xl md:text-3xl mb-6 group-hover:bg-blue-600 group-hover:text-white transition-all duration-300 mx-auto md:mx-0">
                            <i class="fas fa-chalkboard-teacher"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-3 text-gray-800 text-center md:text-left">Pembelajaran Interaktif</h3>
                        <p class="text-gray-600 mb-4 text-center md:text-left">Pengalaman belajar yang melibatkan siswa secara aktif melalui diskusi, kuis, dan aktivitas kolaboratif.</p>
                        <div class="flex flex-wrap items-center justify-center md:justify-start text-blue-600 font-medium gap-2">
                            <span class="w-2 h-2 rounded-full bg-blue-600"></span>
                            <span>Latihan Soal</span>
                            <span class="w-2 h-2 rounded-full bg-blue-600"></span>
                            <span>Diskusi</span>
                        </div>
                    </div>
                </div>

                <!-- Feature Card 2 -->
                <div class="rounded-xl overflow-hidden group hover:bg-indigo-50 transition-all duration-300 transform hover:-translate-y-2">
                    <div class="p-6 md:p-8">
                        <div class="w-14 h-14 md:w-16 md:h-16 bg-indigo-100 rounded-2xl flex items-center justify-center text-indigo-600 text-2xl md:text-3xl mb-6 group-hover:bg-indigo-600 group-hover:text-white transition-all duration-300 mx-auto md:mx-0">
                            <i class="fas fa-book-reader"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-3 text-gray-800 text-center md:text-left">Modul Ajar Kekinian</h3>
                        <p class="text-gray-600 mb-4 text-center md:text-left">Materi pembelajaran yang up-to-date dan relevan dengan perkembangan zaman dan kebutuhan siswa.</p>
                        <div class="flex flex-wrap items-center justify-center md:justify-start text-indigo-600 font-medium gap-2">
                            <span>Updated</span>
                            <span class="w-2 h-2 rounded-full bg-indigo-600"></span>
                            <span>Digital</span>
                            <span class="w-2 h-2 rounded-full bg-indigo-600"></span>
                            <span>Dinamis</span>
                        </div>
                    </div>
                </div>

                <!-- Feature Card 3 -->
                <div class="rounded-xl overflow-hidden group hover:bg-emerald-50 transition-all duration-300 transform hover:-translate-y-2">
                    <div class="p-6 md:p-8">
                        <div class="w-14 h-14 md:w-16 md:h-16 bg-emerald-100 rounded-2xl flex items-center justify-center text-emerald-600 text-2xl md:text-3xl mb-6 group-hover:bg-emerald-600 group-hover:text-white transition-all duration-300 mx-auto md:mx-0">
                            <i class="fas fa-mobile-alt"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-3 text-gray-800 text-center md:text-left">User-Friendly Interface</h3>
                        <p class="text-gray-600 mb-4 text-center md:text-left">Tampilan yang mudah digunakan dan diakses dari berbagai perangkat untuk pengalaman belajar yang nyaman.</p>
                        <div class="flex flex-wrap items-center justify-center md:justify-start text-emerald-600 font-medium gap-2">
                            <span>Responsive</span>
                            <span class="w-2 h-2 rounded-full bg-emerald-600"></span>
                            <span>Simple</span>
                            <span class="w-2 h-2 rounded-full bg-emerald-600"></span>
                            <span>Modern</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimoni -->
    <section class="py-12 md:py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl md:text-3xl font-bold text-center mb-8 md:mb-12">Apa Kata Mereka?</h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 md:gap-8">
                <!-- Testimoni 1 -->
                <div class="bg-gray-50 rounded-xl p-6 border border-gray-100 hover:shadow-md transition-all duration-300">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mr-4">
                            <span class="text-blue-600 font-bold">A</span>
                        </div>
                        <div>
                            <h4 class="font-bold">Ahmad</h4>
                            <p class="text-sm text-gray-600">Pelajar SMA</p>
                        </div>
                    </div>
                    <p class="text-gray-700">"Alhamdulillah, LMS PAI membantu saya memahami ajaran Islam dengan cara yang menyenangkan. Materinya lengkap dan mudah dipahami."</p>
                    <div class="mt-4 flex">
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                    </div>
                </div>

                <!-- Testimoni 2 -->
                <div class="bg-gray-50 rounded-xl p-6 border border-gray-100 hover:shadow-md transition-all duration-300">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-pink-100 rounded-full flex items-center justify-center mr-4">
                            <span class="text-pink-600 font-bold">F</span>
                        </div>
                        <div>
                            <h4 class="font-bold">Fatimah</h4>
                            <p class="text-sm text-gray-600">Mahasiswa</p>
                        </div>
                    </div>
                    <p class="text-gray-700">"Platform yang sangat membantu untuk memperdalam ilmu agama di tengah kesibukan kuliah. Saya bisa belajar kapan saja dan dimana saja."</p>
                    <div class="mt-4 flex">
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                    </div>
                </div>

                <!-- Testimoni 3 -->
                <div class="bg-gray-50 rounded-xl p-6 border border-gray-100 hover:shadow-md transition-all duration-300">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mr-4">
                            <span class="text-green-600 font-bold">H</span>
                        </div>
                        <div>
                            <h4 class="font-bold">Hasan</h4>
                            <p class="text-sm text-gray-600">Profesional</p>
                        </div>
                    </div>
                    <p class="text-gray-700">"Sebagai seorang profesional, LMS PAI memberikan saya kesempatan untuk tetap belajar agama meski dengan jadwal kerja yang padat. Sangat direkomendasikan!"</p>
                    <div class="mt-4 flex">
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star-half-alt text-yellow-400"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-12 md:py-16 bg-gradient-to-b from-indigo-600 to-purple-700 text-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-2xl md:text-3xl font-bold mb-4 md:mb-6">Mulai Perjalanan Belajar Anda Hari Ini</h2>
            <p class="text-lg md:text-xl mb-6 md:mb-8 max-w-2xl mx-auto">Bergabunglah dengan ribuan pelajar lainnya dan tingkatkan pemahaman Anda tentang ajaran Islam melalui platform modern kami.</p>
            <div class="flex flex-col sm:flex-row justify-center items-center gap-4">
                <a href="#" class="bg-white text-indigo-600 font-semibold w-full sm:w-auto px-8 py-3 rounded-lg hover:bg-blue-50 transition duration-300">Daftar Gratis</a>
                <a href="#" class="bg-transparent border-2 border-white text-white font-semibold w-full sm:w-auto px-8 py-3 rounded-lg hover:bg-white hover:text-indigo-600 transition duration-300">Pelajari Lebih Lanjut</a>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section id="faq" class="py-12 md:py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-10 md:mb-16">
                <span class="text-indigo-600 font-semibold text-sm uppercase tracking-wider">FAQ</span>
                <h2 class="text-2xl md:text-4xl font-bold mt-2 mb-4 text-gray-800">Pertanyaan yang Sering Diajukan</h2>
                <p class="max-w-2xl mx-auto text-gray-600">Temukan jawaban untuk pertanyaan-pertanyaan umum tentang Pintar PAI</p>
            </div>

            <div class="max-w-3xl mx-auto space-y-4" x-data="{activeTab: null}">
                <!-- FAQ Item 1 -->
                <div class="border border-gray-200 rounded-lg">
                    <button @click="activeTab = activeTab === 1 ? null : 1" class="flex justify-between items-center w-full px-6 py-4 text-left hover:bg-gray-50 transition-colors">
                        <span class="font-semibold text-gray-800">Apakah Pintar PAI berbayar?</span>
                        <svg :class="{'transform rotate-180': activeTab === 1}" class="w-6 h-6 text-gray-400 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div x-show="activeTab === 1" 
                         x-transition:enter="transition ease-out duration-200" 
                         x-transition:enter-start="opacity-0 transform -translate-y-4" 
                         x-transition:enter-end="opacity-100 transform translate-y-0" 
                         x-transition:leave="transition ease-in duration-150" 
                         x-transition:leave-start="opacity-100 transform translate-y-0" 
                         x-transition:leave-end="opacity-0 transform -translate-y-4">
                        <div class="px-6 pb-4">
                            <p class="text-gray-600">Pintar PAI menyediakan konten gratis. Anda dapat mengakses materi secara gratis.</p>
                        </div>
                    </div>
                </div>
                
                <!-- FAQ Item 2 -->
                <div class="border border-gray-200 rounded-lg">
                    <button @click="activeTab = activeTab === 2 ? null : 2" class="flex justify-between items-center w-full px-6 py-4 text-left hover:bg-gray-50 transition-colors">
                        <span class="font-semibold text-gray-800">Siapa saja yang bisa menggunakan Pintar-Pai?</span>
                        <svg :class="{'transform rotate-180': activeTab === 2}" class="w-6 h-6 text-gray-400 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div x-show="activeTab === 2" 
                         x-transition:enter="transition ease-out duration-200" 
                         x-transition:enter-start="opacity-0 transform -translate-y-4" 
                         x-transition:enter-end="opacity-100 transform translate-y-0" 
                         x-transition:leave="transition ease-in duration-150" 
                         x-transition:leave-start="opacity-100 transform translate-y-0" 
                         x-transition:leave-end="opacity-0 transform -translate-y-4">
                        <div class="px-6 pb-4">
                            <p class="text-gray-600">Pintar PAI ditargetkan untuk siswa/i SMK Negeri 6 Jember kelas 11 rpl 2</p>
                        </div>
                    </div>
                </div>
                
                <!-- FAQ Item 3 (New) -->
                <div class="border border-gray-200 rounded-lg">
                    <button @click="activeTab = activeTab === 3 ? null : 3" class="flex justify-between items-center w-full px-6 py-4 text-left hover:bg-gray-50 transition-colors">
                        <span class="font-semibold text-gray-800">Bagaimana cara mengakses materi pembelajaran?</span>
                        <svg :class="{'transform rotate-180': activeTab === 3}" class="w-6 h-6 text-gray-400 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div x-show="activeTab === 3" 
                         x-transition:enter="transition ease-out duration-200" 
                         x-transition:enter-start="opacity-0 transform -translate-y-4" 
                         x-transition:enter-end="opacity-100 transform translate-y-0" 
                         x-transition:leave="transition ease-in duration-150" 
                         x-transition:leave-start="opacity-100 transform translate-y-0" 
                         x-transition:leave-end="opacity-0 transform -translate-y-4">
                        <div class="px-6 pb-4">
                            <p class="text-gray-600">Setelah mendaftar dan masuk ke akun Anda, semua materi pembelajaran dapat diakses melalui dashboard pengguna. Anda dapat mengaksesnya dari perangkat apa saja dengan koneksi internet.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-xl font-bold mb-4">Pintar Pai</h3>
                    <p class="text-gray-400">Platform pembelajaran Pendidikan Agama Islam modern dan interaktif</p>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Menu</h4>
                    <ul class="space-y-2">
                        <li><a href="#home" class="text-gray-400 hover:text-white">Home</a></li>
                        <li><a href="#about" class="text-gray-400 hover:text-white">About</a></li>
                        <li><a href="#faq" class="text-gray-400 hover:text-white">FAQ</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Kontak</h4>
                    <ul class="space-y-2">
                        <li class="text-gray-400">Email: info@lmspai.com</li>
                        <li class="text-gray-400">Phone: (021) 1234-5678</li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Ikuti Kami</h4>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            <i class="fab fa-facebook-f text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            <i class="fab fa-twitter text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            <i class="fab fa-instagram text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            <i class="fab fa-youtube text-xl"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-800 mt-10 pt-8 text-center">
                <p class="text-gray-400">&copy; 2025 Pintar Pai. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                
                const targetId = this.getAttribute('href');
                const targetElement = document.querySelector(targetId);
                
                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 80, // Adjusted for fixed header
                        behavior: 'smooth'
                    });
                    
                    // Close mobile menu if it's open
                    if (window.innerWidth < 768) {
                        const mobileMenuOpen = document.querySelector('[x-data]').__x.$data.mobileMenuOpen;
                        if (mobileMenuOpen) {
                            document.querySelector('[x-data]').__x.$data.mobileMenuOpen = false;
                        }
                    }
                }
            });
        });
    </script>
</body>
</html>