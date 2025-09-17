<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentCourseController;
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


Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/redirect-dashboard', function () {
    if (auth()->user()->role === 'admin') {
        return redirect('/admin/dashboard');
    } else {
        return redirect('/student/dashboard');
    }
});


// Public routes
Route::get('/', function () {
    return view('welcome');
});

// Student routes
Route::middleware(['auth', 'role:student'])->group(function () {
    Route::get('/student/dashboard', function () {
        return "Welcome Student!";
    });
    Route::get('/student/courses', [StudentCourseController::class, 'index'])->name('student.courses');
    Route::post('/student/courses/enroll/{course}', [StudentCourseController::class, 'enroll'])->name('student.courses.enroll');
    Route::get('/student/my-courses', [StudentCourseController::class, 'myCourses'])->name('student.my-courses');
});

// Admin routes
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return "Welcome Admin!";
    });
    Route::resource('courses', CourseController::class);
});

