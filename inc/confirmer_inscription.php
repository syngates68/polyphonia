<?php
session_start();

include('../config/config.php');
include('../config/fonctions.php');

if (isset($_POST['confirmation']))
{
    if (champs_non_vides([$_POST['code']]))
    {
        if (req_utilisateur_by_nom_utilisateur($_SESSION['nom_utilisateur'])['code_confirm'] == $_POST['code'])
        {
            $_SESSION['utilisateur'] = req_utilisateur_by_nom_utilisateur($_SESSION['nom_utilisateur'])['id'];
            unset($_SESSION['nom_utilisateur']);
            confirme_compte($_SESSION['utilisateur']);
            header('Location:'.BASEURL);
        }
        else
        {
            $_SESSION['erreur'] = 'Le code renseigné est incorrect.';
            header('Location:'.BASEURL.'confirmation.html');
        }
    }
    else
    {
        $_SESSION['erreur'] = 'Veuillez renseigner le code qui vous a été envoyé.';
        header('Location:'.BASEURL.'confirmation.html');
    }
}