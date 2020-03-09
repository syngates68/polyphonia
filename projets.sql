-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3307
-- Généré le :  lun. 09 mars 2020 à 16:49
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
-- Structure de la table `projets`
--

DROP TABLE IF EXISTS `projets`;
CREATE TABLE IF NOT EXISTS `projets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) DEFAULT NULL,
  `contenu` text DEFAULT NULL,
  `illustration` varchar(255) DEFAULT NULL,
  `id_redacteur` int(11) NOT NULL,
  `brouillon` tinyint(4) NOT NULL DEFAULT 0,
  `date_ajout` datetime NOT NULL DEFAULT current_timestamp(),
  `date_sauvegarde` datetime DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `vues` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `projets`
--

INSERT INTO `projets` (`id`, `titre`, `contenu`, `illustration`, `id_redacteur`, `brouillon`, `date_ajout`, `date_sauvegarde`, `slug`, `vues`) VALUES
(1, 'Gestion des notes d\'un établissement scolaire', '<p>Vous venez d&#39;&ecirc;tre embauch&eacute; en tant que d&eacute;veloppeur dans un coll&egrave;ge/lyc&eacute;e de votre ville. Ce dernier n&#39;est pas forc&eacute;ment au point niveau technologie, et le suivi des notes des &eacute;l&egrave;ves se fait via papier. Vous proposez au chef d&#39;&eacute;tablissement de mettre en place un syst&egrave;me de gestion des notes informatis&eacute;s, projet qu&#39;il valide. Pour tester l&#39;int&eacute;grit&eacute; de votre syst&egrave;me, il vous propose de tester cela &agrave; petite &eacute;chelle avant de l&#39;ouvrir &agrave; l&#39;&eacute;tablissement entier.</p>\r\n\r\n<p>Pour cela, il propose de tester ce syst&egrave;me avec les classes de premi&egrave;re du lyc&eacute;e.</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'assets/img/ecole.jpg', 1, 0, '2020-03-03 20:59:10', NULL, 'gestion_notes_etablissement_scolaire', 4),
(2, 'Site de vente en ligne', '<p>Une voiture venait d’arriver de l’autre côté de la barrière. Une personne sortit. Un militaire. Il était comme dans les films de guerre pensa David. Les décorations remplissaient l’avant de sa veste. Il s’approcha de la voiture où se trouvait David. Le chauffeur ouvrit la fenêtre.</p>', 'assets/img/magasin.jpg', 1, 0, '2020-03-03 21:01:10', NULL, 'site_vente_ligne', 0),
(3, 'Réseau social inter-université', '<p>Une voiture venait d’arriver de l’autre côté de la barrière. Une personne sortit. Un militaire. Il était comme dans les films de guerre pensa David. Les décorations remplissaient l’avant de sa veste. Il s’approcha de la voiture où se trouvait David. Le chauffeur ouvrit la fenêtre.</p>\r\n\r\n<p>Le militaire regagna sa voiture et la barrière s’ouvrit. David regardait autour de lui, la base militaire où il avait passé dix mois de sa vie. Il n’y avait pas beaucoup de changement. L’herbe toujours aussi bien tondue, les allées toujours aussi propres. Les mêmes bâtiments. Juste les décors avaient changés. Il s’agissait de chars. C’étaient les chars que David avait eu l’occasion de voir fonctionner et qui, maintenant, avaient remplacés les vieux chars qui servaient de décors. Cela fit sourire David.</p>\r\n\r\n<p>D’ailleurs, le Dr. ne savait pas vraiment comment son processeur pouvait fonctionner. D’une architecture trop complexe, le Dr. s’était reposé sur les tests effectués. Tests très légèrement modifiés par Prélude afin de cacher certaines fonctions du processeur.</p>\r\n\r\n<p>Désormais, tous les ordinateurs lui étaient accessibles. Les centrales nucléaires, les services informatiques des grandes compagnies, de l’eau, du téléphone, la télévision, l’électricité, la défense, la bourse...</p>\r\n\r\n<p>C’est comme ça qu’il se voyait à cette époque. Un peu rebelle envers ce monde. L’informatique l’avait aidé à s’enfermer un peu plus dans cet état. Il était devenu doué d’une logique à toute épreuve et d’une intelligence remarquable, mais surtout, il était devenu insociable. Avec l’âge, le besoin de trouver l’âme sœur avait pris le dessus et il avait été un peu obligé de rencontrer des gens, de parler avec eux. Très difficile au début, il avait réussi à vaincre ces préjugés. Il avait accepté la lenteur d’esprit des autres ainsi que leur manque de logique.</p>\r\n\r\n<p>De tout temps, l\'homme a tenté de comprendre puis de reproduire l\'extraordinaire machine qu\'est l\'être humain. Les premiers automates nous font sourire aujourd\'hui. Les premiers ordinateurs également, mais un peu moins. Et lorsqu\'un certain McCullogn, aidé de Pitts, invente en 1943 le premier neurone formel, on ne rigole plus. L\'ordinateur est devenu capable de reproduire des neurones artificiels. Le \"complexe de Frankenstein\" va alors freiner les recherches. On commence à entendre parler du concept d\'Intelligence Artificielle, plus connu sous les termes d\'IA. Cela fait peur.</p>\r\n\r\n<p>C’est comme ça qu’il se voyait à cette époque. Un peu rebelle envers ce monde. L’informatique l’avait aidé à s’enfermer un peu plus dans cet état. Il était devenu doué d’une logique à toute épreuve et d’une intelligence remarquable, mais surtout, il était devenu insociable. Avec l’âge, le besoin de trouver l’âme sœur avait pris le dessus et il avait été un peu obligé de rencontrer des gens, de parler avec eux. Très difficile au début, il avait réussi à vaincre ces préjugés. Il avait accepté la lenteur d’esprit des autres ainsi que leur manque de logique.</p>\r\n\r\n<p>Aujourd’hui, c’est son anniversaire. Il a vingt-six ans, mais il ne s’en souvient plus. Il ne prête pas attention à ce genre de détails. David est un homme distrait, timide, mais sûr de lui. Il est grand et mince. De grandes mains prolongent ses longs bras. Il lui serait possible de tenir deux bouteilles de Champagne dans chacune de ses mains, mais il ne boit jamais. L\'alcool le rend malade et malheureux, voir dépressif.</p>\r\n\r\n<p>Les deux hommes entourent David et le conduisent à la voiture, un Espace, garé devant sa maison. Il se dit que ce serait bien si sa voisine pouvait le voir comme ça, entouré de deux gardes du corps. Ça fait ‘pro’. Et comme tous les matins, sa voisine Florence le regarde partir, mais cette fois-ci entouré de deux gros gars baraqués, rasés au plus près, menton et crâne. Un peu plus les pieds sur terre et surtout plus réveillée, elle ne trouve pas cette scène très drôle. Il faudra qu’elle vienne le voir ce soir, à son retour, pour lui demander de quoi il s’agissait.</p>\r\n\r\n<p>Les deux gardes du corps personnels de David le prirent par le bras et suivirent le général. Les militaires s‘étaient mis au « garde à vous » sur les côtés du couloir. Celui-ci menait à un ascenseur. Le général inséra à nouveau son badge et la porte s’ouvrit. Il y montèrent tous les quatre. Il n’y avait pas de niveau d’indiqué.</p>', 'assets/img/social.jpg', 1, 0, '2020-03-03 21:03:27', NULL, 'reseau_social_inter_universite', 1),
(4, 'Tableau de bord d\'un site d\'actions boursières', '<p>G&eacute;n&eacute;ralement, on utilise un texte en faux latin (le texte ne veut rien dire, il a &eacute;t&eacute; modifi&eacute;), le Lorem ipsum ou Lipsum, qui permet donc de faire office de texte d&#39;attente. L&#39;avantage de le mettre en latin est que l&#39;op&eacute;rateur sait au premier coup d&#39;oeil que la page contenant ces lignes n&#39;est pas valide, et surtout l&#39;attention du client n&#39;est pas d&eacute;rang&eacute;e par le contenu, il demeure concentr&eacute; seulement sur l&#39;aspect graphique.</p>\r\n\r\n<p>Ce texte a pour autre avantage d&#39;utiliser des mots de longueur variable, essayant de simuler une occupation normale. La m&eacute;thode simpliste consistant &agrave; copier-coller un court texte plusieurs fois (&laquo; ceci est un faux-texte ceci est un faux-texte ceci est un faux-texte ceci est un faux-texte ceci est un faux-texte &raquo;) a l&#39;inconv&eacute;nient de ne pas permettre une juste appr&eacute;ciation typographique du r&eacute;sultat final.</p>\r\n\r\n<p>Il circule des centaines de versions diff&eacute;rentes du Lorem ipsum, mais ce texte aurait originellement &eacute;t&eacute; tir&eacute; de l&#39;ouvrage de Cic&eacute;ron, De Finibus Bonorum et Malorum (Liber Primus, 32), texte populaire &agrave; cette &eacute;poque, dont l&#39;une des premi&egrave;res phrases est : &laquo; Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit... &raquo; (&laquo; Il n&#39;existe personne qui aime la souffrance pour elle-m&ecirc;me, ni qui la recherche ni qui la veuille pour ce qu&#39;elle est... &raquo;).</p>\r\n\r\n<p>Expert en utilisabilit&eacute; des sites web et des logiciels, Jakob Nielsen souligne que l&#39;une des limites de l&#39;utilisation du faux-texte dans la conception de sites web est que ce texte n&#39;&eacute;tant jamais lu, il ne permet pas de v&eacute;rifier sa lisibilit&eacute; effective. La lecture &agrave; l&#39;&eacute;cran &eacute;tant plus difficile, cet aspect est pourtant essentiel. Nielsen pr&eacute;conise donc l&#39;utilisation de textes repr&eacute;sentatifs plut&ocirc;t que du lorem ipsum. On peut aussi faire remarquer que les formules con&ccedil;ues avec du faux-texte ont tendance &agrave; sous-estimer l&#39;espace n&eacute;cessaire &agrave; une titraille imm&eacute;diatement intelligible, ce qui oblige les r&eacute;dactions &agrave; formuler ensuite des titres simplificateurs, voire inexacts, pour ne pas d&eacute;passer l&#39;espace imparti.</p>\r\n\r\n<p>Contrairement &agrave; une id&eacute;e r&eacute;pandue, le faux-texte ne donne m&ecirc;me pas un aper&ccedil;u r&eacute;aliste du gris typographique, en particulier dans le cas des textes justifi&eacute;s : en effet, les mots fictifs employ&eacute;s dans le faux-texte ne faisant &eacute;videmment pas partie des dictionnaires des logiciels de PAO, les programmes de c&eacute;sure ne peuvent pas effectuer leur travail habituel sur de tels textes. Par cons&eacute;quent, l&#39;interlettrage du faux-texte sera toujours quelque peu sup&eacute;rieur &agrave; ce qu&#39;il aurait &eacute;t&eacute; avec un texte r&eacute;el, qui pr&eacute;sentera donc un aspect plus sombre et moins lisible que le faux-texte avec lequel le graphiste a effectu&eacute; ses essais. Un vrai texte pose aussi des probl&egrave;mes de lisibilit&eacute; sp&eacute;cifiques (noms propres, num&eacute;ros de t&eacute;l&eacute;phone, retours &agrave; la ligne fr&eacute;quents, composition des citations en italiques, intertitres de plus de deux lignes...) qu&#39;on n&#39;observe jamais dans le faux-texte.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>G&eacute;n&eacute;ralement, on utilise un texte en faux latin (le texte ne veut rien dire, il a &eacute;t&eacute; modifi&eacute;), le Lorem ipsum ou Lipsum, qui permet donc de faire office de texte d&#39;attente. L&#39;avantage de le mettre en latin est que l&#39;op&eacute;rateur sait au premier coup d&#39;oeil que la page contenant ces lignes n&#39;est pas valide, et surtout l&#39;attention du client n&#39;est pas d&eacute;rang&eacute;e par le contenu, il demeure concentr&eacute; seulement sur l&#39;aspect graphique.</p>\r\n\r\n<p>Ce texte a pour autre avantage d&#39;utiliser des mots de longueur variable, essayant de simuler une occupation normale. La m&eacute;thode simpliste consistant &agrave; copier-coller un court texte plusieurs fois (&laquo; ceci est un faux-texte ceci est un faux-texte ceci est un faux-texte ceci est un faux-texte ceci est un faux-texte &raquo;) a l&#39;inconv&eacute;nient de ne pas permettre une juste appr&eacute;ciation typographique du r&eacute;sultat final.</p>\r\n\r\n<p>Il circule des centaines de versions diff&eacute;rentes du Lorem ipsum, mais ce texte aurait originellement &eacute;t&eacute; tir&eacute; de l&#39;ouvrage de Cic&eacute;ron, De Finibus Bonorum et Malorum (Liber Primus, 32), texte populaire &agrave; cette &eacute;poque, dont l&#39;une des premi&egrave;res phrases est : &laquo; Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit... &raquo; (&laquo; Il n&#39;existe personne qui aime la souffrance pour elle-m&ecirc;me, ni qui la recherche ni qui la veuille pour ce qu&#39;elle est... &raquo;).</p>\r\n\r\n<p>Expert en utilisabilit&eacute; des sites web et des logiciels, Jakob Nielsen souligne que l&#39;une des limites de l&#39;utilisation du faux-texte dans la conception de sites web est que ce texte n&#39;&eacute;tant jamais lu, il ne permet pas de v&eacute;rifier sa lisibilit&eacute; effective. La lecture &agrave; l&#39;&eacute;cran &eacute;tant plus difficile, cet aspect est pourtant essentiel. Nielsen pr&eacute;conise donc l&#39;utilisation de textes repr&eacute;sentatifs plut&ocirc;t que du lorem ipsum. On peut aussi faire remarquer que les formules con&ccedil;ues avec du faux-texte ont tendance &agrave; sous-estimer l&#39;espace n&eacute;cessaire &agrave; une titraille imm&eacute;diatement intelligible, ce qui oblige les r&eacute;dactions &agrave; formuler ensuite des titres simplificateurs, voire inexacts, pour ne pas d&eacute;passer l&#39;espace imparti.</p>\r\n\r\n<p>Contrairement &agrave; une id&eacute;e r&eacute;pandue, le faux-texte ne donne m&ecirc;me pas un aper&ccedil;u r&eacute;aliste du gris typographique, en particulier dans le cas des textes justifi&eacute;s : en effet, les mots fictifs employ&eacute;s dans le faux-texte ne faisant &eacute;videmment pas partie des dictionnaires des logiciels de PAO, les programmes de c&eacute;sure ne peuvent pas effectuer leur travail habituel sur de tels textes. Par cons&eacute;quent, l&#39;interlettrage du faux-texte sera toujours quelque peu sup&eacute;rieur &agrave; ce qu&#39;il aurait &eacute;t&eacute; avec un texte r&eacute;el, qui pr&eacute;sentera donc un aspect plus sombre et moins lisible que le faux-texte avec lequel le graphiste a effectu&eacute; ses essais. Un vrai texte pose aussi des probl&egrave;mes de lisibilit&eacute; sp&eacute;cifiques (noms propres, num&eacute;ros de t&eacute;l&eacute;phone, retours &agrave; la ligne fr&eacute;quents, composition des citations en italiques, intertitres de plus de deux lignes...) qu&#39;on n&#39;observe jamais dans le faux-texte.</p>\r\n\r\n<p>G&eacute;n&eacute;ralement, on utilise un texte en faux latin (le texte ne veut rien dire, il a &eacute;t&eacute; modifi&eacute;), le Lorem ipsum ou Lipsum, qui permet donc de faire office de texte d&#39;attente. L&#39;avantage de le mettre en latin est que l&#39;op&eacute;rateur sait au premier coup d&#39;oeil que la page contenant ces lignes n&#39;est pas valide, et surtout l&#39;attention du client n&#39;est pas d&eacute;rang&eacute;e par le contenu, il demeure concentr&eacute; seulement sur l&#39;aspect graphique.</p>\r\n\r\n<p>Ce texte a pour autre avantage d&#39;utiliser des mots de longueur variable, essayant de simuler une occupation normale. La m&eacute;thode simpliste consistant &agrave; copier-coller un court texte plusieurs fois (&laquo; ceci est un faux-texte ceci est un faux-texte ceci est un faux-texte ceci est un faux-texte ceci est un faux-texte &raquo;) a l&#39;inconv&eacute;nient de ne pas permettre une juste appr&eacute;ciation typographique du r&eacute;sultat final.</p>\r\n\r\n<p>Il circule des centaines de versions diff&eacute;rentes du Lorem ipsum, mais ce texte aurait originellement &eacute;t&eacute; tir&eacute; de l&#39;ouvrage de Cic&eacute;ron, De Finibus Bonorum et Malorum (Liber Primus, 32), texte populaire &agrave; cette &eacute;poque, dont l&#39;une des premi&egrave;res phrases est : &laquo; Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit... &raquo; (&laquo; Il n&#39;existe personne qui aime la souffrance pour elle-m&ecirc;me, ni qui la recherche ni qui la veuille pour ce qu&#39;elle est... &raquo;).</p>\r\n\r\n<p>Expert en utilisabilit&eacute; des sites web et des logiciels, Jakob Nielsen souligne que l&#39;une des limites de l&#39;utilisation du faux-texte dans la conception de sites web est que ce texte n&#39;&eacute;tant jamais lu, il ne permet pas de v&eacute;rifier sa lisibilit&eacute; effective. La lecture &agrave; l&#39;&eacute;cran &eacute;tant plus difficile, cet aspect est pourtant essentiel. Nielsen pr&eacute;conise donc l&#39;utilisation de textes repr&eacute;sentatifs plut&ocirc;t que du lorem ipsum. On peut aussi faire remarquer que les formules con&ccedil;ues avec du faux-texte ont tendance &agrave; sous-estimer l&#39;espace n&eacute;cessaire &agrave; une titraille imm&eacute;diatement intelligible, ce qui oblige les r&eacute;dactions &agrave; formuler ensuite des titres simplificateurs, voire inexacts, pour ne pas d&eacute;passer l&#39;espace imparti.</p>\r\n\r\n<p>Contrairement &agrave; une id&eacute;e r&eacute;pandue, le faux-texte ne donne m&ecirc;me pas un aper&ccedil;u r&eacute;aliste du gris typographique, en particulier dans le cas des textes justifi&eacute;s : en effet, les mots fictifs employ&eacute;s dans le faux-texte ne faisant &eacute;videmment pas partie des dictionnaires des logiciels de PAO, les programmes de c&eacute;sure ne peuvent pas effectuer leur travail habituel sur de tels textes. Par cons&eacute;quent, l&#39;interlettrage du faux-texte sera toujours quelque peu sup&eacute;rieur &agrave; ce qu&#39;il aurait &eacute;t&eacute; avec un texte r&eacute;el, qui pr&eacute;sentera donc un aspect plus sombre et moins lisible que le faux-texte avec lequel le graphiste a effectu&eacute; ses essais. Un vrai texte pose aussi des probl&egrave;mes de lisibilit&eacute; sp&eacute;cifiques (noms propres, num&eacute;ros de t&eacute;l&eacute;phone, retours &agrave; la ligne fr&eacute;quents, composition des citations en italiques, intertitres de plus de deux lignes...) qu&#39;on n&#39;observe jamais dans le faux-texte.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>G&eacute;n&eacute;ralement, on utilise un texte en faux latin (le texte ne veut rien dire, il a &eacute;t&eacute; modifi&eacute;), le Lorem ipsum ou Lipsum, qui permet donc de faire office de texte d&#39;attente. L&#39;avantage de le mettre en latin est que l&#39;op&eacute;rateur sait au premier coup d&#39;oeil que la page contenant ces lignes n&#39;est pas valide, et surtout l&#39;attention du client n&#39;est pas d&eacute;rang&eacute;e par le contenu, il demeure concentr&eacute; seulement sur l&#39;aspect graphique.</p>\r\n\r\n<p>Ce texte a pour autre avantage d&#39;utiliser des mots de longueur variable, essayant de simuler une occupation normale. La m&eacute;thode simpliste consistant &agrave; copier-coller un court texte plusieurs fois (&laquo; ceci est un faux-texte ceci est un faux-texte ceci est un faux-texte ceci est un faux-texte ceci est un faux-texte &raquo;) a l&#39;inconv&eacute;nient de ne pas permettre une juste appr&eacute;ciation typographique du r&eacute;sultat final.</p>\r\n\r\n<p>Il circule des centaines de versions diff&eacute;rentes du Lorem ipsum, mais ce texte aurait originellement &eacute;t&eacute; tir&eacute; de l&#39;ouvrage de Cic&eacute;ron, De Finibus Bonorum et Malorum (Liber Primus, 32), texte populaire &agrave; cette &eacute;poque, dont l&#39;une des premi&egrave;res phrases est : &laquo; Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit... &raquo; (&laquo; Il n&#39;existe personne qui aime la souffrance pour elle-m&ecirc;me, ni qui la recherche ni qui la veuille pour ce qu&#39;elle est... &raquo;).</p>\r\n\r\n<p>Expert en utilisabilit&eacute; des sites web et des logiciels, Jakob Nielsen souligne que l&#39;une des limites de l&#39;utilisation du faux-texte dans la conception de sites web est que ce texte n&#39;&eacute;tant jamais lu, il ne permet pas de v&eacute;rifier sa lisibilit&eacute; effective. La lecture &agrave; l&#39;&eacute;cran &eacute;tant plus difficile, cet aspect est pourtant essentiel. Nielsen pr&eacute;conise donc l&#39;utilisation de textes repr&eacute;sentatifs plut&ocirc;t que du lorem ipsum. On peut aussi faire remarquer que les formules con&ccedil;ues avec du faux-texte ont tendance &agrave; sous-estimer l&#39;espace n&eacute;cessaire &agrave; une titraille imm&eacute;diatement intelligible, ce qui oblige les r&eacute;dactions &agrave; formuler ensuite des titres simplificateurs, voire inexacts, pour ne pas d&eacute;passer l&#39;espace imparti.</p>\r\n\r\n<p>Contrairement &agrave; une id&eacute;e r&eacute;pandue, le faux-texte ne donne m&ecirc;me pas un aper&ccedil;u r&eacute;aliste du gris typographique, en particulier dans le cas des textes justifi&eacute;s : en effet, les mots fictifs employ&eacute;s dans le faux-texte ne faisant &eacute;videmment pas partie des dictionnaires des logiciels de PAO, les programmes de c&eacute;sure ne peuvent pas effectuer leur travail habituel sur de tels textes. Par cons&eacute;quent, l&#39;interlettrage du faux-texte sera toujours quelque peu sup&eacute;rieur &agrave; ce qu&#39;il aurait &eacute;t&eacute; avec un texte r&eacute;el, qui pr&eacute;sentera donc un aspect plus sombre et moins lisible que le faux-texte avec lequel le graphiste a effectu&eacute; ses essais. Un vrai texte pose aussi des probl&egrave;mes de lisibilit&eacute; sp&eacute;cifiques (noms propres, num&eacute;ros de t&eacute;l&eacute;phone, retours &agrave; la ligne fr&eacute;quents, composition des citations en italiques, intertitres de plus de deux lignes...) qu&#39;on n&#39;observe jamais dans le faux-texte.</p>\r\n', 'assets/img/X45Lc0tNl.jpeg', 1, 0, '2020-03-06 16:46:27', NULL, 'tableau-de-bord-dun-site-dactions-boursieres', 6),
(5, 'Test de brouillon modifié', '<p>J&#39;&eacute;cris ce contenu pour voir ce que &ccedil;a donne et je le modifie</p>\r\n', '', 1, 1, '2020-03-09 11:40:23', '2020-03-09 16:47:29', NULL, 0),
(6, 'Gestion des stocks d\'un magasin de chaussures', '<p>Vous venez d&#39;&ecirc;tre embauch&eacute; par un magasin local pour inclure &agrave; leur site d&eacute;j&agrave; existant une gestion de leurs stocks.</p>\r\n', 'assets/img/OGYYgCRw2.jpeg', 1, 0, '2020-03-09 16:13:11', NULL, 'gestion-des-stocks-dun-magasin-de-chaussures', 1),
(10, 'Mon super projet', '<p>Test</p>\r\n', 'assets/img/KKpR0Kj4B.jpeg', 1, 0, '2020-03-09 16:28:35', '2020-03-09 16:28:35', 'mon-super-projet', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
