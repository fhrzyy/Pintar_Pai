<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @media (max-width: 768px) {
            .sidebar-open {
                transform: translateX(0);
            }
            .sidebar-closed {
                transform: translateX(-100%);
            }
        }
    </style>
</head>

<body class="bg-gray-50 font-sans">
    <div class="flex min-h-screen relative">
        <!-- Mobile Menu Toggle Button -->
        <button id="menuToggle" class="md:hidden fixed top-4 left-4 z-50 bg-indigo-600 text-white p-2 rounded-lg shadow-lg">
            <svg id="menuIcon" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
            <svg id="closeIcon" class="w-6 h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>

        <!-- Sidebar -->
        <aside id="sidebar" class="w-72 h-screen bg-gradient-to-b from-indigo-600 to-purple-700 text-white shadow-xl fixed z-40 transition-transform duration-300 ease-in-out md:translate-x-0 sidebar-closed overflow-y-auto">
            <header class="p-2 border-b border-indigo-500/30">
                <h2 class="text-2xl font-bold tracking-tight flex items-center">
                    <div class="flex items-center gap-0">
                        <img src="{{ asset('img/Lms-Pai/LogoGix.png') }}" alt="Logo" class="w-35 h-20 rounded-full">
                    </div>
                </h2>
            </header>
            <div class="p-4">
                <div class="bg-indigo-500/20 rounded-xl p-3 mb-6">
                    <div class="flex items-center space-x-3">
                        <div class="bg-white p-2 rounded-full">
                            <svg class="w-6 h-6 text-indigo-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-medium">{{ Auth::user()->name }}</h3>
                            <p class="text-xs text-indigo-200">Siswa</p>
                        </div>
                    </div>
                </div>
            </div>
            <nav class="mt-2 px-4">
                <ul class="space-y-2">
                    <li class="transition-all duration-200 hover:bg-white/10 rounded-xl">
                        <a href="{{ route('user.home') }}" class="flex items-center p-3 text-white group">
                            <div class="bg-white/10 p-2 rounded-lg mr-3 group-hover:bg-white group-hover:text-indigo-600 transition-all duration-200">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                                </svg>
                            </div>
                            <span class="font-medium">Home</span>
                        </a>
                    </li>
                </ul>
                <p class="text-xs text-indigo-200 font-semibold px-2 mb-2">MAIN MENU</p>
                <ul class="space-y-2">
                    <li class="transition-all duration-200 hover:bg-white/10 rounded-xl">
                        <a href="{{ route('user.materials.index') }}" class="flex items-center p-3 text-white group">
                            <div class="bg-white/10 p-2 rounded-lg mr-3 group-hover:bg-white group-hover:text-indigo-600 transition-all duration-200">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                </svg>
                            </div>
                            <span class="font-medium">Materi</span>
                            <span class="ml-auto bg-indigo-400/20 text-xs py-1 px-2 rounded-md">3</span>
                        </a>
                    </li>
                    <li class="transition-all duration-200 hover:bg-white/10 rounded-xl">
                        <a href="{{ route('user.questions.select-material') }}" class="flex items-center p-3 text-white group">
                            <div class="bg-white/10 p-2 rounded-lg mr-3 group-hover:bg-white group-hover:text-indigo-600 transition-all duration-200">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <span class="font-medium">Soal</span>
                            <span class="ml-auto bg-green-400/20 text-xs py-1 px-2 rounded-md">New</span>
                        </a>
                    </li>
                </ul>

                <p class="text-xs text-indigo-200 font-semibold px-2 mt-6 mb-2">ACCOUNT</p>
                <ul class="space-y-2 mb-6">
                    <li class="transition-all duration-200 hover:bg-white/10 rounded-xl">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full flex items-center p-3 text-white group">
                                <div class="bg-white/10 p-2 rounded-lg mr-3 group-hover:bg-white group-hover:text-red-600 transition-all duration-200">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                    </svg>
                                </div>
                                <span class="font-medium">Logout</span>
                            </button>
                        </form>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Overlay for mobile menu -->
        <div id="sidebarOverlay" class="fixed inset-0 bg-black opacity-50 z-30 hidden transition-opacity duration-300 ease-in-out"></div>

        <!-- Main Content -->
        <main class="flex-1 transition-all duration-300 ease-in-out md:ml-72 p-4 md:p-8">
            <div class="mt-12 md:mt-0">
                @yield('content')
            </div>
        </main>
    </div>

    <script>
        // Mobile menu functionality
        document.addEventListener('DOMContentLoaded', function() {
            const menuToggle = document.getElementById('menuToggle');
            const sidebar = document.getElementById('sidebar');
            const sidebarOverlay = document.getElementById('sidebarOverlay');
            const menuIcon = document.getElementById('menuIcon');
            const closeIcon = document.getElementById('closeIcon');
            
            function toggleSidebar() {
                sidebar.classList.toggle('sidebar-open');
                sidebar.classList.toggle('sidebar-closed');
                sidebarOverlay.classList.toggle('hidden');
                menuIcon.classList.toggle('hidden');
                closeIcon.classList.toggle('hidden');
            }
            
            menuToggle.addEventListener('click', toggleSidebar);
            
            // Close sidebar when clicking on overlay
            sidebarOverlay.addEventListener('click', toggleSidebar);
            
            // Close sidebar when window is resized to desktop size
            window.addEventListener('resize', function() {
                if (window.innerWidth > 768 && sidebar.classList.contains('sidebar-open')) {
                    toggleSidebar();
                }
            });
            
            // Close sidebar when links are clicked on mobile
            const sidebarLinks = sidebar.querySelectorAll('a');
            sidebarLinks.forEach(link => {
                link.addEventListener('click', function() {
                    if (window.innerWidth <= 768 && sidebar.classList.contains('sidebar-open')) {
                        toggleSidebar();
                    }
                });
            });
        });
    </script>
</body>

</html>