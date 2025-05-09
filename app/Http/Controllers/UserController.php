<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Models\Result;

class UserController extends Controller
{
    // Halaman Home untuk User
    public function home()
    {
        $materialCount = Material::count();
        $questionCount = Question::count();
        return view('user.home', compact('materialCount', 'questionCount'));
    }

    // Halaman Daftar Materi untuk User
    public function materials()
    {
        $materials = Material::all();
        return view('user.materials.index', compact('materials'));
    }

    // Halaman Detail Materi untuk User
    public function showMaterial($id)
    {
        $material = Material::findOrFail($id);
        return view('user.materials.show', compact('material'));
    }

    // Halaman Pilih Materi untuk Soal
    public function selectMaterialForQuestions()
    {
        $materials = Material::has('questions')->get(); // Hanya ambil materi yang memiliki soal
        return view('user.questions.select-material', compact('materials'));
    }

    // Halaman Daftar Soal untuk User (diperbarui berdasarkan materi)
    public function index($material_id)
    {
        $material = Material::findOrFail($material_id);
        $questions = Question::where('material_id', $material_id)->get();
        return view('user.questions.index', compact('questions', 'material'));
    }


    // Halaman Mengerjakan Soal
        public function showQuestion($material_id)
    {
        $material = Material::findOrFail($material_id);
        $questions = Question::where('material_id', $material_id)->get();
        
        // Cek hasil terakhir siswa
        $lastResult = Result::where('user_id', auth()->id())
            ->where('material_id', $material_id)
            ->latest()
            ->first();
    
        $isRemedial = false;
        
        // Jika ada hasil sebelumnya dan nilai < 70
        if ($lastResult && $lastResult->score < 70) {
            $isRemedial = true;
        }
    
        // Jika sudah remedial dan lulus (nilai >= 70), isRemedial = false
        if ($lastResult && $lastResult->is_remedial && $lastResult->score >= 70) {
            $isRemedial = false;
        }
    
        return view('user.questions.show', compact('questions', 'material', 'isRemedial'));
    }

    public function submitAnswer(Request $request, $material_id)
    {
        $answers = $request->input('answers');
        $totalQuestions = count($answers);
        $totalCorrect = 0;
        $results = [];

        foreach ($answers as $question_id => $userAnswer) {
            $question = Question::findOrFail($question_id);
            $isCorrect = $userAnswer === $question->correct_answer;
            if ($isCorrect) {
                $totalCorrect++;
            }
            $results[] = [
                'question' => $question,
                'userAnswer' => $userAnswer,
                'isCorrect' => $isCorrect
            ];
        }

        $score = ($totalCorrect / $totalQuestions) * 100;

        // Simpan hasil
        $result = Result::create([
            'user_id' => auth()->id(),
            'material_id' => $material_id,
            'score' => $score,
            'is_remedial' => $request->has('is_remedial'),
            'attempt' => Result::where('user_id', auth()->id())
                              ->where('material_id', $material_id)
                              ->count() + 1
        ]);

        if ($score < 70) {
            return redirect()
                ->route('user.questions.show', $material_id)
                ->with('warning', 'Nilai Anda dibawah 70. Silahkan kerjakan remedial.');
        }

        return view('user.questions.result', [
            'results' => $results,
            'totalQuestions' => $totalQuestions,
            'totalCorrect' => $totalCorrect,
            'material_id' => $material_id,
            'score' => $score
        ]);
    }
}
