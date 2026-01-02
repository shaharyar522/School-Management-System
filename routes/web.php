<?php
use App\Http\Controllers\Admin\AttendanceController;
use App\Http\Controllers\Admin\ClassesController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ExamController;
use App\Http\Controllers\Admin\ExamSubjectController;
use App\Http\Controllers\Admin\SubjectsController;
use App\Http\Controllers\Admin\ExportController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;



Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::prefix('admin')->middleware(['auth', 'is_admin'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('admin.dashboard');

    // Users Management
    Route::get('/users', [UserController::class, 'index'])
        ->name('admin.users.index');

    Route::get('/users/create', [UserController::class, 'create'])
        ->name('admin.users.create');

    Route::post('/users/store', [UserController::class, 'store'])
        ->name('admin.users.store');

    Route::get('/users/{id}/edit', [UserController::class, 'edit'])
        ->name('admin.users.edit');

    Route::patch('/users/{id}', [UserController::class, 'update'])
        ->name('admin.users.update');

    Route::delete('/users/{id}', [UserController::class, 'destroy'])
        ->name('admin.users.destroy');

    // Classes Management
    Route::get('/classes', [ClassesController::class, 'index'])
        ->name('admin.classes.index');

    Route::get('/classes/create', [ClassesController::class, 'create'])
        ->name('admin.classes.create');

    Route::post('/classes/store', [ClassesController::class, 'store'])
        ->name('admin.classes.store');

    Route::get('/classes/{id}/edit', [ClassesController::class, 'edit'])
        ->name('admin.classes.edit');

    Route::patch('/classes/{id}', [ClassesController::class, 'update'])
        ->name('admin.classes.update');

    Route::delete('/classes/{id}', [ClassesController::class, 'destroy'])
        ->name('admin.classes.destroy');

    // Subjects Management
    Route::get('/subjects', [SubjectsController::class, 'index'])
        ->name('admin.subjects.index');

    Route::get('/subjects/create', [SubjectsController::class, 'create'])
        ->name('admin.subjects.create');

    Route::post('/subjects/store', [SubjectsController::class, 'store'])
        ->name('admin.subjects.store');

    Route::get('/subjects/{id}/edit', [SubjectsController::class, 'edit'])
        ->name('admin.subjects.edit');

    Route::patch('/subjects/{id}', [SubjectsController::class, 'update'])
        ->name('admin.subjects.update');

    Route::delete('/subjects/{id}', [SubjectsController::class, 'destroy'])
        ->name('admin.subjects.destroy');

    // Attendance Management
    Route::get('/attendance', [AttendanceController::class, 'index'])
        ->name('admin.attendance.index');

    Route::get('/attendance/create', [AttendanceController::class, 'create'])
        ->name('admin.attendance.create');

    Route::post('/attendance/store', [AttendanceController::class, 'store'])
        ->name('admin.attendance.store');

    Route::get('/attendance/report', [AttendanceController::class, 'report'])
        ->name('admin.attendance.report');

    Route::get('/attendance/report/pdf', [AttendanceController::class, 'exportPdf'])
        ->name('admin.attendance.export.pdf');

    Route::get('/attendance/report/excel', [AttendanceController::class, 'exportExcel'])
        ->name('admin.attendance.export.excel');

    // Exam Route
    Route::get('/exams', [ExamController::class,'index'])->name('admin.exams.index');
    Route::get('/exams/create', [ExamController::class,'create'])->name('admin.exams.create');
    Route::post('/exams/store', [ExamController::class,'store'])->name('admin.exams.store');
    Route::get('/exams/{id}/show', [ExamController::class,'show'])->name('admin.exams.show');
    Route::get('/exams/{id}/edit', [ExamController::class,'edit'])->name('admin.exams.edit');
    Route::patch('/exams/{id}', [ExamController::class,'update'])->name('admin.exams.update');
    Route::delete('/exams/{id}', [ExamController::class,'destroy'])->name('admin.exams.destroy');

    // Exam Subjects Management
    Route::get('/exam-subjects', [ExamSubjectController::class,'index'])->name('admin.exam_subjects.index');
    Route::get('/exam-subjects/create',[ExamSubjectController::class,'create'])->name('admin.exam_subjects.create');
    Route::post('/exam-subjects/store',[ExamSubjectController::class,'store'])->name('admin.exam_subjects.store');
    Route::get('/exam-subjects/{id}/show', [ExamSubjectController::class,'show'])->name('admin.exam_subjects.show');
    Route::get('/exam-subjects/{id}/edit', [ExamSubjectController::class,'edit'])->name('admin.exam_subjects.edit');
    Route::patch('/exam-subjects/{id}', [ExamSubjectController::class,'update'])->name('admin.exam_subjects.update');
    Route::delete('/exam-subjects/{id}', [ExamSubjectController::class,'destroy'])->name('admin.exam_subjects.destroy');

    // Export Routes
    Route::get('/export/users', [ExportController::class, 'exportUsers'])->name('admin.export.users');
    Route::get('/export/classes', [ExportController::class, 'exportClasses'])->name('admin.export.classes');
    Route::get('/export/subjects', [ExportController::class, 'exportSubjects'])->name('admin.export.subjects');
    Route::get('/export/exams', [ExportController::class, 'exportExams'])->name('admin.export.exams');
    Route::get('/export/attendance', [ExportController::class, 'exportAttendance'])->name('admin.export.attendance');
});

require __DIR__ . '/auth.php';
