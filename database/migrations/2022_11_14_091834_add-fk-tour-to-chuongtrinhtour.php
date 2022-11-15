<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFkTourToChuongtrinhtour extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('chuongtrinhtour', function (Blueprint $table) {
            $table->foreign('id_tour')->references('id')->on('tour')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('chuongtrinhtour', function (Blueprint $table) {
            //
        });
    }
}