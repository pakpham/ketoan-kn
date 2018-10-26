<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class XuatRa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('xuat_ra', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ten');
            $table->string('ghi_chu')->nullable();
            $table->integer('so_luong');
            $table->integer('gia');
            $table->integer('id_san_pham')->references('id')->on('san_pham');
            $table->integer('id_user')->references('id')->on('user');
            $table->boolean('thanh_toan'); //thanh toan hoan tat(1) ; con no(0)
            $table->integer('tra_truoc');
            $table->boolean('hang_hong');
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
        Schema::drop('xuat_ra');
    }
}
