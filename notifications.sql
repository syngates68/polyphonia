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
-- Structure de la table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_utilisateur` int(11) NOT NULL,
  `contenu` text NOT NULL,
  `type_notification` varchar(255) NOT NULL,
  `lien_notification` varchar(255) NOT NULL,
  `date_ajout` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lu` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `notifications`
--

INSERT INTO `notifications` (`id`, `id_utilisateur`, `contenu`, `type_notification`, `lien_notification`, `date_ajout`, `lu`) VALUES
(2, 1, '<p>Une nouvelle réponse a été ajoutée au sujet <b>Code erreur</b></p>', 'reponse', 'sujet/5.html', '2020-05-12 22:11:55', 1),
(3, 2, '<p>Une nouvelle réponse a été ajoutée au sujet <b>Code erreur</b></p>', 'reponse', 'sujet/5.html', '2020-05-12 22:11:55', 1),
(4, 2, '<p>Une nouvelle réponse a été ajoutée au sujet <b>Code erreur</b></p>', 'reponse', 'sujet/5.html', '2020-05-12 22:12:45', 1),
(5, 7, '<p>Une nouvelle réponse a été ajoutée au sujet <b>Code erreur</b></p>', 'reponse', 'sujet/5.html', '2020-05-12 22:12:45', 1),
(6, 1, '<p>Une nouvelle réponse a été ajoutée au sujet <b>Problème de session</b></p>', 'reponse', 'sujet/11.html', '2020-05-13 16:00:16', 1),
(7, 8, '<p>Une nouvelle réponse a été ajoutée au sujet <b>Problème de session</b></p>', 'reponse', 'sujet/11.html', '2020-05-13 17:35:07', 0),
(8, 2, '<p>Une nouvelle réponse a été ajoutée au sujet <b>Code erreur</b></p>', 'reponse', 'sujet/5.html', '2020-05-13 21:00:34', 1),
(9, 7, '<p>Une nouvelle réponse a été ajoutée au sujet <b>Code erreur</b></p>', 'reponse', 'sujet/5.html', '2020-05-13 21:00:34', 1),
(10, 8, '<p>Une nouvelle réponse a été ajoutée au sujet <b>Problème de session</b></p>', 'reponse', 'sujet/11.html', '2020-05-13 21:03:36', 0),
(11, 8, '<p>Une nouvelle réponse a été ajoutée au sujet <b>Problème de session</b></p>', 'reponse', 'sujet/11.html', '2020-05-13 21:04:41', 0),
(12, 8, '<p>Une nouvelle réponse a été ajoutée au sujet <b>Problème de session</b></p>', 'reponse', 'sujet/11.html', '2020-05-13 21:05:01', 0),
(13, 2, '<p>Une nouvelle réponse a été ajoutée au sujet <b>Code erreur</b></p>', 'reponse', 'sujet/5.html', '2020-05-13 21:06:01', 1),
(14, 7, '<p>Une nouvelle réponse a été ajoutée au sujet <b>Code erreur</b></p>', 'reponse', 'sujet/5.html', '2020-05-13 21:06:01', 1),
(15, 2, '<p>Une nouvelle réponse a été ajoutée au sujet <b>Code erreur</b></p>', 'reponse', 'sujet/5.html', '2020-05-13 21:21:32', 1),
(16, 7, '<p>Une nouvelle réponse a été ajoutée au sujet <b>Code erreur</b></p>', 'reponse', 'sujet/5.html', '2020-05-13 21:21:32', 1),
(17, 2, '<p>Une nouvelle réponse a été ajoutée au sujet <b>Code erreur</b></p>', 'reponse', 'sujet/5.html', '2020-05-13 21:23:20', 1),
(18, 7, '<p>Une nouvelle réponse a été ajoutée au sujet <b>Code erreur</b></p>', 'reponse', 'sujet/5.html', '2020-05-13 21:23:20', 1),
(19, 2, '<p>Une nouvelle réponse a été ajoutée au sujet <b>Code erreur</b></p>', 'reponse', 'sujet/5.html', '2020-05-13 21:30:42', 1),
(20, 7, '<p>Une nouvelle réponse a été ajoutée au sujet <b>Code erreur</b></p>', 'reponse', 'sujet/5.html', '2020-05-13 21:30:42', 1),
(21, 1, '<p>Une nouvelle réponse a été ajoutée au sujet <b>Code erreur</b></p>', 'reponse', 'sujet/5.html', '2020-05-13 22:22:39', 1),
(22, 7, '<p>Une nouvelle réponse a été ajoutée au sujet <b>Code erreur</b></p>', 'reponse', 'sujet/5.html', '2020-05-13 22:22:39', 1),
(23, 1, '<p>Une nouvelle réponse a été ajoutée au sujet <b>Header already sent</b></p>', 'reponse', 'sujet/12.html', '2020-05-13 22:36:52', 1),
(24, 2, '<p>Une nouvelle réponse a été ajoutée au sujet <b>Aucune idée</b></p>', 'reponse', 'sujet/9.html', '2020-05-14 23:36:36', 1),
(25, 1, '<p>Une nouvelle réponse a été ajoutée au sujet <b>Aucune idée</b></p>', 'reponse', 'sujet/9.html', '2020-05-14 23:36:36', 1),
(26, 7, '<p>Une nouvelle réponse a été ajoutée au sujet <b>Aucune idée</b></p>', 'reponse', 'sujet/9.html', '2020-05-14 23:36:37', 1),
(27, 1, '<p>Une nouvelle réponse a été ajoutée au sujet <B>Je ne trouve pas de solution</B></p>', 'reponse', 'sujet/15.html', '2020-05-14 23:42:45', 1),
(28, 15, '<p>Une nouvelle réponse a été ajoutée au sujet <b>Je ne trouve pas de solution</b></p>', 'reponse', 'sujet/15.html', '2020-05-15 11:43:49', 1),
(29, 7, '<p>Votre sujet <b>Aucune idée</b> a été fermé par un modérateur</p>', 'sujet_ferme', 'sujet/9.html', '2020-05-15 14:40:39', 1),
(30, 2, '<p>Une nouvelle réponse a été ajoutée au sujet <b>C\'est quoi un tuto?</b></p>', 'reponse', 'sujet/6.html', '2020-05-15 14:55:56', 1),
(31, 2, '<p>Votre sujet <b>C\'est quoi un tuto?</b> a été fermé par un modérateur</p>', 'sujet_ferme', 'sujet/6.html', '2020-05-15 14:56:00', 1),
(32, 2, '<p>Votre sujet <b>Sérieux c\'est quoi un tuto?</b> a été fermé par un modérateur</p>', 'sujet_ferme', 'sujet/7.html', '2020-05-15 14:56:12', 1),
(33, 2, '<p>Une nouvelle réponse a été ajoutée au sujet <b>Oh mais dites moi putain!!!</b></p>', 'reponse', 'sujet/8.html', '2020-05-15 14:56:28', 1),
(34, 2, '<p>Votre sujet <b>Oh mais dites moi putain!!!</b> a été fermé par un modérateur</p>', 'sujet_ferme', 'sujet/8.html', '2020-05-15 14:56:32', 1),
(35, 2, '<p>Une nouvelle réponse a été ajoutée au sujet <b>Je n\'arrive pas à récuper les données de l\'aquarium</b></p>', 'reponse', 'sujet/27.html', '2020-05-18 11:49:05', 0),
(36, 7, '<p>Une nouvelle réponse a été ajoutée au sujet <b>Ne fermez pas ce sujet SVP...</b></p>', 'reponse', 'sujet/28.html', '2020-05-18 23:23:20', 1),
(37, 7, '<p>Votre sujet <b>Ne fermez pas ce sujet SVP...</b> a été fermé par un modérateur</p>', 'sujet_ferme', 'sujet/28.html', '2020-05-18 23:23:24', 1),
(38, 1, '<p>Une nouvelle réponse a été ajoutée au sujet <b>Besoin d\'aide</b></p>', 'reponse', 'sujet/3.html', '2020-05-19 21:24:12', 1),
(39, 18, '<p>Une nouvelle réponse a été ajoutée au sujet <b>Projet pas adapté aux débutants</b></p>', 'reponse', 'sujet/31.html', '2020-05-22 16:58:24', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
