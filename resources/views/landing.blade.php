<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pintar Pai - Platform Pembelajaran Agama Islam</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-50">
    <!-- Navbar -->
    <nav class="bg-white shadow-lg fixed w-full z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <!-- Logo -->
                    <div class="flex-shrink-0 flex items-center">
                        <img src="{{ asset('img/Lms-Pai/FixLogo.png') }}" alt="LMS PAI Logo" class="h-20 w-auto">
                    </div>
                    <!-- Menu -->
                    <div class="hidden md:ml-6 md:flex md:space-x-8">
                        <a href="#" class="inline-flex items-center px-1 pt-1 text-sm font-medium text-blue-600 border-b-2 border-blue-600">
                            Home
                        </a>
                        <a href="#" class="inline-flex items-center px-1 pt-1 text-sm font-medium text-gray-500 hover:text-blue-600 hover:border-blue-600">
                            About
                        </a>
                        <a href="#" class="inline-flex items-center px-1 pt-1 text-sm font-medium text-gray-500 hover:text-blue-600 hover:border-blue-600">
                            FAQ
                        </a>
                    </div>
                </div>
                <!-- Auth Buttons -->
                <div class="flex items-center space-x-4">
                    <a href="/login" class="text-blue-600 hover:text-blue-700 px-3 py-2 rounded-md text-sm font-medium">Masuk</a>
                    <a href="/register" class="bg-blue-600 text-white hover:bg-blue-700 px-4 py-2 rounded-md text-sm font-medium transition duration-150 ease-in-out">Daftar</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="pt-24 bg-gradient-to-b from-blue-50 to-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div>
                    <h1 class="text-4xl md:text-5xl font-bold text-gray-900 leading-tight mb-6">
                        Belajar Pendidikan Agama Islam dengan Cara yang Modern
                    </h1>
                    <p class="text-lg text-gray-600 mb-8">
                        Platform pembelajaran digital yang memudahkan Anda memahami ajaran Islam dengan materi berkualitas dan metode yang interaktif.
                    </p>
                    <div class="flex space-x-4">
                        <a href="{{ auth()->check() ? '/user/home' : '/login' }}" class="bg-blue-600 text-white px-6 py-3 rounded-lg text-lg font-medium hover:bg-blue-700 transition duration-150 ease-in-out">
                            Mulai Belajar
                        </a>
                        <a href="#" class="border border-blue-600 text-blue-600 px-6 py-3 rounded-lg text-lg font-medium hover:bg-blue-50 transition duration-150 ease-in-out">
                            Pelajari Lebih Lanjut
                        </a>
                    </div>
                </div>
                <div class="hidden md:block">
                    <img src="{{ asset('img/Lms-Pai/Info4.png') }}" alt="Hero Image">
                </div>
            </div>
        </div>
    </div>

    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <span class="text-blue-600 font-semibold text-sm uppercase tracking-wider">Kurikulum Terpadu</span>
                <h2 class="text-4xl font-bold mt-2 mb-4 text-gray-800">Program Unggulan Kami</h2>
                <p class="max-w-2xl mx-auto text-gray-600">Berbagai program belajar yang dirancang khusus untuk membantu Anda memahami dan mengamalkan ajaran Islam dengan mudah dan menyenangkan</p>
            </div>

            <!-- Timeline Style Modules -->
            <div class="relative">
                <!-- Vertical Line -->
                <div class="hidden md:block absolute left-1/2 transform -translate-x-1/2 h-full w-1 bg-gradient-to-b from-blue-400 to-emerald-400"></div>

                <!-- Module 1 -->
                <div class="relative mb-16">
                    <div class="md:flex items-center">
                        <div class="md:w-1/2 md:pr-8 mb-8 md:mb-0 md:text-right">
                            <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 border-t-4 border-blue-500">
                                <span class="inline-block px-3 py-1 bg-blue-100 text-blue-600 rounded-full text-sm font-medium mb-3">Pemula</span>
                                <h3 class="text-2xl font-bold mb-3 text-gray-800">Dasar-Dasar Islam</h3>
                                <p class="text-gray-600 mb-4">Program pengenalan dasar ajaran Islam untuk pemula, mencakup akidah, ibadah, dan akhlak dalam kehidupan sehari-hari.</p>
                                <div class="flex md:justify-end">
                                    <span class="mr-2 text-sm text-gray-500"><i class="fas fa-book mr-1"></i> 24 Modul</span>
                                    <span class="mr-2 text-sm text-gray-500"><i class="fas fa-clock mr-1"></i> 8 Minggu</span>
                                    <span class="text-sm text-gray-500"><i class="fas fa-users mr-1"></i> 5000+ Pelajar</span>
                                </div>
                            </div>
                        </div>

                        <div class="hidden md:flex justify-center absolute left-1/2 transform -translate-x-1/2">
                            <div class="w-16 h-16 bg-blue-500 rounded-full flex items-center justify-center text-white text-2xl shadow-lg z-10">
                                <i class="fas fa-star"></i>
                            </div>
                        </div>

                        <div class="md:w-1/2 md:pl-8">
                            <!-- Empty div for layout -->
                        </div>
                    </div>
                </div>

                <!-- Module 2 -->
                <div class="relative mb-16">
                    <div class="md:flex items-center">
                        <div class="md:w-1/2 md:pr-8 mb-8 md:mb-0">
                            <!-- Empty div for layout -->
                        </div>

                        <div class="hidden md:flex justify-center absolute left-1/2 transform -translate-x-1/2">
                            <div class="w-16 h-16 bg-indigo-500 rounded-full flex items-center justify-center text-white text-2xl shadow-lg z-10">
                                <i class="fas fa-book-open"></i>
                            </div>
                        </div>

                        <div class="md:w-1/2 md:pl-8">
                            <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 border-t-4 border-indigo-500">
                                <span class="inline-block px-3 py-1 bg-indigo-100 text-indigo-600 rounded-full text-sm font-medium mb-3">Menengah</span>
                                <h3 class="text-2xl font-bold mb-3 text-gray-800">Kajian Al-Qur'an Tematik</h3>
                                <p class="text-gray-600 mb-4">Mempelajari Al-Qur'an secara tematik dengan pendekatan modern, disertai tafsir dan implementasi dalam kehidupan.</p>
                                <div class="flex">
                                    <span class="mr-2 text-sm text-gray-500"><i class="fas fa-book mr-1"></i> 36 Modul</span>
                                    <span class="mr-2 text-sm text-gray-500"><i class="fas fa-clock mr-1"></i> 12 Minggu</span>
                                    <span class="text-sm text-gray-500"><i class="fas fa-users mr-1"></i> 3200+ Pelajar</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Module 3 -->
                <div class="relative mb-16">
                    <div class="md:flex items-center">
                        <div class="md:w-1/2 md:pr-8 mb-8 md:mb-0 md:text-right">
                            <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 border-t-4 border-purple-500">
                                <span class="inline-block px-3 py-1 bg-purple-100 text-purple-600 rounded-full text-sm font-medium mb-3">Lanjutan</span>
                                <h3 class="text-2xl font-bold mb-3 text-gray-800">Fikih Kontemporer</h3>
                                <p class="text-gray-600 mb-4">Kajian fikih yang mengulas isu-isu kontemporer dalam perspektif Islam dengan pendekatan moderat dan komprehensif.</p>
                                <div class="flex md:justify-end">
                                    <span class="mr-2 text-sm text-gray-500"><i class="fas fa-book mr-1"></i> 48 Modul</span>
                                    <span class="mr-2 text-sm text-gray-500"><i class="fas fa-clock mr-1"></i> 16 Minggu</span>
                                    <span class="text-sm text-gray-500"><i class="fas fa-users mr-1"></i> 1800+ Pelajar</span>
                                </div>
                            </div>
                        </div>

                        <div class="hidden md:flex justify-center absolute left-1/2 transform -translate-x-1/2">
                            <div class="w-16 h-16 bg-purple-500 rounded-full flex items-center justify-center text-white text-2xl shadow-lg z-10">
                                <i class="fas fa-balance-scale"></i>
                            </div>
                        </div>

                        <div class="md:w-1/2 md:pl-8">
                            <!-- Empty div for layout -->
                        </div>
                    </div>
                </div>

                <!-- Module 4 -->
                <div class="relative">
                    <div class="md:flex items-center">
                        <div class="md:w-1/2 md:pr-8 mb-8 md:mb-0">
                            <!-- Empty div for layout -->
                        </div>

                        <div class="hidden md:flex justify-center absolute left-1/2 transform -translate-x-1/2">
                            <div class="w-16 h-16 bg-emerald-500 rounded-full flex items-center justify-center text-white text-2xl shadow-lg z-10">
                                <i class="fas fa-hands-helping"></i>
                            </div>
                        </div>

                        <div class="md:w-1/2 md:pl-8">
                            <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 border-t-4 border-emerald-500">
                                <span class="inline-block px-3 py-1 bg-emerald-100 text-emerald-600 rounded-full text-sm font-medium mb-3">Spesial</span>
                                <h3 class="text-2xl font-bold mb-3 text-gray-800">Islam & Masyarakat Modern</h3>
                                <p class="text-gray-600 mb-4">Program khusus yang mengupas tuntas peran dan penerapan nilai-nilai Islam dalam konteks masyarakat modern.</p>
                                <div class="flex">
                                    <span class="mr-2 text-sm text-gray-500"><i class="fas fa-book mr-1"></i> 32 Modul</span>
                                    <span class="mr-2 text-sm text-gray-500"><i class="fas fa-clock mr-1"></i> 12 Minggu</span>
                                    <span class="text-sm text-gray-500"><i class="fas fa-users mr-1"></i> 2400+ Pelajar</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CTA Button -->
            <div class="text-center mt-16">
                <a href="#" class="inline-flex items-center px-8 py-3 bg-gradient-to-r from-blue-500 to-indigo-600 text-white font-semibold rounded-full shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300">
                    Lihat Semua Program
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <!-- Interactive Features Section -->
    <section class="py-16 bg-white overflow-hidden">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <span class="text-indigo-600 font-semibold text-sm uppercase tracking-wider">Belajar Interaktif</span>
                <h2 class="text-4xl font-bold mt-2 mb-4 text-gray-800">Fitur Pembelajaran Modern</h2>
                <p class="max-w-2xl mx-auto text-gray-600">Nikmati pengalaman belajar yang menyenangkan dengan fitur-fitur interaktif yang memudahkan pemahaman Anda</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

                <!-- Feature Card 1 -->
                <div class="rounded-xl overflow-hidden group hover:bg-blue-50 transition-all duration-300 transform hover:-translate-y-2">
                    <div class="p-8">
                        <div class="w-16 h-16 bg-blue-100 rounded-2xl flex items-center justify-center text-blue-600 text-3xl mb-6 group-hover:bg-blue-600 group-hover:text-white transition-all duration-300">
                            <i class="fas fa-chalkboard-teacher"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-3 text-gray-800">Pembelajaran Interaktif</h3>
                        <p class="text-gray-600 mb-4">Pengalaman belajar yang melibatkan siswa secara aktif melalui diskusi, kuis, dan aktivitas kolaboratif.</p>
                        <div class="flex items-center text-blue-600 font-medium">
                            <span class="w-2 h-2 rounded-full bg-blue-600 mx-2"></span>
                            <span>Latihan Soal</span>
                            <span class="w-2 h-2 rounded-full bg-blue-600 mx-2"></span>
                            <span>Diskusi</span>
                        </div>
                    </div>
                </div>

                <!-- Feature Card 2 -->
                <div class="rounded-xl overflow-hidden group hover:bg-indigo-50 transition-all duration-300 transform hover:-translate-y-2">
                    <div class="p-8">
                        <div class="w-16 h-16 bg-indigo-100 rounded-2xl flex items-center justify-center text-indigo-600 text-3xl mb-6 group-hover:bg-indigo-600 group-hover:text-white transition-all duration-300">
                            <i class="fas fa-book-reader"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-3 text-gray-800">Modul Ajar Kekinian</h3>
                        <p class="text-gray-600 mb-4">Materi pembelajaran yang up-to-date dan relevan dengan perkembangan zaman dan kebutuhan siswa.</p>
                        <div class="flex items-center text-indigo-600 font-medium">
                            <span>Updated</span>
                            <span class="w-2 h-2 rounded-full bg-indigo-600 mx-2"></span>
                            <span>Digital</span>
                            <span class="w-2 h-2 rounded-full bg-indigo-600 mx-2"></span>
                            <span>Dinamis</span>
                        </div>
                    </div>
                </div>

                <!-- Feature Card 3 -->
                <div class="rounded-xl overflow-hidden group hover:bg-emerald-50 transition-all duration-300 transform hover:-translate-y-2">
                    <div class="p-8">
                        <div class="w-16 h-16 bg-emerald-100 rounded-2xl flex items-center justify-center text-emerald-600 text-3xl mb-6 group-hover:bg-emerald-600 group-hover:text-white transition-all duration-300">
                            <i class="fas fa-mobile-alt"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-3 text-gray-800">User-Friendly Interface</h3>
                        <p class="text-gray-600 mb-4">Tampilan yang mudah digunakan dan diakses dari berbagai perangkat untuk pengalaman belajar yang nyaman.</p>
                        <div class="flex items-center text-emerald-600 font-medium">
                            <span>Responsive</span>
                            <span class="w-2 h-2 rounded-full bg-emerald-600 mx-2"></span>
                            <span>Simple</span>
                            <span class="w-2 h-2 rounded-full bg-emerald-600 mx-2"></span>
                            <span>Modern</span>
                        </div>
                    </div>
                </div>
    </section>

    <!-- Testimoni -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12">Apa Kata Mereka?</h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
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
    <section class="py-16 bg-gradient-to-r from-blue-600 to-blue-800 text-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold mb-6">Mulai Perjalanan Belajar Anda Hari Ini</h2>
            <p class="text-xl mb-8 max-w-2xl mx-auto">Bergabunglah dengan ribuan pelajar lainnya dan tingkatkan pemahaman Anda tentang ajaran Islam melalui platform modern kami.</p>
            <div class="flex flex-col md:flex-row justify-center items-center gap-4">
                <a href="#" class="bg-white text-blue-600 font-semibold px-8 py-3 rounded-lg hover:bg-blue-50 transition duration-300">Daftar Gratis</a>
                <a href="#" class="bg-transparent border-2 border-white text-white font-semibold px-8 py-3 rounded-lg hover:bg-white hover:text-blue-600 transition duration-300">Pelajari Lebih Lanjut</a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-xl font-bold mb-4">Pintar Pai</h3>
                    <p class="text-gray-400">Platform pembelajaran Pendidikan Agama Islam modern dan interaktif</p>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Menu</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white">Home</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">About</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">FAQ</a></li>
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
                        <a href="#" class="text-gray-400 hover:text-white">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z" />
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-800 mt-12 pt-8 text-center">
                <p class="text-gray-400">&copy; 2025 Pintar Pai. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>

</html>