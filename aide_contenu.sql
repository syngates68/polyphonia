-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 08 juin 2020 à 23:53
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
-- Structure de la table `aide_contenu`
--

DROP TABLE IF EXISTS `aide_contenu`;
CREATE TABLE IF NOT EXISTS `aide_contenu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contenu` mediumtext NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_sujet` int(11) NOT NULL,
  `date_post` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modifie` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `aide_contenu`
--

INSERT INTO `aide_contenu` (`id`, `contenu`, `id_utilisateur`, `id_sujet`, `date_post`, `modifie`) VALUES
(1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis dolorem fugiat sapiente dignissimos vel quidem ullam natus, inventore, eos officiis repellat necessitatibus. Quod molestiae incidunt vitae voluptatibus quos. Nemo, impedit. ', 2, 9, '2020-05-10 23:36:08', 0),
(2, '<p>C&#39;est quoi ton code erreur?</p>\n', 1, 5, '2020-05-11 00:15:09', 0),
(3, '<p>C&#39;est &ccedil;a :</p>\n\n<p><em>Uncaught PDOException: SQLSTATE[HY093]: Invalid parameter number: parameter was not defined</em></p>\n', 2, 5, '2020-05-11 00:16:08', 0),
(4, '<p>Autant pour moi je m&#39;&eacute;tais tromp&eacute;</p>\n', 1, 4, '2020-05-11 00:16:49', 0),
(5, '<p>Moi non plus</p>\n', 1, 9, '2020-05-12 21:56:04', 0),
(6, '<p>Mais essaie quand m&ecirc;me pour voir</p>\n', 1, 9, '2020-05-12 21:56:22', 0),
(7, '<p>Ca peut toujours marcher</p>\n', 1, 9, '2020-05-12 21:56:45', 0),
(8, '<p>J&#39;ai eu le m&ecirc;me soucis hier mais je sais plus comment je l&#39;avais r&eacute;gl&eacute; d&eacute;sol&eacute;...</p>\n', 7, 5, '2020-05-12 22:11:55', 0),
(9, '<p>C&#39;&eacute;tait vachement utile, merci Ludo</p>\n', 1, 5, '2020-05-12 22:12:45', 0),
(10, '<p>Salut Quentin,</p>\r\n\r\n<p>Alors pour r&eacute;pondre &agrave; ta question, j&#39;en ai aucune id&eacute;e voil&agrave;</p>\r\n\r\n<pre>\r\n<code>\r\n&lt;?php \r\nif ($test == 1)\r\n{\r\necho \"C\'est bon\";\r\n}\r\nelse\r\n{\r\necho \"C\'est pas bon\";\r\n}\r\n?&gt;\r\n</code>\r\n</pre>\r\n', 8, 11, '2020-05-13 16:00:16', 0),
(11, '<p>Moi perso je fais comme &ccedil;a :</p>\n\n<p>&nbsp;</p>\n\n<pre>\n    <code>\n        $(document).on(&#39;click&#39;, &#39;.inserer_code&#39;, function()\n{\n    var code = $(&#39;textarea[name=&quot;code&quot;]&#39;).val()\n\n    $.post(baseurl + &#39;inc/inserer_code.php&#39;,\n    {\n        code : code,\n    },\n    function(data)\n    {\n        CKEDITOR.instances[&#39;reponse&#39;].setData(CKEDITOR.instances[&#39;reponse&#39;].getData() + data)\n        $(&#39;#code_container&#39;).hide()\n    })\n})    </code>\n</pre>\n\n<p>Et en g&eacute;n&eacute;ral &ccedil;a fonctionne</p>\n', 1, 11, '2020-05-13 17:35:07', 0),
(12, '<p>C&#39;est bon je pense avoir trouv&eacute;, en gros voil&agrave; le code</p><pre><code>        &lt;div class=&quot;container&quot;&gt;\r\n\r\n    &lt;p&gt;R&eacute;sultats de recherche pour : &lt;?= htmlentities($_GET[&#39;search&#39;]); ?&gt;&lt;/p&gt;\r\n\r\n    &lt;div class=&quot;projets_container&quot;&gt;&lt;/div&gt;\r\n    &lt;script src=&quot;&lt;?= BASEURL; ?&gt;assets/js/projets.js&quot;&gt;&lt;/script&gt;\r\n    &lt;script&gt;\r\n        $(document).ready(function()\r\n        {\r\n            req_liste_projets(1, &quot;&lt;?= htmlentities($_GET[&#39;search&#39;]); ?&gt;&quot;);\r\n        });\r\n    &lt;/script&gt;\r\n&lt;/div&gt; </code>   \r\n</pre><p>J&#39;esp&egrave;re que &ccedil;a t&#39;aidera :)</p>', 1, 5, '2020-05-13 21:00:34', 0),
(13, '<p>Je r&eacute;p&egrave;te, je fais comme &ccedil;a :</p><pre>$(document).on(&#39;click&#39;, &#39;.inserer_code&#39;, function()\n{\n    var code = $(&#39;textarea[name=&quot;code&quot;]&#39;).val()\n\n    $.post(baseurl + &#39;inc/inserer_code.php&#39;,\n    {\n        code : code,\n    },\n    function(data)\n    {\n        CKEDITOR.instances[&#39;reponse&#39;].setData(CKEDITOR.instances[&#39;reponse&#39;].getData() + data)\n        $(&#39;#code_container&#39;).hide()\n    })\n})        \n</pre>', 1, 11, '2020-05-13 21:03:36', 0),
(14, '<p>Et comme &ccedil;a?</p>\n\n<p>&nbsp;</p>\n\n<pre>\n    <code>\n        \n        $(document).on(&#39;click&#39;, &#39;.inserer_code&#39;, function()\n{\n    var code = $(&#39;textarea[name=&quot;code&quot;]&#39;).val()\n\n    $.post(baseurl + &#39;inc/inserer_code.php&#39;,\n    {\n        code : code,\n    },\n    function(data)\n    {\n        CKEDITOR.instances[&#39;reponse&#39;].setData(CKEDITOR.instances[&#39;reponse&#39;].getData() + data)\n        $(&#39;#code_container&#39;).hide()\n    })\n})        </code>\n</pre>\n', 1, 11, '2020-05-13 21:04:41', 0),
(15, '<p>Et l&agrave;?</p><pre>    \n        \n        $(document).on(&#39;click&#39;, &#39;.inserer_code&#39;, function()\n{\n    var code = $(&#39;textarea[name=&quot;code&quot;]&#39;).val()\n\n    $.post(baseurl + &#39;inc/inserer_code.php&#39;,\n    {\n        code : code,\n    },\n    function(data)\n    {\n        CKEDITOR.instances[&#39;reponse&#39;].setData(CKEDITOR.instances[&#39;reponse&#39;].getData() + data)\n        $(&#39;#code_container&#39;).hide()\n    })\n})        \n</pre>', 1, 11, '2020-05-13 21:05:01', 0),
(16, '<p>Je ne fais que passer :</p>\n\n<p>&nbsp;</p>\n\n<pre>\n    <code>\n        &lt;div class=&quot;container&quot;&gt;\n\n    &lt;p&gt;R&eacute;sultats de recherche pour : &lt;?= htmlentities($_GET[&#39;search&#39;]); ?&gt;&lt;/p&gt;\n\n    &lt;div class=&quot;projets_container&quot;&gt;&lt;/div&gt;\n    &lt;script src=&quot;&lt;?= BASEURL; ?&gt;assets/js/projets.js&quot;&gt;&lt;/script&gt;\n    &lt;script&gt;\n        $(document).ready(function()\n        {\n            req_liste_projets(1, &quot;&lt;?= htmlentities($_GET[&#39;search&#39;]); ?&gt;&quot;);\n        });\n    &lt;/script&gt;\n&lt;/div&gt;    </code>\n</pre>\n', 1, 5, '2020-05-13 21:06:01', 0),
(19, '<p>Tiens tu peux faire &ccedil;a :</p><pre><code class=\"language-php\">function ajouter_notification($id_utilisateur, $contenu, $lien)\n{\n    $ins = db()-&gt;prepare(\"INSERT INTO notifications(id_utilisateur, contenu, lien_notification) VALUES (?, ?, ?)\");\n    $ins-&gt;execute([$id_utilisateur, $contenu, $lien]);\n}\n\nfunction req_notifications_by_user($id_utilisateur)\n{\n    $req = db()-&gt;prepare(\"SELECT * FROM notifications WHERE id_utilisateur = ? ORDER BY id DESC\");\n    $req-&gt;execute([$id_utilisateur]);\n\n    return $req-&gt;fetchAll(PDO::FETCH_ASSOC);\n}\n</code></pre><p>En esp&eacute;rant que &ccedil;a t&#39;aide</p>', 1, 5, '2020-05-13 21:30:42', 0),
(20, '<p>Merci &agrave; tous, c&#39;&eacute;tait bien &ccedil;a syngates68, merci</p>', 2, 5, '2020-05-13 22:22:39', 0),
(21, '<p>Regarde si tu n&#39;as pas du HTML quelque part qui tra&icirc;ne et qui bloquerait l&#39;envoi de tes headers en PHP 🙂</p>', 2, 12, '2020-05-13 22:36:52', 0),
(23, '<p>Up</p>', 1, 15, '2020-05-14 23:06:33', 0),
(24, '<p>Pour moi c&#39;est &ccedil;a oui</p>', 15, 9, '2020-05-14 23:36:36', 0),
(25, '<p>Bonjour,&nbsp;</p><p>D&eacute;j&agrave; on ne dit pas &quot;aidez moi&quot;, &ccedil;a sonne comme un ordre et &ccedil;a n&#39;est pas tr&egrave;s appr&eacute;ciable, ensuite quel est ton probl&egrave;me pr&eacute;cis&eacute;ment parce que l&agrave; tu ne nous dis pas grand chose et &ccedil;a va &ecirc;tre difficile de t&#39;aider !&nbsp;</p>', 15, 15, '2020-05-14 23:42:45', 0),
(26, '<p>Tu as essay&eacute; &ccedil;a ?</p><pre><code class=\"language-php\">echo \"Je teste les notifications\";</code></pre><p>&nbsp;</p>', 2, 15, '2020-05-15 11:42:59', 0),
(27, '<p>Ca a buggu&eacute; parce que j&#39;ai &eacute;cris n&#39;imp, je disais donc :</p><pre><code class=\"language-php\">echo \"Je teste à nouveau les notifications\";</code></pre><p>&nbsp;</p>', 2, 15, '2020-05-15 11:43:49', 0),
(28, '<p>Les messages de test sont interdit, je ferme le sujet.</p>', 1, 19, '2020-05-15 14:29:56', 0),
(29, '<p>Ce sujet n&#39;a aucun sens.</p>', 1, 6, '2020-05-15 14:55:56', 0),
(30, '<p>Propos injurieux. Je ferme le sujet.</p>', 1, 8, '2020-05-15 14:56:28', 0),
(31, '<p>T&#39;as essay&eacute; de te d&eacute;connecter et te reconnecter?</p>', 16, 14, '2020-05-15 15:05:19', 0),
(33, '<p>Salut,</p><p>pour le code suivant</p><pre><code class=\"language-javascript\"> function()\n\n    {\n\n        location.href = href\n\n    })</code></pre><p>Pourquoi fais-tu cela? Ca ne serait pas plus simple de mettre un &lt;a&gt; &agrave; la place?</p>', 2, 27, '2020-05-18 11:47:31', 0),
(34, '<p>C&#39;&eacute;tait bien &ccedil;a, merci beaucoup 😀</p>', 1, 27, '2020-05-18 11:49:05', 0),
(35, '<p>Bah il sert &agrave; rien ton sujet maggle!</p>', 1, 28, '2020-05-18 23:23:20', 0),
(36, '<p>Et mon texte l&agrave; est bien <strong>TOUT EN PUTAIN DE GRAS?????</strong></p>', 1, 29, '2020-05-18 23:49:52', 0),
(37, '<p>Il se passe quoi ici? 😂😂😂</p>', 1, 29, '2020-05-19 21:02:40', 0),
(38, '<p>Alors?</p>', 1, 29, '2020-05-19 21:04:02', 0),
(39, '<p>Y a toujours le soucis d&#39;encodage 😥</p>', 1, 29, '2020-05-19 21:15:21', 0),
(40, '<p>Ok apparemment le strtolower aide pas</p>', 1, 29, '2020-05-19 21:16:53', 0),
(41, '<p>Alors je test mb_strtolower</p>', 1, 29, '2020-05-19 21:18:07', 0),
(42, '<p>Je suis mod&eacute;rateur...BITCH! 🐼</p>', 7, 3, '2020-05-19 21:24:12', 0),
(43, '<p>C&#39;est tr&egrave;s long</p>', 1, 2, '2020-05-19 23:41:31', 0),
(44, '<p>Salut &agrave; toi lastreetdu68 et merci pour ce message 😀</p><p>Je suis assez d&#39;accord avec toi concernant la difficult&eacute; de ce projet, bien qu&#39;il est indiqu&eacute; que chacun peut le faire de la mani&egrave;re dont il le souhaite, et je pense qu&#39;un d&eacute;butant pourrait r&eacute;ussir pas mal de choses malgr&eacute; tout dans ce projet.</p><p>En tout cas, si jamais tu as d&#39;autres remarques concernant des projets, je t&#39;invite &agrave; remplir le formulaire de <strong>suggestion de modification</strong> qui se trouve en bas de page de chaque projet 😉 Ca permet de mieux trier ces suggestions et d&#39;&eacute;viter qu&#39;elles se noient dans les diff&eacute;rents sujets d&#39;aide.</p><p>Pour ce qui est de trier selon la difficult&eacute;, c&#39;est une remarque qui m&#39;a &eacute;t&eacute; faite de nombreuses fois et j&#39;y travaille justement, il y aura des projets qui seront pour les d&eacute;butants, d&#39;autres pour des interm&eacute;diaires et enfin plut&ocirc;t pour des personnes plus exp&eacute;riment&eacute;es.</p><p>J&#39;esp&egrave;re avoir bien r&eacute;pondu &agrave; ton sujet en tout cas, bonne journ&eacute;e &agrave; toi 😉</p>', 1, 31, '2020-05-22 16:58:24', 0),
(45, '<p>Bonne question maggle...</p>', 1, 30, '2020-05-25 22:48:26', 0),
(46, '<p>Tu trouveras une r&eacute;ponse &agrave; ta question ici : <a href=\"http://192.168.1.41/polyphonia_new/sujet/30.html\">http://192.168.1.41/polyphonia_new/sujet/30.html</a></p><p>En esp&eacute;rant t&#39;avoir aid&eacute; 😉</p>', 2, 30, '2020-05-26 09:13:30', 0),
(47, '<p>Ah ouaiiiis, pas mal du tout, merci pour ta r&eacute;ponse compte_test 😀</p><p>Par contre j&#39;ai une autre question, y a-t-il de l&#39;eau sur le soleil?</p>', 1, 30, '2020-05-26 09:16:57', 0),
(48, '<p>Oui tu peux le faire en JS, je l&#39;avais fait et je n&#39;ai eu aucun soucis donc il n&#39;y a aucun soucis, il faut juste avoir un minimum de connaissance dans le domaine</p>', 1, 32, '2020-05-26 09:18:04', 0),
(49, '<p>Salut,&nbsp;</p><p>Je suis d&#39;accord avec syngates, le JS est tr&egrave;s bien adapt&eacute; pour un projet de ce type, et c&#39;est parfait pour apprendre &agrave; travers des algorithmes simples mais pas trop, si tu as besoin d&#39;aide n&#39;h&eacute;site pas 😉</p>', 18, 32, '2020-05-27 00:01:03', 0),
(50, '<p>Je vois que personne ne m&#39;a r&eacute;pondu... bande de sales races</p>', 1, 30, '2020-06-04 09:49:03', 1),
(51, '<p>Je vois pas le rapport 🤔</p>', 1, 3, '2020-06-04 11:46:39', 0),
(52, '<p>Salut &agrave; tous les deux je suis pas s&ucirc;r que &ccedil;a soit un bon moment de parler de tout &ccedil;a pour que je puisse faire des choses qui arrivent et que je ne puis pas &ecirc;tre &eacute;vident du tout pour le moment je suis pas s&ucirc;r que &ccedil;a soit un bon moment de parler de tout &ccedil;a pour que je sois l&agrave; pour toi et moi j&#39;&eacute;tais chouchout&eacute; de te voir demain tu m&#39;as &eacute;norm&eacute;ment manqu&eacute; et je suis &agrave; la maison &agrave; cause de ce que tu veux dire is a great product for your use of the product or</p><div><div><pre><code class=\"language-php\">&lt;?php if (isset($_SESSION[\'utilisateur\']) &amp;&amp; $sujet[\'ouvert\'] == 1) : ?&gt;\n                                &lt;div class=\"actions\"&gt;\n                                    &lt;?php if ($_SESSION[\'utilisateur\'] != $sujet[\'id_utilisateur\'] &amp;&amp; $sujet[\'resolu\'] == 0) : ?&gt;\n                                        &lt;button class=\"btn btn-outline-blue\"&gt;Suivre&lt;/button&gt;\n                                    &lt;?php elseif ($_SESSION[\'utilisateur\'] == $sujet[\'id_utilisateur\'] &amp;&amp; $sujet[\'resolu\'] == 0) : ?&gt;\n                                        &lt;button class=\"btn btn-green-light sujet_resolu\" sujet=\"&lt;?= $_GET[\'slug\']; ?&gt;\"&gt;Résolu&lt;/button&gt;\n                                    &lt;?php elseif ($_SESSION[\'utilisateur\'] == $sujet[\'id_utilisateur\'] &amp;&amp; $sujet[\'resolu\'] == 1) : ?&gt;\n                                        &lt;button class=\"btn btn-red sujet_non_resolu\" sujet=\"&lt;?= $_GET[\'slug\']; ?&gt;\"&gt;Non Résolu&lt;/button&gt;\n                                    &lt;?php endif; ?&gt;\n                                    \n                                    &lt;?php if ((req_utilisateur_by_id($_SESSION[\'utilisateur\'])[\'id_droit\'] == 1 || req_utilisateur_by_id($_SESSION[\'utilisateur\'])[\'id_droit\'] == 2 || req_utilisateur_by_id($_SESSION[\'utilisateur\'])[\'id_droit\'] == 3) &amp;&amp; $sujet[\'resolu\'] == 0) : ?&gt;\n                                        &lt;span id=\"fermer_&lt;?= $_GET[\'slug\']; ?&gt;\" class=\"fermer\"&gt;Fermer le sujet&lt;/span&gt;\n                                    &lt;?php endif; ?&gt;\n                                    &lt;?php if ($_SESSION[\'utilisateur\'] != $sujet[\'id_utilisateur\']) : ?&gt;\n                                        &lt;a href=\"&lt;?= BASEURL; ?&gt;inc/signaler_sujet?id_sujet=&lt;?= $_GET[\'slug\']; ?&gt;\" rel=\"modal:open\" class=\"signaler\"&gt;Signaler&lt;/a&gt;\n                                    &lt;?php endif; ?&gt;\n                                &lt;/div&gt;\n                            &lt;?php endif; ?&gt;</code></pre><p>&nbsp;</p></div></div><p>your own product or service of products or products that you can use to make your own products or services that are not necessary for you to use or are not the intended use of the help you have received from our company or by the manufacturer or manufacturer of the product or service of any product or service you received on the web or by the manufacturer or manufacturer of the product or service of any product&nbsp;</p>', 1, 3, '2020-06-08 21:57:59', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
