<?php 
session_start();

include('../config/config.php');
include('../config/fonctions.php');

if (champs_non_vides([$_POST['destinataire'], $_POST['message']]))
{
    if (count_utilisateur_by_nom_utilisateur($_POST['destinataire']) > 0)
    {
        if (count_id_messagerie($_SESSION['utilisateur'], req_utilisateur_by_nom_utilisateur($_POST['destinataire'])['id']) == 0)
            ajoute_messagerie($_SESSION['utilisateur'], req_utilisateur_by_nom_utilisateur($_POST['destinataire'])['id']);

        $id_messagerie = req_id_messagerie($_SESSION['utilisateur'], req_utilisateur_by_nom_utilisateur($_POST['destinataire'])['id']);

        ajouter_message($id_messagerie, $_SESSION['utilisateur'], req_utilisateur_by_nom_utilisateur($_POST['destinataire'])['id'], $_POST['message']);
    }
    else
        echo "Le destinataire spécifié n'existe pas.";
}
else    
    echo "Veuillez renseigner le destinataire du message ainsi que votre message.";