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
            if (req_utilisateur_by_id($utilisateur['id_utilisateur'])['notifications'] == 1 && req_utilisateur_by_id($utilisateur['id_utilisateur'])['nom_utilisateur'] != NULL)
            {
                $contenu = "<p>Une nouvelle réponse a été ajoutée au sujet <b>".req_sujet_by_id($_POST['id_sujet'])['titre']."</b></p>";
                ajouter_notification($utilisateur['id_utilisateur'], $contenu, 'reponse', 'sujet/'.$_POST['id_sujet'].'.html');
            }
        }
    }
}
else
    echo "Veuillez saisir une réponse.";