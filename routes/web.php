<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

// Landing page
Route::get('/', [LandingController::class, 'index'])->name('landing');

// Auth Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'registerForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Admin routes (dengan autentikasi)
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/home', [AdminController::class, 'home'])->name('admin.home');

    // Materi
    Route::get('/materials', [AdminController::class, 'index'])->name('admin.materials.index');
    Route::get('/materials/create', [AdminController::class, 'createMaterial'])->name('admin.materials.create');
    Route::post('/materials', [AdminController::class, 'storeMaterial'])->name('admin.materials.store');
    Route::get('/materials/{id}/edit', [AdminController::class, 'editMaterial'])->name('admin.materials.edit');
    Route::put('/materials/{id}', [AdminController::class, 'updateMaterial'])->name('admin.materials.update');
    Route::delete('/materials/{id}', [AdminController::class, 'destroyMaterial'])->name('admin.materials.destroy');

    // Soal
    Route::get('/questions', [AdminController::class, 'indexQuestion'])->name('admin.questions.index');
    Route::get('/questions/create', [AdminController::class, 'createQuestion'])->name('admin.questions.create');
    Route::post('/questions', [AdminController::class, 'storeQuestion'])->name('admin.questions.store');
    Route::get('/questions/{id}/edit', [AdminController::class, 'editQuestion'])->name('admin.questions.edit');
    Route::put('/questions/{id}', [AdminController::class, 'updateQuestion'])->name('admin.questions.update');
    Route::delete('/questions/{id}', [AdminController::class, 'destroyQuestion'])->name('admin.questions.destroy');
});

// User routes (dengan autentikasi)
Route::prefix('user')->middleware(['auth', 'user'])->group(function () {
    Route::get('/home', [UserController::class, 'home'])->name('user.home');
    
    // Materi
    Route::get('/materials', [UserController::class, 'materials'])->name('user.materials.index');
    Route::get('/materials/{id}', [UserController::class, 'showMaterial'])->name('user.materials.show');
    
    // Soal
    Route::get('/questions/select-material', [UserController::class, 'selectMaterialForQuestions'])
        ->name('user.questions.select-material');
    Route::get('/questions/{material_id}', [UserController::class, 'index'])
        ->name('user.questions.index');
    Route::get('/questions/{id}/show', [UserController::class, 'showQuestion'])
        ->name('user.questions.show');
    Route::post('/questions/{id}/submit', [UserController::class, 'submitAnswer'])
        ->name('user.questions.submit');
});