<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaranaPrasaranasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sarana_prasarana', function (Blueprint $table) {
            $table->increments('id');
            $table->string('jenis')->nullable();
            $table->string('kode')->nullable();
            $table->string('desc')->nullable();
            $table->string('satuan')->nullable();
            $table->integer('jumlah')->nullable()->default(0);
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
        Schema::dropIfExists('sarana_prasarana');
    }
}
