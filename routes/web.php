<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\ProgressController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\ArticleController as UserArticleController;
use App\Http\Controllers\Admin\ArticleController as AdminArticleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

// ==========================================
// ユーザー側のルートグループ
// ==========================================
Route::prefix('user')->name('user.')->group(function () {
    
    // 【開発用の一時的な代替案】仮のトップページ
    Route::get('/top', function () {
        return 'ここは仮のトップページです。本来は TopController が処理します。';
    })->name('show.top');
    
    // 授業進捗画面
    Route::get('/progress', [ProgressController::class, 'showProgress'])->name('show.progress');
    
    // プロフィール設定画面の表示
    Route::get('/profile', [ProfileController::class, 'showProfileForm'])->name('show.profile');
    
    // プロフィール情報の更新処理
    Route::post('/profile_update', [ProfileController::class, 'updateProfile'])->name('update.profile');

    // パスワード変更画面の表示
    Route::get('/password', [ProfileController::class, 'showPasswordFrom'])->name('show.password.edit');
    
    // パスワードの更新処理
    Route::post('/password', [ProfileController::class, 'updatePassword'])->name('update.password');

    // お知らせ詳細画面の表示
    Route::get('/article/{id}', [UserArticleController::class, 'showArticle'])->name('show.article');
});

// ==========================================
// 管理側のルートグループ
// ==========================================
Route::prefix('admin')->namespace('Admin')->name('admin.')->group(function () {

    // お知らせ一覧画面
    Route::get('/article_list', [AdminArticleController::class, 'showArticleList'])->name('show.article.list');
    
    // お知らせ削除処理
    Route::post('/article_delete/{id}', [AdminArticleController::class, 'deleteArticle'])->name('article.delete');

    // お知らせ変更画面の表示
    Route::get('/article_edit/{id}', [AdminArticleController::class, 'showArticleEdit'])->name('show.article.edit');
    
    // お知らせ変更の登録（更新）処理
    Route::post('/article_edit/{id}', [AdminArticleController::class, 'update'])->name('update.article');

    // 管理側仮トップ画面
    Route::get('/top', function(){ return '管理側トップ画面'; })->name('show.top');

    // ▼▼ 他メンバーが担当する画面の「仮ページ」を追加 ▼▼
    // 授業管理（仮）
    Route::get('/curriculum_list', function(){ 
        return '<div style="padding: 50px; text-align: center;"><h2>ここは仮の「授業管理」画面です</h2><p style="color: gray;">※他のメンバーが後で本物に書き換えます。</p><a href="' . route('admin.show.article.list') . '" style="display:inline-block; margin-top:20px; padding:10px 20px; background:#4df0ff; color:#000; text-decoration:none; border-radius:5px;">お知らせ一覧に戻る</a></div>'; 
    })->name('show.curriculum.list');

    // バナー管理（仮）
    Route::get('/banner_edit', function(){ 
        return '<div style="padding: 50px; text-align: center;"><h2>ここは仮の「バナー管理」画面です</h2><p style="color: gray;">※他のメンバーが後で本物に書き換えます。</p><a href="' . route('admin.show.article.list') . '" style="display:inline-block; margin-top:20px; padding:10px 20px; background:#4df0ff; color:#000; text-decoration:none; border-radius:5px;">お知らせ一覧に戻る</a></div>'; 
    })->name('show.banner.edit');

    // ログアウト（仮）
    Route::get('/logout', function(){ 
        return '<div style="padding: 50px; text-align: center;"><h2>ここは仮の「ログアウト」画面です</h2><p style="color: gray;">※他のメンバーが後で本物の処理に書き換えます。</p><a href="' . route('admin.show.article.list') . '" style="display:inline-block; margin-top:20px; padding:10px 20px; background:#4df0ff; color:#000; text-decoration:none; border-radius:5px;">お知らせ一覧に戻る</a></div>'; 
    })->name('logout');

     // お知らせ新規登録（仮）
    Route::get('/article_create', [AdminArticleController::class, 'showArticleCreate'])->name('show.article.create');
});