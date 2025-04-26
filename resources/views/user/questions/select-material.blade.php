    @extends('layouts.user')

    @section('title', 'Pilih Materi untuk Soal')

    @section('content')
        <div class="bg-white rounded-lg shadow-md">
            <div class="px-6 py-4 border-b">
                <h3 class="text-xl font-semibold">Pilih Materi untuk Mengerjakan Soal</h3>
            </div>
            <div class="p-6">
                @if ($materials->isEmpty())
                    <p class="text-center text-gray-600">Belum ada materi dengan soal yang tersedia.</p>
                @else
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        @foreach ($materials as $material)
                            <div class="bg-white rounded-lg shadow-md">
                                <div class="p-6 text-center">
                                    <h5 class="text-lg font-semibold mb-2">{{ $material->title }}</h5>
                                    <p class="text-gray-600 mb-4">Jumlah Soal: {{ $material->questions->count() }}</p>
                                    <a href="{{ route('user.questions.show', $material->id) }}" 
                                    class="inline-block px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors">
                                        Kerjakan Soal
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    @endsection