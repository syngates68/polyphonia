<?php
session_start();

include('../config/config.php');
include('../config/fonctions.php');

if (isset($_POST['editer_profil']))
{
    
    if (!empty($_POST['nom_utilisateur']) && !empty($_POST['email']))
    {
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
        {
            $bio = ($_POST['bio'] != '' && str_replace(' ', '', $_POST['bio']) != '') ? $_POST['bio'] : NULL;
            update_profil($_POST['email'], $_POST['nom_utilisateur'], $bio, $_SESSION['utilisateur']);
            $_SESSION['succes'] = "Votre compte a bien été édité.";
            header('Location:'.BASEURL.'parametres.html');
        }
        else
        {
            $_SESSION['erreur'] = "L'adresse mail fournie n'est pas au bon format.";
            header('Location:'.BASEURL.'parametres.html');
        }
    }
    else
    {
        $_SESSION['erreur'] = "Le nom d'utilisateur et l'adresse mail sont obligatoires.";
        header('Location:'.BASEURL.'parametres.html');
    }
}