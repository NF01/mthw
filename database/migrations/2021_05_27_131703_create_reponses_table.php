<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateReponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('reponses');
        Schema::create('reponses', function (Blueprint $table) {
            $table->id('idReponse');
            $table->tinyText('enonce');
            // $table->tinyInteger('ordre');
            $table->boolean('statut');
            $table->string('anecdote', 400);
            $table->foreignId('idQuestion')->constrained('questions', 'idQuestion');
            $table->foreignId('idImage')->nullable()->constrained('images', 'idImage');;

            // $table->foreign('idQuestion')->references('idQuestion')->on('questions');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reponses', function (Blueprint $table) {
            $table->dropForeign('reponses_idquestion_foreign');
            $table->dropForeign('reponses_idimage_foreign');
        });
        Schema::dropIfExists('reponses');

        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('reponses');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
