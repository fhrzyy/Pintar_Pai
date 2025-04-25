<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin-Pintar Pai')</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

</head>

<body>
    <div class="flex" style="font-family: 'Poppins', sans-serif;">
        <!-- Sidebar -->
        <div class="w-64 min-h-screen bg-blue-800 fixed">
            <div class="sticky top-0 pt-3">
                <h1 class="text-center mb-10 font-bold text-white text-2xl">Pintar-Pai</h1>
                <ul class="space-y-2">

                    <li>
                        <a class="flex items-center px-4 py-2 font-bold text-white hover:bg-blue-700" href="{{ route('admin.home') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                            </svg>
                            Dashboard
                        </a>
                    </li>

                    <li x-data="{ open: false }">
                        <button @click="open = !open" class="flex items-center w-full px-4 py-2 font-bold text-white hover:bg-blue-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z" />
                            </svg>
                            Menu Materi
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-auto" :class="{'rotate-180': open}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div x-show="open" class="pl-6">
                            <a href="{{ route('admin.materials.index') }}" class="block px-4 py-2 text-white hover:bg-blue-700">Daftar Materi</a>
                            <a href="{{ route('admin.materials.create') }}" class="block px-4 py-2 text-white hover:bg-blue-700">Upload Materi</a>
                            <a href="{{ route('admin.materials.index') }}" class="block px-4 py-2 text-white hover:bg-blue-700">Edit Materi</a>
                        </div>
                    </li>
                    <li x-data="{ open: false }">
                        <button @click="open = !open" class="flex items-center w-full px-4 py-2 font-bold text-white hover:bg-blue-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                            </svg>
                            Menu Soal
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-auto" :class="{'rotate-180': open}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div x-show="open" class="pl-6">
                            <a href="{{ route('admin.questions.index') }}" class="block px-4 py-2 text-white hover:bg-blue-700">Daftar Soal</a>
                            <a href="{{ route('admin.questions.create') }}" class="block px-4 py-2 text-white hover:bg-blue-700">Buat Soal</a>
                            <a href="{{ route('admin.questions.index') }}" class="block px-4 py-2 text-white hover:bg-blue-700">Edit Soal</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <div class="ml-64 flex-1">
        <main class="p-8">
            <div class="flex justify-between items-center pb-4 mb-4 border-b">

            </div>
            @yield('content')
        </main>
    </div>
    </div>


</body>

</html>