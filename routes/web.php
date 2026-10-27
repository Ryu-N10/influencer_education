<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController; // ←ここに移動！
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\Auth\RegisterController; 
use App\Http\Controllers\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// '/' にアクセスしたときにも HomeController の index（ホーム画面）を呼び出す
Route::get('/', [HomeController::class, 'index']);

// 受講生用時間割画面のルート
Route::get('/schedule', [ScheduleController::class, 'index'])->name('schedule.index');


// ==========================================
// 新規会員登録用のルート
// ==========================================
// 新規会員登録画面の表示
Route::get('/register', [RegisterController::class, 'create'])->name('register');
// 登録処理の送信先
Route::post('/register', [RegisterController::class, 'store']);


// ログイン画面を表示するルート
Route::get('login', [LoginController::class, 'create'])->name('login');
// ログイン処理を実行するルート
Route::post('login', [LoginController::class, 'store']);


// ホーム画面へのルーティング
Route::get('/home', [HomeController::class, 'index'])->name('home');