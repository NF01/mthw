<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $enonce = ['Genève', 'Vaud', 'Fribourg', 'Valais', 'Tessin', 'Grison', 'Lucerne', 'Schaffouse', 'Bâle', 'Berne', 'Neuchâtel', 'Lavaux'];
        // $idType = ['Genève', 'Vaud', 'Fribourg', 'Valais', 'Tessin', 'Grison', 'Lucerne', 'Schaffouse', 'Bâle', 'Berne', 'Neuchâtel', 'Lavaux'];
        $idEtape_ = ['Genève', 'Vaud', 'Fribourg', 'Valais', 'Tessin', 'Grison', 'Lucerne', 'Schaffouse', 'Bâle', 'Berne', 'Neuchâtel', 'Lavaux'];
        $idImage = ['Genève', 'Vaud', 'Fribourg', 'Valais', 'Tessin', 'Grison', 'Lucerne', 'Schaffouse', 'Bâle', 'Berne', 'Neuchâtel', 'Lavaux'];

        $idEtape = 1;
        // DB::table('questions')->delete();
        for ($i = 1; $i <= 108; $i++) {
            DB::table('questions')->insert([
                'enonce' => 'Question n°' . $i,
                // 'ordre' => rand(0, 10),
                'idType' => rand(1, 3),
                'idEtape' => $idEtape,
                'idImage' => $idImage[$i]
            ]);
            if ($i % 9 == 0) {
                $idEtape++;
            }
        }
        //
    }
}