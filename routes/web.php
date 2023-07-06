<?php

use App\Http\Controllers\AuthenticateController;
use App\Http\Controllers\AuthenticateStudentController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CourseController;
use App\Http\Middleware\CheckLogged;
use App\Http\Middleware\CheckLogin;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AlumnusController;

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


// Đăng nhập, đăng xuất
Route::middleware([CheckLogged::class])->group(function () {
    // Authentication
     Route::get('/admin', [AuthenticateController::class, 'login'])->name('login');
     Route::post('/login-process', [AuthenticateController::class, 'loginProcess'])->name('login-process');
});
Route::middleware([CheckLogged::class])->group(function () {
    // Authentication
     Route::get('/student', [AuthenticateStudentController::class, 'login'])->name('login-student');
     Route::post('/login-student-process', [AuthenticateStudentController::class, 'loginProcess'])->name('login-student-process');
});

Route::middleware([CheckLogin::class])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('welcome');
    Route::get("/logout", [AuthenticateController::class, 'logout'])->name('logout');
});
// sinh viên
Route::resource('/alumnus', 'AlumnusController');
Route::name('alumnus.')->group(function () {
    Route::get('/add-by-excel', [AlumnusController::class, 'addByExcel'])->name('add-by-excel');
    Route::post('/add-by-excel-process', [AlumnusController::class, 'import'])->name('add-by-excel-process');
    Route::get('/download-excel', [AlumnusController::class, 'export'])->name('download-excel');
});
//Route::get('/login', [AuthenticateController::class, 'login'])->name('login');
//Route::post('/login-process', [AuthenticateController::class, 'login-process'])->name('loginProcess');
// Lớp
Route::resource('/grade', 'GradeController');
//Khóa
Route::resource('/course', 'CourseController');
//Route::resource('grade', 'GradeController::class'); ban moi


// hình thức nộp học phí
Route::resource('/payment', 'PaymentController');
Route::resource('/fee', 'FeeController');
// Học bổng
Route::resource('/scholarship', 'ScholarshipController');
// thông tin
Route::resource('/profile', 'ProfileController');

// ngành học
Route::resource('/feee', 'Fee2Controller');
Route::resource('/password', 'PasswordController');
Route::resource('/major', 'MajorController');
Route::resource('/bill', 'BillController');
