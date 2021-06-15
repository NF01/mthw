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
            'Quel beau lynx !', 'Quelle belle fille', 'Quel affamé !', 'Quel clown !', 'Image château de Chillon', 'Image château de Grandson', 'Les Lucides', 'Les Elusses', 'Les Lucifers', 'Les Lucies', 'Vrai', 'Faux', 'Image Randa Charles Kuonen', 'Image Peak Walk', 'Les Buvas', 'Les Droguas', 'Les Mangeas', 'Les Fumas', "J'ai les doigts qui collent.", "J'ai les doigts sales.", "J'ai les doigts tout froids.", "J'ai mal aux doigts.", 'Vrai', 'Faux', 'Bonus',
            'Arkanciel', 'Arkenciel', 'Arconssiel', 'Arconciel', 'La noyade', 'Le brouillard', "L'agneau", 'La tristesse', 'Image Startpack Fribourg', 'Image starterpack Suisse Allemande', '3kg', '14kg', '22kg', '48kg', 'Vrai', 'Faux', '3', '5', '6', '8', 'Emmental et vacherin fribourgeois', 'Gruyères et vacherin fribourgeois', 'Gruyères et emmental', 'Beaufort et comté', 'Vrai', 'Faux', 'Bonus',
            'Il a changé de village', 'Il est malade', 'Il est tombé', 'Il est allé à Botson', 'Le Cervin', 'La Jungfrau', 'Le Grand Combin', 'La pointe Dufour', 'Image Starterpack Jura', 'Image starterpack VS', 'Untorrent', 'Troistorrent', 'Dixtorrent', 'Centorrent', 'Image Cervin dos', 'Image dent blanches', 'Les 13 districts du canton', 'Les 13 victoires du FC Sion', 'Les 13 cépages de vin blanc', 'Les 13 familles du canton','Vrai','Faux','Désigne une fille timide','Désigne une fille courageuse','Désigne une fille facile','Désigne une fille déterminée','Bonus',
            'Image starter Vaud','Image starterpack Tessin','Vrai','Faux','Le guépard','Le jaguar','Le lynx','Le léopard','Vrai','Faux','Image Val Verzascona','Image lac de Schiffenen', 'Miglieglia','Mouglouglou','Maglaglio','Mowgligi','Vrai','Faux','Image Boccalini', 'Image instrument appenzellois','Bonus',
            'Sursilvan','Sutsilvan','Surmiran','Sultiran','3','4','7','9','3%','15%','25%','60%','Vrai','Faux','Tomates','Spätzli','Viande séchée','Feuille de blette','Vrai', 'Faux',"1'105km²", "4'105km²","7'105km²","11'105km²",'Vrai', 'Faux','Bonus',
            '12km','46km','64km','103km','Image Berne','Image Lucerne', "L'Aar", 'La Reuss','Le Rhin',"L'Arve",'Vrai','Faux', 'Image écusson Lucerne','Image écusson Zürich', 'Vrai','Faux','Vrai','Faux', 'Image lion Oakland', 'Image lion Lucerne', 'Bonus',
            'IMG Starterpack schaffouse','IMG Starterpack Valais 2','Vrai','Faux','Du canton','De Suisse', "D'Europe",'Du Monde','Image écusson Uri','Image écusson Schaffouse','Le vote en ligne','Les transports publics gratuits','Une identité numérique','Une rémunération pour voter','Image chutes du Dray','Image chute du Rhin','Vrai','Faux', 'Image village Schaffouse','Image village Alsace','Bonus',
            'IMG Ecusson Bâle-Ville','IMG Ecusson Bâle-Campagne', 'Les fifres et tambours','Les costumes','Le défilé de lanternes','Le défilé de flûtes de pan','1874','1921','1964','2001','Vrai','Faux','Image cathédrale Bâle','Image cathédrale Lsn','Du miel','Des fruits confits','Des noix','Des amandes', 'Vrai','Faux', "L'horlogerie et de la bijouterie", 'La maroquinerie',"L'agriculture", 'La pâtisserie et la confiserie', 'Bonus',
            'Vrai','Faux','Le tumglogge','Le zytglogge','le berniglogge','Le oldglogge', 'Le marché aux oignons', 'Le marché aux fleurs','Le marché aux puces', 'Le marché aux champignons', ' Image Palais Fédéral','Image musée du vitrail et des arts','Vrai', 'Faux', 'Vrai','Faux','Image lac bleu Arolla','Image Blausee', 'Vrai','Faux','Bonus',
            'Les gens sont affamés','Il annonce de la neige','Il fait vraiment chaud dehors','Il fait vraiment froid dehors', 'Image Caotina','Suchard express','Les Malabars','Les Carambars','Les Roudoudous','Les Bombecs',"Plus de 100'000", "Plus de 200'000","Plus de 300'000","Plus de 400'000",'Être fatigué','Être pressé','Être malade','Avoir soif', 'Les Morveux','Les Baveux','Les Moqueux','Les Bigleux', 'Vrai','Faux','Bidets','Bassins','Fontaines','Cascades','Bonus',
            'Vrai','Faux','IMG Tally Weijl', 'IMG Swarovski','Vrai', 'Faux', 'Vrai', 'Faux', '1291','1499','1648','1848','Sam','Bob','Raoul', "L'ange Francky", 'Vrai','Faux', 'Vrai','Faux','Bonus',
        ];
        $idImage = [
            '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '4', '3', '', '', '', '', '5', '6', '',
            '', '', '', '', '8', '9', '', '', '', '', '', '', '13', '12', '', '', '', '', '', '', '', '', '', '', '',
            '', '', '', '', '', '', '', '', '15', '16', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '',
            '', '', '', '', '', '', '', '', '21', '20', '', '', '', '', '22', '23', '', '', '', '','','','','','','','',
            '27','36','','','','','','', '','','28','29','','','','','','','30','31','',
            '','','','','','','','','','','','','','','','','','', '','','','','','','','','',
            '','','','','36','35','','','','', '','','37','38','','','','','41','40','',
            '42','43','','','','','','','45','44','','','','','47','46','','','49','50','',
            '52','51','','','','','','','','','','','54','55','','','','','','','','','','','',
            '','','','','','','','','','','59','60', '','','','','63','62','','','',
            '','','','','65','64','','','','','','','','', '','','','','','','','','','','','','','','',
            '','','67','68', '','', '','', '','', '','', '','','','', '','', '','','',  
        ];
        $anecdote = [
            '', '', '', '', "La fête se déroule chaque année le 12 décembre. L'« escalade » doit son nom à la tentative d'escalade par les Savoyards des murailles de la ville.", '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', "L'autre starterpack est celui de Neuchâtel !", '', '', '', '', '', 'Les deux femmes en bronze représentent le rattachement de Genève à la Suisse. Le monument a été construit en 1869 et se situe dans le Jardin Anglais.', '', 'BONUS',
            '', '', '', '', '', '', '', '', '', '', "Le Blue Brain Project a comme but de reproduire un cerveau à l’aide d’ordinateurs géants. Des scientifiques du monde entier y travaillent et en 2013, le Blue Brain a donné lieu au Human Brain Project, qui vise à simuler le fonctionnement du cerveau humain d’ici 2024. ", '', '', '', '', '', '', '', '', '', '', '', "En 563, une partie d'une montagne dans le bas-Chablais s'est détachée et est tombée dans le lac, provoquant un tsunami. Une vague atteignant 16 mètres ravagea tout le rivage  du Léman.", '', 'BONUS',
            '', '', '', '', '', '', '', '', "Le deuxième startpack représente nos amis Suisses allemands !", '', "Quoi de meilleur qu'une bonne fondue ou une bonne raclette ? En plus, 70% de notre consommation est suisse. ", '', '', '', "Il n'est pas célébré chaque premier dimanche, mais chaque premier week-end (entier) du mois !", '', "Il existe 8 pays ayant une ville se nommant  [fribur] : l'Afrique du Sud, l'Allemagne, le Brésil, la Pologne, la Suisse, la France et la Röpublique tchèque !", '', '', '', "C'est la fondue française qui est faite de Beaufort et de Comté ! ", '', '', '', "Malgré tout, un Anglais n'a pas reçu sa naturalisation, car il ne connaissait pas l'origine exacte de la raclette. ", '', 'BONUS',
            '', '', '', '', "La pointe Dufour se trouve à 4'634 m d'altitude ce qui fait d'elle le plus haut sommet de Suisse ! Elle se situe dans le mont Rose, sur la commune de Zermatt.", '', '', '', '', '', '', '', '', '', "Et oui, même si on le voit ici de dos, notre Cervin reste l'emblème le plus connu de Suisse. La deuxième photo nous montre la dent blanche qu'on trouve au Valais.", '', "Et oui, malgré les 13 victoires consécutives du FC Sion à la coupe de Suisse les étoiles représentent les 13 districts du canton.", '', '', ''," Le 8 février, le skieur Pirmin Zubriggen avait été héliporté sur le Cervin, où il avait mis à feu un bidon d'huile. L'action pour la candidature de Sion à l'organisation des JO de 2026 s'était déroulée en présence de Christian Constantin et du conseiller d'État valaisan Christophe Darbellay. ",'','','','','','BONUS',
            "Le deuxième starterpack désigne le canton de Vaud !", '',"Cependant, la Suisse est le pays ayant le plus de centenaires du monde ! 0.01% des Suisses sont centenaires.",'','','','','',"C'est le Saint-Gothard qui traverse les Alpes sur 57km. Il est ouvert depuis le 1er juin 2016.",'','','','','','','',"Cependant, on y trouve le principal fabricant de lingots d'or ! C'est la raffinerie Pamp, basée à Castel San Pietro.",'',"La deuxième image est un instrument appenzellois se nommant le Talerschwingen.",'','',
            "On parle souvent du romanche comme une seule langue, mais en réalité, il existe 5 langues naturelles différentes ayant chacune leur forme écrite.",'','','',"Le canton des Grisons est bordé par le Liechtenstein au nord, l'Autriche au nord et à l'est, l'Italie au sud et au sud-est, et les cantons de Saint-Gall au nord-ouest, Glaris et Uri à l'ouest et du Tessin au sud-ouest.",'','','',"Le canton des Grisons est le seul canton trilingue de Suisse. On y parle aussi l'allemand (75%) et l'italien (12%).", '','','','','',"Le capun est un plat traditionnel des Grisons.",'','','',"C'est St-Moritz qui a accueilli 2 fois les Jeux olympiques d'hiver ! Ceux de 1928 et de 1948.",'',"Le canton des Grisons est le canton le plus étendu géographiquement avec une superficie de 7'105km2. C’est le plus grand de Suisse.",'','','',"«Une cloche pour Ursli» a comptabilisé plus de 450 000 entrées sur tout le territoire. Le film est sorti en 2015, c'est une adaptation du roman «Schellen-Ursli» de Selina Chönz.",'','BONUS',
            "Et oui, on trouve plus de 1500 lacs qui couvrent une surface de 14'422km². ",'','','',"La deuxième photo nous montre Berne ! Les deux villes sont traversées par un fleuve, Lucerne est traversée par la Reuss et Berne par l'Aar.",'','','','','',"La gourmandise de fête que les Lucernois adorent est le pain d’épice aux poires, préparé avec des raisins secs, des noix et des épices.",'', 'Le deuxième écusson est celui de Zurich !','','','',"Cet incendie était d'une grande violence et a ravagé la plus grande partie du bâtiment de style Art nouveau.",'',"L'autre image représente le lion de la confédération qui se trouve au cimetière d'Oakland à Atlanta.",'','BONUS',
            "Le deuxième starterpack était celui du Valais !",'',"La ville  a été confondue avec un village allemand pendant la Seconde Guerre mondiale et les Alliés ont largué des bombes à sa périphérie. Il s'agit de la seule ville de Suisse à avoir été bombardée pendant la Seconde Guerre mondiale.",'','','','','',"L'autre écusson est celui d'Uri, un des cantons fondateurs de la Suisse.",'',"L'identité numérique permet de remplir des formulaires administratifs en passant par un portail numérique cantonal.",'','','',"Sur la deuxième photo, on peut voir les chutes du Day près d'Orbe. Les chutes du Rhin sont les plus grandes chutes de Suisse.",'',"Un gardien habite la tour et sonne la cloche à la main tous les jours à 21h00 pendant 5 minutes depuis 1589.",'',"La deuxième image représente un village alsacien en France.",'','BONUS',
            "Petite astuce mémotechnique : sur l'écusson Bâle-Campagne, il y a des petites dents qui font penser à une roue de tracteur. ",'',"Le carnaval de Bâle est le plus grand de Suisse et le plus grand carnaval protestant du monde.",'','','','','','','',"Et oui, depuis une terrasse de la ville accessible depuis le cloître de la cathédrale, il est possible d'être dans 3 pays : au centre en Suisse, à gauche en France et à droite en Allemagne.",'',"La deuxième image représente la cathédrale de Lausanne.",'','','','','',"Une partie de la ville n'a pas été détruite par un tsunami, mais par un tremblement de terre et un incendie en 1356.",'',"Le Baselworld est un salon mondial de l'horlogerie et de la bijouterie. Sa première édition remonte à 1917. Le salon se déroule généralement pendant les dernières semaines de mars sur une superficie de 141 000 m²",'','','','BONUS',
            "Plus de 1200 personnes ont participé au « Aareböötle », elles se sont réunies sur l'Aar après un appel d'un portail de loisir.",'',"Si vous vous promenez dans la vieille ville, vous pourrez l'entendre sonner et l'admirer en mouvement. ",'','','',"On l'appelle aussi le Zibelemärit, ce marché se tient tous les quatrièmes lundi de novembre au centre Berne. Les oignons sont traditionnellement présentés sous la forme de tresses.",'','','', "Celle-ci était facile ;) Le deuxième bâtiment est le musée du vitrail et des arts du verre qui se trouve à Fribourg. Un très joli bâtiment également.",'',"La ville de Berne accueille des ours depuis 1513. On en trouvait même jusqu’en 1857 au cœur de la ville, puis dans la fosse aux ours et depuis 2009 au Parc aux ours.",'',"La ville y est inscrite depuis 1983 grâce à ses trésors architecturaux.",'',"Le Blausee est un des lacs bleus le plus connu de Suisse, mais il en existe d'autres, comme sur l'autre photo qui représente le lac bleu d'Arolla.",'',"Une scène ouverte de la drogue se développe à Berne à la fin des années 1980 dans le parc de la Kleine Schanze, lorsque le parc est évacué en novembre 1990, la scène se déplace provisoirement devant le Palais fédéral. ",'','BONUS',
            '','','','','Le chocolat en poudre Caotina est produit à Neuenegg, près de Berne.','','','','','','','','','','','','','','','','','',"Les expositions nationales suisses ont lieu tous les 25 ans, elles représentent un «mirroir» de la société suisse à un moment donné. La dernière s'est tenue en 2002 à Neuchâtel, Bienne, Yverdon-les-Bains et Morat. ",'','','','','','BONUS',
            "Ce nom est bien plus explicite qu'une nounou !",'',"Tally Weijl a été créée en 1948 à Lohn dans le canton de Schaffhouse",'', "C'est une rumeur bien tenace, mais elle est fausse ! Vous avez le droit d'aller aux toilettes la nuit. Il est tout de même interdit de faire du tapage nocture entre 22h00 et 6h00.", '',"C'est un mot québécois pour désigner les culottes.",'',"1848 est l'année de la constitution fédérale, le fondement de l’état fédéral moderne",'','','',"Chez nous, on le considère comme notre ange gardien. En France il se surnomme SAM (sans accident mortel), en Belgique Bob et Raoul au Luxembourg.",'','','', "Pourquoi se compliquer la vie avec «distributeur à billet» ?", '', "Et 80% de nos importations proviennent d'Allemagne, de France et d'Italie.",'','BONUS',  
        ];
        $idQuestion2 = [
            '1', '1', '1', '1', '2', '2', '2', '2', '3', '3', '3', '3', '4', '4', '4', '4', '5', '5', '5', '5', '6', '6', '7', '7', '7', '7', '8', '8', '9',
            '10', '10', '10', '10', '11', '11', '12', '12', '12', '12', '13', '13', '14', '14', '15', '15', '15', '15', '16', '16', '16', '16', '17', '17', '18',
            '19', '19', '19', '19', '20', '20', '20', '20', '21', '21', '22', '22', '22', '22', '23', '23', '24', '24', '24', '24', '25', '25', '25', '25', '26', '26', '27',
            '28', '28', '28', '28', '29', '29', '29', '29', '30', '30', '31', '31', '31', '31', '32', '32', '33', '33', '33', '33','34','34','35','35','35','35','36',
            '37','37','38','38','39','39','39','39', '40','40','41','41','42','42','42','42','43','43','44','44','45',
            '46','46','46','46','47','47','47','47','48','48','48','48','49','49','50','50','50','50', '51','51','52','52','52','52','53','53','54',
            '55','55','55','55','56','56','57','57','57','57', '58','58','59','59','60','60','61','61','62','62','63',
            '64','64','65','65','66','66','66','66','67','67','68','68','68','68','69','69','70','70','71','71','72',
            '73','73','74','74','74','74','75','75','75','75','76','76','77','77','78','78','78','78','79','79','80','80','80','80','81',
            '82','82','83','83','83','83','84','84','84','84','85','85', '86','86','87','87','88','88','89','89','90',
            '91','91','91','91','92','92','93','93','93','93','94','94','94','94', '95','95','95','95','96','96','96','96','97','97','98','98','98','98','99',
            '100','100','101','101', '102','102', '103','103', '104','104', '104','104', '105','105','105','105', '106','106', '107','107','108',  
        ];
        $statut2 = [
            true, false, false, false, false, false, true, false, false, true, false, false, false, false, true, false, true, false, false, false, false, true, false, false, false, true, true, false, false,
            false, true, false, false, true, false, false, false, true, false, true, false, false, true, false, false, false, true, true, false, false, false, true, false, false,
            false, false, false, true, false, true, false, false, true, false, false, false, true, false, false, true, false, false, false, true, false, true, false, false, false, true, false,
            false, false, true, false, false, false, false, true, false, true, false, true, false, false, true, false, true, false, false, false,true,false,false,false,true,false,false,
            false, true, false, true, false, false, false, true, true, false, true, false, true, false, false, false, false, true, true, false,false,
            false, false, false, true, false, false, true, false, false, true, false, false, true, false, true, false, false, false, false,true,false,false,true, false, true, false, false,
            true, false, false, false, false, true, false, true, false, false, false, true, true, false, true, false, true, false, false, true,false,
            true, false, true, false, false, false, true, false, false, true,false, false, true, false, false, true, true, false,true, false,false,
            false, true, false, false, false, true, true, false, false, false, true, false, true, false, false, false, true, false, false, true, true, false, false, false, false,
            true, false, false, true, false, false, true, false, false, false, true, false, false, true, true, false, false, true, true, false, false,
            false, false, false, true, false, true, true, false, false, false, false, false, true, false, false, true, false, false, false, true, false, false, true, false, false, false, true, false, false,
            true, false, true, false, false, true, false, true, true, false, false, false, false, false, false, true, true, false, true, false, false, 
       
        ];    

       

        for ($i = 1; $i <= sizeof($anecdote) - 1; $i++) {
            DB::table('reponses')->insert([
                'enonce' => 'Réponse n°' . $i,
                // 'ordre' => rand(0, 10),
                // 'statut' =>  $statut[$i],
                // 'anecdote' => $anecdote[$i],
                // 'idQuestion' => $idQuestion,

                'enonce' => 'Réponse n°' . $i,
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