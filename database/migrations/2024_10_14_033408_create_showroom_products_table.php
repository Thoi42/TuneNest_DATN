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
        Schema::create('showroom_products', function (Blueprint $table) {
            $table->unsignedBigInteger('showroom_id'); // mã showroom, PK
            $table->unsignedBigInteger('product_id'); // mã product, PK
            $table->integer('stock'); // số lượng sản phẩm trong cửa hàng chi nhánh
            
            // Thiết lập primary key là cặp showroom_id và product_id
            $table->primary(['showroom_id', 'product_id']);
            
            // Thiết lập khóa ngoại
            $table->foreign('showroom_id')->references('id')->on('showrooms')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('showroom_products');
    }
};
