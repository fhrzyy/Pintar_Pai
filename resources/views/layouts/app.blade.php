<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin-Pintar Pai')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        .sidebar-gradient {
            background: linear-gradient(180deg, #6B46C1 0%, #7C3AED 100%);
        }
    </style>
</head>
<body class="bg-gray-100">
<div class="flex min-h-screen" style="font-family: 'Poppins', sans-serif;">
        <!-- Sidebar -->
        <div class="w-64 fixed h-full shadow-lg sidebar-gradient">
            <!-- Logo Section -->
            <div class="flex items-center px-6 h-16">
                <div class="flex items-center gap-2">
                    <svg class="w-8 h-8 text-white" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 4L2 20h20L12 4z"/>
                    </svg>
                    <span class="text-2xl font-bold text-white">Pintar Pai</span>
                </div>
            </div>

            <!-- Navigation Menu -->
            <nav class="mt-6">
                <div class="px-4">
                    <p class="px-4 text-xs font-medium text-white/50 uppercase mb-4">MAIN MENU</p>
                    
                    <!-- Dashboard -->
                    <a href="{{ route('admin.home') }}" 
                       class="flex items-center px-4 py-3 text-white transition-colors rounded-lg hover:bg-white/10 {{ request()->routeIs('admin.home') ? 'bg-white/10' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                        </svg>
                        <span>Home</span>
                    </a>

                    <!-- Menu Materi -->
                    <div x-data="{ open: false }" class="mt-2">
                        <button @click="open = !open" 
                                class="flex items-center justify-between w-full px-4 py-3 text-white transition-colors rounded-lg hover:bg-white/10">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z" />
                                </svg>
                                <span>Materi</span>
                            </div>
                            <span class="ml-auto bg-white/20 text-xs px-2 py-0.5 rounded-full">3</span>
                            <svg xmlns="http://www.w3.org/2000/svg" 
                                 class="h-4 w-4 ml-2 transition-transform" 
                                 :class="{'rotate-180': open}" 
                                 fill="none" 
                                 viewBox="0 0 24 24" 
                                 stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div x-show="open" 
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 transform -translate-y-2"
                             x-transition:enter-end="opacity-100 transform translate-y-0"
                             x-transition:leave="transition ease-in duration-150"
                             x-transition:leave-start="opacity-100 transform translate-y-0"
                             x-transition:leave-end="opacity-0 transform -translate-y-2"
                             class="mt-2 space-y-2 px-6">
                            <a href="{{ route('admin.materials.index') }}" 
                               class="block px-4 py-2 text-sm text-white rounded-lg hover:bg-white/10 {{ request()->routeIs('admin.materials.index') ? 'bg-white/10' : '' }}">
                               Daftar Materi
                            </a>
                            <a href="{{ route('admin.materials.create') }}" 
                               class="block px-4 py-2 text-sm text-white rounded-lg hover:bg-white/10 {{ request()->routeIs('admin.materials.create') ? 'bg-white/10' : '' }}">
                               Upload Materi
                            </a>
                        </div>
                    </div>

                    <!-- Menu Soal -->
                    <div x-data="{ open: false }" class="mt-2">
                        <button @click="open = !open" 
                                class="flex items-center justify-between w-full px-4 py-3 text-white transition-colors rounded-lg hover:bg-white/10">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                                </svg>
                                <span>Soal</span>
                            </div>
                            <span class="ml-auto bg-white/20 text-xs px-2 py-0.5 rounded-full">New</span>
                            <svg xmlns="http://www.w3.org/2000/svg" 
                                 class="h-4 w-4 ml-2 transition-transform" 
                                 :class="{'rotate-180': open}" 
                                 fill="none" 
                                 viewBox="0 0 24 24" 
                                 stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div x-show="open" 
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 transform -translate-y-2"
                             x-transition:enter-end="opacity-100 transform translate-y-0"
                             x-transition:leave="transition ease-in duration-150"
                             x-transition:leave-start="opacity-100 transform translate-y-0"
                             x-transition:leave-end="opacity-0 transform -translate-y-2"
                             class="mt-2 space-y-2 px-6">
                            <a href="{{ route('admin.questions.index') }}" 
                               class="block px-4 py-2 text-sm text-white rounded-lg hover:bg-white/10 {{ request()->routeIs('admin.questions.index') ? 'bg-white/10' : '' }}">
                               Daftar Soal
                            </a>
                            <a href="{{ route('admin.questions.create') }}" 
                               class="block px-4 py-2 text-sm text-white rounded-lg hover:bg-white/10 {{ request()->routeIs('admin.questions.create') ? 'bg-white/10' : '' }}">
                               Buat Soal
                            </a>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- User Profile -->
            <div class="absolute bottom-0 w-full">
                <div class="px-4 py-4">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 rounded-full bg-white/20 flex items-center justify-center">
                            <span class="text-white text-lg">{{ substr(Auth::user()->name, 0, 1) }}</span>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm text-white/60">User</p>
                            <p class="text-sm text-white">{{ Auth::user()->name }}</p>
                        </div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="p-2 hover:bg-white/10 rounded-lg">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 ml-64">
            <main class="p-8">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>