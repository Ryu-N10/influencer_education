<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurriculumProgress extends Model
{
    use HasFactory;

    // テーブル名を明示的に指定
    protected $table = 'curriculum_progress';

    protected $fillable = [
        'curriculums_id',
        'users_id',
        'clear_flg',
    ];
}