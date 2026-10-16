<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
    /**
     * 新規会員登録画面を表示する
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * 登録処理を実行する
     */
    public function store(RegisterRequest $request)
    {
        // 1. バリデーション済みのデータを取得する
        $validated = $request->validated();

        // 2. データベース保存処理をモデルに任せる
        $user = User::createUser($validated);

        // 3. 登録完了後のリダイレクト先
        return redirect()->route('schedule.index')->with('success', '会員登録が完了しました！');
    }
}