<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User; // Userモデルを使う場合
use Illuminate\Support\Facades\Hash; // パスワードをハッシュ化（暗号化）するため

class RegisterController extends Controller
{
    /**
     * 新規会員登録画面を表示する
     */
    public function create()
    {
        // 育成アプリの登録画面Bladeファイルのパスに合わせて指定してください
        // 例: resources/views/auth/register.blade.php の場合
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
            'password' => ['required', 'string', 'min:8', 'confirmed'], // password_confirmation との一致も自動チェック
        ]);

        // 2. データベースにユーザーを保存
        $user = User::create([
            'name' => $validated['name'],
            'kana' => $validated['kana'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']), // パスワードは必ずハッシュ化する
        ]);

        // 3. 登録完了後のリダイレクト先（例: 時間割画面やダッシュボードへ）
        return redirect()->route('schedule.index')->with('success', '会員登録が完了しました！');
    }
}