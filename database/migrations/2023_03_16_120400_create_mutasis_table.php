<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMutasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mutasi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_detail_aset')->constrained('detail_aset');
            $table->unsignedBigInteger('id_berita_acara')->nullable();
            $table->unsignedBigInteger('lokasi_lama')->nullable();
            $table->unsignedBigInteger('penanggung_jawab_lama')->nullable();
            $table->unsignedBigInteger('id_divisi_lama')->nullable();
            $table->date("tanggal_mutasi")->nullable();
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
        Schema::dropIfExists('mutasi');
    }
}
