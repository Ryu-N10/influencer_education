<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curriculum extends Model
{
    use HasFactory;

    protected $table = 'curriculums';

    protected $fillable = [
        'title',
        'thumbnail',
        'description',
        'video_url',
        'alway_delivery_flg',
        'grade_id',
    ];

    /**
     * この授業の進捗状況（誰がクリアしたか）との繋がり
     */
    public function progresses()
    {
        return $this->hasMany(CurriculumProgress::class, 'curriculums_id');
    }
    
    /**
     * どの学年の授業かという繋がり
     */
    public function grade()
    {
        return $this->belongsTo(Grade::class, 'grade_id');
    }
}