<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ArticleUpdateRequest extends FormRequest
{
    /**
     * このリクエスト（操作）を許可するかどうか
     * ※必ず true にします
     */
    public function authorize()
    {
        return true;
    }

    /**
     * 入力チェックのルール（バリデーションルール）
     */
    public function rules()
    {
        return [
            'posted_date'      => ['required', 'date'],
            'title'            => ['required', 'max:255'],
            'article_contents' => ['required'],
        ];
    }

    /**
     * エラーが発生したときの日本語メッセージ（仕様書の検証内容と完全に一致させています）
     */
    public function messages()
    {
        return [
            // 投稿日時のエラーメッセージ
            'posted_date.required'      => '投稿日時を入力してください。',
            'posted_date.date'          => '正しい日付形式で入力してください。',

            // タイトルのエラーメッセージ
            'title.required'            => 'タイトルを入力してください。',
            'title.max'                 => 'タイトルは255文字以内で入力してください。',

            // 本文のエラーメッセージ
            'article_contents.required' => '本文を入力してください。',
        ];
    }
}