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

        for ($i = 1; $i <= 40; $i++) {
            DB::table('reponses')->insert([
                'enonce' => 'Réponse n°' . $i,
                // 'ordre' => rand(0, 10),
                'statut' => rand(0, 1),
                'anecdote' => 'Mon anecdote - ' . $i,
                'idQuestion' => rand(1, 10)
            ]);
        }
    }
}
