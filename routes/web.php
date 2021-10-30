<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MonHocController;
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

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return view('admin.index');
    })->name('index');

    Route::get('/mon-hoc', [MonHocController::class,'index'])->name('subject.index');
    Route::get('/them-mon-hoc', [MonHocController::class,'add'])->name('subject.add');
    Route::get('/them-thoi-khoa-bieu', [ThoiKhoaBieuController::class,'add'])->name('schedule.add');
    Route::post('/xu-ly-them-thoi-khoa-bieu', [ThoiKhoaBieuController::class,'createShedule'])->name('handle.schedule.add');
    Route::get('/them-thoi-khoa-bieu/{idSchedule}', [ThoiKhoaBieuController::class,'addSubject'])->name('subject.add');
});
Route::get('/logout', [AuthController::class,'logout'])->name('logout');
    Route::post('/sign-in', [AuthController::class,'handleLogin'])->name('handleLogin');
Route::get('/sign-in', function () {
    return view('auth.sign-in');
})->name('signIn');
Route::get('/sign-up', function () {
    return view('auth.sign-up');
})->name('signUp');


Route::get('/tra-cuu', [StudentController::class,'search'])->name('search');
