<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string('title');                     // 管理用バナー名
            $table->string('image_path');                // 画像の保存パス
            $table->string('link_url')->nullable();      // リンク先URL
            $table->string('position')->default('top');  // 表示位置（トップ、サイドバーなど）
            $table->dateTime('start_at')->nullable();    // 掲載開始日時
            $table->dateTime('end_at')->nullable();      // 掲載終了日時
            $table->boolean('is_active')->default(true); // 有効/無効フラグ
            $table->integer('sort_order')->default(0);   // 表示順
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banners');
    }
};
