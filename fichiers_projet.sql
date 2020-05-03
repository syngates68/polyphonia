-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 01 mai 2020 à 23:53
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
-- Structure de la table `fichiers_projet`
--

DROP TABLE IF EXISTS `fichiers_projet`;
CREATE TABLE IF NOT EXISTS `fichiers_projet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_projet` int(11) NOT NULL,
  `chemin_fichier` varchar(255) NOT NULL,
  `nom_fichier` varchar(255) NOT NULL,
  `type_fichier` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `fichiers_projet`
--

INSERT INTO `fichiers_projet` (`id`, `id_projet`, `chemin_fichier`, `nom_fichier`, `type_fichier`) VALUES
(1, 25, 'assets/projets/fichiers/2048.html', 'Template de jeu', 'text/html');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;