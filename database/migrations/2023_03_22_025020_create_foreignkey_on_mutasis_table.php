<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignkeyOnMutasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mutasi', function (Blueprint $table) {
            $table->foreign("id_berita_acara")->references('id')->on('berita_acara');
            $table->foreign("id_divisi_lama")->references('id')->on('divisi');
            $table->foreign("penanggung_jawab_lama")->references('id')->on('penanggung_jawab');
            $table->foreign("lokasi_lama")->references('id')->on('lokasi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mutasi', function (Blueprint $table) {
            $table->dropForeign(['id_berita_acara']);
            $table->dropForeign(['id_divisi_lama']);
            $table->dropForeign(['penanggung_jawab_lama']);
            $table->dropForeign(['lokasi_lama']);
            $table->dropForeign(['id_detail_aset']);
        });
    }
}
