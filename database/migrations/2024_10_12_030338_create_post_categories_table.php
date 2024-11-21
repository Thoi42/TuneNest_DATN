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
        Schema::create('post_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name', 125);
            $table->tinyInteger('publish')->default(2);
            $table->text('description')->nullable();
            $table->integer('parent_id')->default(0);
            $table->string('image', 225)->nullable();
            $table->datetime('deleted_at')->nullable();
            $table->tinyInteger('level')->details(1);
            $table->string('slug', 255)->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_categories');
    }
};
