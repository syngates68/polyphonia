<?php

define("BASEURL", "http://192.168.1.41/polyphonia_new/");

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
    "gestion_utilisateurs",
    "gestion_projets",
    "nouvel_utilisateur"
];
