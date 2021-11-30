<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MonHocController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ThoiKhoaBieuController;
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


Route::get('/logout', [AuthController::class,'logout'])->name('logout');
    Route::post('/sign-in', [AuthController::class,'handleLogin'])->name('handleLogin');
Route::get('/sign-in', function () {
    return view('auth.sign-in');
})->name('signIn');
Route::get('/sign-up', function () {
    return view('auth.sign-up');
})->name('signUp');

Route::get('/', function () {return redirect()->route('info');});
Route::middleware(['checkAuth'])->group(function () {//route đăng nhập
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/mon-hoc', [MonHocController::class,'index'])->name('subject.index');
        Route::get('/them-mon-hoc/{id}', [MonHocController::class,'add'])->name('subject.add');
        Route::post('/xu-ly-them-mon-hoc', [MonHocController::class,'handleCRUD'])->name('subject.store');
        Route::post('/xu-ly-them-thoi-khoa-bieu', [ThoiKhoaBieuController::class,'createShedule'])->name('handle.schedule.add');

        Route::prefix('/sinh-vien')->name('student.')->group(function () {
            Route::get('/', [StudentController::class,'index'])->name('index');
            Route::get('/them-sinh-vien/{id}', [StudentController::class,'add'])->name('add');
            Route::get('/xu-ly-them', [StudentController::class,'handleAdd'])->name('handle.add');
        });

        Route::prefix('/giao-vien')->name('teacher.')->group(function () {
            Route::get('/', [TeacherController::class,'index'])->name('index');
            Route::get('/them-giao-vien/{id}', [TeacherController::class,'add'])->name('add');
            Route::get('/xu-ly-them', [TeacherController::class,'handleAdd'])->name('handle.add');
        });
        Route::get('/nam-hoc', [AdminController::class,'schooYear'])->name('schooYear');
        Route::post('/thay-doi-nam-hoc', [AdminController::class,'changeSchoolYear'])->name('changeSchoolYear');
    });

Route::group(['middleware' => 'checkRole:sinhvien'], function () {//route sinh viên

    Route::get('/phuc-khao', [ReviewController::class,'review'])->name('review');
    Route::post('/gui-phuc-khao/{monhocsinhvien}', [ReviewController::class,'reviewStore'])->name('review.store');

    Route::get('/tra-cuu', [StudentController::class,'search'])->name('search');

});
Route::group(['middleware' => 'checkRole:giaovien'], function () {//route giáo viên
    Route::get('/yeu-cau-phuc-khao', [ReviewController::class,'listReview'])->name('review.list');
    Route::get('/thong-ke', [TeacherController::class,'stat'])->name('stat');
    Route::get('/mon-hoc-hien/{id}', [MonHocController::class,'subjectByTeacher'])->name('subject.by.teacher');
});
Route::get('/thong-tin', [StudentController::class,'info'])->name('info');
Route::get('/', function () {return redirect()->route('info');});
Route::get('/dang-ky-mon', [MonHocController::class,'registerSubject'])->name('dang-ky-mon-hoc');
Route::get('/xu-ly-dang-ky-mon/{idMonHoc}', [MonHocController::class,'handleRegister'])->name('xu-ly-dang-ky-mon-hoc');
Route::get('/danh-sach-sinh-vien-dang-hoc/{idMonHoc}', [MonHocController::class,'getStudentBySubject'])->name('mon-hoc.danh-sach-sinh-vien');
Route::get('/nhap-diem/{idSinhVien}/{idMonHoc}', [MonHocController::class,'handleScore'])->name('mon-hoc.nhap-diem');

});
