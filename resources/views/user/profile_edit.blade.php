{{-- resources/views/user/profile_edit.blade.php --}}
@extends('user.layouts.app')

@section('content')
<div class="container mx-auto p-4 max-w-lg">
    <h1 class="text-2xl font-bold mb-6">プロフィール設定</h1>

    {{-- 更新成功メッセージ --}}
    @if (session('status'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('status') }}
        </div>
    @endif

    {{-- 画像を送るため enctype="multipart/form-data" が必須 --}}
    <form action="{{ route('user.update.profile') }}" method="POST" enctype="multipart/form-data" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf

        {{-- プロフィール画像 --}}
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">現在の画像</label>
            @if($user->profile_image)
                <img src="{{ asset('storage/images/profile/' . $user->profile_image) }}" alt="プロフィール画像" class="w-24 h-24 rounded-full object-cover mb-2">
            @else
                <p class="text-gray-500 mb-2">画像は未設定です</p>
            @endif
            <input type="file" name="profile_image" class="block w-full text-sm text-gray-500">
            @error('profile_image') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
        </div>

        {{-- ユーザー名 --}}
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">お名前</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none" required>
            @error('name') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
        </div>

        {{-- フリガナ --}}
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">フリガナ</label>
            <input type="text" name="name_kana" value="{{ old('name_kana', $user->name_kana) }}" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none" required>
            @error('name_kana') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
        </div>

        {{-- メールアドレス --}}
        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2">メールアドレス</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none" required>
            @error('email') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
        </div>

        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none">
                更新する
            </button>
            <a href="{{ route('user.show.password.edit') }}" class="text-sm text-blue-500 hover:underline">パスワード変更はこちら</a>
        </div>
    </form>
</div>
@endsection