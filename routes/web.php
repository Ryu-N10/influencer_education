<?php

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

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\ScheduleController;

// 受講生用時間割画面のルート
Route::get('/schedule', [ScheduleController::class, 'index'])->name('schedule.index');


// ==========================================
// 新規会員登録用のルート
// ==========================================
use App\Http\Controllers\Auth\RegisterController; 

// 新規会員登録画面の表示
Route::get('/register', [RegisterController::class, 'create'])->name('register');
// 登録処理の送信先
Route::post('/register', [RegisterController::class, 'store']);


use App\Http\Controllers\Auth\LoginController;

// ログイン画面を表示するルート
Route::get('login', [LoginController::class, 'create'])->name('login');
// ログイン処理を実行するルート
Route::post('login', [LoginController::class, 'store']);