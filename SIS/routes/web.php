<?php
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\UserProfileController;



Route::get('/', function () {
    return view('welcome');
});



Route::get('/logout', function () {
    Auth::logout();
    return redirect('/'); 
})->name('logout');



Route::get('/dashboard', function () {
    return view('index');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::prefix('students')->group(function () {          
   

    Route::get('/', [StudentController::class, 'index'])->name('student.index');

    
    Route::post('/student', [StudentController::class, 'store'])->name('student.store');

  
    Route::put('/student/{id}', [StudentController::class, 'update'])->name('student.update');

   
    Route::delete('/student/{id}', [StudentController::class, 'destroy'])->name('student.destroy');

});


Route::prefix('subjects')->group(function () {

  
    Route::get('/', [SubjectController::class, 'index'])->name('subject.index');


    Route::post('/subject', [SubjectController::class, 'store'])->name('subject.store');


    Route::put('/subject/{id}', [SubjectController::class, 'update'])->name('subject.update');

    Route::delete('/subject/{id}', [SubjectController::class, 'destroy'])->name('subject.destroy');

});


Route::prefix('grades')->group(function () {

   
    Route::get('/', [GradeController::class, 'index'])->name('grade.index');

   
    Route::post('/', [GradeController::class, 'store'])->name('grade.store');

  
    Route::put('/grade/{id}', [GradeController::class, 'update'])->name('grade.update');

   
    Route::delete('/grade/{id}', [GradeController::class, 'destroy'])->name('grade.destroy');

});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
