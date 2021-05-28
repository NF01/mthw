<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('types');
        Schema::create('types', function (Blueprint $table) {
            $table->id('idType');
            $table->tinyText('nom');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('types');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('types');
        Schema::enableForeignKeyConstraints();
    }
}
