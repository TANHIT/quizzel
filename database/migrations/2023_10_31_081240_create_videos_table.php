<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->id('video_id'); // Cột khóa chính tự tăng
            $table->string('title'); // Tiêu đề của video
            $table->text('description')->nullable(); // Mô tả video (cho phép null)
            $table->string('youtube_url'); // Đường dẫn YouTube
            $table->text('content')->nullable();
            $table->timestamps(); // Cột thời gian tạo và cập nhật
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('videos');
    }
}
