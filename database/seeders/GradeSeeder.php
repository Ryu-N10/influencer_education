<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Grade; // ★ Gradeモデルを使えるようにする

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 小学校・中学校などの学年データを一括登録
        Grade::create(['name' => '小学校1年生']);
        Grade::create(['name' => '小学校2年生']);
        Grade::create(['name' => '小学校3年生']);
        Grade::create(['name' => '小学校4年生']);
        Grade::create(['name' => '小学校5年生']);
        Grade::create(['name' => '小学校6年生']);
        Grade::create(['name' => '中学校1年生']);
        Grade::create(['name' => '中学校2年生']);
        Grade::create(['name' => '中学校3年生']);
        Grade::create(['name' => '高校1年生']);
        Grade::create(['name' => '高校2年生']);
        Grade::create(['name' => '高校3年生']);
    }
}