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

        Schema::create('orders', function (Blueprint $table) {
            $table->id(); 
            $table->unsignedBigInteger('customer_id'); 
            $table->unsignedBigInteger('discount_id')->nullable(); 
            $table->string('name', 125); 
            $table->string('email', 125); 
            $table->enum('status', ['chờ duyệt', 'đang giao', 'đã giao', 'bị lỗi', 'trả hàng', 'đang xử lý trả hàng', 'đã hoàn tiền', 'đã hủy'])->default('chờ duyệt');
            $table->text('customer_note')->nullable(); 
            $table->text('user_note')->nullable(); 
            $table->string('address', 125); 
            $table->string('phone', 20);
            $table->timestamps();
            $table->timestamp('delivered_at')->nullable();
            $table->timestamp('canceled_at')->nullable();
            $table->decimal('total', 12, 2)->default(0);

            // Khóa ngoại
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('discount_id')->references('id')->on('discounts')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
