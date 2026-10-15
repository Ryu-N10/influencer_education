<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    // 学年に紐づくカリキュラムのリレーション
    public function curriculums()
    {
        return $this->hasMany(Curriculum::class);
    }

    /**
     * 【ローカルスコープ】
     * 指定したユーザーの進捗情報だけを絞り込んで、カリキュラムと一緒に取得する処理
     * コントローラーからは Grade::withUserProgress($userId) として呼び出せます。
     */
    public function scopeWithUserProgress($query, $userId)
    {
        return $query->with(['curriculums' => function ($q) use ($userId) {
            $q->with(['progresses' => function ($progressQuery) use ($userId) {
                // 進捗テーブルから、指定されたユーザーのデータだけを取得
                $progressQuery->where('users_id', $userId);
            }]);
        }]);
    }
}