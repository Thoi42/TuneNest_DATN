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
            $table->id();  // Tạo cột 'id'
            $table->string('name', 125);  // Tên danh mục
            $table->string('image', 225)->nullable();  // URL ảnh danh mục
            $table->tinyInteger('publish')->default(2);  // Trạng thái xuất bản
            $table->tinyInteger('level')->default(1);  // Cấp độ danh mục (Cần sửa lại chi tiết `details(1)` thành `default(1)`)
            $table->integer('parent_id')->nullable();  // ID danh mục cha
            $table->text('description')->nullable();  // Mô tả danh mục
            $table->string('slug', 225)->nullable()->unique();  // Slug danh mục
            $table->timestamps();  // Timestamps (created_at, updated_at)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_categories');  // Xóa bảng khi rollback
    }
};
