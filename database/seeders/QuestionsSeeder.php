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

        $enonce = ["Qu’est-ce qu’un briquet à Genève ? ", 'Que casse-t-on à la fête de l’escalade à Genève ? ', 'Comment appelle-t-on les habitants de Satigny ? ', 'Pour quelle raison le jet d’eau a-t-il été construit ?  ', "Qu'est-ce qu'un sautier à Genève ?", 'Quel est le starterpack du vrai Genevois ? ', 'Comment appelle-t-on les habitants de Gy ? ', "Trouve la statue de l’union de Genève à la Suisse ", 'Bonus',
         "Que signifie l'expression vaudoise : Tcheu c'te panthère ! ", 'Trouve le château de Chillon. ', "Comment s'appellent les habitants de Lussy-sur-Morges ?", "Le premier cerveau artificiel c’est construit à l’EPFL ? ", "Trouve le pont suspendu Peak Walk. ", "Comment s'appellent les habitants de Yens ? ", "Que signifie l'expression vaudoise : J'ai les doigts qui pèdzent.", "Le lac Léman a déjà été touché par un tsunami.", "Bonus",
         "Quelle commune fribourgeoise existe vraiment ? ", "Que signifie la nyola à Fribourg ?", "Quel est le starterpack du vrai Fribourgeois ? ", "Un Suisse mange environ … de fromage par an. ", "Les Fribourgeois célèbrent chaque premier dimanche de décembre la vie du St-Nicolas.", "Dans combien de pays il y a-t-il une ville nommée [fribur] ? ", "De quels fromages est composée la fondue moitié-moitié ? ", "Pour passer sa naturalisation suisse, il faut connaître la recette de la fondue. ", "Bonus",
         "Que signifie l’expression valaisanne : Il est parti à Botson ?", "Comment s’appelle le plus haut sommet de Suisse ? ", "Quel est le starterpack du vrai Valaisan ? ", "Quelle commune existe vraiment ? ", "Trouve le célèbre Cervin. ", "Que représentent les étoiles sur le drapeau valaisan ? ", "Christian Constantin a participé à la flambée d'un bidon d'huile au sommet du Cervin.", "Que signifie l’expression valaisanne : À celle-ci y a plus que le trax qui lui est pas passé dessus ! ", "Bonus",
         "Quel est le starter pack du vrai tessinois ?",  "La Suisse est le pays d'Europe avec le plus de personnes soixantenaires. ", "Quel est l’animal emblématique du festival du film de Locarno ? ", "On trouve le plus grand tunnel du monde en Suisse. ", "Trouve le pont des Sauts qui enjambe la célèbre Verzasca. ", "Quelle commune tessinoise existe réellement ? ", "On trouve le principal fabricant d’argent du monde au Tessin ? ", "Trouve le boccalini. ", "Bonus",
         "Connais-tu les 5 types de romanches ? ", "Combien de cantons/pays sont limitrophes aux Grisons ? ", "15% des habitants des Grisons parlent romanche. ", "Le Grison héberge grande réserve naturelle de Suisse. ", "Quel ingrédient ne compose pas le capun.", "Coire a déjà accueilli 2 fois les Jeux olympiques d’hiver.", "Quelle est la superficie des Grisons ?", "Un film se passant aux Grisons est l'un des plus gros box-offices du cinéma suisse.", "Bonus",
         "En Suisse on ne se trouve jamais à plus de … d'un lac.", "Trouve Lucerne.", "Quel cours d’eau traverse Lucerne ?", "La gourmandise de fête lucernoise est le carac.", "Trouve l'écusson du canton de Lucerne.", "Le pont de la Chapelle à Lucerne est le plus grand pont couvert en bois du monde.", "Le plus grand incendie de toute l’histoire des CFF s'est déclaré le 5 février 1971 dans la gare de Lucerne.", "Lequel de ces deux lions est celui de Lucerne ?", "Bonus", 
         "Quel est le starter pack du vrai schaffhousien ?", "La ville de Schaffhouse a été bombardée lors de la 2ème guerre mondiale.", "Les chutes du Rhin sont les plus grandes chutes...", "Trouve l'écusson du canton de Schaffhouse.", "En 2018, Schaffhouse est le premier canton à mettre en place…", "Trouve les chutes du Rhin.", "Le Munot est un véritable symbole à Schaffhouse, mais qu'est-ce qui lui est particulier ?", "Trouve la vieille ville de Schaffhouse.", "Bonus", 
         "Trouve l'écusson de Bâle-Campagne.", "Qu’est-ce qui ne fait pas partie du célèbre carnaval de Bâle ?", "En quelle année a ouvert le zoo de Bâle ?", "Il est possible de se trouver dans 3 pays à la fois sur une terrasse à Bâle.", "Trouve la cathédrale de Bâle.", "Qu’est-ce qu’on ne retrouve pas dans les Läckerli de Bâle ?", "Une partie de la ville de Bâle a été détruite par un tsunami en 1356.", "", "Bonus", 
         "La ville de Berne a enregistré le record du monde de bateaux pneumatiques en 2012.", "Comment s’appelle la tour de l’horloge de la vieille ville de Berne ?", "Quel célèbre marché existe à Berne ?", "Trouve le Palais Fédéral.", "La ville de Berne a accueilli des ours au centre de la ville jusqu’en 1923 ?", "La ville de Berne est inscrite au patrimoine mondial de l’UNESCO.", "Trouve le Blausee de l'Oberland bernois.", "Une scène ouverte de la drogue a eu lieu devant le palais fédéral.", "Bonus", 
         "Que signifie l'expression neuchâteloise : Il fait une de ces cramines.", "Quelle marque de chocolat en poudre est produite dans le canton de Neuchâtel ?", "Comment s'appellent les habitants de Boudevilliers ?", "Combien de personnes y a-t-il eu à la fête des vendanges de 2019 ?", "Que signifie l'expression neuchâteloise : être à la kouéte.", "Comment s'appellent les habitants de Montmollin  ?", "La dernière exposition nationale a eu lieu en partie à Neuchâtel.", "Laquelle de ces communes neuchâteloises existe en Suisse ?", "Bonus", 
         "Ce mot est typique suisse : la maman de jour.", "Laquelle de ces marques est suisse ?", "Il est interdit de tirer la chasse d'eau après 22h00 en Suisse.", "Ce mot est typique suisse : les bobettes.", "Quelle est l’année de naissance de la Suisse ?", "En Suisse, quel est le petit nom de la personne qui ne prend pas le volant lors de soirées arrosées ?", "Ce mot est typique suisse : le bancomat.", "En Suisse, nous sommes les plus gros importateurs de nourriture par habitant au monde.", "Bonus" ];
        // $idType = ['Genève', 'Vaud', 'Fribourg', 'Valais', 'Tessin', 'Grison', 'Lucerne', 'Schaffouse', 'Bâle', 'Berne', 'Neuchâtel', 'Lavaux'];
        $idEtape_ = [
            '1', 'Genève', 'Genève', 'Genève', 'Genève', 'Genève', 'Genève', 'Genève', 'Genève', 
            'Vaud', 'Vaud','Vaud','Vaud','Vaud','Vaud','Vaud','Vaud','Vaud',
            'Fribourg', 'Fribourg', 'Fribourg', 'Fribourg', 'Fribourg', 'Fribourg', 'Fribourg', 'Fribourg', 'Fribourg', 
            'Valais', 'Valais', 'Valais', 'Valais', 'Valais', 'Valais', 'Valais', 'Valais', 'Valais',
            'Tessin', 'Tessin', 'Tessin', 'Tessin', 'Tessin', 'Tessin', 'Tessin', 'Tessin', 'Tessin', 
            'Grison', 'Grison', 'Grison', 'Grison', 'Grison', 'Grison', 'Grison', 'Grison', 'Grison',
            'Lucerne', 'Lucerne','Lucerne','Lucerne','Lucerne','Lucerne','Lucerne','Lucerne','Lucerne',
            'Schaffouse','Schaffouse','Schaffouse','Schaffouse','Schaffouse','Schaffouse','Schaffouse','Schaffouse','Schaffouse', 
            'Bâle','Bâle','Bâle','Bâle','Bâle','Bâle','Bâle','Bâle','Bâle',
            'Berne', 'Berne', 'Berne', 'Berne', 'Berne', 'Berne', 'Berne', 'Berne', 'Berne',
            'Neuchâtel','Neuchâtel','Neuchâtel','Neuchâtel','Neuchâtel','Neuchâtel','Neuchâtel','Neuchâtel','Neuchâtel',
            'Lavaux','Lavaux','Lavaux','Lavaux','Lavaux','Lavaux','Lavaux','Lavaux','Lavaux',
        ];
        $idImage = [
            '', '', 1, '', '', '2', '', '', '',
            '7', '', '10', '11','','','','14','',
            '','','','17','18','','19','','',
            '','','','','','24','25','','',
            '','','','','','','','','',
            '','','','','32','33','','34','',
            '','','','','','39','','','',
            '','','','','','','48','','',
            '','','53','','','56','','57','',
            '','58','','','61','','','','',
            '','','','66','','','','','',
            '','','69','','70','','71','72','',
        ];

        $idEtape = 1;
        // DB::table('questions')->delete();
        for ($i = 1; $i <= 108; $i++) {
            DB::table('questions')->insert([
                'enonce' => 'Question n°' . $i,
                // 'ordre' => rand(0, 10),
                'idType' => rand(1, 3),
                'idEtape' => $idEtape,
                // 'idImage' => $idImage[$i]
            ]);
            if ($i % 9 == 0) {
                $idEtape++;
            }
        }
        //
    }
}