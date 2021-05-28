<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = ['QCM', 'Vrai / Faux', 'StarterPack'];
        
        DB::table('types')->delete();
        for ($i = 0; $i < sizeof($types); $i++) {
            DB::table('types')->insert([
                'idType' => ++$i,
                'nom' => $types[--$i]
            ]);
        }//
    }
}
