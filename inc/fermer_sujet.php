<?php
include('../config/config.php');
include('../config/fonctions.php');

fermer_sujet($_POST['id_sujet']);

$id_utilisateur = req_sujet_by_id($_POST['id_sujet'])['id_utilisateur'];

if (req_utilisateur_by_id($id_utilisateur)['notifications'] == 1 && $_SESSION['utilisateur'] != $id_utilisateur)
{
    $contenu = "<p>Votre sujet <b>".req_sujet_by_id($_POST['id_sujet'])['titre']."</b> a été fermé par un modérateur</p>";
    ajouter_notification($id_utilisateur, $contenu, 'sujet_ferme', 'sujet/'.$_POST['id_sujet'].'.html');
}