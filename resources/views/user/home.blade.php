@extends('layouts.user')

@section('title', 'Home')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <!-- Header Section with Animation -->
        <div class="mb-8 transform hover:scale-105 transition-all duration-300">
            <h2 class="text-3xl md:text-4xl font-bold text-center text-gray-800 mb-3">Selamat Datang di Pintar-Pai!</h2>
            <p class="text-center text-gray-600 text-lg">Akses materi dan soal untuk belajar dengan mudah.</p>
        </div>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Card Jumlah Materi -->
            <div class="transform hover:-translate-y-2 transition-all duration-300">
                <div class="bg-gradient-to-r from-blue-500 to-blue-600 rounded-xl shadow-lg hover:shadow-xl">
                    <div class="p-8 flex items-center text-white">
                        <div class="bg-blue-400/30 rounded-lg p-3 mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M8.5 2.687c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
                            </svg>
                        </div>
                        <div>
                            <h5 class="text-lg font-medium mb-1">Jumlah Materi</h5>
                            <h3 class="text-3xl font-bold">{{ $materialCount }}</h3>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card Jumlah Soal -->
            <div class="transform hover:-translate-y-2 transition-all duration-300">
                <div class="bg-gradient-to-r from-green-500 to-green-600 rounded-xl shadow-lg hover:shadow-xl">
                    <div class="p-8 flex items-center text-white">
                        <div class="bg-green-400/30 rounded-lg p-3 mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/>
                            </svg>
                        </div>
                        <div>
                            <h5 class="text-lg font-medium mb-1">Jumlah Soal</h5>
                            <h3 class="text-3xl font-bold">{{ $questionCount }}</h3>
                        </div>
                    </div>
                </div>
            </div>

            <!-- New Card for Quick Access -->
            <div class="transform hover:-translate-y-2 transition-all duration-300">
                <div class="bg-gradient-to-r from-purple-500 to-purple-600 rounded-xl shadow-lg hover:shadow-xl">
                    <div class="p-8 flex items-center text-white">
                        <div class="bg-purple-400/30 rounded-lg p-3 mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <div>
                            <h5 class="text-lg font-medium mb-1">Akses Cepat</h5>
                            <h3 class="text-3xl font-bold">Menu</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection