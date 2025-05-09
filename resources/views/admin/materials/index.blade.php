@extends('layouts.app')

@section('content')
<div class="container mx-auto py-6">
    <div class="bg-white rounded-lg shadow-md">
        <!-- Header Section -->
        <div class="px-6 py-4 flex justify-between items-center border-b bg-gray-50">
            <div>
                <h3 class="text-2xl font-semibold text-gray-800">Daftar Materi</h3>
                <p class="text-sm text-gray-600 mt-1">Kelola semua materi pembelajaran</p>
            </div>
            <div class="flex items-center gap-4">
                <!-- Search Box -->
                <div class="relative">
                    <input type="text" 
                           id="searchInput" 
                           placeholder="Cari materi..." 
                           class="w-64 px-4 py-2 rounded-lg border focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <span class="absolute right-3 top-2.5 text-gray-400">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </span>
                </div>
                <!-- Add Button -->
                <a href="{{ route('admin.materials.create') }}" 
                   class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-lg flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    Upload Materi
                </a>
            </div>
        </div>

        <!-- Alert Section -->
        @if (session('success'))
            <div class="mx-6 mt-4 bg-green-100 border-l-4 border-green-500 text-green-700 p-4 relative" role="alert">
                <p class="font-medium">Berhasil!</p>
                <p>{{ session('success') }}</p>
                <button type="button" class="absolute top-0 right-0 mt-4 mr-4" onclick="this.parentElement.remove()">
                    <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                    </svg>
                </button>
            </div>
        @endif

        <!-- Table Section -->
        <div class="p-6">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-16">No</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Judul Materi</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tipe File</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-48">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($materials as $index => $material)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $index + 1 }}</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <div>
                                        <p class="text-sm font-medium text-gray-900">{{ $material->title }}</p>
                                        <p class="text-xs text-gray-500">Diupload: {{ $material->created_at->format('d M Y') }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 py-1 text-sm rounded-full bg-blue-100 text-blue-800">
                                    {{ strtoupper($material->file_type) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <div class="flex space-x-2">
                                    <a href="{{ Storage::url($material->file_path) }}" 
                                       class="text-blue-600 hover:text-blue-900 bg-blue-100 px-3 py-1 rounded"
                                       target="_blank">
                                        Lihat
                                    </a>
                                    <a href="{{ route('admin.materials.edit', $material->id) }}" 
                                       class="text-yellow-600 hover:text-yellow-900 bg-yellow-100 px-3 py-1 rounded">
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.materials.destroy', $material->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="text-red-600 hover:text-red-900 bg-red-100 px-3 py-1 rounded"
                                                onclick="return confirm('Yakin ingin menghapus materi ini?')">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-8 text-center text-gray-500">
                                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                                <p class="mt-2 font-medium">Belum ada materi</p>
                                <p class="mt-1 text-sm">Mulai dengan mengupload materi baru.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <!-- Pagination -->
            @if($materials->hasPages())
                <div class="px-6 py-4 border-t">
                    {{ $materials->links() }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection