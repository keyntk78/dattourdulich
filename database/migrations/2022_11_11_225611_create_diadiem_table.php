<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiadiemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diadiem', function (Blueprint $table) {
            $table->id();
            $table->string('diem_den');
            $table->text('mo_ta')->nullable();
            $table->unsignedBigInteger('id_tinh');
            $table->timestamps();

            $table->foreign('id_tinh')->references('id_tinh')->on('tinh')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('diadiem');
    }
}