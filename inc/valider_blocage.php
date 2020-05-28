<?php
session_start();
include('../config/config.php');
include('../config/fonctions.php');

if (($_POST['bloque'] == 1 && champs_non_vides([$_POST['motif_blocage']])) || $_POST['bloque'] == 0)
{
    bloquer_utilisateur($_POST['id_utilisateur'], $_POST['bloque'], $_POST['motif_blocage']);

    $bloque = 'bloqué';
    if ($_POST['bloque'] == 0)
        $bloque = 'débloqué';
    
    $_SESSION['succes'] = req_utilisateur_by_id($_POST['id_utilisateur'])['nom_utilisateur']." a bien été ".$bloque;
}
else
    echo "Le motif de blocage est obligatoire.";