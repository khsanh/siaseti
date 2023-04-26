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
            $table->string("kode_aset", 35)->unique()->nullable();
            $table->string("qr")->nullable();
            $table->string("serial_number,", 15)->nullable();
            $table->string("kategori_aset", 50)->nullable();
            $table->date("tahun_perolehan")->nullable();
            $table->string("asal_perusahaan", 50)->nullable();
            $table->enum('kondisi', ['baik', 'rusak', 'bongkar', 'tidak_terpakai', 'tidak_teridentifikasi']);
            $table->string("deskripsi_aset", 255)->nullable();
            $table->foreignId('id_lokasi')->constrained('lokasi');
            $table->foreignId('id_penanggung_jawab')->constrained('penanggung_jawab');
            $table->foreignId('id_data_barang')->constrained('data_barang');
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
