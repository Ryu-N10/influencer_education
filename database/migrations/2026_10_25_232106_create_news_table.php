<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('news', function (Blueprint $table) {
        $table->id();
        $table->string('title');       // お知らせのタイトル
        $table->text('content');       // お知らせ本文
        $table->timestamp('published_at')->nullable(); // 公開日時など
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
};
