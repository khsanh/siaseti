<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonitoringsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monitoring', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_detail_aset')->constrained('detail_aset');
            $table->date("tanggal_monitoring")->nullable();
            $table->enum('kondisi', ['baik', 'rusak', 'bongkar', 'tidak_terpakai', 'tidak_teridentifikasi']);
            $table->string("deskripsi_aset")->nullable();
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
        Schema::dropIfExists('monitoring');
    }
}
