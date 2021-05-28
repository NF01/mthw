<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChapitresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('chapitres')->delete();
        for ($i = 1; $i <= 10; $i++) {
            DB::table('chapitres')->insert([
                'idChapitre' => $i,
                'nom' => 'chapitre' . $i,
            ]);
        }
    }
}
