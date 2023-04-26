<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataSertifikasi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_sertifikasi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pegawai');
            $table->foreign("id_pegawai")->references('id')->on('pegawai');
            $table->string('nama_sertifikasi', 50)->nullable();
            $table->string('jenis_sertifikasi', 50)->nullable();
            $table->string('bidang_sertifikasi', 50)->nullable();
            $table->string('penyelenggara', 50)->nullable();
            $table->string('lokasi_sertifikasi', 80)->nullable();
            $table->date('waktu_mulai_pelaksanaan')->nullable();
            $table->date('waktu_selesai_pelaksanaan')->nullable();
            $table->date('tanggal_sertifikat_diterbitkan')->nullable();
            $table->date('masa_berlaku_sampai_dengan')->nullable();
            $table->string('dokumen_data_sertifikasi')->nullable();
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
        Schema::dropIfExists('data_sertifikasi');
    }
}
