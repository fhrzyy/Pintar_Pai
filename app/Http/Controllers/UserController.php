<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\Question;
use Illuminate\Http\Request;

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
        return view('user.questions.show', compact('questions', 'material'));
    }

    // Proses Jawaban User
               public function submitAnswer(Request $request, $material_id)
        {
            $answers = $request->input('answers');
            $results = [];
            $totalCorrect = 0;
            
            foreach($answers as $question_id => $userAnswer) {
                $question = Question::findOrFail($question_id);
                $isCorrect = $userAnswer === $question->correct_answer;
                if($isCorrect) {
                    $totalCorrect++;
                }
                $results[] = [
                    'question' => $question,
                    'userAnswer' => $userAnswer,
                    'isCorrect' => $isCorrect
                ];
            }
        
            return view('user.questions.result', [
                'results' => $results,
                'totalQuestions' => count($answers),
                'totalCorrect' => $totalCorrect,
                'material_id' => $material_id
            ]);
        }
}
