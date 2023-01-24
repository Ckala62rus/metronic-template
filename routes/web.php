<?php

use App\Http\Controllers\LessonController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return Inertia::render('Welcome', [
//        'canLogin' => Route::has('login'),
//        'canRegister' => Route::has('register'),
//        'laravelVersion' => Application::VERSION,
//        'phpVersion' => PHP_VERSION,
//    ]);
//});


Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
//
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', function () {
//    return Inertia::render('Auth/Login');
    return Redirect::route('login');
})->name('/');

//Route::get('/www', function () {
//    return Inertia::render('Dashboard');
//})->name('www');

Route::middleware('auth')->group(function () {
    Route::get('/www', function () {
        return Inertia::render('Dashboard');
    })->name('www');

    Route::get('dashboard/profile', [ProfileController::class, 'profilePage'])->name('metronic.profile');

    // Lesson begin
    Route::get('dashboard/lessons-pagination', [LessonController::class, 'getAllLessons'])->name('metronic.lesson.getAllLessons');
    Route::get('dashboard/lessons', [LessonController::class, 'index'])->name('metronic.lesson.index');
    Route::get('dashboard/lessons/create', [LessonController::class, 'create'])->name('metronic.lesson.create');
    Route::get('dashboard/lessons/{id}/edit', [LessonController::class, 'edit'])->name('metronic.lesson.edit');
    Route::get('dashboard/lessons/{id}', [LessonController::class, 'show'])->name('metronic.lesson.show');
    Route::put('dashboard/lessons/{id}', [LessonController::class, 'update'])->name('metronic.lesson.update');
    Route::delete('dashboard/lessons/{id}', [LessonController::class, 'destroy'])->name('metronic.lesson.destroy');
    Route::post('dashboard/lessons', [LessonController::class, 'store'])->name('metronic.lesson.store');

    // Get concrete lesson view
    Route::get('dashboard/course/lessons/{id}', [LessonController::class, 'lessonView'])->name('metronic.lesson.lesson-view');

    // User
    Route::get('dashboard/user', [UserController::class, 'index'])->name('metronic.user.index');
    Route::get('dashboard/user/create', [UserController::class, 'create'])->name('metronic.user.create');
    Route::get('dashboard/user/paginate', [UserController::class, 'getAllUsersWithPaginate']);
});

require __DIR__.'/auth.php';
