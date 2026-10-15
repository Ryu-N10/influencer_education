<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    // 紐付けるテーブル名を明示的に指定
    protected $table = 'articles';

    // データの保存や更新を許可するカラムを指定
    protected $fillable = [
        'title',
        'posted_date',
        'article_contents',
    ];

    /**
     * お知らせ一覧を投稿日時の降順（新しい順）で取得する
     */
    public function getArticleList()
    {
        // 投稿日時(posted_date)が新しい順に並び替えて、ページネーションで取得（今回は10件ずつ）
        return $this->orderBy('posted_date', 'desc')->paginate(10);
    }

    /**
     * 指定されたIDのお知らせを削除する
     */
    public function deleteArticleById($id)
    {
        $article = $this->find($id);
        if ($article) {
            return $article->delete();
        }
        return false;
    }
}