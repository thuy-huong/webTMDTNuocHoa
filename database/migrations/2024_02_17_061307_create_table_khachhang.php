<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('khachhang', function (Blueprint $table) {
            $table->increments('maKhachHang');
            $table->string('tenKhachHang');
            $table->string('diachi');
            $table->string('sodienthoai');
            $table->string('email');
            $table->string('taikhoan');
            $table->string('matkhau');
            $table->integer('trangthai');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('khachhang');
    }
};
