<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDeletedAtToShowroomProductsTable extends Migration
{
    public function up()
    {
        Schema::table('showroom_products', function (Blueprint $table) {
            $table->softDeletes(); // Thêm cột deleted_at
        });
    }

    public function down()
    {
        Schema::table('showroom_products', function (Blueprint $table) {
            $table->dropSoftDeletes(); // Xóa cột deleted_at khi rollback
        });
    }
}
