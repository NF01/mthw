<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EtapesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('etapes')->delete();
        for ($i = 1; $i <= 10; $i++) {
            DB::table('etapes')->insert([
                'idEtape' => $i,
                'nom' => 'Étape ' . $i,
            ]);
        }
    }
}
