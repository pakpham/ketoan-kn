<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SanPham extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('san_pham', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ten',250)->unique();
            $table->string('ghi_chu')->nullable();
            $table->integer('gia_nhap_vao');
            $table->integer('gia_xuat_ra');
            //$table->integer('id_loai_san_pham')->references('id')->on('loai_san_pham');
            $table->integer('id_don_vi')->references('id')->on('don_vi');
            $table->integer('id_user')->references('id')->on('user');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('san_pham');
    }
}
