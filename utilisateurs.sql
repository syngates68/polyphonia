-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 19 mai 2020 à 23:46
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projets`
--

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `nom_utilisateur` varchar(255) DEFAULT NULL,
  `pass` text,
  `bio` text,
  `id_droit` int(11) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT 'assets/utilisateurs/default.jpg',
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `discord` varchar(255) DEFAULT NULL,
  `date_inscription` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `derniere_connexion` datetime DEFAULT NULL,
  `code_confirm` varchar(255) DEFAULT NULL,
  `confirm` int(11) NOT NULL DEFAULT '0',
  `actif` int(11) NOT NULL DEFAULT '1',
  `date_desactive` datetime DEFAULT NULL,
  `supprime` int(11) NOT NULL DEFAULT '0',
  `motif_supprime` int(11) DEFAULT NULL,
  `bloque` int(11) NOT NULL DEFAULT '0',
  `motif_bloque` text,
  `notifications` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `motif_supprime` (`motif_supprime`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `email`, `nom_utilisateur`, `pass`, `bio`, `id_droit`, `avatar`, `facebook`, `twitter`, `discord`, `date_inscription`, `derniere_connexion`, `code_confirm`, `confirm`, `actif`, `date_desactive`, `supprime`, `motif_supprime`, `bloque`, `motif_bloque`, `notifications`) VALUES
(1, 'quentin.schifferle@gmail.com', 'syngates68', '$2y$10$a2DRQuvtUYxU3OMwmoILkOLMPfJXo/sW3SzZltdhSCZiPkMaoyrfa', '<p>Bonjour &agrave; tous qui passez par mon profil ! Je m&#39;appelle Quentin et je suis le d&eacute;veloppeur de Polyphonia !</p>\r\n\r\n<p>J&#39;ai commenc&eacute; le d&eacute;veloppement assez tard, lors de mon BTS, alors que j&#39;avais 21 ans ! Apr&egrave;s une petite travers&eacute;e du d&eacute;sert, je me suis dit que l&#39;informatique pourrait m&#39;int&eacute;resser, et ce fut bien le cas, &ccedil;a a commenc&eacute; lorsque j&#39;ai commenc&eacute; le HTML, c&#39;&eacute;tait la premi&egrave;re fois que je travaillais mes cours en dehors des cours et sans que le prof ne nous ai demand&eacute; quoi que ce soit ! J&#39;ai appris le CSS, puis le PHP et le Javascript bien plus tard (manque de motivation et pourtant aujourd&#39;hui je ne pourrais plus m&#39;en passer)!</p>\r\n\r\n<p>J&#39;ai cr&eacute;&eacute; ce site apr&egrave;s m&#39;&ecirc;tre rendu compte que je ne parvenais pas &agrave; trouver d&#39;id&eacute;es de projets informatiques int&eacute;ressants sur le Web, les quelques sites en proposant se contentant de phrases telles que &quot;Cr&eacute;er un r&eacute;seau social&quot; et autre, je me suis dit qu&#39;il serait alors int&eacute;ressant de proposer un site listant des id&eacute;es de projets informatiques avec un cahier des charges complets &agrave; destination de ceux qui chercheraient des id&eacute;es de projets int&eacute;ressants !&nbsp;</p>\r\n', 1, 'assets/utilisateurs/syngates68/syngates68.jpeg', 'https://www.facebook.com/syngates68127', NULL, NULL, '2020-03-03 21:03:34', '2020-05-19 23:42:13', NULL, 1, 1, NULL, 0, NULL, 0, NULL, 1),
(2, 'compte@test.com', 'compte_test', '$2y$10$8U2BtePDwvnvragJQ9cTb.5FjlBSyCMdLhvqWovjwg1Zn0.jHd6z6', NULL, 4, 'assets/utilisateurs/compte_test/compte_test.jpeg', NULL, NULL, NULL, '2020-03-10 08:43:17', '2020-05-18 11:44:10', NULL, 1, 1, NULL, 0, NULL, 0, NULL, 1),
(3, 'mimi-couchot@live.fr', 'skytten712_', '$2y$10$29GI1Ftx.N3db428naS/8.zf3LcHQxqrc2YzNmxgohjWHlOCQds3G', NULL, 4, 'assets/utilisateurs/default.jpg', NULL, NULL, NULL, '2020-03-17 22:55:43', '2020-04-20 21:43:46', NULL, 1, 1, NULL, 0, NULL, 0, NULL, 1),
(4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-31 21:54:56', '2020-03-31 21:55:06', NULL, 1, 1, NULL, 1, 1, 0, NULL, 1),
(5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-31 22:06:09', '2020-03-31 22:06:16', NULL, 1, 1, NULL, 1, 3, 0, NULL, 1),
(6, 'adem.derbal88@gmail.com', 'ademderbal', '$2y$10$HC8ApyORMrPN9WdAcMMcTO0nm4UVQdgAt9kO29WApJNgI4vzV9jSS', NULL, 2, 'assets/utilisateurs/ademderbal/ademderbal.jpeg', NULL, NULL, NULL, '2020-04-14 23:54:19', '2020-05-08 12:49:15', NULL, 1, 1, NULL, 0, NULL, 0, NULL, 1),
(7, 'ludovic.perrin@gmail.com', 'ludogh68', '$2y$10$XoEkE6C04AEsooKmoWUZ5e5EHXjAm9JkWP7mPF/2iTejScjnCcpHi', NULL, 3, 'assets/utilisateurs/ludogh68/ludogh68.jpeg', NULL, NULL, NULL, '2020-04-20 23:36:25', '2020-05-19 22:54:22', NULL, 1, 1, NULL, 0, NULL, 0, NULL, 1),
(8, 'dorian.marcot@gmail.com', 'oceandust_', '$2y$10$vs9RKjVmCxDBOvqbQjuXVeYIgrdDQASXb1e9BcKNfJFGIHP3/rqxa', NULL, 4, 'assets/utilisateurs/oceandust_/oceandust_.jpeg', NULL, NULL, NULL, '2020-04-20 23:42:02', '2020-05-13 15:59:35', NULL, 1, 1, NULL, 0, NULL, 0, '', 1),
(9, 'nouveau.membre@gmail.com', 'nouveaumembre', '$2y$10$Jfffa66d0ACN19xlWNPiDehvXBloFkEd3P34TPgLFCVZhNWl0CYc2', NULL, 4, 'assets/utilisateurs/default.jpg', NULL, NULL, NULL, '2020-05-03 15:09:02', '2020-05-04 00:21:49', NULL, 1, 1, NULL, 0, NULL, 0, NULL, 1),
(12, 'monsieur.test@gmail.com', 'lapoutre', '$2y$10$cxy.0zy9aEuCWbs.yV/EQO9SG5/2vXm5E2c.J20jjvCXfUEkk/FAW', NULL, 4, 'assets/utilisateurs/default.jpg', NULL, NULL, NULL, '2020-05-04 00:01:36', '2020-05-04 00:01:36', '8746', 0, 1, NULL, 0, NULL, 0, NULL, 1),
(13, 'sque@zie.fr', 'squeezie', '$2y$10$TdED7JaxDT9PMv0nUg8ruOSC7RW59hh3g1i2chCgah.D3s/BPBpM6', NULL, 4, 'assets/utilisateurs/default.jpg', NULL, NULL, NULL, '2020-05-04 23:57:24', '2020-05-04 23:57:24', '9840', 1, 1, NULL, 0, NULL, 1, 'Faux compte', 1),
(14, 'camille.schifferle@gmail.com', 'camilles68', '$2y$10$FMHgLVwz9UGgtzCVzH5shuFGL61Q07F4aijd1rV2ecHFzEGqfHyPa', NULL, 4, 'assets/utilisateurs/default.jpg', NULL, NULL, NULL, '2020-05-06 00:00:03', '2020-05-06 00:00:03', '7893', 1, 1, NULL, 0, NULL, 0, NULL, 1),
(15, 'jojo.lerigolo@gmail.com', 'jojolerigolo', '$2y$10$QzE58sz4Evh.opjNQlzoEuRYW/Huc2ywmkUJPmv848Y2530gOwb2S', NULL, 4, 'assets/utilisateurs/jojolerigolo/jojolerigolo.jpeg', NULL, NULL, NULL, '2020-05-14 23:35:22', '2020-05-15 11:44:27', '7010', 1, 1, NULL, 0, NULL, 0, NULL, 1),
(16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-05-15 15:03:42', '2020-05-15 15:03:42', '5759', 1, 1, NULL, 1, 3, 0, NULL, 1),
(17, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-05-15 15:14:23', '2020-05-15 15:16:50', '1251', 1, 1, NULL, 1, 1, 0, NULL, 1);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD CONSTRAINT `utilisateurs_ibfk_1` FOREIGN KEY (`motif_supprime`) REFERENCES `motif_suppression` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
