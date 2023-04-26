<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeritaAcarasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('berita_acara', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_memo');
            $table->foreign('id_memo')->references('id')->on('memo');
            $table->string("kode_berita_acara", 25)->nullable();
            $table->date("tanggal_berita_acara")->nullable();
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
        Schema::dropIfExists('berita_acara');
    }
}
