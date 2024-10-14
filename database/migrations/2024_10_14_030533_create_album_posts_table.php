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
        Schema::create('album_posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('post_id'); // id post 
            // định nghĩa khóa ngoại
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
            $table->string('path', 225);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('album_posts');
    }
};
