@extends('layouts.user')

@section('title', 'Home')

@section('content')
    <div class="container mx-auto px-4 py-6 sm:py-8">
        <!-- Header Section with Animation -->
        <div class="mb-6 sm:mb-8 transform hover:scale-105 transition-all duration-300">
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-center text-gray-800 mb-2 sm:mb-3">Selamat Datang di Pintar-Pai!</h2>
            <p class="text-center text-gray-600 text-base sm:text-lg">Akses materi dan soal untuk belajar dengan mudah.</p>
        </div>

        <!-- Stats Grid - Top Row -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 mb-6 sm:mb-8">
            <!-- Card Jumlah Materi -->
            <div class="transform hover:-translate-y-1 sm:hover:-translate-y-2 transition-all duration-300">
                <div class="bg-gradient-to-r from-blue-500 to-blue-600 rounded-xl shadow-lg hover:shadow-xl">
                    <div class="p-4 sm:p-6 md:p-8 flex items-center text-white">
                        <div class="bg-blue-400/30 rounded-lg p-2 sm:p-3 mr-3 sm:mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 sm:h-10 w-8 sm:w-10" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M8.5 2.687c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
                            </svg>
                        </div>
                        <div>
                            <h5 class="text-base sm:text-lg font-medium mb-1">Jumlah Materi</h5>
                            <h3 class="text-2xl sm:text-3xl font-bold">{{ $materialCount }}</h3>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card Jumlah Soal -->
            <div class="transform hover:-translate-y-1 sm:hover:-translate-y-2 transition-all duration-300">
                <div class="bg-gradient-to-r from-green-500 to-green-600 rounded-xl shadow-lg hover:shadow-xl">
                    <div class="p-4 sm:p-6 md:p-8 flex items-center text-white">
                        <div class="bg-green-400/30 rounded-lg p-2 sm:p-3 mr-3 sm:mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 sm:h-10 w-8 sm:w-10" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/>
                            </svg>
                        </div>
                        <div>
                            <h5 class="text-base sm:text-lg font-medium mb-1">Jumlah Soal</h5>
                            <h3 class="text-2xl sm:text-3xl font-bold">{{ $questionCount }}</h3>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Access Card -->
            <div class="transform hover:-translate-y-1 sm:hover:-translate-y-2 transition-all duration-300">
                <div class="bg-gradient-to-r from-purple-500 to-purple-600 rounded-xl shadow-lg hover:shadow-xl">
                    <div class="p-4 sm:p-6 md:p-8 flex items-center text-white">
                        <div class="bg-purple-400/30 rounded-lg p-2 sm:p-3 mr-3 sm:mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 sm:h-10 w-8 sm:w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <div>
                            <h5 class="text-base sm:text-lg font-medium mb-1">Akses Cepat</h5>
                            <h3 class="text-2xl sm:text-3xl font-bold">Menu</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Progress Section -->
        <div class="bg-white rounded-xl shadow-lg p-4 sm:p-6 mb-6 sm:mb-8 transform hover:shadow-xl transition-all duration-300">
            <h3 class="text-xl sm:text-2xl font-bold text-gray-800 mb-3 sm:mb-4">Progress Belajar</h3>
            <div class="space-y-3 sm:space-y-4">
                <div>
                    <div class="flex justify-between mb-1">
                        <span class="text-sm sm:text-base text-gray-700 font-medium">Materi Dipelajari</span>
                        <span class="text-sm sm:text-base text-blue-600 font-medium">60%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2 sm:h-2.5">
                        <div class="bg-blue-600 h-2 sm:h-2.5 rounded-full" style="width: 60%"></div>
                    </div>
                </div>
                <div>
                    <div class="flex justify-between mb-1">
                        <span class="text-sm sm:text-base text-gray-700 font-medium">Soal Dikerjakan</span>
                        <span class="text-sm sm:text-base text-green-600 font-medium">45%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2 sm:h-2.5">
                        <div class="bg-green-600 h-2 sm:h-2.5 rounded-full" style="width: 45%"></div>
                    </div>
                </div>
                <div>
                    <div class="flex justify-between mb-1">
                        <span class="text-sm sm:text-base text-gray-700 font-medium">Nilai Rata-rata</span>
                        <span class="text-sm sm:text-base text-amber-600 font-medium">85%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2 sm:h-2.5">
                        <div class="bg-amber-500 h-2 sm:h-2.5 rounded-full" style="width: 85%"></div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Recommended Materials -->
        <div class="bg-white rounded-xl shadow-lg p-4 sm:p-6 mb-6 sm:mb-8 transform hover:shadow-xl transition-all duration-300">
            <h3 class="text-xl sm:text-2xl font-bold text-gray-800 mb-3 sm:mb-4">Rekomendasi Materi</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-4">
                <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-lg p-3 sm:p-4 border border-blue-200 transform hover:scale-[1.02] sm:hover:scale-105 transition-all duration-300">
                    <div class="flex items-center mb-2 sm:mb-3">
                        <div class="bg-blue-500 text-white rounded-full p-1.5 sm:p-2 mr-2 sm:mr-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 sm:h-5 w-4 sm:w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <h4 class="text-base sm:text-lg font-medium text-gray-800">Konsep Tauhid</h4>
                    </div>
                    <p class="text-xs sm:text-sm text-gray-600 mb-2 sm:mb-3">Pelajari tentang konsep dasar tauhid dalam Islam.</p>
                    <a href="#" class="text-blue-600 hover:text-blue-800 font-medium inline-flex items-center text-xs sm:text-sm">
                        Mulai belajar
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 sm:h-4 w-3 sm:w-4 ml-1" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>
                
                <div class="bg-gradient-to-br from-green-50 to-green-100 rounded-lg p-3 sm:p-4 border border-green-200 transform hover:scale-[1.02] sm:hover:scale-105 transition-all duration-300">
                    <div class="flex items-center mb-2 sm:mb-3">
                        <div class="bg-green-500 text-white rounded-full p-1.5 sm:p-2 mr-2 sm:mr-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 sm:h-5 w-4 sm:w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                        <h4 class="text-base sm:text-lg font-medium text-gray-800">Fiqih Ibadah</h4>
                    </div>
                    <p class="text-xs sm:text-sm text-gray-600 mb-2 sm:mb-3">Pelajari tentang tata cara ibadah dalam Islam.</p>
                    <a href="#" class="text-green-600 hover:text-green-800 font-medium inline-flex items-center text-xs sm:text-sm">
                        Mulai belajar
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 sm:h-4 w-3 sm:w-4 ml-1" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>
                
                <div class="bg-gradient-to-br from-amber-50 to-amber-100 rounded-lg p-3 sm:p-4 border border-amber-200 transform hover:scale-[1.02] sm:hover:scale-105 transition-all duration-300">
                    <div class="flex items-center mb-2 sm:mb-3">
                        <div class="bg-amber-500 text-white rounded-full p-1.5 sm:p-2 mr-2 sm:mr-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 sm:h-5 w-4 sm:w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h4 class="text-base sm:text-lg font-medium text-gray-800">Sejarah Islam</h4>
                    </div>
                    <p class="text-xs sm:text-sm text-gray-600 mb-2 sm:mb-3">Pelajari tentang sejarah peradaban Islam.</p>
                    <a href="#" class="text-amber-600 hover:text-amber-800 font-medium inline-flex items-center text-xs sm:text-sm">
                        Mulai belajar
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 sm:h-4 w-3 sm:w-4 ml-1" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <!-- Achievement Section -->
        <div class="bg-gradient-to-r from-indigo-500 to-purple-600 rounded-xl shadow-lg p-4 sm:p-6 mb-6 sm:mb-8 text-white">
            <div class="flex flex-col md:flex-row items-center justify-between">
                <div class="mb-4 md:mb-0">
                    <h3 class="text-xl sm:text-2xl font-bold mb-1 sm:mb-2">Prestasi Belajar</h3>
                    <p class="opacity-90 text-sm sm:text-base">Selamat! Kamu telah menyelesaikan 65% dari semua materi pelajaran</p>
                </div>
                <div class="flex space-x-2 sm:space-x-3">
                    <div class="bg-white/20 backdrop-blur-sm rounded-lg p-2 sm:p-3 text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 sm:h-8 w-6 sm:w-8 mx-auto mb-1 sm:mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                        </svg>
                        <div class="text-xs sm:text-sm font-medium">5 Pencapaian</div>
                    </div>
                    <div class="bg-white/20 backdrop-blur-sm rounded-lg p-2 sm:p-3 text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 sm:h-8 w-6 sm:w-8 mx-auto mb-1 sm:mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                        </svg>
                        <div class="text-xs sm:text-sm font-medium">3 Penghargaan</div>
                    </div>
                    <div class="bg-white/20 backdrop-blur-sm rounded-lg p-2 sm:p-3 text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 sm:h-8 w-6 sm:w-8 mx-auto mb-1 sm:mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                        <div class="text-xs sm:text-sm font-medium">280 Poin</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection