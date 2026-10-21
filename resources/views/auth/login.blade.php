<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white">
    <div class="relative flex flex-col items-center justify-center min-h-screen">
        
        <!-- 右上の新規会員登録リンク -->
        <div class="absolute top-6 right-8">
            <a href="{{ route('register') }}" class="text-gray-400 hover:text-gray-600 text-sm md:text-base" style="font-family: 'Yu Gothic', YuGothic, 'Meiryo', sans-serif;">新規会員登録はこちら</a>
        </div>

        <!-- タイトル部分 -->
        <h1 class="text-3xl md:text-4xl text-gray-500 font-medium mb-16 tracking-wider flex items-center justify-center" style="font-family: 'Yu Gothic', YuGothic, 'Meiryo', sans-serif;">
            <span style="display: inline-block; transform: scaleX(1.4) scaleY(1.2); margin-right: 0.25em;">ロ</span><span style="display: inline-block; transform: scaleX(1.2) scaleY(1.05);">グイン</span>
        </h1>

        <!-- フォーム部分 -->
        <form action="{{ route('login') }}" method="POST" class="w-full max-w-lg px-6 space-y-6">
            @csrf

            <!-- メールアドレス -->
            <div class="flex flex-col space-y-1 md:flex-row md:items-center md:space-x-6 md:space-y-0">
                <label class="w-28 text-gray-500 text-sm md:text-base text-right" style="font-family: 'Yu Gothic', YuGothic, 'Meiryo', sans-serif;">メールアドレス</label>
                <div class="flex-1">
                    <input type="email" name="email" value="{{ old('email') }}" required class="w-full border border-gray-300 rounded px-3 py-2 bg-white focus:outline-none focus:border-gray-400">
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- パスワード -->
            <div class="flex flex-col space-y-1 md:flex-row md:items-center md:space-x-6 md:space-y-0">
                <label class="w-28 text-gray-500 text-sm md:text-base text-right" style="font-family: 'Yu Gothic', YuGothic, 'Meiryo', sans-serif;">パスワード</label>
                <div class="flex-1">
                    <input type="password" name="password" required class="w-full border border-gray-300 rounded px-3 py-2 bg-white focus:outline-none focus:border-gray-400">
                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- ログインボタン -->
            <div class="flex justify-center pt-8">
                <button type="submit" class="w-64 bg-orange-500 hover:bg-orange-600 text-white font-normal py-2.5 rounded shadow-sm transition-colors text-lg tracking-wider" style="font-family: 'Yu Gothic', YuGothic, 'Meiryo', sans-serif;">
                    ログイン
                </button>
            </div>
        </form>

    </div>
</body>
</html>