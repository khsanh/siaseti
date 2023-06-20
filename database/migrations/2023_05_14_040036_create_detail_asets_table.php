<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailAsetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_aset', function (Blueprint $table) {
            $table->id();
            $table->string("nomor_aset", 12)->nullable();
            $table->string("kode_aset", 50)->unique()->nullable();
            $table->enum("kategori_aset", ['AT', 'EC', 'PJ']);
            $table->string("deskripsi_aset", 225)->nullable();
            $table->string("merek_aset", 20)->nullable();
            $table->string("tgl_kapitalisasi", 6)->nullable();
            $table->enum('kondisi', ['Baik', 'Rusak', 'Bongkar', 'Tidak_Terpakai', 'Tidak_Teridentifikasi']);
            $table->enum("status_aset", ['Aktif', 'Nonaktif']);
            $table->foreignId('id_lokasi')->constrained('lokasi');
            $table->foreignId('id_jenis_barang')->constrained('jenis_barang');
            $table->enum("asal_perusahaan", ['REKA', 'REKA-KOP', 'REKA-GIFT', 'REKA-HIB', 'REKA-INKA']);
            $table->string("bast", 225)->nullable();
            $table->string("sertifikat", 225)->nullable();
            $table->string("pic_aset", 50)->nullable();
            $table->string("nomor_kartu_aset", 20)->nullable();
            $table->string("foto_aset", 225)->nullable();
            $table->string("pj_edit", 50)->nullable();
            $table->date("tgl_edit")->nullable();
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
        Schema::dropIfExists('detail_aset');
    }
}
