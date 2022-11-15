<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChitiettourTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitiettour', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_tour');
            $table->unsignedBigInteger('id_user');
            $table->timestamp('ngay_di')->nullable();
            $table->timestamp('ngay_ve')->nullable();
            $table->tinyInteger('so_luong_con')->nullable();
            $table->text('ghi_chu')->nullable();
            $table->text('hinh_anh')->nullable();
            $table->timestamps();

            $table->foreign('id_tour')->references('id')->on('tour')->onDelete('cascade');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chitiettour');
    }
}