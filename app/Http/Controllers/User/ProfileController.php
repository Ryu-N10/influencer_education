<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
// ▼追加：先ほど作った警備員（フォームリクエスト）を呼び出します
use App\Http\Requests\ProfileUpdateRequest;

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
     * ▼変更：カッコの中を (Request $request) から (ProfileUpdateRequest $request) に変えました。
     * これだけで、この処理が始まる前に自動的に警備員がチェックを行ってくれるようになります。
     */
    public function updateProfile(ProfileUpdateRequest $request)
    {
        $this->forceLoginIfNeed();

        // ※ここに書いてあった $request->validate([...]) のルールは、
        // ProfileUpdateRequest の中にお引越ししたので丸ごと削除しました。

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
        $this->forceLoginIfNeed();
        return view('user.password_edit');
    }

    /**
     * パスワードを更新する
     */
    public function updatePassword(Request $request)
    {
        $this->forceLoginIfNeed();

        $request->validate([
            'old_password' => ['required', 'string', 'min:8'],
            'new_password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = Auth::user();

        if (!Hash::check($request->old_password, $user->password)) {
            return back()->withErrors(['old_password' => '現在のパスワードが正しくありません。']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('user.show.password.edit')->with('status', 'パスワードを変更しました！');
    }
}