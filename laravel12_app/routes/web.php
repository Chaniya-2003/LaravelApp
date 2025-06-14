<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\StudentsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

// Root route showing dashboard with Login & Register buttons
Route::get('/', function () {
    return view('dashboard');  
})->name('dashboard');

// Authentication Routes
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Students routes 
Route::middleware('auth')->group(function () {
    Route::get('/students', [StudentsController::class, 'index'])->name('students.index');
    Route::get('/students/create', [StudentsController::class, 'create'])->name('students.create');
    Route::post('/students', [StudentsController::class, 'store'])->name('students.store');
    Route::get('/students/{student}', [StudentsController::class, 'show'])->name('students.show');
    Route::get('/students/{student}/edit', [StudentsController::class, 'edit'])->name('students.edit');
    Route::put('/students/{student}', [StudentsController::class, 'update'])->name('students.update');
    Route::delete('/students/{student}', [StudentsController::class, 'destroy'])->name('students.destroy');
});

Route::middleware('auth')->group(function () {
    // Student routes
    Route::get('/students', [StudentsController::class, 'index'])->name('students.index');
    Route::get('/students/create', [StudentsController::class, 'create'])->name('students.create');
    Route::post('/students', [StudentsController::class, 'store'])->name('students.store');
    Route::get('/students/{student}', [StudentsController::class, 'show'])->name('students.show');
    Route::get('/students/{student}/edit', [StudentsController::class, 'edit'])->name('students.edit');
    Route::put('/students/{student}', [StudentsController::class, 'update'])->name('students.update');
    Route::delete('/students/{student}', [StudentsController::class, 'destroy'])->name('students.destroy');

    //  Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
});


