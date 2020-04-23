<?php
session_start();

include('../config/config.php');
include('../config/fonctions.php');

if (isset($_POST['editer_social']))
{
    if (!empty($_POST['facebook']))
        ajouter_compte_social('facebook', $_POST['facebook'], $_SESSION['utilisateur']);
    if (!empty($_POST['twitter']))
        ajouter_compte_social('twitter', $_POST['twitter'], $_SESSION['utilisateur']);
    if (!empty($_POST['discord']))
        ajouter_compte_social('discord', $_POST['discord'], $_SESSION['utilisateur']);

    $_SESSION['succes'] = "Vos réseaux sociaux ont bien été mis à jour.";
    header('Location:'.BASEURL.'parametres.html');
}