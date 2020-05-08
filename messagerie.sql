-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 08 mai 2020 à 12:53
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
-- Structure de la table `messagerie`
--

DROP TABLE IF EXISTS `messagerie`;
CREATE TABLE IF NOT EXISTS `messagerie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_utilisateur_1` int(11) NOT NULL,
  `id_utilisateur_2` int(11) NOT NULL,
  `date_ouverture` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id_utilisateur_1` (`id_utilisateur_1`),
  KEY `id_utilisateur_2` (`id_utilisateur_2`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `messagerie`
--

INSERT INTO `messagerie` (`id`, `id_utilisateur_1`, `id_utilisateur_2`, `date_ouverture`) VALUES
(9, 1, 2, '2020-05-03 12:10:47'),
(10, 1, 9, '2020-05-03 15:09:02'),
(11, 7, 1, '2020-05-03 16:38:00'),
(14, 1, 12, '2020-05-04 00:01:36'),
(15, 1, 3, '2020-05-04 23:50:55'),
(16, 1, 13, '2020-05-04 23:57:24'),
(17, 8, 1, '2020-05-05 00:08:07'),
(18, 8, 7, '2020-05-05 00:09:51'),
(19, 1, 14, '2020-05-06 00:00:03');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `messagerie`
--
ALTER TABLE `messagerie`
  ADD CONSTRAINT `messagerie_ibfk_1` FOREIGN KEY (`id_utilisateur_1`) REFERENCES `utilisateurs` (`id`),
  ADD CONSTRAINT `messagerie_ibfk_2` FOREIGN KEY (`id_utilisateur_2`) REFERENCES `utilisateurs` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
