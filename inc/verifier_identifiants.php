<?php
session_start();

include('../config/config.php');
include('../config/fonctions.php');

if (isset($_POST['connexion']))
{
    if (isset($_POST['nom_utilisateur']) && !empty($_POST['nom_utilisateur']) && isset($_POST['pass']) && !empty($_POST['pass']))
    {
        if (check_connexion($_POST['nom_utilisateur']) != 0)
        {
            $utilisateur = check_connexion($_POST['nom_utilisateur']);

            if (password_verify($_POST['pass'], $utilisateur['pass']))
            {
                $_SESSION['utilisateur'] = $utilisateur['id'];
                header('Location:'.BASEURL);
            }
            else
            {
                $_SESSION['erreur'] = 'Aucun compte ne correspond aux informations rentrées.';
                header('Location:'.BASEURL.'connexion.html');
            }
        }
        else
        {
            $_SESSION['erreur'] = 'Aucun compte ne correspond aux informations rentrées.';
            header('Location:'.BASEURL.'connexion.html');
        }
    }
    else
    {
        $_SESSION['erreur'] = 'Tous les champs sont obligatoires.';
        header('Location:'.BASEURL.'connexion.html');
    }
}