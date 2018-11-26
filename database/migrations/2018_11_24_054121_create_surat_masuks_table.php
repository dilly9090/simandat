<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuratMasuksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_masuk', function (Blueprint $table) {
            $table->increments('id');
            $table->date('tgl_masuk')->nullable();
            $table->string('no_agenda')->nullable();
            $table->string('jenis')->nullable();
            $table->string('tujuan')->nullable();
            $table->string('lampiran')->nullable();
            $table->string('asal_surat')->nullable();
            $table->text('isi_ringkas')->nullable();
            $table->string('keterangan')->nullable();
            $table->string('no_surat')->nullable();
            $table->date('tgl_surat')->nullable();
            $table->text('perihal')->nullable();
            $table->string('file')->nullable();
            $table->timestamps();
            $table->softdeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('surat_masuk');
    }
}
