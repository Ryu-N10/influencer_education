<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController; 
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\Auth\RegisterController; 
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\BannerController;

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
Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);


// ログイン関連のルート
Route::get('login', [LoginController::class, 'create'])->name('login');
Route::post('login', [LoginController::class, 'store']);


// ホーム画面へのルーティング
Route::get('/home', [HomeController::class, 'index'])->name('home');


// 管理画面用ルーティング
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('banners', BannerController::class);
});