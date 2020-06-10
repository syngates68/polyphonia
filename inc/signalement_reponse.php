<?php
session_start();

include('../config/config.php');
include('../config/fonctions.php');

if (req_utilisateur_by_id($_POST['id_utilisateur'])['notifications'] == 1)
{
    $contenu = "Votre signalement a été considéré comme ";
    if ($_POST['valid'] == 1)
        $contenu .= "valide.";
    else
        $contenu .= "invalide.";

    ajouter_notification($_POST['id_utilisateur'], $contenu, 'signalement', "notifications.html");
    update_signalement($_POST['id_signalement']);
}