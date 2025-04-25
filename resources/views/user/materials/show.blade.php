@extends('layouts.user')

@section('title', 'Detail Materi - {{ $material->title }}')

@section('content')
    <div class="container mx-auto px-4">
        <div class="bg-white rounded-lg shadow-md">
            <div class="bg-gradient-to-b from-indigo-600 to-purple-700 text-white p-4 rounded-t-lg">
                <!-- bg-gradient-to-b from-indigo-600 to-purple-700 -->
                <h3 class="text-xl font-bold m-0">{{ $material->title }}</h3>
            </div>
            <div class="p-6">
                <h5 class="text-lg font-semibold mb-4">Detail Materi</h5>
                <p class="mb-3"><span class="font-bold">Judul:</span> {{ $material->title }}</p>
                <p class="mb-3"><span class="font-bold">Tipe File:</span> {{ strtoupper(pathinfo($material->file_path, PATHINFO_EXTENSION)) }}</p>
                <p class="mb-4"><span class="font-bold">File:</span> 
                    <a href="{{ asset('storage/' . $material->file_path) }}" target="_blank" class="inline-flex items-center px-3 py-2 text-sm font-medium text-white bg-blue-600 rounded hover:bg-blue-700">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z"/>
                        </svg>
                        Unduh
                    </a>
                </p>
                <a href="{{ route('user.materials.index') }}" class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200 rounded hover:bg-gray-300">Kembali</a>
            </div>
        </div>
    </div>
@endsection