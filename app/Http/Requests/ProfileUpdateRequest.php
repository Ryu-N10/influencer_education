<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * この機能を利用できる権限があるかどうかの判定
     */
    public function authorize()
    {
        // 今回は誰でもプロフィール更新ができる前提なので true（許可）にします
        return true;
    }

    /**
     * 入力されたデータに対するチェックルール（バリデーション）
     */
    public function rules()
    {
        // コントローラーに書いてあったルールをここにお引越しさせます
        return [
            'name' => 'required|string|max:255',
            'name_kana' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
}