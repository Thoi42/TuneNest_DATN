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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('publish')->default(2);
            $table->string('title', 255);
            $table->text('content')->nullable();
            $table->string('image', 225)->nullable();
            $table->text('description')->nullable();
            $table->string('slug', 255)->unique();
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
            
            $table->unsignedBigInteger('post_category_id')->nullable();
            $table->unsignedBigInteger('user_id');
            
            $table->foreign('post_category_id')->references('id')->on('post_categories')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
