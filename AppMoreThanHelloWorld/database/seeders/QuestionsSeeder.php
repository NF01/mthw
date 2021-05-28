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
        // DB::table('questions')->delete();
        for ($i = 1; $i <= 10; $i++) {
            DB::table('questions')->insert([
                'enonce' => 'Question n°' . $i,
                'ordre' => rand(0, 10),
                'type' => rand(1,3),
                'idChapitre' => rand(1, 3)
            ]);
        }
        //
    }
}
