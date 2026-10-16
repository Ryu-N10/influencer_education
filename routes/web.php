<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\ProgressController;
use App\Http\Controllers\Admin\ArticleController as AdminArticleController; // 管理側を別名で読み込む

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

// ==========================================
// ユーザー側のルートグループ
// ==========================================
Route::prefix('user')->name('user.')->group(function () {
    
    // 【開発用の一時的な代替案】
    // 他のメンバーがトップページを作成するまでの間、エラーを防ぐための仮のルート
    Route::get('/top', function () {
        return 'ここは仮のトップページです。本来は TopController が処理します。';
    })->name('show.top');
    
    // あなたが担当している授業進捗画面
    Route::get('/progress', [ProgressController::class, 'showProgress'])->name('show.progress');
    
});

// ==========================================
// 管理側のルートグループ
// ==========================================
Route::prefix('admin')->namespace('Admin')->name('admin.')->group(function () {

    // お知らせ一覧画面
    Route::get('/article_list', [AdminArticleController::class, 'showArticleList'])->name('show.article.list');
    
    // お知らせ削除処理（画面イメージにある「削除」ボタン用）
    Route::post('/article_delete/{id}', [AdminArticleController::class, 'deleteArticle'])->name('article.delete');

    // お知らせ変更画面の表示
    Route::get('/article_edit/{id}', [AdminArticleController::class, 'showArticleEdit'])->name('show.article.edit');
    
    // お知らせ変更の登録（更新）処理
    Route::post('/article_edit/{id}', [AdminArticleController::class, 'update'])->name('update.article');

    // 以下のルートは今回作成しませんが、画面遷移のエラーを防ぐための仮ルートです。
    // 他の担当者が作成する際に書き換えてもらってください。
    // TODO: トップ画面担当者が後で本物のコントローラーに書き換えること
    Route::get('/top', function(){ return '管理側トップ画面'; })->name('show.top');
});