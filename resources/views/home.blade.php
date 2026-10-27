<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ホーム画面</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <!-- ヘッダー -->
    <header class="header">
        <nav class="nav-links">
            <a href="{{ route('schedule.index') }}" class="btn active">時間割</a>
            <a href="#" class="btn active">授業進捗</a>
            <a href="#" class="btn active">プロフィール設定</a>
        </nav>
        <div class="logout-container">
            <a href="#" class="logout-link">ログアウト</a>
        </div>
    </header>

    <!-- メインコンテンツ -->
    <main class="main-content">
        <!-- バナー画像エリア -->
        <div class="banner-section">
            <div class="banner-container">
                <div class="banner-placeholder">バナー画像</div>
            </div>

            <!-- ドットインジケーター -->
            <div class="banner-dots">
                <span class="dot active" data-index="0"></span>
                <span class="dot" data-index="1"></span>
                <span class="dot" data-index="2"></span>
                <span class="dot" data-index="3"></span>
            </div>
        </div>

        <!-- お知らせセクション -->
        <div class="news-section">
            <h2>お知らせ</h2>
            
            <div class="news-box">
                <ul>
                    @if(!empty($newsList) && count($newsList) > 0)
                        @foreach($newsList as $news)
                            <li>
                                @if($news->created_at)
                                    <span class="date">{{ $news->created_at->format('Y.m.d') }}</span>
                                @endif
                                <a href="#">{{ $news->title }}</a>
                            </li>
                        @endforeach
                    @else
                        <li>現在お知らせはありません。</li>
                    @endif
                </ul>
            </div><!-- /.news-box -->
            
        </div>
    </main>

</body>
</html>