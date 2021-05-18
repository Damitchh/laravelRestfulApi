<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBestproductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bestproducts', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('kode');
            $table->string('nama');
            $table->double('harga');
            $table->string('gambar');
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
        Schema::dropIfExists('bestproducts');
    }
}