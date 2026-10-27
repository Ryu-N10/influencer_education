{{-- resources/views/user/article.blade.php --}}
@extends('user.layouts.app') {{-- 共通のヘッダー（メニュー）が含まれるレイアウトを読み込む --}}

@section('content')
<div class="container" style="max-width: 800px; margin: 0 auto; padding: 20px;">
    
    {{-- ▼画面左上の「←戻る」リンク（チームの他の画面に合わせて青色に変更） --}}
    <div style="margin-bottom: 20px;">
        <a href="{{ route('user.show.top') }}" class="text-blue-500 hover:underline" style="color: #3b82f6; text-decoration: underline;">←戻る</a>
    </div>

    <div class="article-details">
        {{-- $articleにデータが存在するか確認 --}}
        @if($article)
            <h1>{{ $article->title }}</h1>
            <p style="color: gray;">投稿日時：{{ $article->posted_date }}</p>
            
            <hr>
            
            <div style="margin-top: 20px;">
                {{-- 本文を表示（改行を反映させる処理） --}}
                {!! nl2br(e($article->article_contents)) !!}
            </div>
        @else
            {{-- データが存在しない場合の表示 --}}
            <p>指定されたお知らせはまだ登録されていません。</p>
        @endif
    </div>
</div>
@endsection