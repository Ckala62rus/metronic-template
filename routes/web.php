<?php

use App\Http\Controllers\LessonController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RolePermissionController;
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
    Route::get('dashboard/user/paginate', [UserController::class, 'getAllUsersWithPaginate']);
    Route::post('dashboard/user', [UserController::class, 'store']);
    Route::get('dashboard/user/create', [UserController::class, 'create'])->name('metronic.user.create');
    Route::get('dashboard/user/{id}', [UserController::class, 'show']);
    Route::put('dashboard/user/{id}', [UserController::class, 'update'])->name('metronic.user.update');
    Route::get('dashboard/user/{id}/edit', [UserController::class, 'edit'])->name('metronic.user.edit');
    Route::delete('dashboard/user/{id}', [UserController::class, 'destroy']);

    // Role
    Route::get('dashboard/role', [RolePermissionController::class, 'index'])->name('metronic.role.index');
    Route::get('dashboard/role/paginate', [RolePermissionController::class, 'getAllUsersWithPaginate']);
    Route::get('dashboard/role/create', [RolePermissionController::class, 'create'])->name('metronic.role.create');
    Route::post('dashboard/role', [RolePermissionController::class, 'store']);
    Route::get('dashboard/role/all', [RolePermissionController::class, 'getRolesCollection']);
    Route::get('dashboard/role/{id}', [RolePermissionController::class, 'show']);
    Route::put('dashboard/role/{id}', [RolePermissionController::class, 'update']);
    Route::get('dashboard/role/{id}/edit', [RolePermissionController::class, 'edit'])->name('metronic.role.edit');
    Route::delete('dashboard/role/{id}', [RolePermissionController::class, 'destroy']);

    // Permission
    Route::get('dashboard/permission', [RolePermissionController::class, 'getPermissions']);
});

require __DIR__.'/auth.php';
