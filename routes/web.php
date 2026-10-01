<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\MajorController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\StudentResultController;
use App\Http\Controllers\AssessmentController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes - MajorFit UBSI
|--------------------------------------------------------------------------
|
| Routing antarmuka UI/UX MajorFit Universitas Bina Sarana Informatika
| terintegrasi dengan algoritma kalkulasi pencocokan minat RIASEC dan
| panel manajemen Administrator PMB UBSI.
|
*/

// ==========================================
// 1. Public Pages (Landing, Informasi, Profil)
// ==========================================
Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::get('/tentang-riasec', function () {
    return view('pages.about-riasec');
})->name('about-riasec');

Route::get('/fakultas-ubsi', function () {
    return view('pages.faculties');
})->name('faculties');

Route::get('/cara-kerja', function () {
    return view('pages.how-it-works');
})->name('how-it-works');

// ==========================================
// 2. Authentication Routes
// ==========================================
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ==========================================
// 3. Kuesioner Asesmen RIASEC (Maba & Guest)
// ==========================================
Route::get('/mulai-tes', [AssessmentController::class, 'showCandidateForm'])->name('start-test');
Route::post('/mulai-tes', [AssessmentController::class, 'storeCandidateInfo'])->name('start-test.submit');

Route::get('/tes-riasec', [AssessmentController::class, 'showAssessment'])->name('assessment');
Route::post('/api/assessment/candidate', [AssessmentController::class, 'storeCandidateInfo'])->name('assessment.candidate');
Route::post('/api/assessment/calculate', [AssessmentController::class, 'calculate'])->name('assessment.calculate');
Route::post('/assessment/reset', [AssessmentController::class, 'resetSession'])->name('assessment.reset');

// Locked Result Page (Protected by EnsureAssessmentCompleted middleware)
Route::get('/hasil-rekomendasi', [AssessmentController::class, 'showResult'])
    ->middleware('assessment.completed')
    ->name('result');

// ==========================================
// 4. Admin Management Panel (Role: Admin)
// ==========================================
Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', 'role:admin'])
    ->group(function () {

        // Redirect /admin ke /admin/dashboard
        Route::get('/', function () {
            return redirect()->route('admin.dashboard');
        });

        // Dashboard Metrics & Charts
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

        // Bank Soal RIASEC (CRUD & Status Toggle)
        Route::prefix('questions')->name('questions.')->group(function () {
            Route::get('/', [QuestionController::class, 'index'])->name('index');
            Route::post('/', [QuestionController::class, 'store'])->name('store');
            Route::put('/{question}', [QuestionController::class, 'update'])->name('update');
            Route::patch('/{question}/toggle-status', [QuestionController::class, 'toggleStatus'])->name('toggle-status');
            Route::delete('/{question}', [QuestionController::class, 'destroy'])->name('destroy');
        });

        // Katalog Prodi UBSI (21 Jurusan & Vektor RIASEC 0-100)
        Route::prefix('majors')->name('majors.')->group(function () {
            Route::get('/', [MajorController::class, 'index'])->name('index');
            Route::get('/{major}/edit', [MajorController::class, 'edit'])->name('edit');
            Route::put('/{major}', [MajorController::class, 'update'])->name('update');
        });

        // Hasil Tes Maba (DataTables, Detail, & Hapus Record)
        Route::prefix('results')->name('results.')->group(function () {
            Route::get('/', [StudentResultController::class, 'index'])->name('index');
            Route::get('/{result}', [StudentResultController::class, 'show'])->name('show');
            Route::delete('/{result}', [StudentResultController::class, 'destroy'])->name('destroy');
        });
    });
