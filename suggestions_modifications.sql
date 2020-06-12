-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3307
-- Généré le :  ven. 12 juin 2020 à 17:01
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
-- Structure de la table `suggestions_modifications`
--

DROP TABLE IF EXISTS `suggestions_modifications`;
CREATE TABLE IF NOT EXISTS `suggestions_modifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `nom_utilisateur` varchar(255) NOT NULL,
  `suggestion` text NOT NULL,
  `id_projet` int(11) NOT NULL,
  `date_suggestion` datetime NOT NULL DEFAULT current_timestamp(),
  `lu` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `suggestions_modifications`
--

INSERT INTO `suggestions_modifications` (`id`, `email`, `nom_utilisateur`, `suggestion`, `id_projet`, `date_suggestion`, `lu`) VALUES
(1, 'quentin.schifferle@gmail.com', 'syngates68', 'Je pense que ça serait bien de fournir une maquette niveau design pour ceux qui n\'ont pas envie de passer du temps là dessus, sachant qu\'il s\'agit plus d\'un projet Back-End qu\'un projet Full-Stack.', 32, '2020-06-12 10:37:39', 0),
(2, 'q.schifferle@coprotec.net', 'q.schifferle', 'Il faudrait que l\'on ai un tableau des données, ça serait bien pour travailler.', 32, '2020-06-12 10:51:53', 0),
(3, 'quentin.schifferle@gmail.com', 'syngates68', 'Ce qui serait bien ça serait de pouvoir mettre des vidéos de tutoriels, ça permettrait à ceux qui ne savent pas faire d\'apprendre à en mettre et à les stocker sur le serveur.', 29, '2020-06-12 11:05:05', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
