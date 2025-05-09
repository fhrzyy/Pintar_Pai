@extends('layouts.app')

@section('title', 'Edit Materi')

@section('content')
    <div class="bg-white rounded-lg shadow-md">
        <div class="px-6 py-4 border-b">
            <h3 class="text-xl font-semibold">Edit Materi</h3>
        </div>
        <div class="p-6">
            <form action="{{ route('admin.materials.update', $material->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Judul Materi</label>
                    <input type="text" 
                           class="w-full rounded-md border-2 border-gray-300 shadow-sm focus:border-indigo-400 focus:ring-2 focus:ring-indigo-300 focus:ring-opacity-50 {{ $errors->has('title') ? 'border-red-500' : '' }} px-3 py-2 text-gray-700" 
                           id="title" 
                           name="title" 
                           value="{{ old('title', $material->title) }}" 
                           required>
                    @error('title')
                        <p class="mt-1 text-sm text-red-600 font-medium">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="file" class="block text-sm font-medium text-gray-700 mb-1">File (jpg, png, docx, pdf) - Kosongkan jika tidak ingin mengganti</label>
                    <div class="flex items-center justify-center w-full">
                        <label for="file" class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-8 h-8 mb-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                </svg>
                                <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                <p class="text-xs text-gray-500">JPG, PNG, DOCX or PDF</p>
                            </div>
                            <input type="file" id="file" name="file" class="hidden" accept=".jpg,.png,.docx,.pdf">
                            
                        </label>
                    </div>
                    <p class="mt-2 text-sm text-gray-600">File saat ini: <a href="{{ Storage::url($material->file_path) }}" class="text-blue-600 hover:underline font-medium" target="_blank">{{ $material->file_type }}</a></p>
                    @error('file')
                        <p class="mt-1 text-sm text-red-600 font-medium">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex gap-2">
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                        Simpan Perubahan
                    </button>
                    <a href="{{ route('admin.materials.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2">
                        Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection