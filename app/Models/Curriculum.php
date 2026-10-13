<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DeliveryTime; // ← 1つだけに絞る

class Curriculum extends Model
{
    use HasFactory;

    protected $table = 'curriculums';
    protected $guarded = ['id'];

    /**
     * 開講日時とのリレーション（1対多）
     */
    public function deliveryTimes()
    {
        return $this->hasMany(DeliveryTime::class, 'curriculum_id');
    }
}