-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 27 jan. 2021 à 22:13
-- Version du serveur :  10.1.31-MariaDB
-- Version de PHP :  7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `web4shop`
--
CREATE DATABASE `web4shop`;
USE `web4shop`;
grant all privileges on web4shop.* to 'usersio'@'localhost' identified by 'sio'; 
-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'john', 'f18bd055eec95965ee175fa9badd35ae6dbeb98f'),
(7, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` tinyint(4) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`) VALUES
(1, 'Boissons', 'Boissons.jpg'),
(2, 'Biscuits', 'Biscuits.jpg'),
(3, 'Fruits secs', 'Fruits_secs.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `add1` varchar(50) NOT NULL,
  `add2` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `postcode` varchar(10) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(150) NOT NULL,
  `registered` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `customers`
--

INSERT INTO `customers` (`id`, `firstname`, `lastname`, `add1`, `add2`, `city`, `postcode`, `phone`, `email`, `registered`) VALUES
(1, 'Sarah', 'Hamida', 'ligne add1', 'ligne add2', 'Meximieux', '01800', '0612345678', 's.hamida@gmail.com', 1),
(2, 'Jean-Benoît', 'Delaroche', 'ligne add1', 'ligne add2', 'Lyon', '69009', '0796321458', 'jb.delaroche@gmx.fr', 1),
(26, 'Antoine', 'DUMAS', '25 passage Jacques Lacan', '', 'Valence', '26500', '0611856925', 'antoine@gmail.com', 1),
(27, 'Lény', 'Metzger', '3 rue chemin', '', '', '07000', '0635295841', 'Leny@gmail.com', 1),
(28, 'Dylam', 'dum', 'rue germain david', '', 'Lyon', '69000', '0611733095', 'dylan@gmail.com', 1);

-- --------------------------------------------------------

--
-- Structure de la table `delivery_addresses`
--

CREATE TABLE `delivery_addresses` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `add1` varchar(50) NOT NULL,
  `add2` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `postcode` varchar(10) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `delivery_addresses`
--

INSERT INTO `delivery_addresses` (`id`, `firstname`, `lastname`, `add1`, `add2`, `city`, `postcode`, `phone`, `email`) VALUES
(46, 'Christian', 'Hamida', '15 Rue de la paix', '', 'Saint Etienne', '42000', '0477213145', 'chr.hamida@gmail.com'),
(47, 'Sarah', 'Hamida', 'ligne add1', 'ligne add2', 'Meximieux', '01800', '0612345678', 's.hamida@gmail.com'),
(48, 'Jean-Benoît', 'Delaroche', 'ligne add1', 'ligne add2', 'Lyon', '69009', '0796321458', 'jb.delaroche@gmx.fr'),
(49, 'Louise', 'Delaroche', '12 avenue condorcet', 'étage 2', 'Saint Priest', '45097', '0526117898', 'louise.delaroche@yahoo.fr'),
(54, 'Eric', 'LeZin', '3 boulevard Marseille', 'étage 2', 'Chatte', '42000', '0676787689', 'Eric@gmail.com'),
(55, 'Antoine', 'DUMAS', '53 rue Sully ', '', 'Décines', '69150', '0611733095', 'antoine@gmail.com'),
(57, 'Antoine', 'DUMAS', '53 rue Sully', '', 'Décines', '69150', '0611733095', 'antoine@gmail.com'),
(58, 'Théo', 'Pierron', 'rue la joliette', '', 'Marseille', '13150', '0658781539', 'theo@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `logins`
--

CREATE TABLE `logins` (
  `id` int(11) NOT NULL,
  `customer_id` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `logins`
--

INSERT INTO `logins` (`id`, `customer_id`, `username`, `password`) VALUES
(1, '1', 'Hamidou', 'd6ee53abcd3b045befa8af69f445fafc33f1f88b'),
(2, '2', 'Delaroche', '56a5d2bd85e6c9956d122f59f79540ee0f75e5ad'),
(13, '26', 'Antoine', '0fb64bf1debd8d971c00937e954aa181fd13af7b'),
(14, '27', 'Lény', '3433c310742f1c73c2cd2622bfc3cfb7c6d25350'),
(15, '28', 'Dylam', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220');

-- --------------------------------------------------------

--
-- Structure de la table `orderitems`
--

CREATE TABLE `orderitems` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `orderitems`
--

INSERT INTO `orderitems` (`id`, `order_id`, `product_id`, `quantity`) VALUES
(235, 63, 14, 1),
(236, 63, 17, 2),
(237, 63, 19, 1),
(238, 63, 11, 3),
(239, 64, 10, 1),
(240, 64, 18, 1),
(241, 64, 20, 1),
(242, 65, 9, 1),
(243, 65, 15, 2),
(244, 65, 16, 1),
(245, 66, 23, 1),
(246, 66, 24, 1),
(287, 80, 24, 2),
(288, 80, 20, 8),
(289, 82, 13, 1),
(291, 81, 5, 2),
(292, 83, 13, 2),
(299, 89, 14, 1),
(300, 89, 8, 1),
(301, 89, 24, 1),
(311, 90, 5, 1),
(319, 92, 8, 3),
(322, 94, 13, 6),
(325, 94, 4, 2),
(326, 94, 28, 1),
(330, 95, 5, 2),
(338, 93, 5, 2),
(339, 98, 4, 2),
(340, 98, 24, 2),
(341, 99, 13, 3),
(343, 100, 5, 3);

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

CREATE TABLE `orders` (
  `id` int(20) NOT NULL,
  `customer_id` varchar(100) NOT NULL,
  `registered` int(11) NOT NULL,
  `delivery_add_id` int(11) DEFAULT NULL,
  `payment_type` varchar(6) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `session` varchar(100) NOT NULL,
  `total` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `registered`, `delivery_add_id`, `payment_type`, `date`, `status`, `session`, `total`) VALUES
(63, '1', 1, 47, 'cheque', '2020-01-23', 10, 'da8bcdf51121d96c71673295b825a010', '86.00'),
(64, '1', 1, 47, 'paypal', '2020-01-23', 3, 'da8bcdf51121d96c71673295b825a010', '87.00'),
(65, '2', 1, 49, 'cheque', '2020-01-23', 10, 'da8bcdf51121d96c71673295b825a010', '51.00'),
(66, '2', 1, 49, 'cheque', '2020-01-23', 10, 'da8bcdf51121d96c71673295b825a010', '42.00'),
(79, '', 0, NULL, NULL, '2021-01-25', 0, 'd3566c66c0f8f7660dc8695668ca23ba', '0.00'),
(80, '26', 1, 0, 'cheque', '2021-01-25', 10, 'd3566c66c0f8f7660dc8695668ca23ba', '125.00'),
(81, '27', 1, 55, 'paypal', '2021-01-25', 2, 'd3566c66c0f8f7660dc8695668ca23ba', '8.10'),
(82, '', 0, NULL, NULL, '2021-01-26', 0, '542949deef12152012bc9223eab71de0', '5.20'),
(83, '', 0, 54, 'paypal', '2021-01-26', 2, '542949deef12152012bc9223eab71de0', '10.40'),
(89, '27', 1, 0, 'paypal', '2021-01-26', 2, '542949deef12152012bc9223eab71de0', '39.20'),
(90, '27', 1, NULL, NULL, '2021-01-26', 0, '542949deef12152012bc9223eab71de0', '20.90'),
(91, '', 0, NULL, NULL, '2021-01-27', 0, 'b1830292cfcb5ac427a4bb154715e88c', '-20.80'),
(92, '', 0, 57, 'paypal', '2021-01-27', 2, 'b1830292cfcb5ac427a4bb154715e88c', '46.50'),
(93, '26', 1, 0, 'cheque', '2021-01-27', 2, 'b1830292cfcb5ac427a4bb154715e88c', '21.00'),
(94, '28', 1, 0, 'paypal', '2021-01-27', 10, 'c96b3a5bb1d01582e8d610a2e9059c30', '82.30'),
(95, '', 0, NULL, NULL, '2021-01-27', 0, '8f51ovoqmqf4n5r06abcn1kdn5', '21.00'),
(96, '', 0, NULL, NULL, '2021-01-27', 0, '8f51ovoqmqf4n5r06abcn1kdn5', '0.00'),
(97, '', 0, NULL, NULL, '2021-01-27', 0, '8f51ovoqmqf4n5r06abcn1kdn5', '0.00'),
(98, '', 0, 58, 'paypal', '2021-01-27', 2, '8f51ovoqmqf4n5r06abcn1kdn5', '66.80'),
(99, '28', 1, 0, 'cheque', '2021-01-27', 2, '8f51ovoqmqf4n5r06abcn1kdn5', '15.60'),
(100, '26', 1, 0, 'paypal', '2021-01-27', 2, '8f51ovoqmqf4n5r06abcn1kdn5', '31.50');

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `cat_id` tinyint(4) NOT NULL,
  `name` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(30) NOT NULL,
  `price` decimal(5,2) NOT NULL,
  `stock` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `cat_id`, `name`, `description`, `image`, `price`, `stock`) VALUES
(4, 2, 'Assortiment de biscuits secs', 'Boîte de 20 biscuits composée de galettes, cookies, crêpes dentelles et sablés', 'assortimentBiscuitsSecs.jpg', '12.90', 0),
(5, 2, 'Biscuits de Noël', 'De doux biscuits de Noël à la cannelle, au chocolat, et sablés pour assurer de belles et uniques fêtes de Noël', 'biscuitNoel.png', '10.50', 3),
(6, 2, 'Biscuits aux raisins ', 'De délicieux biscuits aux raisins secs pour éveiller les sens de toute la famille, des plus petits aux plus grands !', 'biscuitRaisin.jpeg', '6.90', 2),
(7, 3, 'Pruneaux secs bio ', 'Sachet de 500g. De délicieux pruneaux issus d agricultures biologiques et responsables ', 'pruneauxSecs.jpg', '7.90', 6),
(8, 3, 'Sachet d\'abricots secs ', 'Sachet d\'un kilogramme. Produit recommandé par de nombreux nutritionnistes. Authentique goût d\'abricot', 'abricotsSecs.jpg', '15.50', 17),
(9, 3, 'Plateau de fruits secs ', 'Plateau de 1kg composé d\'abricots secs, de noix de cajous, pruneaux secs, bananes sèches, copeaux de noix de coco...', 'plateauFruitsSecs.jpg', '32.00', 6),
(10, 3, 'Mélange de fruits secs', 'Composés de différents sachets de 250g : des marrons, des cacahouètes, des amandes grillés et des noisettes.', 'melangeMarrons.jpg', '25.00', 7),
(11, 3, 'Mélange de noisettes', 'Sachet de 500g composé de noisettes, noix et amandes grillées. Une fois goûtés, on ne peut plus s\'en passer', 'melangeNoisettes.png', '8.30', 4),
(12, 3, 'Sachet d\'amandes grillées', 'Sachet de 500g, grillées lentement au four pour plus de plaisir en bouche lors de la dégustation !', 'amandes.jpg', '9.90', 10),
(13, 1, 'Jus de citron', 'Bouteille d\'un litre de jus de citron frais issus d\'agricultures responsables et biologiques', 'jusCitron.jpg', '5.20', 3),
(14, 1, 'Jus de pommes', 'Pommes issues d\'agricultures biologiques.\r\nBouteille d\'un litre dans une bouteille en verre ', 'jusPomme.jpg', '3.20', 8),
(15, 1, 'Jus de pamplemousse', 'Bouteille d\'un litre et demi sans sucre et sans colorant ajoutés. 100% naturel au bon goût de pamplemousse', 'jusPamplemousse.jpg', '7.30', 7),
(16, 1, 'Jus d\'orange', 'Oranges provenant d\'agricultures locales et biologiques.\r\nCette bouteille d\'un litre permet de se réveiller en douceur le matin.', 'jusOrange.jpg', '4.60', 19),
(17, 1, 'Sachet de café en grain', 'sachet d\'un kilogramme de café en grain, pour garder l\'authentique goût du café pour bien commencer la journée', 'cafeGrain.jpg', '15.00', 10),
(18, 1, 'Capsules de café', 'Paquet de 50 capsules. Adaptable pour toute sortes de machines à café avec capsules', 'cafeCapsule.jpg', '45.00', 11),
(19, 1, 'Dosettes de café', 'Paquet de 30 dosettes de café. Longue date de conservation. Emballage recyclable respectant l\'environnement', 'dosetteCafe.png', '28.10', 20),
(20, 1, 'Sachets de thé à la canelle', '15 sachets à l\'authentique gout de thé à la cannelle. Nouveauté chez Web4Shop ! ', 'theCannelle.jpg', '10.50', 9),
(21, 1, 'Infusion à la verveine', 'Recommandé pour profiter de nuits calmes.\r\nVendus par paquet de 15 sachets.', 'infusionVerveine.jpg', '8.90', 4),
(22, 1, 'Thé vert', '20 sachets de thé vert. Les adeptes en raffolent et on comprend bien pourquoi ! ', 'theVert.jpg', '13.90', 13),
(23, 1, 'Infusion au citron', 'Paquet de 20 sachets d\'infusion au citron pour partager un moment unique avec les plus petits ou les plus grands', 'infusionCitron.jpg', '15.30', 15),
(24, 2, 'Macarons tout chocolat', 'Macarons uniques au chocolat. Vendus par 10 macarons dans une très belle boîte ', 'macaronChocolat.jpg', '20.50', 18),
(25, 2, 'Boules de neige', 'Boules aromatisées à la noix de coco.\r\nPlateau de 200g. Idée cadeau qui va plaire aux adeptes de la noix de coco !', 'bouleDeNeigeCoco.jpg', '10.80', 8),
(26, 2, 'Cookies au pépites de chocolat', 'Cookies croquants préparés avec de l\'avoine et des pépites de chocolat fondantes.\r\nPaquet de 15 cookies', 'cookiesChocolat.jpg', '12.30', 10),
(27, 2, 'Biscuits étoile à la cannelle', 'Biscuits secs pour noël à l\'authentique goût de la cannelle. L\'éveil des sens avec ces saveurs est assuré !', 'biscuitsCannelle.jpg', '13.50', 14),
(28, 2, 'Biscuits en forme de tortue', 'Paquet de 20 petits biscuits en forme de tortue. Goût chocolat vanille. Leur très jolie forme va séduire tout le monde !', 'biscuitsTortue.jpg', '25.30', 20);

-- --------------------------------------------------------

--
-- Structure de la table `reviews`
--

CREATE TABLE `reviews` (
  `id_product` int(2) NOT NULL,
  `name_user` varchar(50) NOT NULL,
  `photo_user` varchar(50) NOT NULL,
  `stars` int(1) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `reviews`
--

INSERT INTO `reviews` (`id_product`, `name_user`, `photo_user`, `stars`, `title`, `description`) VALUES
(28, 'Gerard', 'homme.jpg', 5, 'Trop top', 'Trop beau et trop bon '),
(13, 'Michelle', 'femme.png', 3, 'super', 'cool'),
(4, 'Charlène', 'femme.png', 5, 'Excellent !', 'Ils sont trop bons, je recommande vraiment ces biscuits secs, je ne peux plus m\'en passer ! '),
(24, 'Helène', 'femme.png', 4, 'Vraiment excellent ', 'Je recommande vivement ces macarons, ils ont un gout authentiques et en plus ils ne sont pas très chers '),
(26, 'Marc', 'homme.jpg', 4, 'Très bon rapport qualité prix', 'Ils sont vraiment excellents. Je ne sais pas cuisiner alors je les achète et on dirait vraiment des cookies faits maison !'),
(26, 'Sylvie', 'femme.png', 3, 'Je recommande !', 'Vraiment bons et très craquants, j\'en rachèterai '),
(16, 'Mélanie', 'femme.png', 5, 'Tellement bon ! ', 'Ce jus est incroyablement bon c\'est un plaisir de déjeuner le matin avec un jus d\'orange si frais '),
(23, 'Lilian', 'homme.jpg', 3, 'Je suis fan', 'Moi qui suis fan d\'infusion, c\'est vraiment de la qualité ! peut être un peu cher mais vraiment le prix a payer pour bénéficier de si bonnes infusions'),
(15, 'Elise', 'femme.png', 5, 'Tellement bon !!', 'Je recommande vivement, j\'achète toujours ce bon jus et il fait l\'unanimité à la maison'),
(25, 'Jean', 'homme.jpg', 4, 'Bon goût de noix de coco', 'Vraiment bon, pour les fêtes de Noël, chaque années elles sont très appréciées'),
(11, 'Christophe', 'homme.jpg', 4, 'Trop bon et livraison rapide', 'Ces fruits secs sont vraiment à croquer, et ils sont très vite virés à la maison '),
(12, 'Christine', 'femme.png', 3, 'Trop bon ! ', 'Les amandes sont vraiment bonnes, le paquet ne fait pas longtemps à la maison ! je recommande '),
(7, 'Marie', 'femme.png', 4, 'Une qualité inégalable', 'Les pruneaux sont vraiment excellents je recommande'),
(21, 'Léa', 'femme.png', 4, 'Des très bonnes infusions', 'Un goût intensément bon et une livraison rapide'),
(6, 'Liliane', 'femme.png', 3, 'De très bons biscuits ', 'Vraiment trop bon !! '),
(5, 'Christine', 'femme.png', 4, 'Original', 'Ces biscuits sont excellents; testés récemment! un délice!'),
(4, 'Florian', 'homme.jpg', 5, 'J\'adore', 'Ces biscuits secs sont très bons. ils sont variés et très parfumés; je recommande ce produit.'),
(6, 'Victor', 'homme.jpg', 4, 'une tuerie!', 'les biscuits sont vraiment très bons; très garnis; à tester sans modération!'),
(28, 'Sophie', 'femme.png', 5, 'original!', 'si vous voulez opter pour des biscuits Originaux, vous ne serez pas déçus! et en plus, ils sont bons!'),
(27, 'Bernard', 'homme.jpg', 5, 'un délice', 'des biscuits très parfumés qui rappellent les biscuits de mon enfance avec ce bon parfum de cannelle! Je vous le recommande...'),
(25, 'Huguette', 'femme.png', 3, 'bon', 'Des biscuits assez parfumés, tendre et sucrés juste ce qu\'il faut. bon produit'),
(18, 'Gilbert', 'homme.jpg', 5, 'très bien', 'des capsules de très bonne qualité; très bon rapport qualité prix; je recommande ce produit'),
(26, 'Juliette', 'femme.png', 5, 'comme à la maison', 'excellents biscuits; aussi bons que ceux que l\'on fait soi même!'),
(19, 'Corinne', 'femme.png', 5, 'très bon produit', 'des dosettes de très bonne qualité que je recommande'),
(23, 'Lila', 'femme.png', 5, 'bon produit', 'Une infusion excellente pour la digestion. Un gout acidulé et un très bon rapport qualité prix. Je recommande ce produit'),
(21, 'Julien', 'homme.jpg', 4, 'Parfumée', 'Une infusion très parfumée avec un gout authentique! très bon produit!'),
(16, 'Claudine', 'femme.png', 5, 'Bon produit', 'ce jus d\'orange est très parfumé. Peu c!alorique, et sans additif; naturel et sa pulpe est agréable. je vous le conseille'),
(13, 'Yvette', 'femme.png', 5, 'excellent', 'produit de qualité aussi bien en cuisine que pour désaltérer; je vous invite à l\'essayer!'),
(15, 'Sylvie', 'femme.png', 4, 'désaltérant', 'très bon produit; sans additif donc très naturel; à essayer sans hésiter!'),
(14, 'AHMED', 'homme.jpg', 5, 'excellent!', 'Un très bon produit; ce jus a un délicieux gout acidulé; parfait pour un gouter ou pour bien démarrer la journée!'),
(24, 'Claudette', 'femme.png', 4, 'savoureux', 'des macarons au top; un produit qui est de très bonne qualité; tendre et fondant dans la bouche; à consommer sans modération\r\n'),
(10, 'Hortense', 'femme.png', 4, 'à conseiller', 'un mélange idéal pour le petit déjeuner ou avant l\'effort; les amandes et les noisettes sont excellentes; je recommande'),
(11, 'LOUIS', 'homme.jpg', 4, 'exquis!', 'des fruits secs de bonne qualité; je recommande ce produit sans hésiter'),
(9, 'Catherine', 'femme.png', 5, 'idée cadeau', 'ce plateau très garni et excellent est une très bonne idée cadeau; à savourer sans modération ; je vous invite à essayer!'),
(7, 'Jules', 'homme.jpg', 5, 'avant l\'effort', 'des pruneaux d\'un gros calibre; idéal avant une activité sportive ou simplement en cas de petite faim! je recommande!'),
(8, 'Virginie', 'femme.png', 5, 'miam', 'Parfait pour commencer la journée: ces abricots sont excellents; le prix est raisonnable. Je recommande ce produit'),
(12, 'Severine', 'femme.png', 3, 'très bon produit', 'je recommande ces amandes grillées; elles sont grillées à point et complètent agréablement une recette; à essayer!'),
(17, 'sabrina', 'femme.png', 5, 'à essayer', 'un café doux et savoureux dans un emballage de qualité. le prix est raisonnable; je recommande!'),
(20, 'Dominique', 'homme.jpg', 3, 'bon', 'un produit de qualité; ce thé est parfumé et on apprécie le gout délicat de la cannelle; je vous le recommande.'),
(22, 'Sylvain', 'homme.jpg', 5, 'délicieux', 'une boisson très parfumée; idéale pour bien démarrer la journée; à essayer les yeux fermés.');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `delivery_addresses`
--
ALTER TABLE `delivery_addresses`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `logins`
--
ALTER TABLE `logins`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `orderitems`
--
ALTER TABLE `orderitems`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reviews`
--
ALTER TABLE `reviews`
  ADD KEY `review/product` (`id_product`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT pour la table `delivery_addresses`
--
ALTER TABLE `delivery_addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT pour la table `logins`
--
ALTER TABLE `logins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `orderitems`
--
ALTER TABLE `orderitems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=344;

--
-- AUTO_INCREMENT pour la table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `review/product` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
