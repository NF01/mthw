<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         
        $images = [
            "escalade.jpg", "jet-deau.jpg", "geneve.jpg","neuchatel.jpg", "statue-union-geneve-a-la-suisse.jpg", "guillaume-tel.jpg",
            "panther.jpeg", "chateau-chillon.jpg","chateau-grandson.jpg","lucifer.jpg","cerveau-articiel.jpg","pont-suspendu-diablerets-peak-walk.jpg","pont-suspendu-randa-charles-kuonen.jpg","lac-leman.jpg",
            "fribourg.jpg","suisse-allemande.jpg","fromages.jpg","st-nicolas.jpg","fondue.jpg",
            "valais.jpg","jura.jpg","cervin-de-dos.jpg","dent-blanche.jpg","drapeau-valais.png","feu-bidon-huile.jpg",
            "tessin.jpg","vaud.jpg", "val-verzasca.jpg","lac-schiffenen.jpg", "boccalini-tessin.jpg","talerschwingen-instrument-musique.jpg",
            "capun.jpg","jo.jpg","cinema.jpg",
            "lucerne.jpg", "berne.jpg", "lucerne.png", "zurich.png", "pont-lucerne.jpg", "lion-lucerne-suisse.jpg", "lion-atlanta.jpg",
            "suisse-allemande2.jpg", "valais2.jpg", "schaffhouse.png", "uri.png", "chute-du-rhin.jpg", "chute-du-day.jpg", "munot.jpg", "schaffhouse.jpg", "alsace.jpg",
            "bale-campagne.png", "bale-ville.png", "zoo-bale.jpg", "cathedrale-bale.jpg", "cathedrale-lausanne.jpg", "lackerlis.jpg", "baselworld.jpg",  
            "zytglogge-berne.jpg", "palais-federal.jpg", "musee-ceramique-verre.jpg", "fosse-aux-ours.jpg", "blausee.jpg", "lac-bleu-arolla.jpg", 
            "logo-suchardexpress.png", "caotina-logo.png", "fete-vendanges.jpg",
            "tally-weijl.jpg", "logo-swarovski.jpg", "toilettes.jpg", "drapeau-suisse.png", "bancomat.png", "nourriture.jpg",
            "grenouille-sur-ecureuil.jpg", "viande-sechee.jpg", "top-secret.jpg", "hotel-palafitte.jpg", "hotel-maldives.jpg"
        ];
        
        // DB::table('images')->delete();
        for ($i = 0; $i < sizeof($images); $i++) {
            DB::table('images')->insert([
                'url' => $images[$i]
            ]);
        }
    }
}