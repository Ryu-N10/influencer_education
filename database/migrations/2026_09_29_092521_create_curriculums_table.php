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
        Schema::create('curriculums', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255)->comment('カリキュラムタイトル');
            $table->string('thumbnail', 255)->nullable()->comment('カリキュラムサムネイル');
            $table->longText('description')->nullable()->comment('カリキュラム説明文');
            $table->mediumText('video_url')->nullable()->comment('動画url');
            $table->tinyInteger('alway_delivery_flg')->default(0)->comment('常時公開フラグ ON:1,OFF:0');

            $table->foreignId('grade_id')
                  ->comment('クラスID(gradesテーブルのidと紐づく)')
                  ->constrained('grades')
                  ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
      * @return void
     */
    public function down()
    {
        Schema::dropIfExists('curriculums');
    }
}; 
   