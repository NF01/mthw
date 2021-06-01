<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('questions');
        Schema::create('questions', function (Blueprint $table) {
            $table->id('idQuestion');
            $table->tinyText('enonce');
            // $table->tinyInteger('ordre');
            $table->foreignId('type')->constrained('types', 'idType');
            $table->foreignId('idEtape')->constrained('etapes', 'idEtape');;
            $table->foreignId('idImage')->nullable()->constrained('images', 'idImage');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('questions', function (Blueprint $table) {
        //     $table->dropForeign('questions_idetape_foreign');
        //     $table->dropForeign('questions_idimage_foreign');
        // });
        // Schema::dropIfExists('questions');

        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('questions');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
