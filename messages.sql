-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 03 mai 2020 à 15:40
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
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `id_messagerie`, `id_envoi`, `id_reception`, `contenu`, `date_envoi`, `lu`, `date_lecture`) VALUES
(30, 9, 1, 2, 'Yo 🙂', '2020-05-03 12:10:47', 1, '2020-05-03 12:11:37'),
(31, 9, 2, 1, 'Wesh 😬', '2020-05-03 12:11:45', 1, '2020-05-03 12:11:51'),
(32, 9, 2, 1, 'J\'écris avec des accents maggle pour tester ààà', '2020-05-03 12:15:42', 1, '2020-05-03 12:15:53'),
(33, 9, 1, 2, 'Salut, j\'ai vu que tu avais rajouté un projet en PHP et j\'aurais voulu te poser une question qui va peut-être te paraître conne, mais en gros, comment on fait un panier en PHP ? 😬 Parce que j\'ai jamais eu à faire ça et jsp ça me semble assez complexe, mais le projet m\'intéresse bien donc voilà je voulais te poser la question ! Je te remercie d\'avance 😉', '2020-05-03 12:17:57', 1, '2020-05-03 12:18:16'),
(34, 9, 2, 1, 'Salut, non pas du tout, y a pas de question conne 😉 En gros t\'as déjà eu à manipuler des variables de session et des cookies? Bah en gros c\'est avec ça que tu fais le panier, tu le stocks dans des variables de session que tu stockes ensuite dans un cookie (vu que les variables de session n\'ont qu\'une durée limitée)! Si jamais c\'est pas clair ou que tu veux plus de précision n\'hésite pas 😀', '2020-05-03 12:19:49', 1, '2020-05-03 12:20:03'),
(35, 9, 1, 2, 'OK merci beaucoup pour ton aide, ça m\'a beaucoup aidé c\'est super sympa 😀😀😀😀', '2020-05-03 13:22:35', 1, '2020-05-03 13:22:52'),
(36, 9, 2, 1, 'Mais aucun soucis je t\'en prie ☺️☺️😉😉', '2020-05-03 13:23:05', 1, '2020-05-03 13:23:33'),
(37, 9, 2, 1, '😀😁😂🤣😃😄😅😆😉😊😋😎😍😘🥰😗😙😚☺️🙂🤗🤩🤔🤨😐😑😶🙄😏😣😥😮🤐😯😪😫😴😌😛😜😝🤤😒😓😔😕🙃🤑😲☹️🙁😖😞😟😤😢😭😦😧😨😩🤯😬😰😱🥵🥶😳🤪😵😡😠🤬😷🤒🤕🤢', '2020-05-03 13:42:10', 1, '2020-05-03 13:42:15'),
(38, 9, 2, 1, '❤️❤️❤️❤️💛💛💞💕💛🧡❤️💔❣️💖💝💗🦷👀👣🤲🙌👐👏👂🖐️🤙🤘☝️👇🦶👩‍👦👩‍👩‍👧‍👦👩‍❤️‍👩👭👩‍❤️‍💋‍👨👪👨‍❤️‍👨👩‍❤️‍👨👨‍👩‍👦‍👦👨‍👩‍👧‍👧👩‍👩‍👦👨‍👧🤳👨‍👦‍👦🤹‍♀️🤹‍♂️🤸‍♂️🏍️🏎️🚵‍♀️🤽‍♂️🤽‍♀️🏄‍♀️🚣‍♂️', '2020-05-03 13:43:39', 1, '2020-05-03 13:43:44'),
(39, 9, 1, 2, 'J’envoie depuis un iPhone 😄😄😄😄😚😚😚😇😇😇💪🏻💪🏻🥂😅🥰😅🙃😅🤣👩🏻‍🍳🍻👩🏻‍🍳🥰😊🤣😅🙏🏻😅🙂☺️🙂😊🙃😅🤣😅😢☺️', '2020-05-03 13:51:03', 1, '2020-05-03 14:24:24'),
(40, 9, 1, 2, '😀😄😆🤣', '2020-05-03 14:24:16', 1, '2020-05-03 14:24:24'),
(41, 9, 1, 2, 'On fait un peu n\'importe quoi là 😂😂😂😂', '2020-05-03 14:27:28', 1, '2020-05-03 14:32:48'),
(42, 9, 2, 1, 'De ouf 😂😂😂', '2020-05-03 14:33:12', 1, '2020-05-03 15:10:02'),
(43, 10, 1, 9, 'Bienvenue sur Polyphonia nouveaumembre j\'espère que tu trouveras ton bonheur sur le site.\r\n                            Ce message est un message automatique envoyé aux nouveaux membres lors de leur inscription, si tu découvres le site et que tu as besoin d\'aide, n\'hésite pas à me contacter je me ferais un plaisir de te guider afin que tu puisses avoir la meilleure expérience possible sur le site.\r\n                            Merci d\'avoir rejoint l\'aventure,<br/>\r\n                            Quentin.', '2020-05-03 15:09:02', 1, '2020-05-03 15:09:17'),
(44, 10, 9, 1, 'Merci beaucoup pour ce message Quentin 🙂', '2020-05-03 15:09:47', 1, '2020-05-03 15:10:05'),
(45, 9, 1, 2, 'Hey', '2020-05-03 15:31:22', 1, '2020-05-03 15:32:15'),
(46, 9, 2, 1, 'Yooooo 😃', '2020-05-03 15:32:30', 1, '2020-05-03 15:34:46'),
(47, 9, 2, 1, 'Tu m\'écrivais pour quoi du coup? 😅', '2020-05-03 15:35:37', 1, '2020-05-03 15:35:51'),
(48, 9, 1, 2, 'Ah bah juste comme ça 😂', '2020-05-03 15:35:59', 1, '2020-05-03 15:36:16');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
