-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 12 mai 2020 à 14:30
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
-- Structure de la table `aide_contenu`
--

DROP TABLE IF EXISTS `aide_contenu`;
CREATE TABLE IF NOT EXISTS `aide_contenu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contenu` text NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_sujet` int(11) NOT NULL,
  `note` int(11) NOT NULL DEFAULT '0',
  `date_post` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `aide_contenu`
--

INSERT INTO `aide_contenu` (`id`, `contenu`, `id_utilisateur`, `id_sujet`, `note`, `date_post`) VALUES
(1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis dolorem fugiat sapiente dignissimos vel quidem ullam natus, inventore, eos officiis repellat necessitatibus. Quod molestiae incidunt vitae voluptatibus quos. Nemo, impedit. ', 2, 9, 0, '2020-05-10 23:36:08'),
(2, '<p>C&#39;est quoi ton code erreur?</p>\n', 1, 5, 0, '2020-05-11 00:15:09'),
(3, '<p>C&#39;est &ccedil;a :</p>\n\n<p><em>Uncaught PDOException: SQLSTATE[HY093]: Invalid parameter number: parameter was not defined</em></p>\n', 2, 5, 0, '2020-05-11 00:16:08'),
(4, '<p>Autant pour moi je m&#39;&eacute;tais tromp&eacute;</p>\n', 1, 4, 0, '2020-05-11 00:16:49');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
