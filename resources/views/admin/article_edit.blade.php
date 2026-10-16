{{-- 共通のレイアウトファイルを読み込む --}}
@extends('admin.layouts.app')

@section('content')
<div class="container mx-auto p-4">
    {{-- 戻るリンク --}}
    <div class="mb-4">
        <a href="{{ route('admin.show.article.list') }}" class="text-blue-500 hover:underline">←戻る</a>
    </div>

    <h1 class="text-2xl font-bold mb-6">お知らせ変更</h1>

    {{-- エラーメッセージの表示 --}}
    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- フォームの開始 --}}
    <form action="{{ route('admin.update.article', $article->id) }}" method="POST">
        @csrf

        {{-- 投稿日時 --}}
        <div class="mb-6 flex items-center">
            <label for="posted_date" class="w-32 text-gray-700 font-bold">投稿日時</label>
            <input type="datetime-local" id="posted_date" name="posted_date" 
                   class="border border-gray-300 rounded p-2 w-full max-w-lg" 
                   value="{{ old('posted_date', date('Y-m-d\TH:i', strtotime($article->posted_date))) }}">
        </div>

        {{-- タイトル --}}
        <div class="mb-6 flex items-center">
            <label for="title" class="w-32 text-gray-700 font-bold">タイトル</label>
            <input type="text" id="title" name="title" 
                   class="border border-gray-300 rounded p-2 w-full max-w-lg" 
                   value="{{ old('title', $article->title) }}">
        </div>

        {{-- 本文 --}}
        <div class="mb-6 flex items-start">
            <label for="article_contents" class="w-32 text-gray-700 font-bold pt-2">本文</label>
            <textarea id="article_contents" name="article_contents" rows="6" 
                      class="border border-gray-300 rounded p-2 w-full max-w-lg">{{ old('article_contents', $article->article_contents) }}</textarea>
        </div>

        {{-- 登録ボタン --}}
        <div class="text-center mt-8">
            <button type="submit" class="bg-gray-600 text-white px-10 py-2 rounded hover:bg-gray-700">
                登録
            </button>
        </div>
    </form>
</div>
@endsection