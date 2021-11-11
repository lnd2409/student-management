<?php

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

Route::prefix('admin')->name('admin.')->group(function () {

    // Route::get('/mon-hoc', [MonHocController::class,'index'])->name('subject.index');
    // Route::get('/them-mon-hoc', [MonHocController::class,'add'])->name('subject.add');
    // Route::get('/them-thoi-khoa-bieu', [ThoiKhoaBieuController::class,'add'])->name('schedule.add');
    // Route::post('/xu-ly-them-thoi-khoa-bieu', [ThoiKhoaBieuController::class,'createShedule'])->name('handle.schedule.add');
    // Route::get('/them-thoi-khoa-bieu/{idSchedule}', [ThoiKhoaBieuController::class,'addSchedule'])->name('schedule.add');
});
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
Route::group(['middleware' => 'checkRole:sinhvien'], function () {//route sinh viên
    
    Route::get('/phuc-khao', [ReviewController::class,'review'])->name('review');
    Route::post('/gui-phuc-khao', [ReviewController::class,'reviewStore'])->name('review.store');
    
    Route::get('/tra-cuu', [StudentController::class,'search'])->name('search');
    
});
Route::group(['middleware' => 'checkRole:giaovien'], function () {//route giáo viên
    Route::get('/thong-ke', [TeacherController::class,'stat'])->name('stat');
    
});
Route::get('/thong-tin', [StudentController::class,'info'])->name('info');
Route::get('/', function () {return redirect()->route('info');});

Route::get('/db', function () {
    $data = [
        [
            'sv_id'=>1,
            'mh_id'=>1
        ],
        [
            'sv_id'=>2,
            'mh_id'=>1
        ],
        [
            'sv_id'=>3,
            'mh_id'=>2
        ],
        [
            'sv_id'=>1,
            'mh_id'=>2
        ],
        [
            'sv_id'=>2,
            'mh_id'=>2
        ],
        [
            'sv_id'=>3,
            'mh_id'=>2
        ],
    ];

    DB::table('mon_hoc_sinh_vien')->insert($data);
});
});