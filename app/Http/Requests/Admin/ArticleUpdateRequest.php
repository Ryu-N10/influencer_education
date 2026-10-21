<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ArticleUpdateRequest extends FormRequest
{
    /**
     * この機能を利用できる権限があるかどうかの判定
     */
    public function authorize()
    {
        // 管理者なら誰でも変更できる前提なので true（許可）にします
        return true;
    }

    /**
     * 入力されたデータに対するチェックルール
     */
    public function rules()
    {
        return [
            'posted_date' => 'required|date',
            'title' => 'required|string|max:255',
            'article_contents' => 'required|string',
        ];
    }

    /**
     * エラーが出たときの日本語メッセージ
     */
    public function messages()
    {
        return [
            'posted_date.required' => '投稿日時は必須です。',
            'title.required' => 'タイトルは必須です。',
            'article_contents.required' => '本文は必須です。',
        ];
    }
}