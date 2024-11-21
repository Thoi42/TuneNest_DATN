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
        Schema::create('comments', function (Blueprint $table) {
            $table->id(); // ID của bình luận
            $table->unsignedBigInteger('customer_id'); // ID của khách hàng
            $table->unsignedBigInteger('product_id');  // ID của sản phẩm
            $table->text('comment'); // Nội dung bình luận
            $table->tinyInteger('rating')->default(0); // Đánh giá sao, từ 1 đến 5 sao
            $table->timestamps(); // Thời gian tạo và cập nhật

            // Định nghĩa khóa ngoại
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};