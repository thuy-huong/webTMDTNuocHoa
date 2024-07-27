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
        Schema::create('sanPham', function (Blueprint $table) {
            $table->increments('maSanPham');
            $table->string('anhSanPham');
            $table->string('tenSanPham');
            $table->text('mota');
            $table->string('gia');
            $table->integer('thuonghieu');
            $table->integer('soluong');
            $table->integer('danhmuc');
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
        Schema::dropIfExists('sanPham');
    }
};
