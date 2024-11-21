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
            $table->string('name', 125); 
            $table->string('image', 225)->nullable(); // URL ảnh danh mục
            $table->tinyInteger('publish')->default(2); 
            $table->tinyInteger('level')->details(1);
            $table->integer('parent_id')->nullable(); 
            $table->text('description')->nullable(); 
            $table->string('slug', 225)->nullable()->unique();
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
