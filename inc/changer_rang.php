<?php
session_start();
include('../config/config.php');
include('../config/fonctions.php');

$rang_actuel = (req_rang_by_id(req_utilisateur_by_id($_POST['id_utilisateur'])['id_droit']) != '') ? req_rang_by_id(req_utilisateur_by_id($_POST['id_utilisateur'])['id_droit']) : "Membre";

update_droit_user($_POST['id_utilisateur'], $_POST['id_droit']);

$nouveau_rang = (req_rang_by_id($_POST['id_droit']) != '') ? req_rang_by_id($_POST['id_droit']) : "Membre";
if (req_utilisateur_by_id($_POST['id_utilisateur'])['notifications'] == 1)
{
    $contenu = "<p>Votre compte est passé du statut <B>".$rang_actuel."</B> au statut <B>".$nouveau_rang."</B></p>";
    ajouter_notification($_POST['id_utilisateur'], $contenu, 'changement_rang', 'notifications.html');
}

$_SESSION['succes'] = "Le rang de l'utilisateur a bien été modifié.";