<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LoginController extends Controller
{
    /**
     * ログイン画面を表示する
     */
    public function create(): View
    {
        return view('auth.login'); // ログイン画面のBladeファイル名を指定
    }

    /**
     * ログイン認証処理を実行する
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // フォームリクエストのバリデーション済みデータから認証情報を取得
        $credentials = $request->validated();

        // ログイン試行
        if (Auth::attempt($credentials)) {
            // セッションの固定化攻撃を防ぐためにセッションを再生成
            $request->session()->regenerate();

            // ログイン成功後のリダイレクト先（例: /schedule や /dashboard など）
            return redirect()->intended('/schedule');
        }

        // 認証に失敗した場合はエラーメッセージを添えてログイン画面に戻す
        return back()->withErrors([
            'email' => 'ログイン情報が登録されていません。',
        ])->onlyInput('email');
    }
}
