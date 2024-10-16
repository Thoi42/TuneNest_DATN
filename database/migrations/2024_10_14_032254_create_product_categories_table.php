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
        Schema::create('product_categories', function (Blueprint $table) {
            $table->id('id'); 
            $table->string('image', 225)->nullable(); // URL ảnh danh mục
            $table->text('summary')->nullable(); // tóm tắt danh mục sản phẩm
            $table->tinyInteger('publish')->default(1); 
            $table->integer('parent_id'); 
            $table->tinyInteger('level')->details(1);
            $table->text('description')->nullable(); 
            $table->timestamp('deleted_at')->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_categories');
    }
};
