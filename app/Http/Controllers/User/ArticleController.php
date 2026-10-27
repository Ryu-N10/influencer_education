<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article; // DBのarticlesテーブルを操作するためのモデル

class ArticleController extends Controller
{
    /**
     * ユーザー側：お知らせ詳細画面を表示する
     */
    public function showArticle($id)
    {
        // URLから渡されたID($id)を元に、お知らせデータを1件取得する
        $article = Article::find($id);

        // resources/views/user/article.blade.php にデータを渡して画面を表示する
        return view('user.article', compact('article'));
    }
}