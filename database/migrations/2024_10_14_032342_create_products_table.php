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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id')->nullable(); 
            $table->unsignedBigInteger('brand_id')->nullable(); 
            $table->string('name', 125);
            $table->string('image', 125)->nullable();
            $table->decimal('price', 12, 2);
            $table->decimal('price_sale', 12, 2)->nullable();
            $table->integer('view')->default(0);
            $table->text('short_description')->nullable();
            $table->text('description')->nullable();
            $table->tinyInteger('publish')->default(2);
            $table->timestamp('deleted_at')->nullable();
            $table->string('slug', 225)->nullable()->unique();
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('product_categories')->onDelete('cascade');
            $table->foreign('brand_id')->references('id')->on('brands');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
