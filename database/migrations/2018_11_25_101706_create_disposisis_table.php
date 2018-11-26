<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDisposisisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disposisi', function (Blueprint $table) {
            $table->increments('id');
            $table->string('indeks')->nullable();
            $table->string('kategori')->nullable();
            $table->string('kode')->nullable();
            $table->string('tanggal_penyelesaian')->nullable();
            $table->integer('id_surat_masuk')->nullable()->default(0);
            $table->integer('id_surat_keluar')->nullable()->default(0);
            $table->integer('to_eselon_1')->nullable()->default(0);
            $table->integer('to_eselon_2')->nullable()->default(0);
            $table->integer('to_eselon_3')->nullable()->default(0);
            $table->integer('to_eselon_4')->nullable()->default(0);
            $table->integer('to_staf')->nullable()->default(0);
            $table->integer('from_eselon_1')->nullable()->default(0);
            $table->integer('from_eselon_2')->nullable()->default(0);
            $table->integer('from_eselon_3')->nullable()->default(0);
            $table->integer('from_eselon_4')->nullable()->default(0);
            $table->integer('from_staf')->nullable()->default(0);
            $table->integer('status')->nullable()->default(0);
            $table->string('instruksi')->nullable();
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
        Schema::dropIfExists('disposisi');
    }
}
