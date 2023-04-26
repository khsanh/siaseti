<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('memo', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('penerima');
            $table->foreign('penerima')->references('id_user')->on('users');
            $table->unsignedBigInteger('pengirim');
            $table->foreign('pengirim')->references('id_user')->on('users');
            $table->string("kode_memo", 25)->nullable();
            $table->date("tanggal_memo")->nullable();
            $table->string("perihal", 50)->nullable();
            $table->string("deskripsi")->nullable();
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
        Schema::dropIfExists('memo');
    }
}
