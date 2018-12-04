<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableKegiatanFisik extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kegiatan_fisik', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_iku')->nullable()->default(0);
            $table->date('tanggal')->nullable();
            $table->text('kegiatan')->nullable();
            $table->double('jumlah')->nullable()->default(0);
            $table->text('keterangan')->nullable();
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
        Schema::dropIfExists('kegiatan_fisik');
    }
}
