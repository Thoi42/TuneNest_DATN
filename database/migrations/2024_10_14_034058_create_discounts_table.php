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
        Schema::create('discounts', function (Blueprint $table) {
            $table->id(); 
            $table->string('code')->unique(); 
            $table->decimal('discount_rate', 5, 2); 
            $table->decimal('max_value', 10, 2); 
            $table->date('start_date'); 
            $table->date('end_date'); 
            $table->integer('use_limit')->nullable(); // Giới hạn số lần sử dụng
            $table->integer('use_count')->default(0); // Số lần đã sử dụng
            $table->string('status')->default('active'); // Trạng thái
            $table->softDeletes(); // Thêm trường deleted_at
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discounts');
    }
};
