{{-- resources/views/user/article.blade.php --}}
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>お知らせ詳細</title>
</head>
<body>
    <div style="max-width: 800px; margin: 0 auto; padding: 20px;">
        {{-- $articleにデータが存在するか確認（エラー防止） --}}
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
        
        <div style="margin-top: 30px;">
            <a href="/user/top">トップに戻る</a>
        </div>
    </div>
</body>
</html>