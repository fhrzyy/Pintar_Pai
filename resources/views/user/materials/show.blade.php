@extends('layouts.user')

@section('title', 'Detail Materi - {{ $material->title }}')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <div class="mb-4">
            <h1 class="text-2xl font-bold text-indigo-600">{{ $material->title }}</h1>
        </div>

        <div class="bg-white rounded-lg shadow-sm">
            <div class="p-6">
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <p class="text-sm text-gray-600">Tipe File: <span class="font-semibold">{{ strtoupper(pathinfo($material->file_path, PATHINFO_EXTENSION)) }}</span></p>
                    </div>
                    <div class="flex gap-2">
                        <a href="{{ route('user.materials.index') }}" 
                           class="px-4 py-2 text-sm bg-gray-100 text-gray-700 rounded-md hover:bg-gray-200 transition-colors">
                            Kembali
                        </a>
                        <a href="{{ asset('storage/' . $material->file_path) }}" 
                           class="px-4 py-2 text-sm bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition-colors flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                            </svg>
                            Unduh
                        </a>
                    </div>
                </div>

                <div class="border border-gray-200 rounded-lg">
                    @php
                        $extension = strtolower(pathinfo($material->file_path, PATHINFO_EXTENSION));
                    @endphp

                    @if($extension == 'pdf')
                        <div class="bg-gray-50 p-2 rounded-t-lg border-b flex justify-between items-center">
                            <span class="text-sm text-gray-600">PDF Viewer</span>
                            <div class="flex gap-2">
                                <button class="p-1 hover:bg-gray-200 rounded">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <iframe 
                            src="{{ asset('storage/' . $material->file_path) }}#toolbar=0" 
                            class="w-full h-[800px]"
                            frameborder="0">
                        </iframe>
                    @elseif(in_array($extension, ['doc', 'docx']))
                        <div class="bg-gray-50 p-2 rounded-t-lg border-b">
                            <span class="text-sm text-gray-600">Document Viewer</span>
                        </div>
                        <iframe 
                            src="https://view.officeapps.live.com/op/embed.aspx?src={{ urlencode(asset('storage/' . $material->file_path)) }}"
                            class="w-full h-[800px]" 
                            frameborder="0">
                        </iframe>
                    @else
                        <div class="p-8 text-center text-gray-500">
                            <svg class="w-16 h-16 mx-auto mb-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                            <p>Preview tidak tersedia untuk format file ini</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection