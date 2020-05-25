-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 25 mai 2020 à 12:07
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
-- Structure de la table `aide_sujet`
--

DROP TABLE IF EXISTS `aide_sujet`;
CREATE TABLE IF NOT EXISTS `aide_sujet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre_sujet` varchar(255) NOT NULL,
  `contenu_sujet` mediumtext NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_projet` int(11) NOT NULL,
  `date_sujet` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `resolu` int(11) NOT NULL DEFAULT '0',
  `ouvert` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `id_utilisateur` (`id_utilisateur`),
  KEY `id_projet` (`id_projet`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `aide_sujet`
--

INSERT INTO `aide_sujet` (`id`, `titre_sujet`, `contenu_sujet`, `id_utilisateur`, `id_projet`, `date_sujet`, `resolu`, `ouvert`) VALUES
(1, 'J\'ai un problème avec ce projet', 'Test', 1, 32, '2020-05-09 16:58:31', 0, 1),
(2, 'J\'ai un autre problème avec ce projet', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc, Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc, Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc', 1, 32, '2020-05-09 19:23:22', 0, 1),
(3, 'Besoin d\'aide', 'Aidez moi SVP\n', 1, 32, '2020-05-09 22:25:59', 0, 1),
(4, 'Rien ne fonctionne', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc', 1, 30, '2020-05-09 22:47:39', 1, 1),
(5, 'Code erreur', 'J\'ai un code erreur', 2, 32, '2020-05-09 23:50:29', 1, 1),
(6, 'C\'est quoi un tuto?', 'AIDEZ MOI WOLAH!!!', 2, 29, '2020-05-10 00:07:14', 0, 0),
(7, 'Sérieux c\'est quoi un tuto?', 'POURQUOI VOUS M\'AIDEZ PAS????', 2, 29, '2020-05-10 00:08:49', 0, 0),
(8, 'Oh mais dites moi putain!!!', 'PUTAIN LA!!!', 2, 29, '2020-05-10 00:10:32', 0, 0),
(9, 'Aucune idée', 'Tout est dans le titre', 7, 32, '2020-05-10 23:17:07', 0, 0),
(10, 'Comment faire les demandes d\'amis?', 'Salut à tous, j\'ai un soucis, je me demande comment on peut faire les demandes d\'amis, en gros comment on peut gérer ça? On stocke quoi en BDD? Désolé si ça paraît idiot mais c\'est super flou pour moi... Merci d\'avance', 1, 3, '2020-05-11 00:28:07', 0, 1),
(11, 'Problème de session', 'Salut à tous, je vous écris car je n\'arrive pas à garder les sessions actives, à chaque fois que je change de page l\'utilisateur est déconnecté alors que j\'ai bien mis session_start() à chaque début de page, je ne comprends pas comment ça se fait, quelqu\'un peut m\'aider? Merci à vous!', 1, 29, '2020-05-13 15:59:14', 0, 0),
(12, 'Header already sent', '<p>Bonjour &agrave; tous,</p><p>j&#39;ai le message suivant qui s&#39;affiche &agrave; chaque fois que je veux me d&eacute;connecter</p><pre><code class=\"language-php\">Warning: Cannot modify header information - headers already sent by (output started at C:\\file.php:1) in C:\\file.php on line 4)</code></pre><p>Quelqu&#39;un saurait m&#39;aider?</p><p>Merci d&#39;avance</p>', 1, 32, '2020-05-13 22:17:09', 1, 1),
(13, 'Je vais bien', '<p>Salut &agrave; tous 😀</p><p>J&#39;esp&egrave;re que vous allez bien, moi &ccedil;a va super! 🙂</p>', 1, 32, '2020-05-13 23:13:56', 0, 0),
(14, 'Je ne trouve pas de solution', '<p>Bonjour &agrave; tous,</p><p>voil&agrave; mon code, aidez moi</p><pre><code class=\"language-php\">$test = \'test\';\n\nfor ($i = 0; $i &lt; 100; $i++)\n{\n   echo \'test\'.$i;\n}\n\necho \'fin\';</code></pre><p>&nbsp;</p>', 1, 32, '2020-05-14 22:18:41', 0, 0),
(15, 'Je ne trouve pas de solution', '<p>Bonjour &agrave; tous,</p><p>voil&agrave; mon code, aidez moi</p><pre><code class=\"language-php\">$test = \'test\';\n\nfor ($i = 0; $i &lt; 100; $i++)\n{\n   echo \'test\'.$i;\n}\n\necho \'fin\';</code></pre><p>&nbsp;</p>', 1, 32, '2020-05-14 22:18:45', 1, 1),
(16, 'Upload de videos ', '<p>Bonjour &agrave; tous,&nbsp;</p><p>J&#39;ai une question qui peut para&icirc;tre idiote, mais comment fait-on pour uploader des vid&eacute;os sur un site ? Je n&#39;ai vraiment pas beaucoup d&#39;exp&eacute;rience l&agrave; dedans donc j&#39;avouerais qu&#39;un peu d&#39;aide ne serait pas de refus 😅</p><p>Merci d&#39;avance 🙂</p>', 15, 14, '2020-05-14 23:40:47', 0, 1),
(17, 'Upload de videos ', '<p>Bonjour &agrave; tous,&nbsp;</p><p>J&#39;ai une question qui peut para&icirc;tre idiote, mais comment fait-on pour uploader des vid&eacute;os sur un site ? Je n&#39;ai vraiment pas beaucoup d&#39;exp&eacute;rience l&agrave; dedans donc j&#39;avouerais qu&#39;un peu d&#39;aide ne serait pas de refus 😅</p><p>Merci d&#39;avance 🙂</p>', 15, 14, '2020-05-14 23:40:52', 0, 1),
(18, 'Test de sujet', '<p>Pourquoi &ccedil;a ne fonctionne pas ?&nbsp;</p>', 15, 32, '2020-05-14 23:43:11', 0, 0),
(19, 'Je test ausi', '<p>Il se passe quoi l&agrave;?</p>', 1, 32, '2020-05-14 23:53:43', 0, 0),
(20, 'Ca devrait marcher maintenant', '<p>Sinon c&#39;est chelou</p>', 1, 32, '2020-05-14 23:55:44', 0, 0),
(21, 'Problème de rechargement de page', '<p>En faite j&#39;avais oubli&eacute; les parenth&egrave;ses comme un con, &ccedil;a devrait marcher maintenant</p>', 1, 32, '2020-05-14 23:56:41', 1, 1),
(22, 'C\'est quoi ce bordel?', '<p>Je comprends rien</p>', 1, 32, '2020-05-14 23:57:32', 0, 0),
(23, 'Et là c\'est bon?', '<p>Ooooh</p>', 1, 32, '2020-05-14 23:58:02', 0, 0),
(24, 'Et là???????', '<p>JPPPPPP</p>', 1, 32, '2020-05-14 23:58:31', 0, 0),
(25, 'Dernier test sinon nique', '<p>JJFBdbhfbhg</p>', 1, 32, '2020-05-14 23:58:56', 1, 1),
(26, 'gfgfgfggghghg', '<p>gfg</p>', 1, 32, '2020-05-15 10:55:14', 0, 0),
(27, 'Je n\'arrive pas à récuper les données de l\'aquarium', '<p>Bonjour &agrave; tous 🙂</p><p>J&#39;ai essay&eacute; de mettre en place la r&eacute;cup&eacute;ration des donn&eacute;es de l&#39;aquarium afin de les afficher &agrave; l&#39;utilisateur, pour cela je fais ceci :</p><pre><code class=\"language-javascript\">$(document).on(\'click\', \'.mes_notifications a\', function(e)\n{\n    e.preventDefault()\n    var href = $(this).attr(\'href\')\n    var id_notif = $(this).attr(\'id\').replace(\'lien_\', \'\')\n\n    $.post(baseurl + \'inc/notification_lu.php\',\n    {\n        id_notif : id_notif\n    },\n    function()\n    {\n        location.href = href\n    })\n})</code></pre><p>Cependant rien ne se passe, ai-je fait une erreur quelque part?</p><p>Merci d&#39;avance &agrave; ceux qui prendront le temps de me r&eacute;pondre 😀</p>', 1, 32, '2020-05-18 11:38:37', 1, 1),
(28, 'Ne fermez pas ce sujet SVP...', '<p>PLEASE!!!!!</p>', 7, 32, '2020-05-18 23:22:42', 0, 0),
(29, 'Je test les différents types de caractères', '<p>Ce texte devrait appara&icirc;tre en <strong>gras</strong> et celui-ci en <em>italique</em>.</p><p>L&agrave; il devrait y avoir une liste:</p><ul><li>Avec des petits points devant<ul><li>Et l&agrave; un peu plus avanc&eacute;</li></ul></li></ul><blockquote><p>Et &ccedil;a c&#39;est une citation</p></blockquote>', 1, 32, '2020-05-18 23:44:45', 1, 1),
(30, 'Qu\'est ce qu\'un aquarium?', '<p>Je ne sais pas du tout...</p>', 1, 32, '2020-05-22 14:17:01', 0, 1),
(31, 'Projet pas adapté aux débutants', '<p>Salut &agrave; tous,</p><p>je travaille actuellement sur ce projet, et je voulais ouvrir ce sujet pour dire que ce dernier n&#39;est pas adapt&eacute; aux d&eacute;butants, je pense que c&#39;est quelque chose qui devrait &ecirc;tre dit dans le projet, car beaucoup risquent de se lancer &agrave; coeur perdu dedans, et vite perdre pied.</p><p>Je tiens &agrave; pr&eacute;ciser que cela n&#39;est en aucun cas une critique du site, bien au contraire ! 🙂 C&#39;est simplement que je pense que &ccedil;a pourrait &ecirc;tre bien de l&#39;indiquer, car vraiment il n&#39;est pas &eacute;vident du tout. D&#39;ailleurs je pense que &ccedil;a serait bien d&#39;indiquer quels sujets sont plut&ocirc;t pour d&eacute;butants (gestion d&#39;un blog, cr&eacute;ation d&#39;un portfolio) ou plut&ocirc;t pour des d&eacute;veloppeurs exp&eacute;riment&eacute;s, je suis ouvert au d&eacute;bat, en tout cas je pense que &ccedil;a serait une bonne id&eacute;e de pouvoir trier tout &ccedil;a!</p><p>Merci d&#39;avoir pris le temps de lire mon post 😀</p>', 18, 4, '2020-05-22 16:51:51', 1, 1);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `aide_sujet`
--
ALTER TABLE `aide_sujet`
  ADD CONSTRAINT `aide_sujet_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateurs` (`id`),
  ADD CONSTRAINT `aide_sujet_ibfk_2` FOREIGN KEY (`id_projet`) REFERENCES `projets` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
