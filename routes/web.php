<?php

use App\Http\Controllers\Admin\AttendanceController;
use App\Http\Controllers\Admin\ClassesController;
use App\Http\Controllers\Admin\SubjectsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;

Route::get('/', function () {
    return view('home');
});

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::prefix('admin')->middleware(['auth', 'is_admin'])->group(function () {
    Route::get('users', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('users/create', [UserController::class, 'create'])->name('admin.users.create');
    Route::post('users/store', [UserController::class, 'store'])->name('admin.users.store');
});




Route::prefix('admin')->middleware(['auth', 'is_admin'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('admin.dashboard');

    Route::get('/users', [UserController::class,'index'])
        ->name('admin.users.index');

    Route::get('/users/create', [UserController::class,'create'])
        ->name('admin.users.create');

    Route::post('/users/store', [UserController::class,'store'])
        ->name('admin.users.store');
});


// for classes
// Classes Management
Route::get('/classes', [ClassesController::class,'index'])
    ->name('admin.classes.index');

Route::get('/classes/create', [ClassesController::class,'create'])
    ->name('admin.classes.create');

Route::post('/classes/store', [ClassesController::class,'store'])
    ->name('admin.classes.store');

Route::delete('/classes/{id}', [ClassesController::class,'destroy'])
    ->name('admin.classes.destroy');



    // for subject

    // Subjects Management
Route::get('/subjects', [SubjectsController::class,'index'])
    ->name('admin.subjects.index');

Route::get('/subjects/create', [SubjectsController::class,'create'])
    ->name('admin.subjects.create');

Route::post('/subjects/store', [SubjectsController::class,'store'])
    ->name('admin.subjects.store');

Route::delete('/subjects/{id}', [SubjectsController::class,'destroy'])
    ->name('admin.subjects.destroy');



    // Attendance Management
Route::get('/attendance/create', [AttendanceController::class,'create'])
    ->name('admin.attendance.create');

Route::post('/attendance/store', [AttendanceController::class,'store'])
    ->name('admin.attendance.store');

Route::get('/attendance/report', [AttendanceController::class,'report'])
    ->name('admin.attendance.report');



require __DIR__ . '/auth.php';
