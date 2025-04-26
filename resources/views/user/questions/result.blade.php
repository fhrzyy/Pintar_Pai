@extends('layouts.user')

@section('title', 'Hasil Jawaban')

@section('content')
    <div class="bg-white rounded-lg shadow-md">
        <div class="px-6 py-4 border-b">
            <h3 class="text-xl font-semibold mb-0">Hasil Jawaban</h3>
        </div>
        <div class="p-6">
            <div class="mb-6">
                <h4 class="text-lg font-semibold mb-2">Skor Anda: {{ $totalCorrect }} / {{ $totalQuestions }}</h4>
            </div>

            @foreach($results as $index => $result)
            <div class="mb-8 pb-6 border-b border-gray-200 last:border-b-0">
                <h5 class="text-lg mb-4">{{ $index + 1 }}. {{ $result['question']->question_text }}</h5>
                <p class="mb-2"><span class="font-bold">Jawaban Anda:</span> {{ $result['userAnswer'] }}</p>
                <p class="mb-4"><span class="font-bold">Jawaban Benar:</span> {{ $result['question']->correct_answer }}</p>
                
                @if ($result['isCorrect'])
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                        Selamat! Jawaban Anda benar.
                    </div>
                @else
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                        Maaf, jawaban Anda salah.
                    </div>
                @endif
            </div>
            @endforeach

            <a href="{{ route('user.questions.select-material', $material_id) }}" 
               class="inline-block px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition">
                Kembali ke Daftar Soal
            </a>
        </div>
    </div>
@endsection