<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Grade;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // 1. まず学年（Grade）のデータを登録する
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

        // 2. その後に、学年IDを利用する CurriculumSeeder を呼び出す
        $this->call(CurriculumSeeder::class);
    }
}