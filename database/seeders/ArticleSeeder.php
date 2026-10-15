<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 既存のデータをリセットしたい場合は以下のコメントアウトを外す
        // DB::table('articles')->truncate();

        DB::table('articles')->insert([
            [
                'title' => 'システムメンテナンスのお知らせ',
                'posted_date' => Carbon::now()->subDays(2),
                'article_contents' => '今週末の土曜日にシステムメンテナンスを実施いたします。ご迷惑をおかけしますが、ご協力をお願いいたします。',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => '新しいカリキュラムが追加されました',
                'posted_date' => Carbon::now()->subDay(),
                'article_contents' => '高校生向けの新しい数学のカリキュラムが追加されました。ぜひ学習を進めてください。',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => '授業内容更新についてのおしらせ',
                'posted_date' => Carbon::now(),
                'article_contents' => '一部の授業動画の内容を最新版にアップデートいたしました。変更点はマイページからご確認ください。',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}