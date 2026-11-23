<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article; // DBのarticlesテーブルを操作するためのモデル

class ArticleController extends Controller
{
    private $article;

    public function __construct()
    {
        $this->article = new Article();
    }

    /**
     * ユーザー側：お知らせ詳細画面を表示する
     */
    public function showArticle($id)
    {
        // ▼変更：直接DBを探さず、モデル（倉庫係）に「IDから1件探してきて」とお願いする
        $article = $this->article->findArticleById($id);

        // resources/views/user/article.blade.php にデータを渡して画面を表示する
        return view('user.article', compact('article'));
    }
}