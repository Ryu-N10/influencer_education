<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
// お知らせ専用の警備員を呼び出します
use App\Http\Requests\Admin\ArticleUpdateRequest;

class ArticleController extends Controller
{
    private $article;

    public function __construct()
    {
        $this->article = new Article();
    }

    /**
     * お知らせ一覧画面の表示
     */
    public function showArticleList()
    {
        $articles = $this->article->getArticleList(10);
        return view('admin.article_list', compact('articles'));
    }

    /**
     * お知らせ変更画面の表示
     */
    public function showArticleEdit($id)
    {
        // ▼変更：直接DBを探さず、モデル（倉庫係）に「IDから1件取ってきて」とお願いする
        $article = $this->article->getArticleById($id);
        return view('admin.article_edit', compact('article'));
    }

    /**
     * お知らせの更新処理
     */
    public function update(ArticleUpdateRequest $request, $id)
    {
        // ▼変更：コントローラーに直接書いていた保存処理を消し、
        // モデル（倉庫係）に「このデータで上書き更新して」とお願いする
        $this->article->updateArticleData(
            $id,
            $request->posted_date,
            $request->title,
            $request->article_contents
        );

        // お知らせ一覧画面に戻り、メッセージを渡す
        return redirect()->route('admin.show.article.list')->with('success', 'お知らせを変更しました。');
    }

    /**
     * お知らせの削除処理
     */
    public function deleteArticle($id)
    {
        $this->article->deleteArticleById($id);
        return redirect()->route('admin.show.article.list')->with('success', 'お知らせを削除しました。');
    }

    // --- 仮ルート用のダミー ---
    public function showArticleCreate()
    {
        return view('admin.article_create');
    }
}