<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIKUsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('i_k_u', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tahun')->nullable()->default(0);
            $table->string('id_unit')->nullable();
            $table->string('satuan')->nullable();
            $table->integer('pic')->nullable()->default(0);
            $table->text('sasaran')->nullable();
            $table->text('indikator')->nullable();
            $table->double('target')->nullable()->default(0);
            $table->double('realisasi')->nullable()->default(0);
            $table->text('kegiatan')->nullable();
            $table->double('anggaran')->nullable()->default(0);
            $table->double('realisasi_anggaran')->nullable()->default(0);
            $table->date('tgl_disetujui')->nullable();
            $table->integer('status')->nullable()->default(0);
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
        Schema::dropIfExists('i_k_u');
    }
}
