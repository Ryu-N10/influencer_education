<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasswordUpdateRequest extends FormRequest
{
    /**
     * このリクエストを許可するかどうか
     */
    public function authorize()
    {
        return true;
    }

    /**
     * 入力チェックのルール（必須・8〜255文字・半角英数字・一致確認）
     */
    public function rules()
    {
        // 「新パスワード確認」の基本ルール
        $confirmRules = ['required', 'string', 'min:8', 'max:255', 'regex:/^[a-zA-Z0-9]+$/'];

        // 「新パスワード」に何か入力されているときだけ、一致チェック（same）を追加する
        if ($this->filled('new_password')) {
            $confirmRules[] = 'same:new_password';
        }

        return [
            'old_password'              => ['required', 'string', 'min:8', 'max:255', 'regex:/^[a-zA-Z0-9]+$/'],
            'new_password'              => ['required', 'string', 'min:8', 'max:255', 'regex:/^[a-zA-Z0-9]+$/'],
            'new_password_confirmation' => $confirmRules,
        ];
    }

    /**
     * エラーが発生したときの日本語メッセージ（詳細設計書・テスト仕様書と一致）
     */
    public function messages()
    {
        return [
            // 旧パスワード
            'old_password.required'              => '必須項目です。',
            'old_password.min'                   => '8文字以上で入力してください。',
            'old_password.max'                   => '255文字以内で入力してください。',
            'old_password.regex'                 => '半角英数字で入力してください。',

            // 新パスワード
            'new_password.required'              => '必須項目です。',
            'new_password.min'                   => '8文字以上で入力してください。',
            'new_password.max'                   => '255文字以内で入力してください。',
            'new_password.regex'                 => '半角英数字で入力してください。',

            // 新パスワード確認
            'new_password_confirmation.required' => '必須項目です。',
            'new_password_confirmation.min'      => '8文字以上で入力してください。',
            'new_password_confirmation.max'      => '255文字以内で入力してください。',
            'new_password_confirmation.regex'    => '半角英数字で入力してください。',
            'new_password_confirmation.same'     => '新パスワードと一致していません。',
        ];
    }
}