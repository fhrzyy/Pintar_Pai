@extends('layouts.app')

@section('title', 'Daftar Siswa')

@section('content')
<div class="max-w-7xl mx-auto">
    <div class="bg-white shadow-sm rounded-lg p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Daftar Siswa</h1>
            <a href="{{ route('admin.students.pdf') }}" 
               class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 transition duration-200">
                Cetak PDF
            </a>
        </div>

        @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                        <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                        <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse ($students as $index => $student)
                        <tr>
                            <td class="py-4 px-6 text-sm text-gray-900">{{ $index + 1 }}</td>
                            <td class="py-4 px-6 text-sm text-gray-900">{{ $student->name }}</td>
                            <td class="py-4 px-6 text-sm text-gray-900">{{ $student->email }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="py-4 px-6 text-sm text-gray-500 text-center">
                                Tidak ada siswa yang terdaftar.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection