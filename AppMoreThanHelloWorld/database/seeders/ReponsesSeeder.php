<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReponsesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $idQuestion = 1;
        $statut = true;


        $enonce = ['Genève', 'Vaud', 'Fribourg', 'Valais', 'Tessin', 'Grison', 'Lucerne', 'Schaffouse', 'Bâle', 'Berne', 'Neuchâtel', 'Lavaux'];
        $anectode = ['', 'Vaud', 'Fribourg', 'Valais', 'Tessin', 'Grison', 'Lucerne', 'Schaffouse', 'Bâle', 'Berne', 'Neuchâtel', 'Lavaux'];
        $idQuestion_ = ['Genève', 'Vaud', 'Fribourg', 'Valais', 'Tessin', 'Grison', 'Lucerne', 'Schaffouse', 'Bâle', 'Berne', 'Neuchâtel', 'Lavaux'];
        $idImage = ['Genève', 'Vaud', 'Fribourg', 'Valais', 'Tessin', 'Grison', 'Lucerne', 'Schaffouse', 'Bâle', 'Berne', 'Neuchâtel', 'Lavaux'];


        for ($i = 1; $i <= 216; $i++) {
            DB::table('reponses')->insert([
                'enonce' => 'Réponse n°' . $i,
                // 'ordre' => rand(0, 10),
                'statut' => $statut,
                'anecdote' => 'Mon anecdote - ' . $i,
                'idQuestion' => $idQuestion,
                // 'idImage' => $idImage[$i]
            ]);
            if ($i % 2 == 0) {
                $idQuestion++;
            }
            if ($i % 2 == 0) {
                $statut = true;
            } else {
                $statut = false;
            }
        }
    }
}