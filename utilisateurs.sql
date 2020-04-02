-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 03 avr. 2020 à 00:07
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `polyphonia`
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
  `rang` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT 'assets/utilisateurs/default.jpg',
  `date_inscription` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `derniere_connexion` datetime DEFAULT NULL,
  `actif` int(11) NOT NULL DEFAULT '1',
  `date_desactive` datetime DEFAULT NULL,
  `supprime` int(11) NOT NULL DEFAULT '0',
  `motif_supprime` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `motif_supprime` (`motif_supprime`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `email`, `nom_utilisateur`, `pass`, `bio`, `rang`, `avatar`, `date_inscription`, `derniere_connexion`, `actif`, `date_desactive`, `supprime`, `motif_supprime`) VALUES
(1, 'quentin.schifferle@gmail.com', 'syngates68', '$2y$10$a2DRQuvtUYxU3OMwmoILkOLMPfJXo/sW3SzZltdhSCZiPkMaoyrfa', '<p>Bonjour, je me pr&eacute;nomme Quentin et je suis en train de cr&eacute;er le site actuellement, c&#39;est cool non? Aller, abonne toi et l&acirc;che un pouce bleu hein! Je v&eacute;rifie les param&egrave;tres pour voir si tout fonctionne!</p>\r\n\r\n<p>Apparemment tout fonctionne bien c&#39;est vachement cool! Bon y a encore plein de trucs &agrave; v&eacute;rifier, mais &ccedil;a avance je suis content!</p>\r\n', 'admin', 'assets/utilisateurs/syngates68/syngates68.jpeg', '2020-03-03 21:03:34', '2020-04-02 23:34:52', 1, NULL, 0, NULL),
(2, 'compte@test.com', 'compte_test', '$2y$10$8U2BtePDwvnvragJQ9cTb.5FjlBSyCMdLhvqWovjwg1Zn0.jHd6z6', NULL, 'externe', 'assets/utilisateurs/compte_test/compte_test.jpeg', '2020-03-10 08:43:17', '2020-04-02 23:17:05', 1, NULL, 0, NULL),
(3, 'mimi-couchot@live.fr', 'skytten712_', '$2y$10$29GI1Ftx.N3db428naS/8.zf3LcHQxqrc2YzNmxgohjWHlOCQds3G', NULL, 'externe', 'assets/utilisateurs/default.jpg', '2020-03-17 22:55:43', '2020-03-30 23:54:04', 0, NULL, 0, NULL),
(4, NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-31 21:54:56', '2020-03-31 21:55:06', 1, NULL, 1, 1),
(5, NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-31 22:06:09', '2020-03-31 22:06:16', 1, NULL, 1, 3);

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
