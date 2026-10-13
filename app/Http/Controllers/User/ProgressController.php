<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Grade;
use App\Models\User;

class ProgressController extends Controller
{
    /**
     * 授業進捗画面を表示する
     */
    public function showProgress()
    {
        // ログイン中のユーザー情報を取得
        $user = Auth::user();

        // 【開発用の一時的な代替案（強制ログイン）】
        if (!$user) {
            $user = User::first();
            
            if (!$user) {
                dd('データベースにユーザーがいません。phpMyAdminを確認してください。');
            }
            
            Auth::login($user);
        }

        // ユーザーの現在の学年情報を取得（リレーションを使用）
        $currentGrade = $user->grade;

        // 複雑なDB抽出処理を、Gradeモデルのローカルスコープにお任せする
        $grades = Grade::withUserProgress($user->id)->get();

        // 画面（ビュー）にデータを渡す
        return view('user.curriculum_progress', compact('user', 'currentGrade', 'grades'));
    }
}