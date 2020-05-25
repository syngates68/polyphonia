<?php
session_start();

include('../config/config.php');
include('../config/fonctions.php');

if (champs_non_vides([$_POST['motif']]))
{
    ajouter_signalement($_POST['type'], $_POST['motif'], $_POST['id_type'], $_SESSION['utilisateur']);
    $_SESSION['succes'] = 'Nous vous remercions pour votre signalement. Ce dernier sera pris en compte le plus rapidement possible.';
}
else
    echo 'Veuillez renseigner le motif de votre signalement.';