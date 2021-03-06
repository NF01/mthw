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

        $noms = ['Genève', 'Vaud', 'Fribourg', 'Valais', 'Tessin', 'Grisons', 'Lucerne', 'Schaffouse', 'Bâle', 'Berne', 'Neuchâtel', 'Lavaux'];

        $badges = ['0-Ovomaltine.svg', '1-rivella.svg', '2-fondue.svg', '3-Toblerone.svg', '4-IceTea.svg', '5-Cenovis.svg', '6-Chocolat.svg', '7-Chips.svg', '8-Lackerli.svg', '9-Fromage.svg', '10-Sugus.svg', '11-Aromate.svg'];

        $etapes = ['jet-deau-geneve.svg', 'chateau-chillon.svg', 'cailler-broc.svg', 'cervin.svg', 'bellinzone-chateau.svg', 'parc-national.svg', 'pont-lucerne.svg', 'chute du rhin.svg', 'zoo-bale.svg', 'palais-federal.svg', 'creux_du_van.svg', 'lavaux.svg'];

        $count = 0;
        DB::table('etapes')->delete();
        for ($i = 1; $i <= sizeof($etapes); $i++) {
            DB::table('etapes')->insert([
                'idEtape' => $i,
                'nom' => $noms[$count],
                'illustrationUrl' => $etapes[$count],
                'badgeUrl' => $badges[$count],
            ]);
            $count++;
        }
    }
}