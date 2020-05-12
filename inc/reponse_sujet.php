<?php
session_start();

include('../config/config.php');
include('../config/fonctions.php');

if (champs_non_vides([$_POST['reponse']]))
{
    ajouter_reponse_sujet($_POST['reponse'], $_POST['id_utilisateur'], $_POST['id_sujet']);
    $utilisateurs = req_utilisateurs_sujet($_POST['id_sujet']);

    foreach($utilisateurs as $utilisateur)
    {
        if ($utilisateur['id_utilisateur'] != $_POST['id_utilisateur'])
        {
            $contenu = "Une nouvelle réponse a été ajouté au sujet ".req_sujet_by_id($_POST['id_sujet'])['titre'];
            ajouter_notification($utilisateur['id_utilisateur'], $contenu, BASEURL.'sujet/'.$_POST['id_sujet'].'.html');
        }
    }
}
else
    echo "Veuillez saisir une réponse.";