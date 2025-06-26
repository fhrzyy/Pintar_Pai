@extends('layouts.user')

@section('title', 'Daftar Materi')

@section('content')
<div class="container mx-auto px-2 sm:px-4">
    <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
        <div class="bg-gradient-to-r from-indigo-600 to-purple-700 text-white p-4 sm:p-6 relative">
            <div class="flex items-center">
                <div class="bg-white/20 p-2 rounded-lg mr-3">
                    <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                </div>
                <h3 class="text-xl sm:text-2xl font-bold m-0 tracking-tight">Daftar Materi</h3>
            </div>
            <div class="absolute -bottom-4 left-6 w-16 sm:w-20 h-1 bg-white rounded-full"></div>
        </div>
        <div class="p-4 sm:p-6 md:p-8">
            @if ($materials->isEmpty())
                <div class="flex flex-col items-center justify-center py-6 sm:py-10">
                    <div class="bg-indigo-100 p-3 sm:p-4 rounded-full mb-3 sm:mb-4">
                        <svg class="w-8 h-8 sm:w-12 sm:h-12 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                        </svg>
                    </div>
                    <p class="text-center text-gray-600 text-base sm:text-lg">Belum ada materi yang tersedia.</p>
                    <p class="text-center text-gray-400 text-xs sm:text-sm mt-2">Silakan periksa kembali nanti</p>
                </div>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
                    @foreach ($materials as $material)
                        <div class="transform transition-all duration-300 hover:-translate-y-2 hover:shadow-lg sm:hover:shadow-2xl">
                            <div class="bg-white rounded-2xl shadow-lg h-full border border-gray-100 overflow-hidden group">
                                <div class="h-2 sm:h-3 bg-gradient-to-r from-indigo-600 to-purple-700"></div>
                                <div class="p-4 sm:p-6">
                                    <div class="flex items-center mb-3 sm:mb-4">
                                        <div class="w-10 h-10 sm:w-14 sm:h-14 rounded-xl bg-gradient-to-br from-indigo-600 to-purple-700 text-white flex items-center justify-center text-xl sm:text-2xl mr-3 sm:mr-4 shadow-md group-hover:scale-110 transition-transform duration-300">
                                            {{ strtoupper(substr($material->title, 0, 1)) }}
                                        </div>
                                        <h5 class="text-lg sm:text-xl font-bold text-gray-800">{{ $material->title }}</h5>
                                    </div>
                                    <p class="text-sm sm:text-base text-gray-600 mb-4 sm:mb-6">
                                        Materi tentang {{ strtolower($material->title) }} untuk pembelajaran PAI.
                                    </p>
                                    <div class="flex flex-wrap gap-1 sm:gap-2 mb-3 sm:mb-4">
                                        <span class="bg-indigo-100 text-indigo-700 px-2 sm:px-3 py-1 rounded-full text-xs font-medium">
                                            PAI
                                        </span>
                                        <span class="bg-purple-100 text-purple-700 px-2 sm:px-3 py-1 rounded-full text-xs font-medium">
                                            Pembelajaran
                                        </span>
                                    </div>
                                </div>
                                <div class="px-4 sm:px-6 py-3 sm:py-4 flex flex-col sm:flex-row justify-between gap-2 sm:items-center bg-gray-50 border-t border-gray-100">
                                    <a href="{{ route('user.materials.show', $material->id) }}" 
                                       class="bg-gradient-to-r from-indigo-600 to-purple-700 hover:from-indigo-700 hover:to-purple-800 text-white px-4 sm:px-5 py-2 rounded-xl transition-all duration-200 font-medium flex items-center justify-center sm:justify-start">
                                        <span>Detail</span>
                                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                        </svg>
                                    </a>
                                    <span class="bg-indigo-600/10 text-indigo-700 px-3 py-1 rounded-full text-xs sm:text-sm font-medium flex items-center justify-center sm:justify-start">
                                        <svg class="w-3 h-3 sm:w-4 sm:h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        {{ $material->questions->count() }} Soal
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>
@endsection