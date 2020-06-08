<?php
session_start();

include('../config/config.php');
include('../config/fonctions.php');

if (champs_non_vides([$_POST['modification']]) && str_replace('&nbsp;', '', strip_tags($_POST['modification'])) != '')
{
    update_reponse_sujet($_POST['modification'], $_POST['id_reponse']);
    $_SESSION['succes'] = "Votre réponse a bien été modifiée.";
}
else
{
    echo 'Votre message ne peut pas rester vide.';
}