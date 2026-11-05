<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>管理画面</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* 水色のヘッダー背景色 */
        .custom-header {
            background-color: #33e0f2;
        }
        /* 角丸のグレーのタブボタン風リンク */
        .header-btn {
            background-color: #6c757d;
            color: #ffffff !important;
            border-radius: 20px;
            padding: 6px 16px;
            text-decoration: none;
            font-size: 14px;
        }
        .header-btn:hover {
            background-color: #5a6268;
        }
        /* 現在地やアクティブなタブを強調したい場合用（必要に応じて） */
        .header-btn.active {
            background-color: #495057;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div id="app">
        <!-- ヘッダーここから -->
        <header class="custom-header py-3 px-4 mb-3">
            <div class="d-flex justify-content-between align-items-center">
                <!-- 左側のメニューボタン群 -->
                <div class="d-flex align-items-center gap-3">
                    <!-- 授業管理（必要に応じてリンク先を設定してください） -->
                    <a href="#" class="header-btn">授業管理</a>
                    
                    <!-- お知らせ管理（必要に応じてリンク先を設定してください） -->
                    <a href="#" class="header-btn">お知らせ管理</a>
                    
                    <!-- バナー管理 -->
                    <a href="{{ route('admin.banners.index') }}" class="header-btn active">バナー管理</a>
                </div>

                <!-- 右側のログアウト -->
                <div>
                    <!-- 認証機能のログアウト処理がある場合はformタグやルートに変更してください -->
                    <a href="#" class="text-white text-decoration-none fw-bold" 
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        ログアウト
                    </a>
                    <form id="logout-form" action="#" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </header>
        <!-- ヘッダーここまで -->

        <main class="container py-2">
            @yield('content')
        </main>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>