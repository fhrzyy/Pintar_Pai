<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin-Pintar Pai')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-gray-100">
    <div class="flex min-h-screen" style="font-family: 'Poppins', sans-serif;">
        <!-- Sidebar -->
        <div class="w-64 bg-blue-800 fixed h-full shadow-lg">
            <!-- Logo Section -->
            <div class="flex items-center justify-center h-16 bg-blue-900">
                <h1 class="text-2xl font-bold text-white">Pintar-Pai</h1>
            </div>

            <!-- Navigation Menu -->
            <nav class="mt-6">
                <div class="px-4 space-y-3">
                    <!-- Dashboard -->
                    <a href="{{ route('admin.home') }}" class="flex items-center px-4 py-3 text-white transition-colors rounded-lg hover:bg-blue-700 {{ request()->routeIs('admin.home') ? 'bg-blue-700' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                        </svg>
                        <span class="font-medium">Dashboard</span>
                    </a>

                    <!-- Menu Materi -->
                    <div x-data="{ open: false }" class="space-y-1">
                        <button @click="open = !open" class="flex items-center justify-between w-full px-4 py-3 text-white transition-colors rounded-lg hover:bg-blue-700">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z" />
                                </svg>
                                <span class="font-medium">Menu Materi</span>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition-transform" :class="{'rotate-180': open}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div x-show="open" class="pl-12 space-y-1" style="display: none">
                            <a href="{{ route('admin.materials.index') }}" class="block px-4 py-2 text-sm text-white rounded-lg hover:bg-blue-700 {{ request()->routeIs('admin.materials.index') ? 'bg-blue-700' : '' }}">Daftar Materi</a>
                            <a href="{{ route('admin.materials.create') }}" class="block px-4 py-2 text-sm text-white rounded-lg hover:bg-blue-700 {{ request()->routeIs('admin.materials.create') ? 'bg-blue-700' : '' }}">Upload Materi</a>
                        </div>
                    </div>

                    <!-- Menu Soal -->
                    <div x-data="{ open: false }" class="space-y-1">
                        <button @click="open = !open" class="flex items-center justify-between w-full px-4 py-3 text-white transition-colors rounded-lg hover:bg-blue-700">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                                </svg>
                                <span class="font-medium">Menu Soal</span>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition-transform" :class="{'rotate-180': open}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div x-show="open" class="pl-12 space-y-1" style="display: none">
                            <a href="{{ route('admin.questions.index') }}" class="block px-4 py-2 text-sm text-white rounded-lg hover:bg-blue-700 {{ request()->routeIs('admin.questions.index') ? 'bg-blue-700' : '' }}">Daftar Soal</a>
                            <a href="{{ route('admin.questions.create') }}" class="block px-4 py-2 text-sm text-white rounded-lg hover:bg-blue-700 {{ request()->routeIs('admin.questions.create') ? 'bg-blue-700' : '' }}">Buat Soal</a>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- User Profile -->
            <div class="absolute bottom-0 w-full">
                <div class="px-4 py-4 bg-blue-900">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 rounded-full bg-blue-700 flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-sm font-medium text-white">Admin</h3>
                            <p class="text-xs text-blue-200">admin@pintar-pai.com</p>
                        </div>
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