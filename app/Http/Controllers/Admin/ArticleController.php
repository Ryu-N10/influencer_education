<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
// ▼追加：先ほど作ったお知らせ専用の警備員を呼び出します
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
        // URLのIDを元にお知らせのデータを取得
        $article = Article::findOrFail($id);
        return view('admin.article_edit', compact('article'));
    }

    /**
     * お知らせの更新処理
     * ▼変更：(Request $request) を (ArticleUpdateRequest $request) に変えます！
     * これで自動的に警備員がチェックを行ってくれます。
     */
    public function update(ArticleUpdateRequest $request, $id)
    {
        // ※ここに書いてあった $request->validate([...]) のルールは、
        // ArticleUpdateRequest に丸ごとお引越ししたので削除しました！

        // データベースのデータを更新する
        $article = Article::findOrFail($id);
        $article->posted_date = $request->posted_date;
        $article->title = $request->title;
        $article->article_contents = $request->article_contents;
        $article->save();

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