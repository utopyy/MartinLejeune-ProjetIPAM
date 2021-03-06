/*
SQLyog Community v13.1.5  (64 bit)
MySQL - 10.4.11-MariaDB : Database - wayprotein
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`wayprotein` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `wayprotein`;

/*Table structure for table `adress` */

DROP TABLE IF EXISTS `adress`;

CREATE TABLE `adress` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `house_number` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `delete` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `un_log` (`username`),
  CONSTRAINT `adress_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

/*Data for the table `adress` */

insert  into `adress`(`id`,`country`,`city`,`zip`,`street`,`house_number`,`username`,`delete`) values 
(1,'France','Paris','3001','Joncs','3B','user',0),
(2,'Belgique','Nivelles','1400','Paquette','103','admin',0),
(38,'Belgique','Namur','1532','Tourette','2','user3',0),
(39,'Belgique','Dour','2424','Doureuuuh','24','user2',0),
(40,'Espagne','Malaga','2049','Seniorita','2','user4',0);

/*Table structure for table `article` */

DROP TABLE IF EXISTS `article`;

CREATE TABLE `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` float NOT NULL,
  `category_id` int(11) NOT NULL,
  `photo_path` varchar(255) DEFAULT NULL,
  `delete` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `article_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `sub_category` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=94 DEFAULT CHARSET=latin1;

/*Data for the table `article` */

insert  into `article`(`id`,`title`,`description`,`price`,`category_id`,`photo_path`,`delete`) values 
(1,'ATHLITECH FONTE 5KG','Fonte compatible avec les barres GO Sport. Diametre : 2.8 cm Poids : 5 kg ',16,1,'public/img/mat/p1.jpg',0),
(2,'ATHLITECH FONTE 10KG','Fonte compatible avec les barres GO Sport. Diametre : 2.8 cm Poids : 10 kg ',15,1,'public/img/mat/p2.jpg',0),
(3,'FLYING DISC ASSORTED','Ils sont grands, colorés, très sûrs et trop amusants pour être posés. La conception unique comprend un tube extérieur en plastique recouvert de mousse recouvert d\'un tissu intérieur extensible. L\'ensemble comprend 3 disques volants graphiques de couleurs ',2.99,1,'public/img/mat/p3.jpg',0),
(4,'ATHLITECH HALTERE 10 KG','Pour bien commencer la musculation chez soi. Idéal pour muscler le haut du corps : épaules, biceps, triceps, dorsaux et pectoraux. Compatible avec les barres GO Sport. Composition : 4 disques de 1 kg, 2 disques de 2 kg, 2 stops disques pour des barres de ',19,2,'public/img/mat/p4.jpg',0),
(5,'ATHLITECH HALTERE 15 KG','Pour bien commencer la musculation chez soi. Idéal pour muscler le haut du corps : épaules, biceps, triceps, dorsaux et pectoraux. ',25.99,2,'public/img/mat/p5.jpg',0),
(6,'EQUIPMENT EVERLAST','Accessoires entrainement Poids Everlast Equipment Neck Developer. Caractéristiques:- Bluetooth montre Smart Watch Phone - 1.3Mp Caméra Sync Appel SMS Passometer, Fitness Tracker, sommeil Tracker, un message Rappel, Rappel dappel, répondre é un appel, comp',41.24,2,'public/img/mat/p6.jpg',0),
(7,'FITNESS AVENTO KTTLEBELL','Avec ce kettlebell d\'Avento, vous serez en mesure de renforcer vos muscles de manière sûre et efficace. ',19.08,2,'public/img/mat/p7.jpg',0),
(8,'PURE2IMPROVE SAC 10KG','Ce sac de force de 10 kg de la marque pure2improve est l\'accessoire idéal pour un entraînement corporel total ! ',78.56,2,'public/img/mat/p8.jpg',0),
(9,'PURE2IMPROVE SAC 5KG','Ce sac de force de 5 kg de la marque pure2improve est l\'accessoire idéal pour un entraînement corporel total ! ',72.52,2,'public/img/mat/p9.jpg',0),
(10,'CROSS TRAINING KIT','Accessoires entrainement poids everlast equipment cross training kit. Caractéristiques:- bluetooth montre smart watch phone - 1.3mp caméra sync appel sms passometer, fitness tracker, sommeil tracker, un message rappel, rappel dappel, répondre à un appel, ',280.45,2,'public/img/mat/p10.jpg',0),
(11,'CEINTURE D\'HALTEROPHILIE','Cette ceinture d\'haltérophilie de pure2improve soutiendra efficacement le bas de votre dos pendant les flexions des jambes et les soulevés de terre ! ',47.12,2,'public/img/mat/p11.jpg',0),
(12,'JULIUS K9 HALTERES EN BOIS DUR','Fabriqué en bois dur disponible en différentes tailles et formes durable quantité : 1 modèle : 26200e référence fabricant : 26200e type : divers fabricant : k9-sport kft. ',41.01,2,'public/img/mat/p12.jpg',0),
(13,'FITNESS CARE MEDECINE BALL 3KG','La Medecine ball noire et bleue de Care pèse 3 kg, cest une balle de fitness conçue pour des entraînements à domicile. Cette balle est conçue pour travailler le bas et le haut du corps en synergie. Son excellent grip et son ergonomie en font un produit ef',29.99,3,'public/img/mat/p13.jpg',0),
(14,'FITNESS SVLETUS RACK','Parfait pour ranger et stocker les médecine balls. 20 broches. Capacité : 10 pièces. Vendu sans médecine ball. Charge maximale : 80 kg. ',289.78,3,'public/img/mat/p14.jpg',0),
(15,'FITNESS TREMBLAY MEDECINE BALL','Medecine ball tremblay 1,5 kg en pvc ',32.99,3,'public/img/mat/p15.jpg',0),
(16,'SAC MULTISPORT ADIDAS 3S DUF','Ce sac de sport en toile de format moyen se convertit en sac à dos pour transporter facilement tes affaires. Doté de nombreuses poches pour organiser ton équipement, il possède un compartiment aéré pour ranger tes chaussures. Conçu en polyester résistant,',24.99,4,'public/img/mat/p16.jpg',0),
(17,'CHAUSSETTES FEMME INV FINE F','Pack de 3 paires de chaussettes SOFTwr pour Femme. Fines et invisibles. ',4.99,4,'public/img/mat/p17.jpg',0),
(18,'SHAKER MUSCULATION NUTRITION','Shaker classique qui mélangera facilement vos protéines. ',5.99,4,'public/img/mat/p18.jpg',0),
(19,'HOMME NIKE H86 METAL SWOOSH','Accessoires homme casquettes et chapeaux nike h86 metal swoosh. La casquette réglable nike metal swoosh h86 présente une fermeture à clip personnalisable à larrière',38.31,4,'public/img/mat/p19.jpg',0),
(20,'ATHLITECH ABDOGO TWO II','2 en 1 : cette planche abdo sert aussi de banc de musculation sans chandelle.Siège capitonné avec un renfort de fessiers.',69.99,5,'public/img/mat/p20.jpg',0),
(21,'ATHLITECH BENCH COMPACT','Rembourage en mousse assise pour un confort optimal revêtement simili cuir pour un entretien facile. Fonctions: Au moins 8 excercices possibles grâce à ce banc de musculation.',99.99,5,'public/img/mat/p21.jpg',0),
(22,'DOUDOUNE MULTICOLORE BLEU','Conçue avec des panneaux de couleurs vives, soyez prêt à faire la différence avec cette doudoune. Elle est dotée de poches zippées et d\'un col chéminée. \r\n\r\nLe mannequin mesure 1m88 et porte la taille M\r\n\r\nComposition: 100% polyester\r\n',29.99,6,'public/img/vet/p1.jpg',0),
(23,'VESTE REFLECHISSANTE ARGENT','Cette veste d\'entraînement haute performance est livrée avec une ventilation en maille dans le dos, une capuche 3 pièces et une finition hydrofuge   — idéal pour la course en plein air, toute l\'année.\r\n\r\nLe modèle mesure 1m88 et porte une taille L\r\n\r\nComposition du tissu: 100% polyester',62,6,'public/img/vet/p2.jpg',0),
(24,'PROTECH QUILTED BOMBER','Restez au chaud grâce à ce bomber matelassé Pro-Tech qui combine un rembourrage confortable avec un fini résistant à l\'eau pour vous protéger des intempéries.\r\n\r\nLe modèle mesure 1,82 m et porte une taille M.\r\n\r\nComposition :\r\n\r\nExtérieur : 100% polyester\r\n\r\nDoublure : 100% polyester\r\n',19,6,'public/img/vet/p3.jpg',0),
(25,'REST DAY RUBAN NOIR','Un design intemporel pour un usage quotidien, notre sweat à capuche Rest Day Ruban comprend une capuche 3 pièces, des bandes latérales de marque et une coupe oversize pour un confort décontracté.\r\n\r\nLe modèle mesure 1m88 et porte une taille L\r\n\r\nComposition du tissu: 80% coton 20% polyester\r\n',50,7,'public/img/vet/p4.jpg',0),
(26,'REST DAY RUBAN CAMEL','Un design intemporel pour un usage quotidien, notre sweat à capuche Rest Day Ruban comprend une capuche 3 pièces, des bandes latérales de marque et une coupe oversize pour un confort décontracté.\r\n\r\nLe modèle mesure 1m88 et porte une taille L\r\n\r\nComposition du tissu: 80% coton 20% polyester\r\n',50,7,'public/img/vet/p5.jpg',0),
(27,'SWEATSHIRT EVO GRIS CHINE','Aller à l\'essentiel avec le sweatshirt Evo, fabriqué dans un tissu texturé léger et avec des panneaux qui moulent le corps. Il possède un col ras le cou et un logo effet métal. \r\n\r\ntaillé dans une coupe classique, avec des poches latérale et un logo effet métal. \r\n\r\nComposition: 85% polyester 15% coton\r\n\r\nLe mannequin mesure 1m85 et porte la taille M\r\n',21.99,7,'public/img/vet/p6.jpg',0),
(28,'JOGGING FORM PRO VERT SAPIN','Allez où vous le souhaitez au quotidien avec style avec le jogging Form Pro, équipé d\'un cordon de serrage à la taille et de poches zippées pour vos objets de valeur. \r\n\r\nLe mannequin mesure 1m88 et porte la taille L\r\n\r\nComposition: 66% polyester 27% soie artificielle 7% élasthanne\r\n',23.9,8,'public/img/vet/p7.jpg',0),
(29,'JOGGING TRICOT DOUBLE BAND','Pour que vous soyez confortable avec un mélange de coton doux et une coupe ajustée, nos pantalons de jogging Tricot à double bande sont un excellent choix pour vos jours de repos. Une conception ajustée et des imprimés bandes aux jambes, pour un style subtil.  \r\n\r\nLe modèle mesure 1m88 et porte une taille L\r\n\r\nComposition du tissu: 51% polyester 44% coton 5% élasthanne\r\n',40,8,'public/img/vet/p8.jpg',0),
(30,'THE ORIGINAL JOGGERS','Avec un confort et un ajustement parfait, notre jogging The Original est indispensable à votre sac de sport et à vos jours de repos.\r\n\r\nLe modèle mesure 1,88 m et porte une taille M.\r\n\r\nNoir : 51% polyester 49% coton\r\n',28,8,'public/img/vet/p9.jpg',0),
(31,'JOGGING A BLOCS KAKI','Lorsque le design classique rencontre les blocs de couleur avec un jogging à la coupe décontractée qui présente des poches latérales ouvertes et un cordon d\'ajustement à la taille pour votre confort lorsque vous bougez. \r\n\r\nLe mannequin mesure 1m90 et porte la taille L\r\n\r\nComposition: 51% polyester 44% coton 5% élasthanne\r\n',21.99,8,'public/img/vet/p10.jpg',0),
(32,'SHORT DE BAIN ATLANTIC NOIR','Faites un plongeon dans le short de bain Atlantic, conçu avec un slip en maille et une ceinture élastique pour un confort total, vous serez équipé pour l\'été. \r\n\r\nLe mannequin mesure 1m85 et porte la taille M\r\n\r\nComposition: 100% polyester\r\n',26,9,'public/img/vet/p11.jpg',0),
(33,'SHORT D ENTRAINEMENT NOIR','Nos shorts d\'entraînement cochent toutes les cases quand il s\'agit de vêtements d\'entraînement de haute performance sur lesquels vous pouvez compter. Combinant un tissu léger avec des ourlets fendus sur les côtés, ils permettent une totale liberté de mouvement, ainsi qu\'un panneau de ventilation pour une meilleure circulation de l\'air. De plus, avec des poches latérales zippées, vous avez un endroit sûr pour ranger vos objets de valeur.\r\n\r\nLe modèle mesure 1m88 et porte une taille L\r\n\r\nComposition du tissu: 88% polyester 12% élasthanne\r\n',36,9,'public/img/vet/p12.jpg',0),
(34,'TSHIRT MANCHES NOIR CHINE','Faites preuve de puissance à chaque répétition, série, et circuit dans le t-shirt macnhes longues Performance, fabriqué avec un tissu léger et extensible pour que vous restiez frais et confortable.\r\n\r\nLe mannequin mesure 1m83 et porte la taille M\r\n\r\nComposition: 81% viscose 14% polyester 5% élasthanne\r\n',15.99,10,'public/img/vet/p13.jpg',0),
(35,'TSHIRT LOGO TAPE NOIR','Restez dans la simplicité avec le T-Shirt Logo Tape, conçu pour une tenue décontractée extra-large, avec un col rond classique et un logo sur la manche.  \r\n\r\nLe mannequin mesure 1m90 et porte la taille L\r\n\r\nComposition: 100% cotton\r\n',13.99,10,'public/img/vet/p14.jpg',0),
(36,'TSHIRT D\'ENTRAINEMENT NOIR','Notre T-shirt d\'entraînement a toutes les caractéristiques pour vous plaire. Doté d\'une technologie anti-transpiration et d\'une finition antibactérienne pour vous garder plus frais plus longtemps, il vous suivra à chacun de vos mouvements.  \r\n\r\nLe modèle mesure 1m88 et porte une taille L\r\n\r\nComposition du tissu: 95% polyester 5% élasthanne\r\n',30,10,'public/img/vet/p15.jpg',0),
(37,'LUXE CLASSIC DROP TANK','Avec son tissu ultra-doux, idéal pour vos journées de repos, notre débardeur de luxe Classique est conçu pour un ajustement intemporel.\r\n\r\nLe modèle mesure 1,82 m et porte une taille M.\r\n\r\nComposition :\r\n\r\nNoir : 51% coton 45% modal 4% élasthanne\r\n\r\nBlanc : 48% modal 48% coton 4% élasthanne\r\n',24,10,'public/img/vet/p16.jpg',0),
(38,'DEBARDEUR INFINITY NOIR','Tissu anti-transpirant et léger pour vous garder au frais à chaque entrainement. Avec une finition antibactérienne, ce débardeur est indispensable pour complèter vos tenues de sport.\r\n\r\nLe mannequin mesure 1m85 et porte la taille M\r\n\r\nTissu: 90% polyester 10% élasthanne\r\n',26,10,'public/img/vet/p17.jpg',0),
(39,'IMPACT WHEY PROTEIN','Contenant 21g de protéines par portion, cette protéine en poudre de qualité supérieure vous fournit l’apport en protéines dont vous avez besoin.D’où provient la whey ? Elle provient des mêmes vaches qui produisent votre lait et votre fromage : elle est simplement filtrée, évaporée et séchée par pulvérisation afin de produire des nutriments 100% naturels.Classée dans la catégorie A par Labdoor, un évaluateur indépendant, en vertu de sa qualité et sa valeur, l’Impact Whey Protein est officiellement certifiée comme l’une des meilleures protéines en poudre sur le marché.Elle se décline en plus de 40 saveurs, notamment Chocolat, Vanille et Crème à la fraise, des meilleures ventes délicieuses.',7.99,11,'public/img/nut/p1.jpg',0),
(40,'IMPACT WHEY PROTEIN ELITE','Avec 20g de protéines par portion, ce mélange de qualité supérieure vous offre toutes les protéines dont vous avez besoin. Provenant des mêmes vaches qui produisent votre lait et votre fromage, il est simplement filtré et séché par pulvérisation pour produire des nutriments 100% naturels.Testées dans le cadre du programme Informed-Sport, nos protéines en poudre Impact Whey Protein Elite ont également été testées par le laboratoire sportif de renommée mondiale LGC, conformément aux directives de l\'Agence mondiale antidopage (AMA), et sont donc officiellement sûres pour les athlètes professionnels de tous niveaux.',47.99,11,'public/img/nut/p2.jpg',0),
(41,'HARD GAINER EXTREME','Notre Hard Gainer Extreme est un complément alimentaire favorisant la prise de masse. Il contient 35 g de protéines par portion, ce qui est idéal pour la prise de muscles et le maintien de ces derniers.\r\n\r\nIl contient également 62 g de glucides par portion, constituant ainsi une excellente source d’énergie pour votre entraînement tout en favorisant la récupération après l’effort.',35.99,11,'public/img/nut/p3.jpg',0),
(42,'THE WHEY PLUS','Poursuivez vos objectifs grâce à THE Whey+ doté de la technologie PhaseTech™, notre formule de lactosérum la plus avancée. Notre système de billes à libération prolongée optimise la récupération grâce à une stimulation progressive de la BCAA, de la leucine et de la glutamine, qui sont naturellement présentes dans les protéines et qui aident à construire et à réparer de nouveaux muscles.1\r\n\r\nTHE Whey+ utilise une combinaison d\'ingrédients de pointe dont GroPlex™ ainsi que des protéines pour favoriser le développement musculaire1 et vous aider à rester au meilleur de votre forme.',41.99,11,'public/img/nut/p4.jpg',0),
(43,'PROTEINE DE WHEY BIO','Notre Protéine de Whey Bio est obtenue auprès d\'exploitations laitières certifiées bio, où les vaches ont la liberté de se déplacer et de vivre le plus naturellement possible.\r\n\r\nNotre lactosérum provient de vaches qui se nourrissent uniquement dans de riches et verdoyants pâturages. Il est ensuite filtré pour offrir une qualité optimale et une quantité impressionnante de 20 g de protéines par portion.\r\n',25.19,11,'public/img/nut/p5.jpg',0),
(44,'IMPACT WHEY PROTEIN THE','Joignez-vous à nos célébrations pour les 14 ans de la marque avec la protéine la plus populaire du Royaume-Uni, disponible dans un arôme thé au lait. Le lactosérum de qualité supérieure contient 21 g de protéines par portion et est simplement filtré et séché par pulvérisation pour produire des nutriments entièrement naturels.',18.99,11,'public/img/nut/p6.jpg',0),
(45,'IMPACT DIET WHEY (250G)','Une protéine en poudre délicieuse, contenant 39 g de protéines par portion ainsi que d’autres ingrédients spécialement sélectionnés pour vous accompagner dans le cadre de votre programme amincissant.',8.95,11,'public/img/nut/p7.jpg',0),
(46,'COOKIE PROTEINE','Nous avons repoussé nos limites afin de vous offrir un délicieux cookie contenant 38 g de protéines et décliné en sept saveurs délicieuses, telles que Double chocolat et Rocky Road : un en-cas idéal pour faire le plein de protéines.\r\nQu’est-ce que notre Cookie protéiné ? \r\n\r\nIl s’agit d’un délicieux biscuit protéiné riche en protéines, idéal pour accompagner votre programme d’entraînement puisque les protéines contribuent au développement et au maintien de la masse musculaire1. Il satisfera toutes vos petites faims sur le pouce, que ce soit au travail pour accompagner votre café du matin ou juste après une séance d’entraînement. \r\n',29.99,12,'public/img/nut/p8.jpg',0),
(47,'BEURRE DE CACAHUETE','Créé à partir d’un mélange de cacahuètes brunes grillées, notre Beurre de cacahuète est entièrement naturel et riche en protéines, ce qui en fait un produit idéal pour soutenir votre entraînement et satisfaire les petites faims.\r\nQu’est-ce que notre Beurre de cacahuète ?\r\n\r\nNotre Beurre de cacahuète est une délicieuse pâte à tartiner à base de cacahuètes grillées à sec, riche en fibres, en vitamine E et en magnésium, deux micronutriments essentiels. Il procure d’excellents bienfaits pour la santé et le bien-être quotidien.\r\n\r\nEn outre, cet en-cas ultra-nutritif est sans sel, sans sucre, sans huile de palme et sans agents de conservation, ce qui en fait une gourmandise simple permettant de soutenir vos efforts sportifs.',9.49,12,'public/img/nut/p9.jpg',0),
(48,'PANCAKE PROTEINE','Qu’est-ce que notre Préparation pancake protéiné ?\r\n\r\nContenant des protéines de haute qualité issues du lait, du petit-lait et des œufs, cette préparation pour pancakes vous procure des nutriments à digestion lente et rapide, ce qui en fait le choix idéal pour un petit-déjeuner rassasiant.\r\n',8.39,12,'public/img/nut/p10.jpg',0),
(49,'MONOHYDRATE EN POUDRE','Qu’est-ce que la créatine ?\r\n\r\nLa créatine est un ingrédient populaire dans de nombreux compléments tout-en-un dédiés aux sportifs, qui augmente la capacité de l’organisme à générer de l’énergie rapidement1. Elle est naturellement présente en petites quantités dans l’organisme, mais de nombreuses personnes en prennent en complément pour améliorer leurs performances sportives1.\r\nQu’est-ce que le monohydrate de créatine ?\r\n\r\nLe monohydrate de créatine est l’une des formes de créatine les plus recherchées au monde. Il a été scientifiquement prouvé que notre poudre augmente les performances physiques1, en améliorant la puissance globale.',6.29,13,'public/img/nut/p11.jpg',0),
(50,'MONOHYDRATE DE CREATIN','Nos comprimés de monohydrate de créatine sont un moyen très pratique d\'obtenir les effets scientifiquement prouvés de la créatine, soit une amélioration de vos performances, séances après séances.',18.49,13,'public/img/nut/p12.jpg',0),
(51,'BCAA','Notre poudre de BCAA pratique renferme un mélange d’acides aminés essentiels à consommer au quotidien et constitue un excellent complément dans le cadre de votre programme sportif.\r\nQue sont les BCAA ?\r\n\r\nLes BCAA, ou acides aminés à chaîne ramifiée, sont composés de leucine, d’isoleucine et de valine. Ils sont naturellement présents dans les protéines et contribuent à construire et à réparer les nouveaux muscles1.',23.99,14,'public/img/nut/p13.jpg',0),
(52,'L GLUTAMINE','L\'un des acides aminés les plus populaires, la glutamine, est naturellement présent dans les protéines et contribue à construire et à réparer les nouveaux muscles.1 Que vous pratiquiez l\'haltérophilie ou que vous vous démeniez lors de vos entraînements cardiovasculaires, nos comprimés pratiques sont une excellente façon de bénéficier de l\'apport en glutamine dont vous avez besoin.\r\n',18.89,14,'public/img/nut/p14.jpg',0),
(53,'IMPACT EAA','Qu\'est-ce que Impact EAA ?\r\n\r\nNotre complément Impact EAA garantit un mélange de haute qualité des neuf acides aminés essentiels, sans calories et sans sucre*, afin de bénéficier d\'un apport nécessaire d\'acides aminés sans compromettre votre forme physique. \r\n\r\nContenant le même profil en acides aminés essentiels que notre Impact Whey Protein, mais présentant un taux plus rapide d\'absorption des acides aminés1, et un ratio de 4:1:1 de BCAA, de leucine, d\'isoleucine et de valine.\r\n\r\nCe complément d\'acides aminés de qualité supérieure va devenir votre meilleur allié sportif !',25.99,14,'public/img/nut/p15.jpg',0),
(54,'THE PRE WORKOUT PLUS','Aiguisez votre esprit et boostez vos entraînements avec THE Pre-Workout+. Développé avec Phasetech™, notre technologie unique à libération prolongée conçue pour optimiser l\'absorption des ingrédients.\r\n\r\nTHE Pre-Workout+ utilise une combinaison d\'ingrédients de pointe comme VASO6™ et de la caféine biphasée pour améliorer l\'endurance et vous aider à rester au meilleur de votre forme.',38.79,14,'public/img/nut/p16.jpg',0),
(55,'ZINC EN COMPRIMES','En ne prenant qu\'un seul de ces comprimés puissants, vous bénéficierez de 100 % de votre apport journalier recommandé en zinc, un oligoélément essentiel qui joue un rôle fondamental dans de nombreuses fonctions importantes du corps, y compris le système immunitaire et le métabolisme',7.89,15,'public/img/nut/p17.jpg',0),
(56,'MUTLIVITAMINES','Les Multivitamines sont des gélules de vitamines complètes et pratiques au quotidien, développées spécialement pour les besoins nutritionnels spécifiques des femmes.\r\n\r\nC\'est un excellent moyen de booster votre apport en vitamines et minéraux, en complément de votre alimentation habituelle. Quels que soient vos objectifs, ce mélange est idéal pour vous aider à rester au meilleur de votre forme physique et mentale1 tout en maintenant votre style de vie actif.',16.79,15,'public/img/nut/p18.jpg',0),
(57,'SUPER OMEGA 3 GELULES','L\'oméga-3 est un acide gras essentiel qui n\'est pas fabriqué par le corps et qui doit donc être fourni par le biais de votre alimentation. L\'oméga-3 se trouve principalement dans l\'huile de poisson, ce qui signifie qu\'il peut être difficile d\'en obtenir suffisamment uniquement à partir de ce que vous mangez.',17.49,15,'public/img/nut/p19.jpg',0),
(91,'BAR PROTEIN','Avec jusqu\'à 75 % de sucre en moins que les produits disponibles en grande surface, ce biscuit vous permet de profiter d\'un coup de fouet en milieu d\'après-midi sans gâcher vos efforts.\r\nComposé d\'une délicieuse poudre de cacao et cuit au four avec des éclats de chocolat sucrés, notre Protein Bar apporte 23 g de protéines pour petit plaisir gourmand tous les jours.',4.99,12,'public/img/upload/5371588506871.jpg',0),
(92,'AAAAB','efze',2,5,'public/img/upload/3781588466868.jpg',1),
(93,'AAAB','ok',2,5,'public/img/upload/5811588467708.jpg',1);

/*Table structure for table `book` */

DROP TABLE IF EXISTS `book`;

CREATE TABLE `book` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `book_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

/*Data for the table `book` */

insert  into `book`(`id`,`user_id`) values 
(23,1),
(24,1),
(25,1),
(26,1),
(29,48),
(30,48),
(27,50),
(28,50);

/*Table structure for table `book_article` */

DROP TABLE IF EXISTS `book_article`;

CREATE TABLE `book_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `book_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`id`),
  KEY `book_id` (`book_id`),
  KEY `item_id` (`item_id`),
  CONSTRAINT `book_article_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `book` (`id`),
  CONSTRAINT `book_article_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `article` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=latin1;

/*Data for the table `book_article` */

insert  into `book_article`(`id`,`book_id`,`item_id`,`price`) values 
(41,23,91,4.99),
(42,23,42,41.99),
(43,23,42,41.99),
(44,24,3,2.99),
(45,24,21,99.99),
(46,25,6,41.24),
(47,25,23,62),
(48,25,33,36),
(49,25,47,9.49),
(50,26,41,35.99),
(51,26,42,41.99),
(52,27,91,4.99),
(53,27,40,47.99),
(54,27,39,7.99),
(55,27,56,16.79),
(56,28,29,40),
(57,28,35,13.99),
(58,28,39,7.99),
(59,28,18,5.99),
(60,29,39,7.99),
(61,30,3,2.99),
(62,30,41,35.99);

/*Table structure for table `category` */

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `category` */

insert  into `category`(`id`,`name`) values 
(1,'Materiel'),
(2,'Vetements'),
(3,'Nutrition');

/*Table structure for table `role` */

DROP TABLE IF EXISTS `role`;

CREATE TABLE `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `role` */

insert  into `role`(`id`,`role`) values 
(1,'Utilisateur'),
(2,'Administrateur');

/*Table structure for table `sub_category` */

DROP TABLE IF EXISTS `sub_category`;

CREATE TABLE `sub_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `id_category` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_category` (`id_category`),
  CONSTRAINT `sub_category_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `category` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

/*Data for the table `sub_category` */

insert  into `sub_category`(`id`,`name`,`id_category`) values 
(1,'Disques',1),
(2,'Halteres',1),
(3,'Medecine Ball',1),
(4,'Accessoires',1),
(5,'Bancs de musculation',1),
(6,'Vestes et Gilets',2),
(7,'Pulls',2),
(8,'Joggins et Bas',2),
(9,'Shorts',2),
(10,'T Shirts et Hauts',2),
(11,'Proteines',3),
(12,'Aliments et Snacks',3),
(13,'Creatine',3),
(14,'Acides amines',3),
(15,'Vitamines et Mineraux',3);

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `birthdate` date NOT NULL,
  `mail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(255) NOT NULL,
  `date_creation` date NOT NULL,
  `last_connection` date NOT NULL,
  `delete` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `un_username` (`username`),
  KEY `role_id` (`role_id`),
  CONSTRAINT `user_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`id`,`username`,`firstname`,`lastname`,`birthdate`,`mail`,`password`,`role_id`,`date_creation`,`last_connection`,`delete`) values 
(1,'user','Michel','Sardou','1984-04-02','michmich@gmail.coom','$2y$10$vNA3CGRccwU2phAHlVVFLufANg9Kor3yAHoM2dMAhfyWgP2cstC1C',1,'2020-04-15','2020-05-03',0),
(2,'admin','Michel','Angelo','1995-04-07','miaden@gmail.com','$2y$10$b4GnWwHbZZStEyen00JBsO5x4wZr52QeBvgLUP2Ev6zh6Pxo4.4bi',2,'2020-04-15','2020-05-03',0),
(48,'user3','zefz','fe','2020-05-20','user3@gmail.cez','$2y$10$QpO/d1Eo0fSACWMM9ywqF.9lb.Q3MWjfSQA.7zSBeUzdom5cUhEMa',1,'2020-05-03','2020-05-03',0),
(50,'user2','User','Deux','2020-05-05','user2@gmail.com','$2y$10$xl9JWcoiTQI6IaiUCWbMNe.NSKTOcvrClc7BcHBTXIY/vD93CeJqC',1,'2020-05-03','2020-05-03',0),
(51,'user4','User','Quatre','2020-05-19','user4@cze.c','$2y$10$owNGZa9qjWcyrb5tizaBQu/1mHjY7mxlfkx02PSwU45Ps4TgDH4xi',1,'2020-05-03','2020-05-03',0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
