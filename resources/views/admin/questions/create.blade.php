@extends('layouts.app')

@section('title', 'Tambah Soal')

@section('content')
    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-xl shadow-sm border border-gray-100">
            <!-- ...existing header code... -->
            
            <div class="p-8">
                <form action="{{ route('admin.questions.store') }}" method="POST">
                    @csrf
                    <!-- Material Selection -->
                    <div class="space-y-6">
                        <div>
                            <label for="material_id" class="text-sm font-semibold text-gray-700">Pilih Materi</label>
                            <select class="mt-2 block w-full rounded-lg border-gray-200 bg-white px-4 py-3 focus:border-blue-500 focus:ring-blue-500" id="material_id" name="material_id" required>
                                <option value="">-- Pilih Materi --</option>
                                @foreach ($materials as $material)
                                    <option value="{{ $material->id }}">{{ $material->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Questions Container -->
                        <div id="questions-container" class="space-y-8">
                            <div class="question-item p-6 bg-gray-50 rounded-xl border border-gray-200">
                                <h5 class="text-lg font-semibold text-gray-800 mb-6">Soal 1</h5>

                                <div class="space-y-6">
                                    <!-- Question Text -->
                                    <div>
                                        <label class="text-sm font-semibold text-gray-700">Teks Soal</label>
                                        <textarea class="mt-2 block w-full rounded-lg border-gray-200 bg-white px-4 py-3 focus:border-blue-500 focus:ring-blue-500" name="questions[0][question_text]" rows="3" required></textarea>
                                    </div>

                                    <!-- Options -->
                                    <div>
                                        <label class="text-sm font-semibold text-gray-700">Pilihan Jawaban</label>
                                        <div class="mt-2 space-y-3">
                                            <div class="flex items-center gap-2">
                                                <span class="flex-none w-8 h-8 flex items-center justify-center rounded-lg bg-gray-100 font-semibold">A</span>
                                                <input type="text" class="flex-1 rounded-lg border-gray-200 bg-white px-4 py-3 focus:border-blue-500 focus:ring-blue-500" name="questions[0][options][]" placeholder="Pilihan A" required>
                                            </div>
                                            <div class="flex items-center gap-2">
                                                <span class="flex-none w-8 h-8 flex items-center justify-center rounded-lg bg-gray-100 font-semibold">B</span>
                                                <input type="text" class="flex-1 rounded-lg border-gray-200 bg-white px-4 py-3 focus:border-blue-500 focus:ring-blue-500" name="questions[0][options][]" placeholder="Pilihan B" required>
                                            </div>
                                            <div class="flex items-center gap-2">
                                                <span class="flex-none w-8 h-8 flex items-center justify-center rounded-lg bg-gray-100 font-semibold">C</span>
                                                <input type="text" class="flex-1 rounded-lg border-gray-200 bg-white px-4 py-3 focus:border-blue-500 focus:ring-blue-500" name="questions[0][options][]" placeholder="Pilihan C" required>
                                            </div>
                                            <div class="flex items-center gap-2">
                                                <span class="flex-none w-8 h-8 flex items-center justify-center rounded-lg bg-gray-100 font-semibold">D</span>
                                                <input type="text" class="flex-1 rounded-lg border-gray-200 bg-white px-4 py-3 focus:border-blue-500 focus:ring-blue-500" name="questions[0][options][]" placeholder="Pilihan D" required>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Correct Answer -->
                                    <div>
                                        <label class="text-sm font-semibold text-gray-700">Jawaban Benar</label>
                                        <select class="mt-2 block w-full rounded-lg border-gray-200 bg-white px-4 py-3 focus:border-blue-500 focus:ring-blue-500" name="questions[0][correct_answer]" required>
                                            <option value="">Pilih Jawaban Benar</option>
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="C">C</option>
                                            <option value="D">D</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex items-center gap-3 pt-4">
                            <button type="button" id="add-question" class="inline-flex items-center gap-2 rounded-lg bg-gray-100 px-4 py-2.5 text-sm font-semibold text-gray-700 hover:bg-gray-200 transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/></svg>
                                Tambah Soal
                            </button>
                            <button type="submit" class="rounded-lg bg-blue-600 px-4 py-2.5 text-sm font-semibold text-white hover:bg-blue-700 transition-colors">Simpan Soal</button>
                            <a href="{{ route('admin.questions.index') }}" class="rounded-lg bg-gray-100 px-4 py-2.5 text-sm font-semibold text-gray-700 hover:bg-gray-200 transition-colors">Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        let questionCount = 1;

        document.getElementById('add-question').addEventListener('click', function() {
            const container = document.getElementById('questions-container');
            const newQuestion = document.createElement('div');
            newQuestion.classList.add('question-item', 'p-6', 'bg-gray-50', 'rounded-xl', 'border', 'border-gray-200', 'mt-6');
            newQuestion.innerHTML = `
                <div class="flex items-center justify-between mb-6">
                    <h5 class="text-lg font-semibold text-gray-800">Soal ${questionCount + 1}</h5>
                    <button type="button" class="remove-question inline-flex items-center gap-2 rounded-lg bg-red-100 px-3 py-1.5 text-sm font-semibold text-red-600 hover:bg-red-200 transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                        Hapus Soal
                    </button>
                </div>
                <div class="space-y-6">
                    <div>
                        <label class="text-sm font-semibold text-gray-700">Teks Soal</label>
                        <textarea class="mt-2 block w-full rounded-lg border-gray-200 bg-white px-4 py-3 focus:border-blue-500 focus:ring-blue-500" name="questions[${questionCount}][question_text]" rows="3" required></textarea>
                    </div>
                    <div>
                        <label class="text-sm font-semibold text-gray-700">Pilihan Jawaban</label>
                        <div class="mt-2 space-y-3">
                            <div class="flex items-center gap-2">
                                <span class="flex-none w-8 h-8 flex items-center justify-center rounded-lg bg-gray-100 font-semibold">A</span>
                                <input type="text" class="flex-1 rounded-lg border-gray-200 bg-white px-4 py-3 focus:border-blue-500 focus:ring-blue-500" name="questions[${questionCount}][options][]" placeholder="Pilihan A" required>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="flex-none w-8 h-8 flex items-center justify-center rounded-lg bg-gray-100 font-semibold">B</span>
                                <input type="text" class="flex-1 rounded-lg border-gray-200 bg-white px-4 py-3 focus:border-blue-500 focus:ring-blue-500" name="questions[${questionCount}][options][]" placeholder="Pilihan B" required>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="flex-none w-8 h-8 flex items-center justify-center rounded-lg bg-gray-100 font-semibold">C</span>
                                <input type="text" class="flex-1 rounded-lg border-gray-200 bg-white px-4 py-3 focus:border-blue-500 focus:ring-blue-500" name="questions[${questionCount}][options][]" placeholder="Pilihan C" required>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="flex-none w-8 h-8 flex items-center justify-center rounded-lg bg-gray-100 font-semibold">D</span>
                                <input type="text" class="flex-1 rounded-lg border-gray-200 bg-white px-4 py-3 focus:border-blue-500 focus:ring-blue-500" name="questions[${questionCount}][options][]" placeholder="Pilihan D" required>
                            </div>
                        </div>
                    </div>
                    <div>
                        <label class="text-sm font-semibold text-gray-700">Jawaban Benar</label>
                        <select class="mt-2 block w-full rounded-lg border-gray-200 bg-white px-4 py-3 focus:border-blue-500 focus:ring-blue-500" name="questions[${questionCount}][correct_answer]" required>
                            <option value="">Pilih Jawaban Benar</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                        </select>
                    </div>
                </div>
            `;
            container.appendChild(newQuestion);
            questionCount++;

            newQuestion.querySelector('.remove-question').addEventListener('click', function() {
                newQuestion.remove();
                questionCount--;
                document.querySelectorAll('.question-item').forEach((item, index) => {
                    item.querySelector('h5').textContent = `Soal ${index + 1}`;
                });
            });
        });
    </script>
@endsection