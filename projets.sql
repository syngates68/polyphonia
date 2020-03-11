-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 11 mars 2020 à 23:40
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
-- Structure de la table `projets`
--

DROP TABLE IF EXISTS `projets`;
CREATE TABLE IF NOT EXISTS `projets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) DEFAULT NULL,
  `contenu` text,
  `illustration` varchar(255) DEFAULT NULL,
  `id_redacteur` int(11) NOT NULL,
  `brouillon` tinyint(4) NOT NULL DEFAULT '0',
  `date_ajout` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_sauvegarde` datetime DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `vues` int(11) NOT NULL DEFAULT '0',
  `actif` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `projets`
--

INSERT INTO `projets` (`id`, `titre`, `contenu`, `illustration`, `id_redacteur`, `brouillon`, `date_ajout`, `date_sauvegarde`, `slug`, `vues`, `actif`) VALUES
(1, 'Gestion des notes d\'un établissement scolaire', '<p>Vous venez d&#39;&ecirc;tre embauch&eacute; en tant que d&eacute;veloppeur dans un coll&egrave;ge/lyc&eacute;e de votre ville. Ce dernier n&#39;est pas forc&eacute;ment au point niveau technologie, et le suivi des notes des &eacute;l&egrave;ves se fait via papier. Vous proposez au chef d&#39;&eacute;tablissement de mettre en place un syst&egrave;me de gestion des notes informatis&eacute;s, projet qu&#39;il valide. Pour tester l&#39;int&eacute;grit&eacute; de votre syst&egrave;me, il vous propose de tester cela &agrave; petite &eacute;chelle avant de l&#39;ouvrir &agrave; l&#39;&eacute;tablissement entier.</p>\r\n\r\n<p>Pour cela, il propose de tester ce syst&egrave;me avec les classes de premi&egrave;re du lyc&eacute;e.</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'assets/img/ecole.jpg', 1, 0, '2020-03-03 20:59:10', NULL, 'gestion_notes_etablissement_scolaire', 8, 1),
(2, 'Site de vente en ligne', '<p>Une voiture venait d’arriver de l’autre côté de la barrière. Une personne sortit. Un militaire. Il était comme dans les films de guerre pensa David. Les décorations remplissaient l’avant de sa veste. Il s’approcha de la voiture où se trouvait David. Le chauffeur ouvrit la fenêtre.</p>', 'assets/img/magasin.jpg', 1, 0, '2020-03-03 21:01:10', NULL, 'site_vente_ligne', 6, 1),
(3, 'Réseau social inter-université', '<p>Nous sommes en 2004. Vous venez de d&eacute;poser vos bagages dans votre chambre &eacute;tudiant. D&egrave;s demain, vous allez commencer vos cours dans une des universit&eacute;s les plus prestigieuses du pays. Vous souhaitez rencontrer des gens, faire des soir&eacute;es, vivre pleinement votre nouvelle vie d&#39;&eacute;tudiant quoi! Le soucis est que c&#39;est assez difficile de pouvoir s&#39;inviter comme &ccedil;a &agrave; une de ces soir&eacute;es. Il faut conna&icirc;tre l&#39;ami d&#39;un ami d&#39;un ami qui est le cousin d&#39;un autre ami pour pouvoir avoir la chance de s&#39;y rendre. Autant dire que &ccedil;a n&#39;est pas si simple.</p>\r\n\r\n<p>Mais vous &ecirc;tes malin, et vous avez des comp&eacute;tences en d&eacute;veloppement qui vous permettent de r&eacute;aliser l&#39;id&eacute;e qui vous trotte derri&egrave;re la t&ecirc;te : un <strong>r&eacute;seau social</strong> pour les membres de l&#39;universit&eacute;.</p>\r\n\r\n<p>L&#39;id&eacute;e est tout simple, permettre aux &eacute;tudiants de se cr&eacute;er un compte, et d&#39;ajouter en ami les gens qu&#39;ils connaissent, pour garder contact &agrave; n&#39;importe quelle heure, n&#39;importe quel jour, et surtout, pourquoi pas rencontrer de nouvelles personnes (apr&egrave;s tout c&#39;est le but principal non?). Je pense que &ccedil;a vous rappelle un certain site bien connu, mais faisons comme s&#39;il n&#39;existait pas hein, apr&egrave;s tout, nous sommes en 2004.</p>\r\n\r\n<p>Vous posez vos id&eacute;es et commencez &agrave; noter le fonctionnement de votre site.</p>\r\n\r\n<ul>\r\n	<li>Pour se cr&eacute;er un compte, il faudra obligatoirement avoir une adresse mail finissant par <em>@nomdeluniversit&eacute;.edu</em>, pour cela un mail de confirmation devra &ecirc;tre envoy&eacute; au futur membre pour lui permettre de confirmer son inscription &agrave; votre r&eacute;seau social.</li>\r\n	<li>Une fois le compte cr&eacute;e, l&#39;utilisateur pourra renseigner diff&eacute;rentes informations sur son profil :\r\n	<ul>\r\n		<li>Sa classe</li>\r\n		<li>Ses passions</li>\r\n		<li>Ses hobbies</li>\r\n		<li>Son sexe</li>\r\n		<li>Sa date de naissance</li>\r\n		<li>La ville d&#39;o&ugrave; il vient</li>\r\n		<li>Sa situation amoureuse</li>\r\n		<li>Par qui il est int&eacute;ress&eacute; (homme/femme)</li>\r\n		<li>Toute autre information qui peut vous para&icirc;tre utile pour un &eacute;tudiant</li>\r\n	</ul>\r\n	</li>\r\n	<li>Il pourra rechercher parmis les autres membres les gens qu&#39;il conna&icirc;t et les ajouter en ami. Cette amiti&eacute; ne sera valid&eacute;e qu&#39;apr&egrave;s que l&#39;autre membre ait accept&eacute; la demande d&#39;ami.</li>\r\n	<li>Les amis pourront communiquer par messages.</li>\r\n	<li>Il sera &eacute;galement possible pour un membre de cr&eacute;er un groupe sur votre r&eacute;seau social, dont il sera alors l&#39;administrateur. N&#39;importe qui pourra rejoindre ce groupe, et les membres du groupe pourront discuter par message entre eux.</li>\r\n</ul>\r\n', 'assets/img/social.jpg', 1, 0, '2020-03-03 21:03:27', '2020-03-11 23:26:07', 'reseau-social-inter-universite', 9, 1),
(4, 'Tableau de bord d\'un site d\'actions boursières', '<p>G&eacute;n&eacute;ralement, on utilise un texte en faux latin (le texte ne veut rien dire, il a &eacute;t&eacute; modifi&eacute;), le Lorem ipsum ou Lipsum, qui permet donc de faire office de texte d&#39;attente. L&#39;avantage de le mettre en latin est que l&#39;op&eacute;rateur sait au premier coup d&#39;oeil que la page contenant ces lignes n&#39;est pas valide, et surtout l&#39;attention du client n&#39;est pas d&eacute;rang&eacute;e par le contenu, il demeure concentr&eacute; seulement sur l&#39;aspect graphique.</p>\r\n\r\n<p>Ce texte a pour autre avantage d&#39;utiliser des mots de longueur variable, essayant de simuler une occupation normale. La m&eacute;thode simpliste consistant &agrave; copier-coller un court texte plusieurs fois (&laquo; ceci est un faux-texte ceci est un faux-texte ceci est un faux-texte ceci est un faux-texte ceci est un faux-texte &raquo;) a l&#39;inconv&eacute;nient de ne pas permettre une juste appr&eacute;ciation typographique du r&eacute;sultat final.</p>\r\n\r\n<p>Il circule des centaines de versions diff&eacute;rentes du Lorem ipsum, mais ce texte aurait originellement &eacute;t&eacute; tir&eacute; de l&#39;ouvrage de Cic&eacute;ron, De Finibus Bonorum et Malorum (Liber Primus, 32), texte populaire &agrave; cette &eacute;poque, dont l&#39;une des premi&egrave;res phrases est : &laquo; Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit... &raquo; (&laquo; Il n&#39;existe personne qui aime la souffrance pour elle-m&ecirc;me, ni qui la recherche ni qui la veuille pour ce qu&#39;elle est... &raquo;).</p>\r\n\r\n<p>Expert en utilisabilit&eacute; des sites web et des logiciels, Jakob Nielsen souligne que l&#39;une des limites de l&#39;utilisation du faux-texte dans la conception de sites web est que ce texte n&#39;&eacute;tant jamais lu, il ne permet pas de v&eacute;rifier sa lisibilit&eacute; effective. La lecture &agrave; l&#39;&eacute;cran &eacute;tant plus difficile, cet aspect est pourtant essentiel. Nielsen pr&eacute;conise donc l&#39;utilisation de textes repr&eacute;sentatifs plut&ocirc;t que du lorem ipsum. On peut aussi faire remarquer que les formules con&ccedil;ues avec du faux-texte ont tendance &agrave; sous-estimer l&#39;espace n&eacute;cessaire &agrave; une titraille imm&eacute;diatement intelligible, ce qui oblige les r&eacute;dactions &agrave; formuler ensuite des titres simplificateurs, voire inexacts, pour ne pas d&eacute;passer l&#39;espace imparti.</p>\r\n\r\n<p>Contrairement &agrave; une id&eacute;e r&eacute;pandue, le faux-texte ne donne m&ecirc;me pas un aper&ccedil;u r&eacute;aliste du gris typographique, en particulier dans le cas des textes justifi&eacute;s : en effet, les mots fictifs employ&eacute;s dans le faux-texte ne faisant &eacute;videmment pas partie des dictionnaires des logiciels de PAO, les programmes de c&eacute;sure ne peuvent pas effectuer leur travail habituel sur de tels textes. Par cons&eacute;quent, l&#39;interlettrage du faux-texte sera toujours quelque peu sup&eacute;rieur &agrave; ce qu&#39;il aurait &eacute;t&eacute; avec un texte r&eacute;el, qui pr&eacute;sentera donc un aspect plus sombre et moins lisible que le faux-texte avec lequel le graphiste a effectu&eacute; ses essais. Un vrai texte pose aussi des probl&egrave;mes de lisibilit&eacute; sp&eacute;cifiques (noms propres, num&eacute;ros de t&eacute;l&eacute;phone, retours &agrave; la ligne fr&eacute;quents, composition des citations en italiques, intertitres de plus de deux lignes...) qu&#39;on n&#39;observe jamais dans le faux-texte.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>G&eacute;n&eacute;ralement, on utilise un texte en faux latin (le texte ne veut rien dire, il a &eacute;t&eacute; modifi&eacute;), le Lorem ipsum ou Lipsum, qui permet donc de faire office de texte d&#39;attente. L&#39;avantage de le mettre en latin est que l&#39;op&eacute;rateur sait au premier coup d&#39;oeil que la page contenant ces lignes n&#39;est pas valide, et surtout l&#39;attention du client n&#39;est pas d&eacute;rang&eacute;e par le contenu, il demeure concentr&eacute; seulement sur l&#39;aspect graphique.</p>\r\n\r\n<p>Ce texte a pour autre avantage d&#39;utiliser des mots de longueur variable, essayant de simuler une occupation normale. La m&eacute;thode simpliste consistant &agrave; copier-coller un court texte plusieurs fois (&laquo; ceci est un faux-texte ceci est un faux-texte ceci est un faux-texte ceci est un faux-texte ceci est un faux-texte &raquo;) a l&#39;inconv&eacute;nient de ne pas permettre une juste appr&eacute;ciation typographique du r&eacute;sultat final.</p>\r\n\r\n<p>Il circule des centaines de versions diff&eacute;rentes du Lorem ipsum, mais ce texte aurait originellement &eacute;t&eacute; tir&eacute; de l&#39;ouvrage de Cic&eacute;ron, De Finibus Bonorum et Malorum (Liber Primus, 32), texte populaire &agrave; cette &eacute;poque, dont l&#39;une des premi&egrave;res phrases est : &laquo; Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit... &raquo; (&laquo; Il n&#39;existe personne qui aime la souffrance pour elle-m&ecirc;me, ni qui la recherche ni qui la veuille pour ce qu&#39;elle est... &raquo;).</p>\r\n\r\n<p>Expert en utilisabilit&eacute; des sites web et des logiciels, Jakob Nielsen souligne que l&#39;une des limites de l&#39;utilisation du faux-texte dans la conception de sites web est que ce texte n&#39;&eacute;tant jamais lu, il ne permet pas de v&eacute;rifier sa lisibilit&eacute; effective. La lecture &agrave; l&#39;&eacute;cran &eacute;tant plus difficile, cet aspect est pourtant essentiel. Nielsen pr&eacute;conise donc l&#39;utilisation de textes repr&eacute;sentatifs plut&ocirc;t que du lorem ipsum. On peut aussi faire remarquer que les formules con&ccedil;ues avec du faux-texte ont tendance &agrave; sous-estimer l&#39;espace n&eacute;cessaire &agrave; une titraille imm&eacute;diatement intelligible, ce qui oblige les r&eacute;dactions &agrave; formuler ensuite des titres simplificateurs, voire inexacts, pour ne pas d&eacute;passer l&#39;espace imparti.</p>\r\n\r\n<p>Contrairement &agrave; une id&eacute;e r&eacute;pandue, le faux-texte ne donne m&ecirc;me pas un aper&ccedil;u r&eacute;aliste du gris typographique, en particulier dans le cas des textes justifi&eacute;s : en effet, les mots fictifs employ&eacute;s dans le faux-texte ne faisant &eacute;videmment pas partie des dictionnaires des logiciels de PAO, les programmes de c&eacute;sure ne peuvent pas effectuer leur travail habituel sur de tels textes. Par cons&eacute;quent, l&#39;interlettrage du faux-texte sera toujours quelque peu sup&eacute;rieur &agrave; ce qu&#39;il aurait &eacute;t&eacute; avec un texte r&eacute;el, qui pr&eacute;sentera donc un aspect plus sombre et moins lisible que le faux-texte avec lequel le graphiste a effectu&eacute; ses essais. Un vrai texte pose aussi des probl&egrave;mes de lisibilit&eacute; sp&eacute;cifiques (noms propres, num&eacute;ros de t&eacute;l&eacute;phone, retours &agrave; la ligne fr&eacute;quents, composition des citations en italiques, intertitres de plus de deux lignes...) qu&#39;on n&#39;observe jamais dans le faux-texte.</p>\r\n\r\n<p>G&eacute;n&eacute;ralement, on utilise un texte en faux latin (le texte ne veut rien dire, il a &eacute;t&eacute; modifi&eacute;), le Lorem ipsum ou Lipsum, qui permet donc de faire office de texte d&#39;attente. L&#39;avantage de le mettre en latin est que l&#39;op&eacute;rateur sait au premier coup d&#39;oeil que la page contenant ces lignes n&#39;est pas valide, et surtout l&#39;attention du client n&#39;est pas d&eacute;rang&eacute;e par le contenu, il demeure concentr&eacute; seulement sur l&#39;aspect graphique.</p>\r\n\r\n<p>Ce texte a pour autre avantage d&#39;utiliser des mots de longueur variable, essayant de simuler une occupation normale. La m&eacute;thode simpliste consistant &agrave; copier-coller un court texte plusieurs fois (&laquo; ceci est un faux-texte ceci est un faux-texte ceci est un faux-texte ceci est un faux-texte ceci est un faux-texte &raquo;) a l&#39;inconv&eacute;nient de ne pas permettre une juste appr&eacute;ciation typographique du r&eacute;sultat final.</p>\r\n\r\n<p>Il circule des centaines de versions diff&eacute;rentes du Lorem ipsum, mais ce texte aurait originellement &eacute;t&eacute; tir&eacute; de l&#39;ouvrage de Cic&eacute;ron, De Finibus Bonorum et Malorum (Liber Primus, 32), texte populaire &agrave; cette &eacute;poque, dont l&#39;une des premi&egrave;res phrases est : &laquo; Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit... &raquo; (&laquo; Il n&#39;existe personne qui aime la souffrance pour elle-m&ecirc;me, ni qui la recherche ni qui la veuille pour ce qu&#39;elle est... &raquo;).</p>\r\n\r\n<p>Expert en utilisabilit&eacute; des sites web et des logiciels, Jakob Nielsen souligne que l&#39;une des limites de l&#39;utilisation du faux-texte dans la conception de sites web est que ce texte n&#39;&eacute;tant jamais lu, il ne permet pas de v&eacute;rifier sa lisibilit&eacute; effective. La lecture &agrave; l&#39;&eacute;cran &eacute;tant plus difficile, cet aspect est pourtant essentiel. Nielsen pr&eacute;conise donc l&#39;utilisation de textes repr&eacute;sentatifs plut&ocirc;t que du lorem ipsum. On peut aussi faire remarquer que les formules con&ccedil;ues avec du faux-texte ont tendance &agrave; sous-estimer l&#39;espace n&eacute;cessaire &agrave; une titraille imm&eacute;diatement intelligible, ce qui oblige les r&eacute;dactions &agrave; formuler ensuite des titres simplificateurs, voire inexacts, pour ne pas d&eacute;passer l&#39;espace imparti.</p>\r\n\r\n<p>Contrairement &agrave; une id&eacute;e r&eacute;pandue, le faux-texte ne donne m&ecirc;me pas un aper&ccedil;u r&eacute;aliste du gris typographique, en particulier dans le cas des textes justifi&eacute;s : en effet, les mots fictifs employ&eacute;s dans le faux-texte ne faisant &eacute;videmment pas partie des dictionnaires des logiciels de PAO, les programmes de c&eacute;sure ne peuvent pas effectuer leur travail habituel sur de tels textes. Par cons&eacute;quent, l&#39;interlettrage du faux-texte sera toujours quelque peu sup&eacute;rieur &agrave; ce qu&#39;il aurait &eacute;t&eacute; avec un texte r&eacute;el, qui pr&eacute;sentera donc un aspect plus sombre et moins lisible que le faux-texte avec lequel le graphiste a effectu&eacute; ses essais. Un vrai texte pose aussi des probl&egrave;mes de lisibilit&eacute; sp&eacute;cifiques (noms propres, num&eacute;ros de t&eacute;l&eacute;phone, retours &agrave; la ligne fr&eacute;quents, composition des citations en italiques, intertitres de plus de deux lignes...) qu&#39;on n&#39;observe jamais dans le faux-texte.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>G&eacute;n&eacute;ralement, on utilise un texte en faux latin (le texte ne veut rien dire, il a &eacute;t&eacute; modifi&eacute;), le Lorem ipsum ou Lipsum, qui permet donc de faire office de texte d&#39;attente. L&#39;avantage de le mettre en latin est que l&#39;op&eacute;rateur sait au premier coup d&#39;oeil que la page contenant ces lignes n&#39;est pas valide, et surtout l&#39;attention du client n&#39;est pas d&eacute;rang&eacute;e par le contenu, il demeure concentr&eacute; seulement sur l&#39;aspect graphique.</p>\r\n\r\n<p>Ce texte a pour autre avantage d&#39;utiliser des mots de longueur variable, essayant de simuler une occupation normale. La m&eacute;thode simpliste consistant &agrave; copier-coller un court texte plusieurs fois (&laquo; ceci est un faux-texte ceci est un faux-texte ceci est un faux-texte ceci est un faux-texte ceci est un faux-texte &raquo;) a l&#39;inconv&eacute;nient de ne pas permettre une juste appr&eacute;ciation typographique du r&eacute;sultat final.</p>\r\n\r\n<p>Il circule des centaines de versions diff&eacute;rentes du Lorem ipsum, mais ce texte aurait originellement &eacute;t&eacute; tir&eacute; de l&#39;ouvrage de Cic&eacute;ron, De Finibus Bonorum et Malorum (Liber Primus, 32), texte populaire &agrave; cette &eacute;poque, dont l&#39;une des premi&egrave;res phrases est : &laquo; Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit... &raquo; (&laquo; Il n&#39;existe personne qui aime la souffrance pour elle-m&ecirc;me, ni qui la recherche ni qui la veuille pour ce qu&#39;elle est... &raquo;).</p>\r\n\r\n<p>Expert en utilisabilit&eacute; des sites web et des logiciels, Jakob Nielsen souligne que l&#39;une des limites de l&#39;utilisation du faux-texte dans la conception de sites web est que ce texte n&#39;&eacute;tant jamais lu, il ne permet pas de v&eacute;rifier sa lisibilit&eacute; effective. La lecture &agrave; l&#39;&eacute;cran &eacute;tant plus difficile, cet aspect est pourtant essentiel. Nielsen pr&eacute;conise donc l&#39;utilisation de textes repr&eacute;sentatifs plut&ocirc;t que du lorem ipsum. On peut aussi faire remarquer que les formules con&ccedil;ues avec du faux-texte ont tendance &agrave; sous-estimer l&#39;espace n&eacute;cessaire &agrave; une titraille imm&eacute;diatement intelligible, ce qui oblige les r&eacute;dactions &agrave; formuler ensuite des titres simplificateurs, voire inexacts, pour ne pas d&eacute;passer l&#39;espace imparti.</p>\r\n\r\n<p>Contrairement &agrave; une id&eacute;e r&eacute;pandue, le faux-texte ne donne m&ecirc;me pas un aper&ccedil;u r&eacute;aliste du gris typographique, en particulier dans le cas des textes justifi&eacute;s : en effet, les mots fictifs employ&eacute;s dans le faux-texte ne faisant &eacute;videmment pas partie des dictionnaires des logiciels de PAO, les programmes de c&eacute;sure ne peuvent pas effectuer leur travail habituel sur de tels textes. Par cons&eacute;quent, l&#39;interlettrage du faux-texte sera toujours quelque peu sup&eacute;rieur &agrave; ce qu&#39;il aurait &eacute;t&eacute; avec un texte r&eacute;el, qui pr&eacute;sentera donc un aspect plus sombre et moins lisible que le faux-texte avec lequel le graphiste a effectu&eacute; ses essais. Un vrai texte pose aussi des probl&egrave;mes de lisibilit&eacute; sp&eacute;cifiques (noms propres, num&eacute;ros de t&eacute;l&eacute;phone, retours &agrave; la ligne fr&eacute;quents, composition des citations en italiques, intertitres de plus de deux lignes...) qu&#39;on n&#39;observe jamais dans le faux-texte.</p>\r\n', 'assets/img/X45Lc0tNl.jpeg', 1, 0, '2020-03-06 16:46:27', NULL, 'tableau-de-bord-dun-site-dactions-boursieres', 17, 1),
(5, 'Test de brouillon modifié', '<p>J&#39;&eacute;cris ce contenu pour voir ce que &ccedil;a donne et je le modifie</p>\r\n', 'assets/img/14bn05n1T.jpeg', 1, 1, '2020-03-09 11:40:23', '2020-03-09 21:10:59', NULL, 0, 0),
(6, 'Gestion des stocks d\'un magasin de chaussures', '<p>Vous venez d&#39;&ecirc;tre embauch&eacute; par un magasin local pour inclure &agrave; leur site d&eacute;j&agrave; existant une gestion de leurs stocks. TEST</p>\r\n', 'assets/img/LlJ8UHP1R.jpeg', 1, 1, '2020-03-09 16:13:11', '2020-03-10 20:43:16', 'gestion-des-stocks-dun-magasin-de-chaussures', 3, 0),
(10, 'Mon super projet', '<p>Test</p>\r\n', 'assets/img/KKpR0Kj4B.jpeg', 1, 1, '2020-03-09 16:28:35', '2020-03-09 16:28:35', 'mon-super-projet', 0, 0),
(13, 'Mon brouillon', NULL, '', 1, 1, '2020-03-09 21:21:56', '2020-03-09 21:21:56', NULL, 0, 0),
(14, 'Plateforme de partages de courts métrages', '<p>YouTube fait d&eacute;sormais parti de la culture d&#39;internet, la plateforme est utilis&eacute;e par des millions de personnes chaque jour, et des heures de vid&eacute;os sont post&eacute;es chaque minute. Autant dire que c&#39;est une v&eacute;ritable machine de guerre.</p>\r\n\r\n<p>L&#39;un des points forts de YouTube, ce sont ses cr&eacute;ateurs, sobrement appel&eacute;s <strong>Youtubeurs</strong> et qui atteignent des sommets avec des millions d&#39;abonn&eacute;s et des communaut&eacute;s plus ou moins actives. Le probl&egrave;me de YouTube pourtant, et beaucoup de cr&eacute;ateurs s&#39;en sont plaints plus ou moins r&eacute;cemment, c&#39;est le manque de compr&eacute;hension de la plateforme pour ses cr&eacute;ateurs. Il suffit de voir le toll&eacute; qu&#39;a &eacute;t&eacute; le <strong>YouTube Rewind 2018</strong> pourtant RDV annuel cens&eacute; c&eacute;l&eacute;brer les &eacute;v&eacute;nements marquants de l&#39;ann&eacute;e avec sa communaut&eacute;.</p>\r\n\r\n<p>Et tout ceci vous donne une id&eacute;e, pourquoi ne pas cr&eacute;er votre propre plateforme de partage de vid&eacute;o? Mais pas n&#39;importe quelle plateforme de partages de vid&eacute;os, depuis un petit moment, les courts m&eacute;trages sont l&eacute;gion sur YouTube, noy&eacute;s derri&egrave;re des vid&eacute;os de d&eacute;gustation et autres pranks. Vous d&eacute;cidez donc de cr&eacute;er une plateforme o&ugrave; les utilisateurs pourront partager leurs courts m&eacute;trages, et <strong>uniquement</strong> d&eacute;di&eacute;e &agrave; ce type de contenu.</p>\r\n\r\n<p>Le principe sera tout simple:</p>\r\n\r\n<ul>\r\n	<li>Les vid&eacute;os devront pouvoir &ecirc;tre post&eacute;es directement depuis la plateforme, mais il faut envisager l&#39;id&eacute;e que certains cr&eacute;ateurs de YouTube pourraient vouloir rapatrier leurs vid&eacute;os sur votre plateforme, pour cela il faut donc laisser la possibilit&eacute; de renseigner le lien de leur vid&eacute;o et de l&#39;afficher sur votre plateforme (<a href=\"https://developers.google.com/youtube/iframe_api_reference\">L&#39;API de YouTube</a> est tr&egrave;s pratique pour &ccedil;a).</li>\r\n	<li>Une vid&eacute;o doit avoir <strong>obligatoirement</strong> un titre, une description, et - &eacute;videmment - une vid&eacute;o.</li>\r\n	<li>Les utilisateurs doivent pouvoir commenter et noter la vid&eacute;o (sur un principe de pouces bleus/rouges, ou un syst&egrave;me de notation, comme bon vous semble).</li>\r\n	<li>Ils doivent &eacute;galement avoir la possibilit&eacute; de conserver les vid&eacute;os qu&#39;ils souhaitent regarder plus tard.</li>\r\n</ul>\r\n', 'assets/img/Cljr96ZB7.jpeg', 1, 1, '2020-03-10 22:35:50', '2020-03-11 23:05:50', 'plateforme-de-partages-de-courts-metrages', 2, 1),
(15, 'Test', '<p>Bonjour, ceci est un test</p>\r\n', 'assets/projets/tmphGPrQ2oiZ.jpeg', 1, 0, '2020-03-11 21:54:22', NULL, 'test', 0, 0),
(16, 'Coucou', '<p><strong>#oui</strong></p>\r\n', 'assets/projets/rVGoaOmk1.png', 1, 0, '2020-03-11 21:56:19', '2020-03-11 21:56:19', 'coucou', 1, 0),
(17, NULL, NULL, '', 1, 1, '2020-03-11 22:19:49', '2020-03-11 22:19:49', NULL, 0, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
