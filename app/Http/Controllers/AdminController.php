<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller {
    //Menu Home
    public function home() {
        $materialCount = Material::count();
        $questionCount = Question::count();
        return view('admin.home', compact('materialCount', 'questionCount'));
    }
    
    // Menampilkan daftar materi
    public function index() {
        $materials = Material::all();
        return view('admin.materials.index', compact('materials'));
    }

    // Form upload materi
    public function createMaterial() {
        return view('admin.materials.create');
    }

    // Form edit materi
    public function editMaterial($id) {
        $material = Material::findOrFail($id);
        return view('admin.materials.edit', compact('material'));
    }

    // Update materi
    public function updateMaterial(Request $request, $id) {
        $material = Material::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'file' => 'nullable|file|mimes:jpg,png,docx,pdf|max:2048',
        ]);

        $data = ['title' => $request->title];

        if ($request->hasFile('file')) {
            // Hapus file lama
            Storage::disk('public')->delete($material->file_path);
            // Upload file baru
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads', $fileName, 'public');
            $data['file_path'] = $filePath;
            $data['file_type'] = $file->getClientOriginalExtension();
        }

        $material->update($data);

        return redirect()->route('admin.materials.index')->with('success', 'Materi berhasil diperbarui!');
    }

    // Hapus materi
    public function destroyMaterial($id) {
        $material = Material::findOrFail($id);
        // Hapus file dari storage
        Storage::disk('public')->delete($material->file_path);
        // Hapus materi (soal terkait akan otomatis terhapus karena onDelete('cascade'))
        $material->delete();

        return redirect()->route('admin.materials.index')->with('success', 'Materi berhasil dihapus!');
    }

    // Simpan materi
    public function storeMaterial(Request $request) {
        $request->validate([
            'title' => 'required|string|max:255',
            'file' => 'required|file|mimes:jpg,png,docx,pdf|max:2048',
        ]);

        $file = $request->file('file');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('uploads', $fileName, 'public');

        Material::create([
            'title' => $request->title,
            'file_path' => $filePath,
            'file_type' => $file->getClientOriginalExtension(),
        ]);

        return redirect()->route('admin.materials.index')->with('success', 'Materi berhasil diupload!');
    }

    // Menampilkan daftar soal
    public function indexQuestion() {
        $questions = Question::with('material')->get();
        return view('admin.questions.index', compact('questions'));
    }

    // Form tambah soal (diperbarui untuk multiple soal)
    public function createQuestion()
    {
        $materials = Material::all();
        return view('admin.questions.create', compact('materials'));
    }

    // Simpan soal (diperbarui untuk multiple soal)
    public function storeQuestion(Request $request)
    {
        $request->validate([
            'material_id' => 'required|exists:materials,id',
            'questions' => 'required|array|min:1',
            'questions.*.question_text' => 'required|string',
            'questions.*.options' => 'required|array|size:4',
            'questions.*.correct_answer' => 'required|in:A,B,C,D',
        ]);
    
        foreach ($request->questions as $questionData) {
            // Konversi array options menjadi format dengan kunci A,B,C,D
            $options = array_combine(['A', 'B', 'C', 'D'], $questionData['options']);
    
            Question::create([
                'material_id' => $request->material_id,
                'question_text' => $questionData['question_text'],
                'options' => $options,
                'correct_answer' => $questionData['correct_answer'],
            ]);
        }
    
        return redirect()->route('admin.questions.index')
            ->with('success', 'Soal-soal berhasil ditambahkan!');
    }
    
    public function updateQuestion(Request $request, $id)
    {
        $request->validate([
            'material_id' => 'required|exists:materials,id',
            'question_text' => 'required|string',
            'options' => 'required|array|size:4',
            'correct_answer' => 'required|in:A,B,C,D',
        ]);
    
        $options = array_combine(['A', 'B', 'C', 'D'], $request->options);
    
        $question = Question::findOrFail($id);
        $question->update([
            'material_id' => $request->material_id,
            'question_text' => $request->question_text,
            'options' => $options,
            'correct_answer' => $request->correct_answer,
        ]);
    
        return redirect()->route('admin.questions.index')
            ->with('success', 'Soal berhasil diperbarui!');
    }

    // Form edit soal
        public function editQuestion($id)
        {
            $question = Question::findOrFail($id);
            $materials = Material::all();
            return view('admin.questions.edit', compact('question', 'materials'));
        }
    
    // Hapus soal
    public function destroyQuestion($id) {
        $question = Question::findOrFail($id);
        $question->delete();

        return redirect()->route('admin.questions.index')->with('success', 'Soal berhasil dihapus!');
    }
}