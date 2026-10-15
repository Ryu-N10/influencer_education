@extends('admin.layouts.app')

@section('content')
<div class="container mt-4">
    {{-- 戻るリンク --}}
    <div class="mb-2">
        <a href="{{ route('admin.show.top') }}" class="text-dark text-decoration-none">
            &larr;戻る
        </a>
    </div>

    <h2 class="mb-4">お知らせ一覧</h2>

    {{-- 削除成功時のメッセージ表示 --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- 新規登録ボタン (今回はルートがないためダミーの#にしています) --}}
    <div class="mb-4">
        <a href="#" class="btn text-white" style="background-color: #17a2b8;">
            新規登録
        </a>
    </div>

    {{-- お知らせ一覧テーブル --}}
    <table class="table table-borderless align-middle">
        <thead>
            <tr>
                <th style="width: 25%; font-size: 1.2rem;">投稿日時</th>
                <th style="width: 50%; font-size: 1.2rem;">タイトル</th>
                <th style="width: 25%;"></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($articles as $article)
                <tr>
                    {{-- 投稿日時を 〇年〇月〇日 の形式で表示 --}}
                    <td class="fs-5">
                        {{ \Carbon\Carbon::parse($article->posted_date)->format('Y年n月j日') }}
                    </td>
                    <td class="fs-5">{{ $article->title }}</td>
                    <td class="text-end">
                        {{-- 変更するボタン --}}
                        <a href="{{ route('admin.show.article.edit', $article->id) }}" class="btn btn-sm text-white me-2" style="background-color: #17a2b8;">
                            変更する
                        </a>
                        
                        {{-- 削除ボタン (POST送信) --}}
                        <form action="{{ route('admin.article.delete', $article->id) }}" method="POST" class="d-inline" onsubmit="return confirm('本当にこのお知らせを削除してよろしいですか？');">
                            @csrf
                            <button type="submit" class="btn btn-sm text-white" style="background-color: #ff0000;">
                                削除
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center text-muted py-4">お知らせが登録されていません。</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{-- ページネーション（データが多い場合にページを分ける） --}}
    <div class="d-flex justify-content-center mt-4">
        {{ $articles->links() }}
    </div>
</div>
@endsection