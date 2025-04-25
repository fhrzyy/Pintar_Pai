@extends('layouts.app')

@section('content')
    <div class="bg-white rounded-lg shadow-md">
        <div class="px-6 py-4 flex justify-between items-center border-b">
            <h3 class="text-xl font-semibold">Daftar Materi</h3>
            <a href="{{ route('admin.materials.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">Upload Materi Baru</a>
        </div>
        <div class="p-6">
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                    <button type="button" class="absolute top-0 right-0 px-4 py-3" data-bs-dismiss="alert">
                        <span class="sr-only">Close</span>
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                    </button>
                </div>
            @endif
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-800">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">No</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Judul</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Tipe File</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($materials as $index => $material)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap">{{ $index + 1 }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $material->title }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $material->file_type }}</td>
                            <td class="px-6 py-4 whitespace-nowrap space-x-2">
                                <a href="{{ Storage::url($material->file_path) }}" class="inline-block bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded text-sm" target="_blank">Lihat</a>
                                <a href="{{ route('admin.materials.edit', $material->id) }}" class="inline-block bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded text-sm">Edit</a>
                                <form action="{{ route('admin.materials.destroy', $material->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm" onclick="return confirm('Yakin ingin menghapus materi ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-4 text-center text-gray-500">Belum ada materi yang diupload.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection