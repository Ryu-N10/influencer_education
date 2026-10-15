<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>インフルエンサー教育システム</title>
    <!-- 【開発用】デザインを整えるためのTailwind CSSを読み込む -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white text-gray-800 font-sans">
    
    <!-- 仮の共通ヘッダー（担当3が作成するまでの代用品） -->
    <header class="bg-[#F07A5A] text-white p-4 flex justify-between items-center shadow-md">
        <div class="flex space-x-2">
            <a href="#" class="bg-[#13A3A8] px-5 py-2 rounded-full text-white font-bold text-sm shadow">時間割</a>
            <a href="{{ route('user.show.progress') }}" class="bg-[#13A3A8] px-5 py-2 rounded-full text-white font-bold text-sm shadow">授業進捗</a>
            <a href="#" class="bg-[#13A3A8] px-5 py-2 rounded-full text-white font-bold text-sm shadow">プロフィール設定</a>
        </div>
        <div>
            <a href="#" class="hover:underline font-bold text-sm">ログアウト</a>
        </div>
    </header>

    <!-- 各画面（進捗画面など）の中身がここに入ります -->
    <main>
        @yield('content')
    </main>
    
</body>
</html>