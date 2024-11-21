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
        Schema::create('feedbacks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id'); // Id khách hàng Feedback
            $table->unsignedBigInteger('product_id'); // Id sản phẩm được Feedback
            $table->unsignedBigInteger('order_id'); // Id đơn hàng
            $table->decimal('rating', 2, 1)->default(0);
            $table->text('comment')->nullable();
            
            // Định nghĩa khóa ngoại
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('order_id')->references('id')->on('orders');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedbacks');
    }
};
