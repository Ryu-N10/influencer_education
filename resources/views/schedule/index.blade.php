<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>受講生時間割一覧</title>
    <!-- LaravelのVite機能で app.css を読み込む -->
    @vite(['resources/css/app.css'])
</head>
<body>

    <!-- ヘッダー -->
    <header>
        <div class="header-nav">
            <a href="{{ route('schedule.index') }}" class="header-btn">時間割</a>
            <a href="#" class="header-btn">授業進捗</a>
            <a href="#" class="header-btn">プロフィール設定</a>
        </div>
        
        <!-- ログアウトと縦3つの点アイコンをまとめるエリア -->
<div style="display: flex; align-items: center; gap: 8px; position: relative;">
    <!-- ▼ ログアウトの文字色を黒に指定 (color: #000;) -->
    <a href="#" class="header-logout" style="color: #000; text-decoration: none;">ログアウト</a>
    
    <!-- ▼ 縦3つの点アイコンの文字色を黒に指定 (color: #000;) -->
    <button type="button" id="menuButton" class="menu-dots-btn" aria-label="メニューを開く" style="background: transparent; border: none; color: #000; font-size: 18px; cursor: pointer; padding: 4px; line-height: 1;">
        &#8942;
    </button>

    <!-- ▼ クリックしたときに表示されるドロップダウンメニュー -->
    <div id="dropdownMenu" class="dropdown-menu" style="display: none; position: absolute; top: 100%; right: 0; background: #fff; border: 1px solid #ccc; border-radius: 4px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); min-width: 120px; z-index: 100;">
        <a href="#" style="display: block; padding: 8px 12px; color: #333; text-decoration: none; font-size: 14px;">設定</a>
        <a href="#" style="display: block; padding: 8px 12px; color: #333; text-decoration: none; font-size: 14px;">ヘルプ</a>
        <a href="#" style="display: block; padding: 8px 12px; color: #333; text-decoration: none; font-size: 14px;">アカウント情報</a>
    </div>
</div>
    </header>

    <!-- メインコンテンツ -->
    <div class="container">
        
       <!-- ★ ヘッダー下の部分（戻るリンク ＆ 月切り替え ＆ 現在の学年バッジ） -->
        <div class="sub-header-bar">
            <a href="#" class="back-link">&larr;戻る</a>
            
            <div style="display: flex; align-items: center; gap: 20px;">
                <!-- 月の切り替え部分 -->
                <div class="month-selector">
                    <a href="#">&#9664;</a>
                    <span>2026年7月スケジュール</span>
                    <a href="#">&#9654;</a>
                </div>

                <!-- 今開いている学年を表示するバッジ -->
                @php
                    $currentGrade = $grades->firstWhere('id', $gradeId);
                    $isHighSchool = $currentGrade && str_contains($currentGrade->name, '高校');
                @endphp

                @if($currentGrade)
                    <span class="current-grade-badge {{ $isHighSchool ? 'high-school-badge' : '' }}">
                        {{ $currentGrade->name }}
                    </span>
                @endif
            </div>
        </div>

        <div class="main-layout">
            <!-- 左側：学年ボタンのリスト -->
            <div class="grade-sidebar">
                @foreach($grades as $grade)
                    @php
                        $isHighSchool = str_contains($grade->name, '高校');
                    @endphp

                    <a href="{{ route('schedule.index', ['grade_id' => $grade->id]) }}" 
                       class="grade-btn {{ $isHighSchool ? 'high-school-btn' : '' }} {{ $gradeId == $grade->id ? 'active' : '' }}">
                        {{ $grade->name }}
                    </a>
                @endforeach
            </div>

            <!-- 右側：スケジュールカード一覧 -->
            <div class="schedule-container">
                @forelse($schedules as $schedule)
                    <div class="schedule-card">
                        <!-- サムネイル画像 -->
                        @if(!empty($schedule->thumbnail))
                          <img src="{{ asset('storage/' . $schedule->thumbnail) }}" alt="サムネイル">
                        @else
                          <img src="https://via.placeholder.com/240x140?text=No+Image" alt="No Image">
                        @endif

                        <!-- 授業タイトル -->
                        <h3>{{ $schedule->title }}</h3>

                        <!-- 開講日時一覧 -->
                        <ul>
                            @foreach($schedule->deliveryTimes as $deliveryTime)
                                <li>{{ $deliveryTime->start_at }}</li>
                            @endforeach
                        </ul>
                    </div>
                @empty
                    <p>該当するスケジュールはありません。</p>
                @endforelse
            </div>
        </div>
    </div>

    <!-- ▼ メニューを開閉するためのJavaScript -->
    <script>
        const menuButton = document.getElementById('menuButton');
        const dropdownMenu = document.getElementById('dropdownMenu');

        menuButton.addEventListener('click', function(e) {
            e.stopPropagation(); // 画面全体のクリックイベントに伝わるのを防ぐ
            if (dropdownMenu.style.display === 'none') {
                dropdownMenu.style.display = 'block';
            } else {
                dropdownMenu.style.display = 'none';
            }
        });

        // メニューが開いているときに外側をクリックしたら閉じる
        document.addEventListener('click', function() {
            dropdownMenu.style.display = 'none';
        });
    </script>
</body>
</html>