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
        Schema::create('customers', function (Blueprint $table) {
            $table->id('id'); 
            $table->unsignedBigInteger('loyalty_level_id')->default(1);
            $table->foreign('loyalty_level_id')->references('id')->on('loyalty_levels');
            $table->string('name', 125); 
            $table->string('email', 125)->unique(); // địa chỉ email, NOT NULL, UNIQUE
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->string('image', 225)->nullable(); 
            $table->string('phone', 20);
            $table->string('address', 255)->nullable();
            $table->tinyInteger('publish')->default(2);
            $table->timestamp('deleted_at')->nullable(); 
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
