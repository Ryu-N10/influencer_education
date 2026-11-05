@extends('layouts.app') {{/* 共通レイアウトがあれば合わせて変更してください */}}

@section('content')
<div class="max-w-4xl mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">バナー新規登録</h1>

    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>・{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.banners.store') }}" method="POST" enctype="multipart/form-data" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="title">バナー名（管理用）</label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="title" type="text" name="title" value="{{ old('title') }}" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="image">バナー画像</label>
            <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" id="image" type="file" name="image" required>
            <p class="text-xs text-gray-500 mt-1">PNG, JPG, WEBP (最大 2MB)</p>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="link_url">リンク先URL</label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="link_url" type="url" name="link_url" value="{{ old('link_url') }}" placeholder="https://example.com">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="position">表示位置</label>
            <select class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="position" name="position">
                <option value="top">トップページ上部</option>
                <option value="sidebar">サイドバー</option>
            </select>
        </div>

        <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2" for="start_at">掲載開始日時</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="start_at" type="datetime-local" name="start_at" value="{{ old('start_at') }}">
            </div>
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2" for="end_at">掲載終了日時</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="end_at" type="datetime-local" name="end_at" value="{{ old('end_at') }}">
            </div>
        </div>

        <div class="mb-4 flex items-center">
            <input type="checkbox" id="is_active" name="is_active" value="1" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" checked>
            <label for="is_active" class="ml-2 block text-sm text-gray-900 font-bold">有効にする（サイトに表示する）</label>
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="sort_order">表示順（数値が小さいほど上）</label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="sort_order" type="number" name="sort_order" value="{{ old('sort_order', 0) }}">
        </div>

        <div class="flex items-center justify-between">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                登録する
            </button>
            <a href="{{ route('admin.banners.index') }}" class="text-gray-600 hover:text-gray-800 text-sm font-bold">キャンセル</a>
        </div>
    </form>
</div>
@endsection