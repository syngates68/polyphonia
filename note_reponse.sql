-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 25 mai 2020 à 12:09
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
-- Structure de la table `note_reponse`
--

DROP TABLE IF EXISTS `note_reponse`;
CREATE TABLE IF NOT EXISTS `note_reponse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_utilisateur` int(11) NOT NULL,
  `id_reponse` int(11) NOT NULL,
  `note` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `note_reponse`
--

INSERT INTO `note_reponse` (`id`, `id_utilisateur`, `id_reponse`, `note`) VALUES
(10, 6, 8, -1),
(11, 2, 8, -1),
(12, 8, 8, -1),
(13, 8, 2, 1),
(14, 1, 4, 1),
(15, 1, 8, -1),
(18, 1, 10, -1),
(19, 1, 11, 1),
(20, 1, 19, 1),
(21, 2, 19, 1),
(22, 2, 20, 1),
(23, 1, 16, 1),
(24, 1, 12, 1),
(26, 1, 9, 1),
(38, 1, 2, 1),
(41, 1, 3, 1),
(44, 1, 22, 1),
(45, 1, 21, 1),
(46, 1, 23, -1),
(47, 15, 7, 1),
(48, 15, 6, 1),
(49, 15, 5, 1),
(50, 15, 23, -1),
(51, 2, 24, 1),
(52, 15, 27, 1),
(53, 1, 27, 1),
(54, 1, 33, 1),
(55, 1, 41, 1),
(56, 7, 31, -1),
(57, 18, 44, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
