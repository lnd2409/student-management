<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

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