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

        $noms = ['Genève', 'Vaud', 'Fribourg', 'Valais', 'Tessin', 'Grison', 'Lucerne', 'Schaffouse', 'Bâle', 'Berne', 'Neuchâtel', 'Lavaux'];

        $etapes = ['jet-deau-geneve.svg', 'chateau-chillon.svg', 'cailler-broc.svg', 'cervin.svg', 'bellinzone-chateau.svg', 'parc-national.svg', 'pont-lucerne.svg', 'chute du rhin.svg', 'zoo-bale.svg', 'palais-federal.svg', 'creux_du_van.svg', 'lavaux.svg'];

        $count = 0;
        DB::table('etapes')->delete();
        for ($i = 1; $i <= sizeof($etapes); $i++) {
            DB::table('etapes')->insert([
                'idEtape' => $i,
                'nom' => $noms[$count],
                'illustrationUrl' => $etapes[$count],
                'badgeUrl' => 'badgeUrl ' . $i
            ]);
            $count++;
        }
    }
}