<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>新規会員登録</title>
    @vite(['resources/css/app.css'])
    <style>
        /* 簡単な中央寄せやフォームのスタイル例 */
        body {
            font-family: sans-serif;
            color: #999;
            margin: 0;
            padding: 0;
        }
        .register-container {
            max-width: 500px;
            margin: 60px auto;
            padding: 20px;
        }
        .login-link-wrapper {
            text-align: right;
            padding: 20px;
        }
        .login-link-wrapper a {
            color: #666;
            text-decoration: none;
            font-size: 14px;
        }
        /*新規ユーザー登録の文字をh1より大きくする*/
        .page-title {
            font-size: 40px; 
            font-weight: 400;
            text-align: center;
            margin-bottom: 40px;
            color: #999;
　　　　　}

        .form-group {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        .form-group label {
            width: 120px;
            text-align: right;
            margin-right: 20px;
            color: #999;
            font-size: 14px;
        }
        .form-group input {
            flex: 1;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }
    </style>
</head>
<body>

    <!-- 右上のログインリンク -->
    <div class="login-link-wrapper">
        <a href="#">ログインはこちら</a>
    </div>

    <div class="register-container">
        <h1 class="page-title">新規会員登録</h1>

        <form action="{{ route('register') }}" method="POST">
            @csrf

            <!-- ユーザーネーム -->
            <div class="form-group">
                <label for="name">ユーザーネーム</label>
                <input type="text" id="name" name="name" required>
            </div>

            <!-- カナ -->
            <div class="form-group">
                <label for="kana">カナ</label>
                <input type="text" id="kana" name="kana" required>
            </div>

            <!-- メールアドレス -->
            <div class="form-group">
                <label for="email">メールアドレス</label>
                <input type="email" id="email" name="email" required>
            </div>

            <!-- パスワード -->
            <div class="form-group">
                <label for="password">パスワード</label>
                <input type="password" id="password" name="password" required>
            </div>

            <!-- パスワード確認 -->
            <div class="form-group">
                <label for="password_confirmation">パスワード確認</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required>
            </div>

            <!-- ▼ 登録ボタンを追加 -->
            <div style="text-align: center; margin-top: 30px;">
                <button type="submit" style="padding: 12px 30px; background-color: #f97316; color: #fff; border: none; border-radius: 4px; font-size: 16px; cursor: pointer;">
                    登録する
                </button>
            </div>
        </form>
    </div>

</body>
</html>