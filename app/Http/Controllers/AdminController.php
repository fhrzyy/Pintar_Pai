<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PDF; // Alias for barryvdh/laravel-dompdf

class AdminController extends Controller {
    // Menu Home
    public function home() {
        $materialCount = Material::count();
        $questionCount = Question::count();
        return view('admin.home', compact('materialCount', 'questionCount'));
    }

    // Menampilkan daftar siswa
    public function indexStudents() {
        $students = User::where('id', '!=', auth()->id())->latest()->paginate(10);
        return view('admin.students.index', compact('students'));
    }

    // Generate PDF untuk daftar siswa
    public function generateStudentsPDF() {
        $students = User::where('id', '!=', auth()->id())->get();

        // Prepare HTML content for PDF
        $html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Siswa</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin: 20px 0; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        h1 { text-align: center; }
    </style>
</head>
<body>
    <h1>Daftar Siswa</h1>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>';

        foreach ($students as $index => $student) {
            $html .= '<tr>';
            $html .= '<td>' . ($index + 1) . '</td>';
            $html .= '<td>' . htmlspecialchars($student->name) . '</td>';
            $html .= '<td>' . htmlspecialchars($student->email) . '</td>';
            $html .= '</tr>';
        }

        $html .= '</tbody>
    </table>
</body>
</html>';

        // Generate PDF using dompdf
        $pdf = PDF::loadHTML($html);

        // Download the PDF
        return $pdf->download('daftar_siswa.pdf');
    }

    // Menampilkan daftar materi
    public function index() {
        $materials = Material::latest()->paginate(10);
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
            Storage::disk('public')->delete($material->file_path);
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
        Storage::disk('public')->delete($material->file_path);
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
        $materials = Material::all();
        $questions = Question::with('material')->latest()->paginate(10);
        return view('admin.questions.index', compact('questions', 'materials'));
    }

    // Form tambah soal
    public function createQuestion() {
        $materials = Material::all();
        return view('admin.questions.create', compact('materials'));
    }

    // Simpan soal
    public function storeQuestion(Request $request) {
        $request->validate([
            'material_id' => 'required|exists:materials,id',
            'questions' => 'required|array|min:1',
            'questions.*.question_text' => 'required|string',
            'questions.*.options' => 'required|array|size:4',
            'questions.*.correct_answer' => 'required|in:A,B,C,D',
        ]);

        foreach ($request->questions as $questionData) {
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

    // Update soal
    public function updateQuestion(Request $request, $id) {
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
    public function editQuestion($id) {
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