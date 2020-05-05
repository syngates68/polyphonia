<?php 
session_start();

include('../config/config.php');
include('../config/fonctions.php');

if (isset($_POST['nom_utilisateur']) && count_utilisateur_by_nom_utilisateur($_POST['nom_utilisateur']) > 0)
{
    $reponse = 1;
    
    if (req_utilisateur_by_nom_utilisateur($_POST['nom_utilisateur'])['bloque'] == 1)
        $reponse = 0;

    echo $reponse;
}