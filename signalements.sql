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
-- Structure de la table `signalements`
--

DROP TABLE IF EXISTS `signalements`;
CREATE TABLE IF NOT EXISTS `signalements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  `motif` varchar(255) NOT NULL,
  `id_type` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `date_signalement` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lu` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `signalements`
--

INSERT INTO `signalements` (`id`, `type`, `motif`, `id_type`, `id_utilisateur`, `date_signalement`, `lu`) VALUES
(1, 'sujet', 'Il ne s\'agit que d\'un test, il ne parle de rien', 29, 1, '2020-05-20 16:52:16', 0),
(2, 'sujet', 'C\'est même pas du français', 4, 1, '2020-05-22 16:05:13', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
