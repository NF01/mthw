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
        
        $idEtape = 1;
        // DB::table('questions')->delete();
        for ($i = 1; $i <= 88; $i++) {
            DB::table('questions')->insert([
                'enonce' => 'Question n°' . $i,
                // 'ordre' => rand(0, 10),
                'idType' => rand(1,3),
                'idEtape' => $idEtape
            ]);
            if ($i % 8 == 0) {
                $idEtape++;
            }
        }
        //
    }
}
