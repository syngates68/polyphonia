-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3307
-- Généré le :  jeu. 12 mars 2020 à 17:01
-- Version du serveur :  10.2.14-MariaDB
-- Version de PHP :  7.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `test`
--

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_utilisateur` varchar(255) NOT NULL,
  `pass` text NOT NULL,
  `rang` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL DEFAULT 'assets/utilisateurs/default.jpg',
  `date_inscription` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom_utilisateur`, `pass`, `rang`, `avatar`, `date_inscription`) VALUES
(1, 'syngates68', '$2y$10$EWs0.V.uJ2ajUorWRECawe5oqb0GY9kTvT/e1si0stbWONSSMpU1y', 'admin', 'assets/utilisateurs/default.jpg', '2020-03-03 21:03:34'),
(2, 'compte_test', '$2y$10$8U2BtePDwvnvragJQ9cTb.5FjlBSyCMdLhvqWovjwg1Zn0.jHd6z6', 'externe', 'assets/utilisateurs/default.jpg', '2020-03-10 08:43:17');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
