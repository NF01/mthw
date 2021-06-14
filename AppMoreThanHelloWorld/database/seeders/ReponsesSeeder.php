<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReponsesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $idQuestion = 1;
        $statut = true;


        $enonce = [
            'Un cheval', 'Une pioche', 'Une fleur', 'Une allumette', 'Une assiette', 'Un chauderon', 'Une marmite', 'Une casserole', 'Les Satiriques', 'Les Satignotes', 'Les Satisfaits', 'Les Satigores', 'Pour des raisons esthétiques', 'Pour des battre un record du monde', 'Pour des raisons techniques', 'Pour rafraîchir les canards', 'Un huissier', 'Une casserole', 'Un collier', 'Un sautoir', 'Starter pack Neuchâtel', 'Starterpack Gnv', 'Les Gyer', 'Les Gyronds', 'Les Gynécos', 'Les Gytans', 'Images statues Gnv', 'Img Guillaume Tel', 'Bonus',
            'Quel beau lynx !', 'Quelle belle fille', 'Quel affamé !', 'Quel clown !', 'Image château de Chillon', 'Image château de Grandson', 'Les Lucides', 'Les Elusses','Les Lucifers','Les Lucies','Vrai','Faux','Image Randa Charles Kuonen','Image Peak Walk','Les Buvas', 'Les Droguas', 'Les Mangeas','Les Fumas',"J'ai les doigts qui collent.", "J'ai les doigts sales.", "J'ai les doigts tout froids.","J'ai mal aux doigts.", 'Vrai','Faux','Bonus',
            'Arkanciel','Arkenciel','Arconssiel','Arconciel','La noyade','Le brouillard',"L'agneau",'La tristesse', 'Image Startpack Fribourg', 'Image starterpack Suisse Allemande', '3kg','14kg','22kg','48kg','Vrai','Faux','3','5','6','8','Emmental et vacherin fribourgeois','Gruyères et vacherin fribourgeois','Gruyères et emmental','Beaufort et comté','Vrai','Faux','Bonus',
            'Il a changé de village','Il est malade','Il est tombé','Il est allé à Botson','Le Cervin','La Jungfrau','Le Grand Combin','La pointe Dufour','Image Starterpack Jura','Image starterpack VS','Untorrent','Troistorrent','Dixtorrent','Centorrent','Image Cervin dos','Image dent blanches','Les 13 districts du canton','Les 13 victoires du FC Sion', 'Les 13 cépages de vin blanc','Les 13 familles du canton',
        ];
        $anectode = [
            '', '', '', '', "La fête se déroule chaque année le 12 décembre. L'« escalade » doit son nom à la tentative d'escalade par les Savoyards des murailles de la ville.", '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', "L'autre starterpack est celui de Neuchâtel !", '', '', '', '', '', 'Les deux femmes en bronze représentent le rattachement de Genève à la Suisse. Le monument a été construit en 1869 et se situe dans le Jardin Anglais.', '', 'BONUS', 'Neuchâtel', 'Lavaux',
            '', '', '', '', '','','','','','',"Le Blue Brain Project a comme but de reproduire un cerveau à l’aide d’ordinateurs géants. Des scientifiques du monde entier y travaillent et en 2013, le Blue Brain a donné lieu au Human Brain Project, qui vise à simuler le fonctionnement du cerveau humain d’ici 2024. ",'','','','','','','','','','','',"En 563, une partie d'une montagne dans le bas-Chablais s'est détachée et est tombée dans le lac, provoquant un tsunami. Une vague atteignant 16 mètres ravagea tout le rivage  du Léman.",'','',
            '','','','','','','','',"L'autre startpack représente nos amis Suisses allemands !",'',"Quoi de meilleur qu'une bonne fondue ou une bonne raclette ? En plus, 70% de notre consommation est suisse. ",'','','',"Il n'est pas célébré chaque premier dimanche, mais chaque premier week-end (entier) du mois ! ",'',"Il existe 8 pays ayant une ville se nommant  [fribur] : l'Afrique du Sud, l'Allemagne, le Brésil, la Pologne, la Suisse, la France et la Röpublique tchèque !",'','','',"C'est la fondue française qui est faite de Beaufort et de Comté ! ", '','','',"Malgré tout, un Anglais n'a pas reçu sa naturalisation, car il ne connaissait pas l'origine exacte de la raclette. ",'','',
            '','','','',"La pointe Dufour se trouve à 4'634 m d'altitude ce qui fait d'elle le plus haut sommet de Suisse ! Elle se situe dans le mont Rose, sur la commune de Zermatt.",'','','','','','','','','',"Et oui, même si on le voit ici de dos, notre Cervin reste l'emblème le plus connu de Suisse. La deuxième photo nous montre la dent blanche qu'on trouve au Valais.",'',"Et oui, malgré les 13 victoires consécutives du FC Sion à la coupe de Suisse les étoiles représentent les 13 districts du canton.",'','','',
        ];
        $idQuestion_ = [
            '1', '1', '1', '1', '2', '2', '2', '2', '3', '3', '3', '3', '4', '4', '4', '4', '5', '5', '5', '5', '6', '6', '7', '7', '7', '7', '8', '8', '9',
            '10', '10', '10', '10','11','11','12','12','12','12','13','13','14','14','15','15','15','15','16','16','16','16','17','17','18',
            '19','19','19','19','20','20','20','20','21','21','22','22','22','22','23','23','24','24','24','24','25','25','25','25','26','26','27',
            '28','28','28','28','29','29','29','29','30','30','31','31','31','31','32','32','33','33','33','33'
        ];
        $statut = [
            '1', '0', '0', '0', '0', '0', '1', '0', '0', '1', '0', '0', '0', '0', '1', '0', '1', '0', '0', '0', '0', '1', '0', '0', '0', '1', '1', '0', '0',
            '0', '1', '0', '0','1','0','0','0','1','0','1','0','0','1','0','0','0','1','1','0','0','0','1','0','0',
            '0','0','0','1','0','1','0','0','1','0','0','0','1','0','0','1','0','0','0','1','0','1','0','0','0','1','0',
            '0','0','1','0','0','0','0','1','0','1','0','1','0','0','1','0','1','0','0','0'

        ];


        for ($i = 1; $i <= 216; $i++) {
            DB::table('reponses')->insert([
                'enonce' => 'Réponse n°' . $i,
                // 'ordre' => rand(0, 10),
                'statut' => $statut,
                'anecdote' => 'Mon anecdote - ' . $i,
                'idQuestion' => $idQuestion,
                // 'idImage' => $idImage[$i]
            ]);
            if ($i % 2 == 0) {
                $idQuestion++;
            }
            if ($i % 2 == 0) {
                $statut = true;
            } else {
                $statut = false;
            }
        }
    }
}
