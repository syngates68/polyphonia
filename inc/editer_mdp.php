<?php
session_start();

include('../config/config.php');
include('../config/fonctions.php');

if (isset($_POST['editer_mdp']))
{
    
    if (!empty($_POST['pass']) && !empty($_POST['nouveau_pass']) && !empty($_POST['confirm_pass']))
    {
        if ($_POST['nouveau_pass'] == $_POST['confirm_pass'])
        {
            if (password_verify($_POST['pass'], req_utilisateur_by_id($_SESSION['utilisateur'])['pass']))
            {
                update_mdp(password_hash($_POST['nouveau_pass'], PASSWORD_BCRYPT), $_SESSION['utilisateur']);
                $_SESSION['succes'] = "Votre mot de passe a bien été modifié.";
                header('Location:'.BASEURL.'parametres.html');
            }
            else
            {
                $_SESSION['erreur'] = "Le mot de passe entré est erroné.";
                header('Location:'.BASEURL.'parametres.html');
            }
        }
        else
        {
            $_SESSION['erreur'] = "Les deux mots de passe doivent être identiques.";
            header('Location:'.BASEURL.'parametres.html');
        }
    }
    else
    {
        $_SESSION['erreur'] = "Tous les champs sont obligatoires.";
        header('Location:'.BASEURL.'parametres.html');
    }
}