<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhieudatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phieudat', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_chitiet');
            $table->timestamp('ngay_dat')->nullable();
            $table->integer('so_luong_tre_em')->nullable();
            $table->integer('so_luong_nguoi_lon')->nullable();
            $table->integer('so_luong_dat')->nullable();
            $table->integer('trang_thai')->nullable();
            $table->timestamps();

             $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
             $table->foreign('id_chitiet')->references('id')->on('chitiettour')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('phieudat');
    }
}