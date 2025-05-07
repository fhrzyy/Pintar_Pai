@extends('layouts.user')

@section('title', 'Hasil Jawaban')

@section('content')
    <div class="bg-white rounded-lg shadow-md">
        <div class="px-6 py-4 border-b">
            <h3 class="text-xl font-semibold mb-0">Hasil Jawaban</h3>
        </div>
        <div class="p-6">
            {{-- Score Card --}}
            <div class="mb-8 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-xl p-6 text-white shadow-lg">
                <div class="text-center">
                    <h4 class="text-2xl font-bold mb-2">Skor Anda</h4>
                    <div class="text-5xl font-bold mb-2">
                        {{ $totalCorrect * 10 }}
                        <span class="text-2xl">/100</span>
                    </div>
                    <p class="text-indigo-100">
                        Menjawab benar {{ $totalCorrect }} dari {{ $totalQuestions }} soal
                    </p>
                </div>
                
                                {{-- Progress Bar --}}
                <div class="mt-4">
                    <div class="w-full bg-indigo-200 rounded-full h-4">
                        <div class="bg-white rounded-full h-4 transition-all duration-1000" 
                             style="width: {{ $totalQuestions > 0 ? ($totalCorrect / $totalQuestions) * 100 : 0 }}%">
                        </div>
                    </div>
                </div>
            </div>

            {{-- Questions Review --}}
            @foreach($results as $index => $result)
            <div class="mb-8 pb-6 border-b border-gray-200 last:border-b-0">
                <div class="flex items-center gap-4 mb-4">
                    <span class="flex-shrink-0 w-8 h-8 rounded-full bg-indigo-100 text-indigo-600 flex items-center justify-center font-semibold">
                        {{ $index + 1 }}
                    </span>
                    <h5 class="text-lg">{{ $result['question']->question_text }}</h5>
                </div>
                
                <div class="ml-12">
                    <p class="mb-2"><span class="font-bold text-gray-600">Jawaban Anda:</span> 
                        <span class="{{ $result['isCorrect'] ? 'text-green-600' : 'text-red-600' }}">
                            {{ $result['userAnswer'] }}
                        </span>
                    </p>
                    <p class="mb-4"><span class="font-bold text-gray-600">Jawaban Benar:</span> 
                        <span class="text-green-600">{{ $result['question']->correct_answer }}</span>
                    </p>
                    
                    @if ($result['isCorrect'])
                        <div class="bg-green-50 border-l-4 border-green-400 p-4 rounded">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <p class="text-green-700">Selamat! Jawaban Anda benar. (+10 poin)</p>
                            </div>
                        </div>
                    @else
                        <div class="bg-red-50 border-l-4 border-red-400 p-4 rounded">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-red-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                </svg>
                                <p class="text-red-700">Maaf, jawaban Anda salah. (0 poin)</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            @endforeach

            <div class="text-center">
                <a href="{{ route('user.questions.select-material', $material_id) }}" 
                   class="inline-block px-6 py-3 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition duration-200 transform hover:scale-105 shadow-md">
                    <span class="flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12"/>
                        </svg>
                        Kembali ke Daftar Soal
                    </span>
                </a>
            </div>
        </div>
    </div>
@endsection