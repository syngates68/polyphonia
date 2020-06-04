<?php
session_start();
include('../config/config.php');
include('../config/fonctions.php');

if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
{
    if (verifie_email($_POST['email']) == 1)
    {
        $char = '0123456789abcdefghijkmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ';
        $mdp = '';
        for($i = 0; $i < 8; $i++)
        {
            $mdp .= $char[rand(0, strlen($char)-1)];
        }

        update_mdp(password_hash($mdp, PASSWORD_BCRYPT), req_utilisateur_by_email($_POST['email'])['id']);
        envoi_mail('mdp_oublie', $_POST['email'], ['mdp' => $mdp]);
        header('Location:'.BASEURL.'connexion.html');
    }
    else
    {
        $_SESSION['erreur'] = "L'adresse mail saisie ne correspond à aucun compte.";
        header('Location:'.BASEURL.'mot_de_passe_oublie.html');
    }
}
else
{
    $_SESSION['erreur'] = "Veuillez saisir une adresse mail valide.";
    header('Location:'.BASEURL.'mot_de_passe_oublie.html');
}