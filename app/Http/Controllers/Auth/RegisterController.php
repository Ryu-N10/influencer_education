<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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
    public function store(Request $request)
    {
        // 1. バリデーション（入力内容のチェック）
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'kana' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'same:password_confirmation'],
        ]);

        // 2. データベースにユーザーを保存
        $user = User::create([
            'name' => $validated['name'],
            'kana' => $validated['kana'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        // 3. 登録完了後のリダイレクト先
        return redirect()->route('schedule.index')->with('success', '会員登録が完了しました！');
    }
}