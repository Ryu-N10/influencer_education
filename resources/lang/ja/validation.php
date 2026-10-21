<?php

return [
    'accepted'             => ':attribute を承認してください。',
    'active_url'           => ':attribute は有効なURLではありません。',
    'after'                => ':attribute には、:date より後の日付を指定してください。',
    'alpha'                => ':attribute にはアルファベットのみ使用できます。',
    'alpha_dash'           => ':attribute には英数字とハイフン、アンダースコアが使用できます。',
    'alpha_num'            => ':attribute には英数字が使用できます。',
    'array'                => ':attribute は配列を指定してください。',
    'confirmed'            => ':attribute が確認用と一致しません。',
    'email'                => ':attribute には有効なメールアドレスを指定してください。',
    'exists'               => '選択された :attribute は存在しません。',
    'min'                  => [
        'numeric' => ':attribute は :min 以上で指定してください。',
        'file'    => ':attribute は :min KB以上のファイルを指定してください。',
        'string'  => ':attribute は :min 文字以上で入力してください。',
        'array'   => ':attribute は :min 個以上指定してください。',
    ],
    'required'             => ':attribute は必須です。',
    'same'                 => ':attribute と :other が一致しません。',
    'string'               => ':attribute には文字列を指定してください。',
    'unique'               => '指定の :attribute は既に使用されています。',

    /*
    |--------------------------------------------------------------------------
    | カスタムバリデーション属性名
    |--------------------------------------------------------------------------
    */
    'attributes' => [
        'name'                  => 'ユーザーネーム',
        'kana'                  => 'カナ',
        'email'                 => 'メールアドレス',
        'password'              => 'パスワード',
        'password_confirmation' => 'パスワード確認',
    ],
];