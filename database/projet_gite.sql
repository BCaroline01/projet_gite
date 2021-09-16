-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 17 mars 2021 à 20:41
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet_gite`
--

-- --------------------------------------------------------

--
-- Structure de la table `accommodation`
--

DROP TABLE IF EXISTS `accommodation`;
CREATE TABLE IF NOT EXISTS `accommodation` (
  `idAccommodation` int(11) NOT NULL AUTO_INCREMENT,
  `nameAccommodation` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `sleeping` int(11) NOT NULL,
  `bathroom` int(11) NOT NULL,
  `adress` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `type` varchar(255) NOT NULL,
  PRIMARY KEY (`idAccommodation`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `accommodation`
--

INSERT INTO `accommodation` (`idAccommodation`, `nameAccommodation`, `description`, `sleeping`, `bathroom`, `adress`, `price`, `type`) VALUES
(1, 'Ryokan Inakatei', 'Situé à Kyoto, à 1,4 km du théâtre Samurai Kembu Kyoto, l’établissement Ryokan Inakatei propose des hébergements climatisés et un jardin. Doté d’une connexion Wi-Fi gratuite, ce ryokan se trouve à environ 1,5 km du temple Kiyomizu-dera et à 1,8 km du temple Shoren-in. Le musée international du manga de Kyoto se situe à 2,9 km, et à 3,3 km du centre de conférence TKP Garden City Kyoto.\r\n\r\nToutes les chambres disposent d\'une télévision à écran plat. Elles donnent accès à une salle de bains commune pourvue d\'un sèche-cheveux et d\'articles de toilette gratuits.\r\n\r\nCe ryokan est à 1,9 km du temple Sanjūsangen-dō et à 2,2 km du sanctuaire Heian-jingū. L\'aéroport international d’Osaka est le plus proche, à 39 km du Ryokan Inakatei.\r\n\r\nCet établissement est un ryokan : une auberge traditionnelle japonaise.', 2, 1, '605-0825 Kyoto, Kyoto, Higashiyama-ku, Shimogawara-cho 463, Japon ', '97.00', 'Ryokan'),
(2, 'Kyoto Nanzenji Ryokan Yachiyo', 'Situé à côté du temple historique de Nanzen-ji, le Kyoto Garden Ryokan Yachiyo propose des chambres chic de style japonais et de grands bains publics. Il est entouré de beaux jardins japonais dont les couleurs changent chaque saison. Une connexion Wi-Fi est mise gratuitement à votre disposition dans l\'ensemble de l\'établissement.\r\n\r\nLes chambres à l\'ambiance relaxante sont dotées d\'un sol en tatami, d\'un futon et d\'une télévision à écran plat. Certaines offrent une vue sur le jardin et d\'autres possèdent une salle de bains privative.\r\n\r\nLors de votre séjour au Yachiyo Garden Ryokan, vous pourrez vous détendre dans les bains publics ou dans le salon équipé d\'ordinateurs avec connexion Internet gratuite. Des massages peuvent être dispensés moyennant des frais supplémentaires. L\'établissement assure gratuitement un service de bagagerie. Une boutique de souvenirs est également présente sur place.\r\n\r\nCet établissement est un ryokan : une auberge traditionnelle japonaise.', 6, 2, '606-8435 Kyoto, Kyoto, Sakyou Nanzenji Fukuchi 34, Japon', '74.00', 'Ryokan'),
(3, 'RESI STAY THE KYOTO', 'Situé à Kyoto, à 1,1 km du TKP Garden City Kyoto et à 2,3 km du temple Sanjusangen-do, le RESI STAY Il offre une vue sur la ville et dispose d\'une connexion Wi-Fi gratuite.\r\n\r\nLes hébergements sont dotés de la climatisation, d\'une cuisine entièrement équipée, d\'une télévision et d\'une salle de bains privative avec bidet, sèche-cheveux et articles de toilette gratuits. Vous pourrez profiter d\'un micro-ondes, d\'un réfrigérateur et d\'une bouilloire.\r\n\r\nVous séjournerez à 2,6 km du musée international du manga de Kyoto et à 3 km du temple Kiyomizu-dera. L\'aéroport d\'Itami, le plus proche, est implanté à 37 km. \r\n', 4, 1, '308-2 Gakurin-cho, Shimogyo-ku, Kyōto, Kyoto, 600-8341, Japon', '120.00', 'Apartment'),
(4, 'Stay SAKURA Kyoto Matsuri', 'Situé à Kyoto, à 2,1 km du temple Sanjusangen-do et à 3,3 km du temple Tofuku-ji, le Stay SAKURA Kyoto Matsuri propose des hébergements avec une connexion Wi-Fi gratuite et un salon commun.\r\n\r\nLes logements sont dotés de la climatisation, d\'une kitchenette entièrement équipée avec un coin repas, d\'une télévision à écran plat ainsi que d\'une salle de bains privative avec un bidet, un sèche-cheveux et des articles de toilette gratuits. Vous pourrez profiter d\'un micro-ondes, d\'un réfrigérateur, de plaques de cuisson et d\'une bouilloire.\r\n        ', 6, 2, 'Shimogyo-ku Isematsucho 115 - 600-8254 KYOTO ', '112.00', 'Apartment'),
(5, 'Kyoto Shima', 'L\'établissement KYOTO SHIMA est situé à Kyoto, à 300 mètres du jardin TKP Garden City et à 1,4 km du temple Sanjusangen-do. Ses hébergements sont dotés d\'une connexion Wi-Fi gratuite, de la climatisation et d\'une télévision à écran plat.\r\n\r\nVous pourrez profiter d\'une terrasse.\r\n\r\nLe KYOTO SHIMA se trouve à 2,1 km du temple Tofuku-ji et à 2,6 km du musée international du manga de Kyoto. L\'aéroport d\'Itami, le plus proche, est implanté à 37 km.                ', 5, 1, ' 600-8216 NISHI-KUJŌ-TORIIGUCHICHŌ, Kyoto ', '96.00', 'Apartment'),
(7, 'SAKANOUE', 'Construit il y a 160 ans, le Mugen vous accueille à Kyoto, à 1 km du château de Nijo.\r\nToutes les chambres du Mugen disposent d\'une salle de bains privative munie d\'une douche, de toilettes, d\'articles de toilette gratuits et d\'un sèche-cheveux. Une connexion Wi-Fi est accessible gratuitement dans l\'ensemble de l\'établissement.\r\n\r\nVous trouverez un salon commun sur place et un bar dans le bâtiment annexe.\r\n\r\nL\'établissement assure un service de location de vélos. Le palais Impérial est à 1,1 km du Mugen. Le sanctuaire Kitano Tenmangu est à 1,6 km. L\'aéroport le plus proche est celui d\'Osaka-Itami, à 39 km de l\'établissement.\r\n              ', 4, 1, '502 Gion Shimogawara Washiocho, Higashiyama-Ku, Kyoto', '284.00', 'Ryokan'),
(8, 'Kikuhama', 'La Maison Kikuhama est idéale pour deux personnes, avec une chambre sur tatamis au rez-de-chaussée, une salle de bain ouverte sur une cour intérieure, et un salon éclairé par un large bow-window et des fenêtre zénithales. Il y a aussi un espace en mezzanine sur tatamis accessible par un escalier-échelle, qui peut accueillir une ou deux personnes. \r\n\r\nLa maison est située au bord de la rivière Takasegawa, un petit cours d\'eau conduisant au quartier des restaurants et bars de Kiyamachi. Elle est au centre de Kyoto, à 10 minutes à pied de la gare centrale JR de Kyoto. \r\n\r\nBien qu\'elle soit au centre-ville, elle est au sein d\'une communauté locale, blottie au fond d\'une allée (roji) très calme et silencieuse (comme nos hôtes !).', 2, 1, '109-22 Hachiojicho, Shimogyo Ward, Kyoto', '185.00', 'House'),
(9, 'Kizuna', 'La maison Kizuna est parfaite pour une famille avec enfants ou un couple. Au cœur d’un quartier résidentiel local, elle est trés bien situéel pour visiter les nombreux sites cultutels de Kyoto. À proximité, vous trouverez un grand supermarché, le célèbre restaurant Menbaka Fire Ramen et de nombreux lieux de restauration, parc et différentes boutiques.\r\n\r\nLa maison a été récemment rénovée et est equipée d\'une salle de bain douche et cuisine moderne. Il y a aussi un canapé confortable pour se détendre après une longue journée de visite.', 3, 1, '602-8154 Kyoto, Kyoto, 802-43 Yonchome, Kamigyo-ku', '112.00', 'House'),
(10, 'Koyasu ', 'Sous la protection de la divinité Koyasu Kannon et d\'architecture purement japonaise, la maison Koyasu est dans le style des maisons de commerçants kyotoïtes du début du siècle dernier.\r\n\r\nGrande façade, entrée spacieuse donnant sur une suite de pièces typiquement japonaises intégralement recouvertes de tatami et séparées par des portes coulissantes. Légèrement transformé par nos soins, le séjour offre un confort à l\'occidentale avec grande table et des chaises. Au fond de la maison, le salon ouvre sur un petit jardin qui vous permettra de profiter de l\'ambiance calme et délicate du quartier.\r\n\r\nA l\'étage, les deux chambres, chaleureuses et lumineuses, offrent des couchages occidentaux et japonais.                ', 4, 2, '64-4, Kitashirakawa Kubota-cho, Sakyo-ku, Kyoto', '116.00', 'House'),
(11, 'Kyo-no-sato', 'Située dans le quartier Sakyo Ward, la maison de village Kyo-no-sato propose des hébergements avec une connexion Wi-Fi gratuite, un salon commun et un jardin.\r\n\r\nÀ proximité, vous trouverez le temple Eikan-dō Zenrin-ji.', 3, 1, '1248-2 quartier Sakyo, Iwakura Hase, Kyoto', '65.00', 'homestay'),
(12, 'Guesthouse Bokuyado Nishijin', 'Situé à Kyoto, à 1,5 km du sanctuaire Kitano Tenmangu, le Guesthouse Bokuyado Nishijin propose un hébergement avec un jardin. Vous bénéficierez d\'une connexion Wi-Fi gratuite, d\'une cuisine commune et d\'un bureau d\'excursions. Offrant une vue sur le jardin, cet hébergement dispose d\'une terrasse.\r\n\r\nCe logement climatisé comprend 3 chambres, un salon, une cuisine entièrement équipée avec un micro-ondes et une bouilloire ainsi que 2 salles de bains pourvues d\'une douche et d\'un sèche-cheveux.\r\n\r\nVous séjournerez à 1,8 km du temple Kinkaku-ji et à 2,5 km du château de Nijō. L\'aéroport d\'Itami, le plus proche, est implanté à 39 km.                ', 2, 1, '513 Sakuancho Kamigyo-ku, Kyoto', '157.00', 'homestay'),
(13, 'Shimabara', 'Située au cœur de Kyoto, la résidence Shimabara propose une chambres équipée d\'une kitchenette, une télévision, une terrasse et un jacuzzi.\r\n\r\nL\'établissement assure un service de location de vélos. Le musée international du manga de Kyoto se situe à 3 km et à 4 km du temple Sanjusangen-do.\r\n\r\nL\'aéroport d\'Itami, le plus proche, est implanté à 37 km.', 3, 1, ' Nakadoji Kadamachi, Shimokyo, Kyoto', '95.00', 'homestay');

-- --------------------------------------------------------

--
-- Structure de la table `accommodation_images`
--

DROP TABLE IF EXISTS `accommodation_images`;
CREATE TABLE IF NOT EXISTS `accommodation_images` (
  `idAccommodationImages` int(11) NOT NULL AUTO_INCREMENT,
  `idAccommodation` int(11) NOT NULL,
  `idImage` int(11) NOT NULL,
  PRIMARY KEY (`idAccommodationImages`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `accommodation_images`
--

INSERT INTO `accommodation_images` (`idAccommodationImages`, `idAccommodation`, `idImage`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 2, 4),
(5, 2, 5),
(6, 2, 6),
(7, 3, 7),
(8, 3, 8),
(9, 3, 9),
(10, 4, 10),
(11, 4, 11),
(12, 4, 12),
(13, 5, 13),
(14, 5, 14),
(15, 5, 15),
(21, 7, 21),
(20, 7, 20),
(19, 7, 19),
(22, 8, 22),
(23, 8, 23),
(24, 8, 24),
(25, 9, 25),
(26, 9, 26),
(27, 9, 27),
(28, 10, 28),
(29, 10, 29),
(30, 10, 30),
(31, 11, 31),
(32, 11, 32),
(33, 11, 33),
(34, 12, 34),
(35, 12, 35),
(36, 12, 36),
(37, 13, 37),
(38, 13, 38),
(39, 13, 39);

-- --------------------------------------------------------

--
-- Structure de la table `administrator`
--

DROP TABLE IF EXISTS `administrator`;
CREATE TABLE IF NOT EXISTS `administrator` (
  `idAdmin` int(11) NOT NULL AUTO_INCREMENT,
  `nameAdmin` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`idAdmin`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `administrator`
--

INSERT INTO `administrator` (`idAdmin`, `nameAdmin`, `password`) VALUES
(1, 'caroline', '$6$rounds=5000$ptroyiuhjklqsdfc$JdD7AwHHk5pKcI4xsm1.npcvn4DIPtwfxmDeVHUy62KlVnPvZ24m/1NILQKBaje4c5i.kX/gbTXvmAYW.xZiC.'),
(2, 'nicola', '$6$rounds=5000$ptroyiuhjklqsdfc$JdD7AwHHk5pKcI4xsm1.npcvn4DIPtwfxmDeVHUy62KlVnPvZ24m/1NILQKBaje4c5i.kX/gbTXvmAYW.xZiC.'),
(3, 'matisse', '$6$rounds=5000$ptroyiuhjklqsdfc$JdD7AwHHk5pKcI4xsm1.npcvn4DIPtwfxmDeVHUy62KlVnPvZ24m/1NILQKBaje4c5i.kX/gbTXvmAYW.xZiC.'),
(4, 'salahaddine', '$6$rounds=5000$ptroyiuhjklqsdfc$JdD7AwHHk5pKcI4xsm1.npcvn4DIPtwfxmDeVHUy62KlVnPvZ24m/1NILQKBaje4c5i.kX/gbTXvmAYW.xZiC.');

-- --------------------------------------------------------

--
-- Structure de la table `disponibility`
--

DROP TABLE IF EXISTS `disponibility`;
CREATE TABLE IF NOT EXISTS `disponibility` (
  `idDisponibility` int(11) NOT NULL AUTO_INCREMENT,
  `enterDate` date NOT NULL,
  `exitDate` date NOT NULL,
  `pax` int(11) NOT NULL,
  `nameUser` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `idAccommodation` int(11) NOT NULL,
  PRIMARY KEY (`idDisponibility`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `disponibility`
--

INSERT INTO `disponibility` (`idDisponibility`, `enterDate`, `exitDate`, `pax`, `nameUser`, `mail`, `idAccommodation`) VALUES
(1, '2021-08-20', '2021-08-27', 2, 'Julien MORAND', 'morand.j@gmail.com', 1),
(2, '2021-12-24', '2021-12-27', 6, 'Melissa BONNET', 'mel.b@hotmail.fr', 2),
(3, '2021-03-16', '2021-03-20', 4, 'David MOREAU', 'mo.david@orange.fr', 3),
(4, '2021-06-17', '2021-06-24', 6, 'Laura FOURNIER', 'laura.f@gmail.com', 4),
(5, '2021-10-01', '2021-10-08', 5, 'Laurent VINET', 'vinetl@free.fr', 5),
(6, '2021-03-18', '2021-03-25', 4, 'Sonia FEVRE', 'fsonia@hotmail.fr', 7),
(7, '2021-04-13', '2021-04-17', 2, 'Jean RICHAUD', 'riri@gmail.com', 8),
(8, '2021-06-15', '2021-06-19', 3, 'Isabelle GUILLAUD', 'g.isa@orange.com', 9),
(9, '2021-05-08', '2021-05-22', 4, 'Roger DELBOS', 'delbos5471@hotmail.fr', 10),
(10, '2021-07-13', '2021-07-16', 3, 'Francoise ROUANET', 'r.fran87@gmail.com', 11),
(11, '2021-11-10', '2021-11-14', 2, 'Michel LEROY', 'leroy.m@sfr.fr', 12),
(12, '2021-06-24', '2021-06-27', 3, 'Lisa PETIT', 'lisa7486@gmail.com', 13);

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `idImage` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nameImage` varchar(255) NOT NULL,
  `sizeImage` int(11) NOT NULL,
  `typeImage` varchar(255) NOT NULL,
  PRIMARY KEY (`idImage`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `images`
--

INSERT INTO `images` (`idImage`, `nameImage`, `sizeImage`, `typeImage`) VALUES
(1, 'Ryokan Inakatei 1.jpg', 179323, 'image/jpeg'),
(2, 'Ryokan Inakatei 3.jpg', 49977, 'image/jpeg'),
(3, 'Ryokan Inakatei 2.jpg', 223592, 'image/jpeg'),
(4, 'Nanzenji 1.jpg', 258001, 'image/jpeg'),
(5, 'Nanzenji 2.jpg', 117333, 'image/jpeg'),
(6, 'Nanzenji 3.jpg', 240205, 'image/jpeg'),
(7, 'RESI STAY 1.jpg', 131151, 'image/jpeg'),
(8, 'RESI STAY 2.jpg', 139121, 'image/jpeg'),
(9, 'RESI STAY  3.jpg', 128014, 'image/jpeg'),
(10, 'Stay SAKURA 1.jpg', 66806, 'image/jpeg'),
(11, 'Stay SAKURA 2.jpg', 154478, 'image/jpeg'),
(12, 'Stay SAKURA 3.jpg', 94577, 'image/jpeg'),
(13, 'Kyoto Shima 1.jpg', 169877, 'image/jpeg'),
(14, 'Kyoto Shima 2.jpg', 128298, 'image/jpeg'),
(15, 'Kyoto Shima 3.jpg', 126181, 'image/jpeg'),
(21, 'Nanzenji 3.jpg', 240205, 'image/jpeg'),
(20, 'SAKANOUE 2.jpg', 208570, 'image/jpeg'),
(19, 'SAKANOUE 1.jpg', 125497, 'image/jpeg'),
(22, 'kikuhama 1.jpg', 99421, 'image/jpeg'),
(23, 'kikuhama 2.jpg', 29521, 'image/jpeg'),
(24, 'kikuhama 3.jpg', 29142, 'image/jpeg'),
(25, 'kizuna 1.jpg', 25670, 'image/jpeg'),
(26, 'kizuna 2.jpg', 33377, 'image/jpeg'),
(27, 'kizuna 3.jpg', 22777, 'image/jpeg'),
(28, 'koyasu 1.jpg', 40555, 'image/jpeg'),
(29, 'koyasu 2.jpg', 40041, 'image/jpeg'),
(30, 'koyasu 3.jpg', 32370, 'image/jpeg'),
(31, 'Kyo-no-sato 1.jpg', 139440, 'image/jpeg'),
(32, 'Kyo-no-sato 2.jpg', 89316, 'image/jpeg'),
(33, 'Kyo-no-sato 3.jpg', 70717, 'image/jpeg'),
(34, 'Bokuyado Nishijin 1.jpg', 108718, 'image/jpeg'),
(35, 'Bokuyado Nishijin 2.jpg', 78366, 'image/jpeg'),
(36, 'Bokuyado Nishijin 3.jpg', 64813, 'image/jpeg'),
(37, 'shimabara 1.jpg', 82120, 'image/jpeg'),
(38, 'shimabara 2.jpg', 89319, 'image/jpeg'),
(39, 'shimabara 3.jpg', 64285, 'image/jpeg');

-- --------------------------------------------------------

--
-- Structure de la table `specification`
--

DROP TABLE IF EXISTS `specification`;
CREATE TABLE IF NOT EXISTS `specification` (
  `idSpec` int(11) NOT NULL AUTO_INCREMENT,
  `nameSpec` varchar(100) NOT NULL,
  `idAccommodation` int(11) NOT NULL,
  PRIMARY KEY (`idSpec`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `specification`
--

INSERT INTO `specification` (`idSpec`, `nameSpec`, `idAccommodation`) VALUES
(1, 'garden', 1),
(2, 'publicBath', 1),
(3, 'parking', 2),
(4, 'publicBath', 2),
(5, 'Television', 2),
(6, 'laundry', 3),
(7, 'television', 3),
(8, 'laundry', 4),
(9, 'familyRoom', 4),
(10, 'television', 4),
(11, 'balcony', 5),
(12, 'television', 5),
(16, 'publicBath', 7),
(15, 'parking', 7),
(17, 'hotTub', 7),
(18, 'bedding', 8),
(19, 'laundry', 9),
(20, 'television', 9),
(21, 'laundry', 10),
(22, 'garden', 11),
(23, 'parking', 11),
(24, 'familyRoom', 11),
(25, 'balcony', 12),
(26, 'hotTub', 13),
(27, 'balcony', 13),
(28, 'television', 13);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
