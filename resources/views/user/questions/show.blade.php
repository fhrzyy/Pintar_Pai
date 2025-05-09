@extends('layouts.user')

@section('title', 'Kerjakan Soal - {{ $material->title }}')

@section('content')
<div class="bg-white rounded-lg shadow-md">
    <div class="px-6 py-4 border-b">
        <h3 class="text-xl font-semibold mb-0">
            Soal: {{ $material->title }}
            @if($isRemedial)
            <span class="text-red-500 text-sm ml-2">(Remedial)</span>
            @endif
        </h3>
    </div>

    @if(session('success'))
    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 mx-6 mt-4">
        {{ session('success') }}
    </div>
@endif

    @if(session('warning'))
    <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 mb-4 mx-6 mt-4">
        {{ session('warning') }}
    </div>
    @endif

    <div class="p-6">
        <form action="{{ route('user.questions.submit', $material->id) }}" method="POST">
            @csrf

            @if($isRemedial)
            <input type="hidden" name="is_remedial" value="1">
            @endif

            @foreach($questions as $index => $question)
            <div class="mb-8 pb-6 border-b border-gray-200 last:border-0">
                <h5 class="text-lg mb-4">{{ $index + 1 }}. {{ $question->question_text }}</h5>
                <div class="space-y-3 mb-6">
                    @foreach ($question->options as $key => $option)
                    <div class="flex items-center">
                        <input class="form-radio h-4 w-4 text-blue-600"
                            type="radio"
                            name="answers[{{ $question->id }}]"
                            id="question_{{ $question->id }}_option_{{ $loop->index }}"
                            value="{{ chr(65 + $loop->index) }}"
                            required>
                        <label class="ml-2 text-gray-700"
                            for="question_{{ $question->id }}_option_{{ $loop->index }}">
                            {{ $option }}
                        </label>
                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach

            <div class="flex gap-2 mt-6">
                <button type="submit"
                    class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    Kirim Jawaban
                </button>
                <a href="{{ route('user.questions.select-material', $material->id) }}"
                    class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                    Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection