<?php
session_start();

include('../config/config.php');
include('../config/fonctions.php');

if (isset($_POST['ajouter_utilisateur']))
{
    if (!empty($_POST['nom_utilisateur']) && !empty($_POST['mail']) && !empty($_POST['pass']))
    {
        if (verifie_nom_utilisateur($_POST['nom_utilisateur']) == 0)
        {
            if (verifie_email($_POST['mail']) == 0)
            {
                ajouter_utilisateur_admin($_POST['mail'], $_POST['nom_utilisateur'], $_POST['pass']);
                $_SESSION['succes'] = $_POST['nom_utilisateur']." a bien été ajouté au site.";
                header('Location:'.BASEURL.'nouvel_utilisateur.html');
            }
            else
            {
                $_SESSION['erreur'] = "Cette adresse mail est déjà utilisée sur le site.";
                header('Location:'.BASEURL.'nouvel_utilisateur.html');
            }
        }
        else
        {
            $_SESSION['erreur'] = "Ce nom d'utilisateur est déjà utilisé sur le site.";
            header('Location:'.BASEURL.'nouvel_utilisateur.html');
        }
    }
    else
    {
        $_SESSION['erreur'] = "Tous les champs sont obligatoires.";
        header('Location:'.BASEURL.'nouvel_utilisateur.html');
    }
}