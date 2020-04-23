-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 23 avr. 2020 à 19:38
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
-- Structure de la table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_messagerie` int(11) NOT NULL,
  `id_envoi` int(11) NOT NULL,
  `id_reception` int(11) NOT NULL,
  `contenu` text NOT NULL,
  `date_envoi` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lu` int(11) NOT NULL DEFAULT '0',
  `date_lecture` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `id_messagerie`, `id_envoi`, `id_reception`, `contenu`, `date_envoi`, `lu`, `date_lecture`) VALUES
(9, 2, 1, 2, 'Coucou', '2020-04-20 17:21:42', 1, '2020-04-20 18:01:12'),
(11, 2, 2, 1, 'Salut :)', '2020-04-20 17:22:51', 1, '2020-04-20 18:00:52'),
(12, 2, 1, 2, 'Tu vas bien?', '2020-04-20 17:33:29', 1, '2020-04-20 18:01:12'),
(13, 2, 1, 2, 'Dis moi j\'ai une question, est-ce que tu sais si Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eget risus ac lorem mattis cursus ac sed libero. Integer et ante justo. Nunc auctor velit eget nibh aliquam, ut semper neque condimentum. Proin vestibulum dolor vitae dictum scelerisque. Nulla maximus mollis ipsum. Etiam gravida accumsan aliquet. Phasellus et nunc vel risus mattis consectetur in maximus sem. Interdum et malesuada fames ac ante ipsum primis in faucibus. Aliquam pretium consectetur vehicula. Sed ullamcorper malesuada dui. ', '2020-04-20 17:34:39', 1, '2020-04-20 18:01:12'),
(14, 2, 2, 1, 'Ah d\'accord, je sais pas désolé', '2020-04-20 18:01:45', 1, '2020-04-20 18:02:40'),
(15, 4, 6, 1, 'Salut Quentin', '2020-04-20 21:08:37', 1, '2020-04-20 21:38:09'),
(16, 4, 1, 6, 'Salut Dems, ça va?', '2020-04-20 21:38:23', 1, '2020-04-20 21:38:34'),
(17, 4, 6, 1, 'Nickel merci', '2020-04-20 21:38:38', 1, '2020-04-20 21:38:51'),
(18, 2, 1, 2, 'Pas grave tkt :)', '2020-04-20 21:40:24', 1, '2020-04-20 21:43:19'),
(19, 5, 3, 1, 'Bonjour mon chéri', '2020-04-20 21:45:16', 1, '2020-04-20 21:47:00'),
(20, 5, 1, 3, 'Bonjouuuur', '2020-04-20 21:47:04', 0, NULL),
(21, 5, 1, 3, 'Je tente un message\r\nsur 2 lignes', '2020-04-20 22:52:21', 0, NULL),
(22, 6, 1, 7, 'Bienvenue sur Polyphonia ludogh68, j\'espère que tu trouveras ton bonheur sur le site.', '2020-04-20 23:36:25', 1, '2020-04-20 23:36:38'),
(23, 7, 1, 8, 'Bienvenue sur Polyphonia oceandust_ j\'espère que tu trouveras ton bonheur sur le site.\r\n                            Ce message est un message automatique envoyé aux nouveaux membres lors de leur inscription, si tu découvres le site et que tu as besoin d\'aide, n\'hésite pas à me contacter je me ferais un plaisir de te guider afin que tu puisses avoir la meilleure expérience possible sur le site.\r\n                            Merci d\'avoir rejoint l\'aventure,\r\n                            Quentin.', '2020-04-20 23:42:02', 1, '2020-04-20 23:42:14'),
(24, 6, 7, 1, 'Bonjour, merci pour ce message, quel est le but de ce site en réalité?', '2020-04-20 23:58:46', 1, '2020-04-20 23:59:00'),
(25, 6, 1, 7, 'Bonjour ludogh68, eh bien il s\'agit de trouver des idées de projets intéressants à réaliser en tant notamment de développeur informatique, qu\'importe le langage! ', '2020-04-20 23:59:47', 0, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
