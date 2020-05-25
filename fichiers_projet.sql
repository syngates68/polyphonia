-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 25 mai 2020 à 12:08
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
-- Structure de la table `fichiers_projet`
--

DROP TABLE IF EXISTS `fichiers_projet`;
CREATE TABLE IF NOT EXISTS `fichiers_projet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_projet` int(11) NOT NULL,
  `chemin_fichier` varchar(255) NOT NULL,
  `nom_fichier` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_projet` (`id_projet`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `fichiers_projet`
--

INSERT INTO `fichiers_projet` (`id`, `id_projet`, `chemin_fichier`, `nom_fichier`) VALUES
(2, 25, 'assets/projets/fichiers/25/2048.zip', 'template_de_jeu'),
(3, 24, 'assets/projets/fichiers/24/chat.zip', 'exemple_dijkstra');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `fichiers_projet`
--
ALTER TABLE `fichiers_projet`
  ADD CONSTRAINT `fichiers_projet_ibfk_1` FOREIGN KEY (`id_projet`) REFERENCES `projets` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
