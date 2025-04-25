@extends('layouts.app')

@section('title', 'Edit Soal')

@section('content')
    <div class="bg-white rounded-lg shadow-md">
        <div class="px-6 py-4 border-b">
            <h3 class="text-xl font-semibold">Edit Soal</h3>
        </div>
        <div class="p-6">
            <form action="{{ route('admin.questions.update', $question->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-6">
                    <label for="material_id" class="block text-sm font-medium text-gray-700 mb-2">Pilih Materi</label>
                    <select class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 @error('material_id') border-red-500 @enderror" id="material_id" name="material_id" required>
                        <option value="">-- Pilih Materi --</option>
                        @foreach ($materials as $material)
                            <option value="{{ $material->id }}" {{ old('material_id', $question->material_id) == $material->id ? 'selected' : '' }}>{{ $material->title }}</option>
                        @endforeach
                    </select>
                    @error('material_id')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="question_text" class="block text-sm font-medium text-gray-700 mb-2">Teks Soal</label>
                    <textarea class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 @error('question_text') border-red-500 @enderror" id="question_text" name="question_text" rows="3" required>{{ old('question_text', $question->question_text) }}</textarea>
                    @error('question_text')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Pilihan Ganda (Minimal 2)</label>
                    @foreach ($question->options as $index => $option)
                        <input type="text" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 mb-2 @error('options.' . $index) border-red-500 @enderror" name="options[]" placeholder="Pilihan {{ $index + 1 }}" value="{{ old('options.' . $index, $option) }}" {{ $index < 2 ? 'required' : '' }}>
                    @endforeach
                    @if (count($question->options) < 4)
                        @for ($i = count($question->options); $i < 4; $i++)
                            <input type="text" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 mb-2" name="options[]" placeholder="Pilihan {{ $i + 1 }}" value="{{ old('options.' . $i) }}">
                        @endfor
                    @endif
                    @error('options')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="correct_answer" class="block text-sm font-medium text-gray-700 mb-2">Jawaban Benar</label>
                    <input type="text" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 @error('correct_answer') border-red-500 @enderror" id="correct_answer" name="correct_answer" value="{{ old('correct_answer', $question->correct_answer) }}" required>
                    <p class="mt-1 text-sm text-gray-500">Masukkan salah satu pilihan di atas sebagai jawaban benar.</p>
                    @error('correct_answer')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex gap-2">
                    <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">Simpan Perubahan</button>
                    <a href="{{ route('admin.questions.index') }}" class="px-4 py-2 bg-gray-600 text-white rounded-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">Kembali</a>
                </div>
            </form>
        </div>
    </div>
@endsection