<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSubUnit extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('unit', function (Blueprint $table) {
            $table->string('sub_unit')->nullable();
            $table->integer('id_parent')->nullable()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('unit', function (Blueprint $table) {
            $table->dropColumn('sub_unit');
            $table->dropColumn('id_parent');
        });
    }
}
