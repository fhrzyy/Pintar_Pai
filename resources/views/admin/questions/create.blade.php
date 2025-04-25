@extends('layouts.app')

@section('title', 'Tambah Soal')

@section('content')
    <div class="bg-white rounded-lg shadow-md">
        <div class="px-6 py-4 border-b">
            <h3 class="text-xl font-semibold">Tambah Soal Baru</h3>
        </div>
        <div class="p-6">
            <form action="{{ route('admin.questions.store') }}" method="POST">
                @csrf
                <div class="mb-6">
                    <label for="material_id" class="block text-sm font-medium text-gray-700 mb-1">Pilih Materi</label>
                    <select class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('material_id') border-red-500 @enderror" id="material_id" name="material_id" required>
                        <option value="">-- Pilih Materi --</option>
                        @foreach ($materials as $material)
                            <option value="{{ $material->id }}" {{ old('material_id') == $material->id ? 'selected' : '' }}>{{ $material->title }}</option>
                        @endforeach
                    </select>
                    @error('material_id')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div id="questions-container">
                    <div class="question-item mb-8">
                        <h5 class="text-lg font-medium mb-4">Soal 1</h5>
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Teks Soal</label>
                            <textarea class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('questions.0.question_text') border-red-500 @enderror" name="questions[0][question_text]" rows="3" required>{{ old('questions.0.question_text') }}</textarea>
                            @error('questions.0.question_text')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Pilihan Ganda (Minimal 2)</label>
                            <input type="text" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 mb-2 @error('questions.0.options.0') border-red-500 @enderror" name="questions[0][options][]" placeholder="Pilihan 1" value="{{ old('questions.0.options.0') }}" required>
                            <input type="text" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 mb-2 @error('questions.0.options.1') border-red-500 @enderror" name="questions[0][options][]" placeholder="Pilihan 2" value="{{ old('questions.0.options.1') }}" required>
                            <input type="text" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 mb-2" name="questions[0][options][]" placeholder="Pilihan 3" value="{{ old('questions.0.options.2') }}">
                            <input type="text" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 mb-2" name="questions[0][options][]" placeholder="Pilihan 4" value="{{ old('questions.0.options.3') }}">
                            @error('questions.0.options')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Jawaban Benar</label>
                            <input type="text" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('questions.0.correct_answer') border-red-500 @enderror" name="questions[0][correct_answer]" value="{{ old('questions.0.correct_answer') }}" required>
                            <p class="mt-1 text-sm text-gray-500">Masukkan salah satu pilihan di atas sebagai jawaban benar.</p>
                            @error('questions.0.correct_answer')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <button type="button" class="mb-4 px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600" id="add-question">Tambah Soal</button>
                <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600">Simpan Soal</button>
                <a href="{{ route('admin.questions.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600 ml-2">Kembali</a>
            </form>
        </div>
    </div>

    <script>
        let questionCount = 1;

        document.getElementById('add-question').addEventListener('click', function () {
            const container = document.getElementById('questions-container');
            const newQuestion = document.createElement('div');
            newQuestion.classList.add('question-item', 'mb-8');
            newQuestion.innerHTML = `
                <h5 class="text-lg font-medium mb-4">Soal ${questionCount + 1}</h5>
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Teks Soal</label>
                    <textarea class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" name="questions[${questionCount}][question_text]" rows="3" required></textarea>
                </div>
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Pilihan Ganda (Minimal 2)</label>
                    <input type="text" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 mb-2" name="questions[${questionCount}][options][]" placeholder="Pilihan 1" required>
                    <input type="text" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 mb-2" name="questions[${questionCount}][options][]" placeholder="Pilihan 2" required>
                    <input type="text" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 mb-2" name="questions[${questionCount}][options][]" placeholder="Pilihan 3">
                    <input type="text" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 mb-2" name="questions[${questionCount}][options][]" placeholder="Pilihan 4">
                </div>
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Jawaban Benar</label>
                    <input type="text" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" name="questions[${questionCount}][correct_answer]" required>
                    <p class="mt-1 text-sm text-gray-500">Masukkan salah satu pilihan di atas sebagai jawaban benar.</p>
                </div>
                <button type="button" class="px-3 py-1 bg-red-500 text-white text-sm rounded-md hover:bg-red-600 remove-question">Hapus Soal</button>
            `;
            container.appendChild(newQuestion);
            questionCount++;

            newQuestion.querySelector('.remove-question').addEventListener('click', function () {
                newQuestion.remove();
                questionCount--;
                document.querySelectorAll('.question-item').forEach((item, index) => {
                    item.querySelector('h5').textContent = `Soal ${index + 1}`;
                });
            });
        });
    </script>
@endsection
