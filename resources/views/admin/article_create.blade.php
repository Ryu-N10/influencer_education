{{-- resources/views/admin/article_create.blade.php --}}
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>仮ページ：お知らせ新規登録</title>
</head>
<body style="padding: 50px; text-align: center; font-family: sans-serif;">
    <h2 style="color: #333;">ここは仮の「お知らせ新規登録」画面です</h2>
    <p style="color: gray; margin-bottom: 40px;">※他の担当者が後で本物の画面を作成し、このファイルを書き換えます。</p>
    
    <div>
        {{-- お知らせ一覧画面へ戻るためのリンク --}}
        <a href="{{ route('admin.show.article.list') }}" style="padding: 10px 20px; background-color: #17a2b8; color: white; text-decoration: none; border-radius: 5px; font-weight: bold;">
            ← お知らせ一覧に戻る
        </a>
    </div>
</body>
</html>