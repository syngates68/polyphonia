-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 12 mai 2020 à 23:52
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
  `date_post` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `aide_contenu`
--

INSERT INTO `aide_contenu` (`id`, `contenu`, `id_utilisateur`, `id_sujet`, `date_post`) VALUES
(1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis dolorem fugiat sapiente dignissimos vel quidem ullam natus, inventore, eos officiis repellat necessitatibus. Quod molestiae incidunt vitae voluptatibus quos. Nemo, impedit. ', 2, 9, '2020-05-10 23:36:08'),
(2, '<p>C&#39;est quoi ton code erreur?</p>\n', 1, 5, '2020-05-11 00:15:09'),
(3, '<p>C&#39;est &ccedil;a :</p>\n\n<p><em>Uncaught PDOException: SQLSTATE[HY093]: Invalid parameter number: parameter was not defined</em></p>\n', 2, 5, '2020-05-11 00:16:08'),
(4, '<p>Autant pour moi je m&#39;&eacute;tais tromp&eacute;</p>\n', 1, 4, '2020-05-11 00:16:49'),
(5, '<p>Moi non plus</p>\n', 1, 9, '2020-05-12 21:56:04'),
(6, '<p>Mais essaie quand m&ecirc;me pour voir</p>\n', 1, 9, '2020-05-12 21:56:22'),
(7, '<p>Ca peut toujours marcher</p>\n', 1, 9, '2020-05-12 21:56:45'),
(8, '<p>J&#39;ai eu le m&ecirc;me soucis hier mais je sais plus comment je l&#39;avais r&eacute;gl&eacute; d&eacute;sol&eacute;...</p>\n', 7, 5, '2020-05-12 22:11:55'),
(9, '<p>C&#39;&eacute;tait vachement utile, merci Ludo</p>\n', 1, 5, '2020-05-12 22:12:45');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
