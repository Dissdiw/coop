<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminPanel\AdminController;
use App\Http\Controllers\TeacherPanel\TeacherController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/company', function () {
    return view('admin.admin_com');
});

Route::get('/admin/student', function () {
    return view('admin.admin_std');
});

Route::get('/admin/personnel', function () {
    return view('admin.admin_personnel');
});

Route::get('/admin/regisce', function () {
    return view('admin.admin_regis_ce');
});

Route::get('/admin/report', function () {
    return view('admin.admin_rp_ce');
});

Route::get('/admin/sv', function () {
    return view('admin.admin_sv');
});

Route::get('/company', function () {
    return view('student.student_com');
});

Route::get('/regisce', function () {
    return view('student.student_regis_ce');
});

Route::get('/report', function () {
    return view('student.student_rp_ce');
});

Route::get('/teacher/sv', function () {
    return view('teacher.admin_sv');
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth','urole:admin'])->group(function () {
    Route::get('admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});

Route::middleware(['auth','urole:teacher'])->group(function () {
    Route::get('teacher/dashboard', [TeacherController::class, 'index'])->name('teacher.dashboard');
});