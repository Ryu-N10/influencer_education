{{-- resources/views/user/password_edit.blade.php --}}
@extends('user.layouts.app')

@section('content')
<div class="container mx-auto p-4 max-w-lg">
    <div class="mb-4">
        {{-- 設計書に合わせてプロフィール設定画面へ戻る --}}
        <a href="{{ route('user.show.profile') }}" class="text-blue-500 hover:underline">←戻る</a>
    </div>

    <h1 class="text-2xl font-bold mb-6">パスワード変更</h1>

    {{-- パスワード変更が成功した時のメッセージ --}}
    @if (session('status'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('status') }}
        </div>
    @endif

    <form action="{{ route('user.update.password') }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" novalidate>
        @csrf

        {{-- 旧パスワード --}}
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="old_password">
                旧パスワード <span class="text-red-500">*</span>
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-1 leading-tight focus:outline-none focus:shadow-outline" 
                   id="old_password" name="old_password" type="password">
            @error('old_password')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        {{-- 新パスワード --}}
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="new_password">
                新パスワード <span class="text-red-500">*</span>
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-1 leading-tight focus:outline-none focus:shadow-outline" 
                   id="new_password" name="new_password" type="password">
            @error('new_password')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        {{-- 新パスワード確認 --}}
        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="new_password_confirmation">
                新パスワード確認 <span class="text-red-500">*</span>
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-1 leading-tight focus:outline-none focus:shadow-outline" 
                   id="new_password_confirmation" name="new_password_confirmation" type="password">
            @error('new_password_confirmation')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center justify-between">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                登録
            </button>
        </div>
    </form>
</div>
@endsection