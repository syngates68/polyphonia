<?php
session_start();

include('../config/config.php');
include('../config/fonctions.php');

if (champs_non_vides([$_POST['reponse']]))
{
    ajouter_reponse_sujet($_POST['reponse'], $_POST['id_utilisateur'], $_POST['id_sujet']);
}
else
    echo "Veuillez saisir une réponse.";