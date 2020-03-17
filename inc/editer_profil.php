<?php
session_start();

include('../config/config.php');
include('../config/fonctions.php');

if (isset($_POST['editer_profil']))
{
    $mdp_valid = '1';
    $pass = '';

    if (!empty($_POST['pass']) && !empty($_POST['nouveau_pass']) && !empty($_POST['confirm_pass']))
    {
        if (!password_verify($_POST['pass'], req_utilisateur_by_id($_SESSION['utilisateur'])['pass']))
            $mdp_valid = '0Le mot de passe indiqué est invalide.';

        if($_POST['nouveau_pass'] != $_POST['confirm_pass'])
            $mdp_valid = '0Les deux mots de passe doivent être identiques.';

        if ($mdp_valid == '1')
            $pass = password_hash($_POST['nouveau_pass'], PASSWORD_BCRYPT);
    }

    if ($mdp_valid == '1')
    {
        if (!empty($_POST['nom_utilisateur']) && !empty($_POST['email']))
        {
            if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
            {
                $bio = ($_POST['bio'] != '' && str_replace(' ', '', $_POST['bio']) != '') ? $_POST['bio'] : NULL;
                update_profil($_POST['email'], $_POST['nom_utilisateur'], $pass, $bio, $_SESSION['utilisateur']);
                $_SESSION['succes'] = "Votre compte a bien été édité.";
                header('Location:'.BASEURL.'mon_compte.html');
            }
            else
            {
                $_SESSION['erreur'] = "L'adresse mail fournie n'est pas au bon format.";
                header('Location:'.BASEURL.'mon_compte.html');
            }
        }
        else
        {
            $_SESSION['erreur'] = "Le nom d'utilisateur et l'adresse mail sont obligatoires.";
            header('Location:'.BASEURL.'mon_compte.html');
        }
    }
    else
    {
        $_SESSION['erreur'] = substr($mdp_valid, 1);
        header('Location:'.BASEURL.'mon_compte.html');
    }
}