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

        $enonce = [
            "Qu’est-ce qu’un briquet à Genève ? ", 'Que casse-t-on à la fête de l’escalade à Genève ? ', 'Comment appelle-t-on les habitants de Satigny ? ', 'Pour quelle raison le jet d’eau a-t-il été construit ?  ', "Qu'est-ce qu'un sautier à Genève ?", 'Trouve le starterpack du vrai Genevois.', 'Comment appelle-t-on les habitants de Gy ? ', "Trouve la statue de l’union de Genève à la Suisse ", 'Bonus',
            "Que signifie l'expression vaudoise : Tcheu c'te panthère ! ", 'Trouve le château de Chillon. ', "Comment s'appellent les habitants de Lussy-sur-Morges ?", "Le premier cerveau artificiel a été construit à l’EPFL. ", "Trouve le pont suspendu Peak Walk. ", "Comment s'appellent les habitants de Yens ? ", "Que signifie l'expression vaudoise : J'ai les doigts qui pèdzent.", "Le lac Léman a déjà été touché par un tsunami.", "Bonus",
            "Quelle commune fribourgeoise existe vraiment ? ", "Que signifie la nyola à Fribourg ?", "Trouve le starterpack du vrai Fribourgeois.", "Un Suisse mange environ … de fromage par an. ", "Les Fribourgeois célèbrent chaque premier dimanche de décembre la vie du St-Nicolas.", "Dans combien de pays il y a-t-il une ville nommée [fribur] ? ", "De quels fromages est composée la fondue moitié-moitié ? ", "Pour passer sa naturalisation suisse, il faut connaître la recette de la fondue. ", "Bonus",
            "Que signifie l’expression valaisanne : Il est parti à Botson ?", "Comment s’appelle le plus haut sommet de Suisse ? ", "Trouve le starterpack du vrai Valaisan.", "Quelle commune existe vraiment ? ", "Trouve le célèbre Cervin. ", "Que représentent les étoiles sur le drapeau valaisan ? ", "Christian Constantin a participé à la flambée d'un bidon d'huile au sommet du Cervin.", "Que signifie l’expression valaisanne : À celle-ci y a plus que le trax qui lui est pas passé dessus ! ", "Bonus",
            "Trouve le starterpack du vrai tessinois.",  "La Suisse est le pays d'Europe avec le plus de personnes soixantenaires. ", "Quel est l’animal emblématique du festival du film de Locarno ? ", "On trouve le plus grand tunnel du monde en Suisse. ", "Trouve le pont des Sauts qui enjambe la célèbre Verzasca. ", "Quelle commune tessinoise existe réellement ? ", "On trouve le principal fabricant d’argent du monde au Tessin ? ", "Trouve le boccalini. ", "Bonus",
            "Lequel de ces types n'est pas du romanche ?", "Combien de cantons/pays sont limitrophes aux Grisons ? ", "Quel pourcentage du canton des Grisons parle romanche ?", "Le Grison héberge grande réserve naturelle de Suisse. ", "Quel ingrédient ne compose pas le capun.", "Coire a déjà accueilli 2 fois les Jeux olympiques d’hiver.", "Quelle est la superficie des Grisons ?", "Un film se passant aux Grisons est l'un des plus gros box-offices du cinéma suisse.", "Bonus",
            "En Suisse on ne se trouve jamais à plus de … d'un lac.", "Trouve Lucerne.", "Quel cours d’eau traverse Lucerne ?", "La gourmandise de fête lucernoise est le carac.", "Trouve l'écusson du canton de Lucerne.", "Le pont de la Chapelle à Lucerne est le plus grand pont couvert en bois du monde.", "Le plus grand incendie de toute l’histoire des CFF s'est déclaré le 5 février 1971 dans la gare de Lucerne.", "Lequel de ces deux lions est celui de Lucerne ?", "Bonus",
            "Trouve le starterpack du vrai schaffhousien.", "La ville de Schaffhouse a été bombardée lors de la 2ème guerre mondiale.", "Les chutes du Rhin sont les plus grandes chutes...", "Trouve l'écusson du canton de Schaffhouse.", "En 2018, Schaffhouse est le premier canton à mettre en place…", "Trouve les chutes du Rhin.", "Un gardien sonne à la main la cloche du Munot tous les soirs à Schaffhouse.", "Trouve la vieille ville de Schaffhouse.", "Bonus",
            "Trouve l'écusson de Bâle-Campagne.", "Qu’est-ce qui ne fait pas partie du célèbre carnaval de Bâle ?", "En quelle année a ouvert le zoo de Bâle ?", "Il est possible de se trouver dans 3 pays à la fois sur une terrasse à Bâle.", "Trouve la cathédrale de Bâle.", "Qu’est-ce qu’on ne retrouve pas dans les Läckerli de Bâle ?", "Une partie de la ville de Bâle a été détruite par un tsunami en 1356.", 'Quel est le thème du célèbre salon "Basel World"?', "Bonus",
            "La ville de Berne a enregistré le record du monde de bateaux pneumatiques en 2012.", "Comment s’appelle la tour de l’horloge de la vieille ville de Berne ?", "Quel célèbre marché existe à Berne ?", "Trouve le Palais Fédéral.", "La ville de Berne a accueilli des ours au centre de la ville jusqu’en 1923 ?", "La ville de Berne est inscrite au patrimoine mondial de l’UNESCO.", "Trouve le Blausee de l'Oberland bernois.", "Une scène ouverte de la drogue a eu lieu devant le palais fédéral.", "Bonus",
            "Que signifie l'expression neuchâteloise : Il fait une de ces cramines.", "Quelle marque de chocolat en poudre est produite dans le canton de Neuchâtel ?", "Comment s'appellent les habitants de Boudevilliers ?", "Combien de personnes y a-t-il eu à la fête des vendanges de 2019 ?", "Que signifie l'expression neuchâteloise : être à la kouéte.", "Comment s'appellent les habitants de Montmollin  ?", "La dernière exposition nationale a eu lieu en partie à Neuchâtel.", "Laquelle de ces communes neuchâteloises existe en Suisse ?", "Bonus",
            "Ce mot est typique suisse : la maman de jour.", "Laquelle de ces marques est suisse ?", "Il est interdit de tirer la chasse d'eau après 22h00 en Suisse.", "Ce mot est typique suisse : les bobettes.", "Quelle est l’année de naissance de la Suisse ?", "En Suisse, quel est le petit nom de la personne qui ne prend pas le volant lors de soirées arrosées ?", "Ce mot est typique suisse : le bancomat.", "En Suisse, nous sommes les plus gros importateurs de nourriture par habitant au monde.", "Bonus"
        ];
        // $idType = ['Genève', 'Vaud', 'Fribourg', 'Valais', 'Tessin', 'Grison', 'Lucerne', 'Schaffouse', 'Bâle', 'Berne', 'Neuchâtel', '12'];
        $idEtape_ = [
            '1', '1', '1', '1', '1', '1', '1', '1', '1',
            '2', '2', '2', '2', '2', '2', '2', '2', '2',
            '3', '3', '3', '3', '3', '3', '3', '3', '3',
            '4', '4', '4', '4', '4', '4', '4', '4', '4',
            '5', '5', '5', '5', '5', '5', '5', '5', '5',
            '6', '6', '6', '6', '6', '6', '6', '6', '6',
            '7', '7', '7', '7', '7', '7', '7', '7', '7',
            '8', '8', '8', '8', '8', '8', '8', '8', '8',
            '9', '9', '9', '9', '9', '9', '9', '9', '9',
            '10', '10', '10', '10', '10', '10', '10', '10', '10',
            '11', '11', '11', '11', '11', '11', '11', '11', '11',
            '12', '12', '12', '12', '12', '12', '12', '12', '12',
        ];
        $idImage = [
            null,'1', null, '2', null, null, null, null, null,
            '7', null, '10', '11', null, null, null, '14', null,
            null, null, null, '17', '18', null, '19', null, null,
            null, null, null, null, null, '24', '25', null, null,
            null, null, null, null, null, null, null, null, null,
            null, null, null, null, '32', '33', null, '34', null,
            null, null, null, null, null, '39', null, null, null,
            null, null, null, null, null, null, '48', null, null,
            null, null, '53', null, null, '56', null, '57', null,
            null, '58', null, null, '61', null, null, null, null,
            null, null, null, '66', null, null, null, null, null,
            null, null, '69', null, '70', null, '71', '72', null,
        ];

        $idEtape = 1;
        // DB::table('questions')->delete();
        for ($i = 0; $i < sizeof($idImage); $i++) {
            DB::table('questions')->insert([
                // 'enonce' => 'Question n°' . $i,
                // 'idType' => rand(1, 3),
                // 'idEtape' => $idEtape,
                // 'ordre' => rand(0, 10),
                // 'idImage' => $idImage[$i]


                'enonce' => $enonce[$i],
                'idEtape' => $idEtape_[$i],
                'idImage' =>  $idImage[$i],
            ]);
            if ($i % 9 == 0) {
                $idEtape++;
            }
        }
        //
    }
}