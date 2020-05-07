<?php

define("BASEURL", "http://localhost/polyphonia/");

if ($_SERVER['SERVER_NAME'] == '192.168.1.41' || $_SERVER['SERVER_NAME'] == 'localhost')
    define("DEV", true);
else
    define("DEV", false);

$var_page = (isset($_GET['page'])) ? $_GET['page'] : 'accueil';

$pages_admin = [
    "administration",
    "brouillon",
    "editer_projet",
    "nouveau_projet",
    "liste_utilisateurs",
    "nouvel_utilisateur"
];
