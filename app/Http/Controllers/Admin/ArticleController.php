<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article; // モデルを使用する

class ArticleController extends Controller
{
    private $articleModel;

    public function __construct()
    {
        // モデルを準備しておく
        $this->articleModel = new Article();
    }

    /**
     * お知らせ一覧画面を表示する
     */
    public function showArticleList()
    {
        // モデルにお知らせ一覧データを取得してもらう
        $articles = $this->articleModel->getArticleList();

        // 取得したデータをビューに渡す
        return view('admin.article_list', compact('articles'));
    }

    /**
     * お知らせの削除処理
     */
    public function deleteArticle($id)
    {
        // モデルに指定したIDの削除を依頼する
        $this->articleModel->deleteArticleById($id);

        // 削除が完了したら、一覧画面に戻ってメッセージを表示する
        return redirect()->route('admin.show.article.list')->with('success', 'お知らせを削除しました。');
    }
}