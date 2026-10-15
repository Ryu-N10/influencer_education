<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>管理画面</title>
    {{-- Bootstrap（デザインを整えるためのツール）を読み込む --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .admin-header {
            background-color: #4df0ff;
            padding: 15px 0;
        }
        .header-btn {
            background-color: #6c757d;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 5px;
            margin-right: 10px;
            text-decoration: none;
        }
        .header-btn:hover {
            color: white;
            opacity: 0.8;
        }
    </style>
</head>
<body>
    {{-- 共通ヘッダー --}}
    <header class="admin-header">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <div>
                <a href="#" class="header-btn">授業管理</a>
                <a href="#" class="header-btn">お知らせ管理</a>
                <a href="#" class="header-btn">バナー管理</a>
            </div>
            <div>
                <a href="#" class="text-white text-decoration-none fs-5 me-3">ログアウト</a>
            </div>
        </div>
    </header>

    {{-- 各画面の中身がここに入ります --}}
    <main>
        @yield('content')
    </main>

</body>
</html>