<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesanans', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('nama');
            $table->integer('no_ktp');
            $table->unsignedBigInteger('keranjangs_id');
            $table->timestamps();
            $table
                ->foreign('keranjangs_id')
                ->references('id')
                ->on('keranjangs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pesanans');
    }
}