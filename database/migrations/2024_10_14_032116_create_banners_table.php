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
            $table->id('id'); 
            $table->string('image', 225); // url ảnh banner
            $table->tinyInteger('order')->nullable(); // thứ tự banner
            $table->tinyInteger('position')->nullable(); // vị trí trang xuất hiện
            $table->tinyInteger('publish')->default(1);
            $table->string('title', 50)->nullable();//tiêu đề chính
            $table->string('strong_title', 50)->nullable();//tiêu đề chính in đậm
            $table->text('description')->nullable(); // mô tả ngắn
            $table->timestamp('start_date')->nullable(); // thời gian bắt đầu
            $table->timestamp('start_end')->nullable(); // thời gian kết thúc
            $table->timestamp('deleted_at')->nullable();
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
