<?php

define("BASEURL", "http://localhost/polyphonia/");
$var_page = (isset($_GET['page'])) ? $_GET['page'] : 'accueil';

$pages_admin = [
    "administration",
    "brouillon",
    "editer_projet",
    "nouveau_projet",
    "liste_utilisateurs",
    "nouvel_utilisateur"
];
