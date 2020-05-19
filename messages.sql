-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 19 mai 2020 à 23:45
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
  PRIMARY KEY (`id`),
  KEY `id_envoi` (`id_envoi`),
  KEY `id_reception` (`id_reception`),
  KEY `id_messagerie` (`id_messagerie`)
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=utf8mb4;

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
(48, 9, 1, 2, 'Ah bah juste comme ça 😂', '2020-05-03 15:35:59', 1, '2020-05-03 15:36:16'),
(49, 9, 1, 2, 'Top le système pour le moment 😀', '2020-05-03 16:09:09', 1, '2020-05-03 16:45:27'),
(50, 9, 1, 2, 'Coucou maggle ❤️', '2020-05-03 16:21:32', 1, '2020-05-03 16:45:27'),
(51, 10, 1, 9, 'J\'ai vu que tu maîtrisais le PHP depuis un long moment maintenant, est-ce que malgré tout tu trouves des projets qui t\'intéressent sur le site ? Parce qu\'avec ton niveau tout doit paraître mega simple au vu des projets que je propose 😅', '2020-05-03 16:23:36', 1, '2020-05-03 16:24:03'),
(52, 10, 9, 1, 'Ça fait 15 ans que je fais du PHP oui, donc des projets j\'en ai vu passer haha mais en soit il y a toujours de nouvelles choses à apprendre ! Là je bosse sur le projet de vente d\'instruments de musique qui m\'intéresse bien, et malgré tout j\'éprouve toujours quelques difficultés (que je m\'inflige moi même évidemment), j\'ai par exemple essayé d\'inclure un système de paiement par carte via L\'API du Crédit Mutuel mais ça n\'est pas aussi simple que ce que j\'imaginais 😢 Mais c\'est aussi ça le défi, et puis tu le dis toi même, les projets proposés sont exhaustifs, donc j\'essaie toujours de me rajouter de petits défis pour complexifier le tout 😉', '2020-05-03 16:26:58', 1, '2020-05-03 16:27:32'),
(53, 10, 1, 9, 'Ah ouiiii effectivement je vois 😄 Bah écoute tu as raison, c\'est ce que j\'imaginais en créant le site, que les gens puissent chercher à aller plus loin que ce que je proposais, et je trouve l\'idée géniale, bon courage à toi en tout cas 😀', '2020-05-03 16:29:01', 1, '2020-05-03 22:46:14'),
(54, 11, 7, 1, 'Salut, excuse moi de te déranger, je viens de lire le projet concernant la création de son propre 2048, et j\'aimerais bien me lancer dedans, mais je ne sais pas vraiment quel langage choisir, tu me conseillerais quoi ? Pour info je code généralement en Python 🙂 Merci d\'avance et bonne journée à toi ! ', '2020-05-03 16:38:00', 1, '2020-05-03 16:38:20'),
(55, 11, 1, 7, 'Salut, t\'en fais pas tu me déranges pas du tout ☺️ Bah écoute Python peut être intéressant pour ce projet, je l\'avais fait en Javascript à l\'époque, mais à ce niveau là tout langage de script peut permettre de faire ce projet, je dirais comme conseil qu\'il faut choisir un langage que tu maîtrises bien, parce que mine de rien c\'est pas un projet facile du tout, je connaissais pas plus que ça le Javascript pure quand j\'ai commencé ce projet à l\'époque (c\'était un défi personnel que je m\'étais lancé 😅) et j\'ai bien bien galéré pour le faire, donc vraiment le mieux c\'est de faire ce que tu connais, à moins de vouloir apprendre un autre langage à travers ce projet et dans ce cas là comme dit, tout langage de script est bon à prendre ! En espérant t\'avoir bien aiguillé 😉', '2020-05-03 16:41:44', 1, '2020-05-05 00:00:30'),
(56, 9, 1, 2, 'Salut Nathan, je viens de voir la réponse que tu as posté concernant le projet de gestion d\'un cabinet dentaire, beaucoup de personnes l\'ont signalé donc comme je te connais bien, je vais rien faire de plus que supprimer ton message, mais la prochaine fois je devrais bloquer ton compte, et ça m\'embêterait bien donc j\'espère que ce message suffira à ne plus que ça se reproduise ! Je sais que parfois ça peut être dur de garder son calme mais j\'essaie de garder le site comme une zone calme et où les gens s\'entraident sans se rentrer dedans, donc ce genre de message n\'est pas vraiment appréciable ! Enfin voilà, je pense que tu es assez intelligent pour comprendre ça ', '2020-05-03 16:45:04', 1, '2020-05-03 16:45:27'),
(57, 9, 2, 1, 'Salut Quentin, effectivement j\'ai perdu mon calme, merci de ta compréhension et de ta patience, ça ne se reproduira plus c\'est promis 🖐️🙂', '2020-05-03 16:46:14', 1, '2020-05-03 16:46:24'),
(58, 9, 1, 2, 'Tant mieux, bonne journée à toi 🙂', '2020-05-03 16:46:47', 1, '2020-05-03 16:46:52'),
(59, 10, 1, 9, 'Dis moi j\'ai une question, je bosse actuellement sur le site et j\'aimerais ajouter un système qui permet de valider directement son compte depuis le mail et non en rentrant un code de confirmation comme actuellement, tu sais comment faire ? ', '2020-05-03 22:44:47', 1, '2020-05-03 22:46:14'),
(62, 14, 1, 12, 'Bienvenue sur Polyphonia lapoutre j\'espère que tu trouveras ton bonheur sur le site.\r\n                            Ce message est un message automatique envoyé aux nouveaux membres lors de leur inscription, si tu découvres le site et que tu as besoin d\'aide, n\'hésite pas à me contacter je me ferais un plaisir de te guider afin que tu puisses avoir la meilleure expérience possible sur le site.\r\n                            Merci d\'avoir rejoint l\'aventure,<br/>\r\n                            Quentin.', '2020-05-04 00:01:36', 1, '2020-05-04 00:02:03'),
(63, 10, 9, 1, 'Je suppose que ce qui te pose problème c\'est la validation automatique sur la page du site ? Enfin si tu vois de quoi je parle ! Généralement les sites qui proposent ça mettent leur page à jour automatiquement une fois que tu as cliqué sur un lien ou un bouton après au pire c\'est pas plus grave que ça si tu le fais pas ! Et même en soi tu peux garder le simple principe de code de confirmation, ça fonctionne très bien comme ça pourquoi tu voudrais changer ? 🤔', '2020-05-04 00:24:05', 1, '2020-05-04 00:24:17'),
(64, 10, 1, 9, 'Bonne question 😅😅😅 Bah en soi c\'est mon problème, je veux changer pour changer, et je trouve le système de validation via un lien beaucoup plus \"pro\" mais en fait t\'as raison, je vais garder ce système et pas me casser la tête plus que ça ', '2020-05-04 00:25:36', 0, NULL),
(65, 9, 1, 2, 'Yo 🙂', '2020-05-04 15:48:16', 1, '2020-05-04 15:48:30'),
(66, 9, 2, 1, 'Kesta?', '2020-05-04 15:48:35', 1, '2020-05-04 15:49:09'),
(67, 9, 1, 2, 'Coucou', '2020-05-04 23:32:03', 1, '2020-05-04 23:37:26'),
(68, 9, 1, 2, 'Ca va?', '2020-05-04 23:33:16', 1, '2020-05-04 23:37:26'),
(69, 9, 1, 2, 'test', '2020-05-04 23:36:37', 1, '2020-05-04 23:37:26'),
(70, 9, 2, 1, 'Coucou BG ❤️', '2020-05-04 23:37:36', 1, '2020-05-04 23:38:54'),
(71, 15, 1, 3, 'Bonjour ma chérie ❤️', '2020-05-04 23:50:55', 0, NULL),
(72, 16, 1, 13, 'Bienvenue sur Polyphonia squeezie j\'espère que tu trouveras ton bonheur sur le site.\r\n                            Ce message est un message automatique envoyé aux nouveaux membres lors de leur inscription, si tu découvres le site et que tu as besoin d\'aide, n\'hésite pas à me contacter je me ferais un plaisir de te guider afin que tu puisses avoir la meilleure expérience possible sur le site.\r\n                            Merci d\'avoir rejoint l\'aventure,<br/>\r\n                            Quentin.', '2020-05-04 23:57:24', 1, '2020-05-04 23:57:57'),
(73, 17, 8, 1, 'Yo 🖐️', '2020-05-05 00:08:07', 1, '2020-05-05 00:08:26'),
(74, 18, 8, 7, 'Wesh Ludo 🤸‍♂️', '2020-05-05 00:09:51', 1, '2020-05-05 00:10:10'),
(75, 17, 1, 8, 'Ca va la street? ✌️', '2020-05-05 23:18:38', 1, '2020-05-13 15:59:39'),
(76, 19, 1, 14, 'Bienvenue sur Polyphonia camilles68 j\'espère que tu trouveras ton bonheur sur le site.\r\n                            Ce message est un message automatique envoyé aux nouveaux membres lors de leur inscription, si tu découvres le site et que tu as besoin d\'aide, n\'hésite pas à me contacter je me ferais un plaisir de te guider afin que tu puisses avoir la meilleure expérience possible sur le site.\r\n                            Merci d\'avoir rejoint l\'aventure,<br/>\r\n                            Quentin.', '2020-05-06 00:00:03', 1, '2020-05-06 00:01:24'),
(77, 9, 1, 2, 'Wsh!', '2020-05-07 22:39:43', 1, '2020-05-13 22:27:14'),
(78, 15, 1, 3, 'Tu comptes te connecter un jour wolah? 😂😂😂', '2020-05-07 23:30:49', 0, NULL),
(79, 20, 1, 15, 'Bienvenue sur Polyphonia jojolerigolo j\'espère que tu trouveras ton bonheur sur le site.\r\n                            Ce message est un message automatique envoyé aux nouveaux membres lors de leur inscription, si tu découvres le site et que tu as besoin d\'aide, n\'hésite pas à me contacter je me ferais un plaisir de te guider afin que tu puisses avoir la meilleure expérience possible sur le site.\r\n                            Merci d\'avoir rejoint l\'aventure,<br/>\r\n                            Quentin.', '2020-05-14 23:35:22', 1, '2020-05-14 23:36:07'),
(80, 21, 2, 15, 'Salut, je vois que tu es nouveau sur le site, j\'espère que tout se passe bien pour toi ici en tout cas 🙂', '2020-05-14 23:45:18', 1, '2020-05-15 11:44:47'),
(81, 21, 15, 2, 'Salut, merci pour ton message 😀😀 Ecoute pour le moment tout va bien ^^ Merci de t\'en inquiéter c\'est super sympa', '2020-05-15 11:45:19', 1, '2020-05-15 11:46:58'),
(84, 24, 1, 6, 'Salut Adem, je voulais juste pour te féliciter pour ton projet sur l\'aquarium connecté, il est super bien fait ! 😀', '2020-05-18 23:57:57', 0, NULL);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`id_envoi`) REFERENCES `utilisateurs` (`id`),
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`id_reception`) REFERENCES `utilisateurs` (`id`),
  ADD CONSTRAINT `messages_ibfk_3` FOREIGN KEY (`id_envoi`) REFERENCES `utilisateurs` (`id`),
  ADD CONSTRAINT `messages_ibfk_4` FOREIGN KEY (`id_reception`) REFERENCES `utilisateurs` (`id`),
  ADD CONSTRAINT `messages_ibfk_5` FOREIGN KEY (`id_messagerie`) REFERENCES `messagerie` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
