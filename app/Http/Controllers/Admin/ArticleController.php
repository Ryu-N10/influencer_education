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

    /**
     * お知らせ変更画面の表示
     */
    public function showArticleEdit($id)
    {
        // URLのIDを元に、データベースからお知らせのデータを探して持ってくる
        $article = Article::findOrFail($id);

        // 画面のファイル（ビュー）にデータを渡して表示する
        return view('admin.article_edit', compact('article'));
    }

    /**
     * お知らせの更新処理
     */
    public function update(Request $request, $id)
    {
        // 1. 入力されたデータが正しいかチェック（バリデーション）
        $request->validate([
            'posted_date' => 'required|date',
            'title' => 'required|string|max:255',
            'article_contents' => 'required|string',
        ], [
            // エラーが出たときのメッセージを日本語にする
            'posted_date.required' => '投稿日時は必須です。',
            'title.required' => 'タイトルは必須です。',
            'article_contents.required' => '本文は必須です。',
        ]);

        // 2. データベースのデータを更新する
        $article = Article::findOrFail($id);
        $article->posted_date = $request->posted_date;
        $article->title = $request->title;
        $article->article_contents = $request->article_contents;
        $article->save();

        // 3. お知らせ一覧画面に戻り、「更新しました」というメッセージを渡す
        return redirect()->route('admin.show.article.list')->with('success', 'お知らせを変更しました。');
    }
}