<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Requests\PasswordUpdateRequest;

class ProfileController extends Controller
{
    /**
     * 【開発用】誰もログインしていなければ、強制的に1番目のユーザーでログインする処理
     */
    private function forceLoginIfNeed()
    {
        $user = Auth::user();
        if (!$user) {
            $user = User::first();
            if (!$user) {
                dd('【開発用エラー】データベースの users テーブルにユーザーがいません。phpMyAdminから登録してください。');
            }
            Auth::login($user);
        }
        return Auth::user();
    }

    /**
     * プロフィール設定画面を表示する
     */
    public function showProfileForm()
    {
        $user = $this->forceLoginIfNeed();
        return view('user.profile_edit', compact('user'));
    }

    /**
     * プロフィールを更新する
     */
    public function updateProfile(ProfileUpdateRequest $request)
    {
        $this->forceLoginIfNeed();

        $user = Auth::user();
        $imageName = null;

        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $imageName = $image->getClientOriginalName();
            $image->storeAs('public/images/profile', $imageName);
        }

        // DBの更新処理はモデルにお願いする
        $user->updateProfileData(
            $request->name,
            $request->name_kana,
            $request->email,
            $imageName
        );

        return redirect()->route('user.show.profile')->with('status', 'プロフィールを更新しました！');
    }

    /**
     * パスワード変更画面を表示する
     */
    public function showPasswordFrom()
    {
        // ログインしていない場合はログイン画面へリダイレクト（No.18のテスト対応）
        if (!Auth::check()) {
            return redirect()->route('user.show.login');
        }

        return view('user.password_edit');
    }

    /**
     * パスワードを更新する
     */
    public function updatePassword(PasswordUpdateRequest $request)
    {
        // ログインしていない場合はログイン画面へリダイレクト
        if (!Auth::check()) {
            return redirect()->route('user.show.login');
        }

        $user = Auth::user();

        // 入力された旧パスワードが現在のパスワードと一致するか確認
        if (!Hash::check($request->old_password, $user->password)) {
            return back()->withErrors(['old_password' => '現在のパスワードが正しくありません。']);
        }

        // 新しいパスワードを暗号化（ハッシュ化）して保存
        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('user.show.password.edit')->with('status', 'パスワードを変更しました！');
    }
}