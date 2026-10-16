<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Grade;
use App\Models\Curriculum;
use App\Models\DeliveryTime;

class CurriculumSeeder extends Seeder
{
    public function run()
    {
        // 1. 小学校1年生のデータをデータベースから取得する
        $grade = Grade::where('name', '小学校1年生')->first();

        // 2. 取得した「小学校1年生」の ID を使ってカリキュラムを登録する
        $curriculum = Curriculum::create([
            'title' => '授業タイトル',
            'description' => 'PHPの基本的な文法や変数、制御構文について学びます。',
            'grade_id' => $grade ? $grade->id : 1, // 小学校1年生のIDを紐づける（見つからない場合は1）
            'thumbnail' => 'thumbnails/sample.png',
        ]);

        // 3. 紐づく開講日時を登録
        DeliveryTime::create([
            'curriculum_id' => $curriculum->id,
            'start_at' => '7月13日 14:00～15:00',
        ]);
        
        DeliveryTime::create([
            'curriculum_id' => $curriculum->id,
            'start_at' => '7月13日 14:00～15:00',
        ]);

        DeliveryTime::create([
            'curriculum_id' => $curriculum->id,
            'start_at' => '7月13日 14:00～15:00',
        ]);
        
        DeliveryTime::create([
            'curriculum_id' => $curriculum->id,
            'start_at' => '7月13日 14:00～15:00',
        ]);

        $curriculum = Curriculum::create([
            'title' => '授業タイトル',
            'description' => 'PHPの基本的な文法や変数、制御構文について学びます。',
            'grade_id' => $grade ? $grade->id : 1, 
            'thumbnail' => 'thumbnails/sample.png',
        ]);

        DeliveryTime::create([
            'curriculum_id' => $curriculum->id,
            'start_at' => '7月13日 14:00～15:00',
        ]);
        
        DeliveryTime::create([
            'curriculum_id' => $curriculum->id,
            'start_at' => '7月13日 14:00～15:00',
        ]);

        DeliveryTime::create([
            'curriculum_id' => $curriculum->id,
            'start_at' => '7月13日 14:00～15:00',
        ]);
        
        DeliveryTime::create([
            'curriculum_id' => $curriculum->id,
            'start_at' => '7月13日 14:00～15:00',
        ]);

        $curriculum = Curriculum::create([
            'title' => '授業タイトル',
            'description' => 'PHPの基本的な文法や変数、制御構文について学びます。',
            'grade_id' => $grade ? $grade->id : 1, 
            'thumbnail' => 'thumbnails/sample.png',
        ]);

        DeliveryTime::create([
            'curriculum_id' => $curriculum->id,
            'start_at' => '7月13日 14:00～15:00',
        ]);
        
        DeliveryTime::create([
            'curriculum_id' => $curriculum->id,
            'start_at' => '7月13日 14:00～15:00',
        ]);

        DeliveryTime::create([
            'curriculum_id' => $curriculum->id,
            'start_at' => '7月13日 14:00～15:00',
        ]);
        
        DeliveryTime::create([
            'curriculum_id' => $curriculum->id,
            'start_at' => '7月13日 14:00～15:00',
        ]);

        $curriculum = Curriculum::create([
            'title' => '授業タイトル',
            'description' => 'PHPの基本的な文法や変数、制御構文について学びます。',
            'grade_id' => $grade ? $grade->id : 1, 
            'thumbnail' => 'thumbnails/sample.png',
        ]);

        DeliveryTime::create([
            'curriculum_id' => $curriculum->id,
            'start_at' => '7月13日 14:00～15:00',
        ]);
        
        DeliveryTime::create([
            'curriculum_id' => $curriculum->id,
            'start_at' => '7月13日 14:00～15:00',
        ]);

        DeliveryTime::create([
            'curriculum_id' => $curriculum->id,
            'start_at' => '7月13日 14:00～15:00',
        ]);
        
        DeliveryTime::create([
            'curriculum_id' => $curriculum->id,
            'start_at' => '7月13日 14:00～15:00',
        ]);

        $curriculum = Curriculum::create([
            'title' => '授業タイトル',
            'description' => 'PHPの基本的な文法や変数、制御構文について学びます。',
            'grade_id' => $grade ? $grade->id : 1, 
            'thumbnail' => 'thumbnails/sample.png',
        ]);

        DeliveryTime::create([
            'curriculum_id' => $curriculum->id,
            'start_at' => '7月13日 14:00～15:00',
        ]);
        
        DeliveryTime::create([
            'curriculum_id' => $curriculum->id,
            'start_at' => '7月13日 14:00～15:00',
        ]);

        DeliveryTime::create([
            'curriculum_id' => $curriculum->id,
            'start_at' => '7月13日 14:00～15:00',
        ]);
        
        DeliveryTime::create([
            'curriculum_id' => $curriculum->id,
            'start_at' => '7月13日 14:00～15:00',
        ]);

        $curriculum = Curriculum::create([
            'title' => '授業タイトル',
            'description' => 'PHPの基本的な文法や変数、制御構文について学びます。',
            'grade_id' => $grade ? $grade->id : 1, 
            'thumbnail' => 'thumbnails/sample.png',
        ]);

        DeliveryTime::create([
            'curriculum_id' => $curriculum->id,
            'start_at' => '7月13日 14:00～15:00',
        ]);
        
        DeliveryTime::create([
            'curriculum_id' => $curriculum->id,
            'start_at' => '7月13日 14:00～15:00',
        ]);

        DeliveryTime::create([
            'curriculum_id' => $curriculum->id,
            'start_at' => '7月13日 14:00～15:00',
        ]);
        
        DeliveryTime::create([
            'curriculum_id' => $curriculum->id,
            'start_at' => '7月13日 14:00～15:00',
        ]);
    }
}
    
