<?php
session_start();

include('../config/config.php');
include('../config/fonctions.php');

if (isset($_POST['editer_projet']))
{
    if (isset($_POST['titre']) && !empty($_POST['titre']))
    {
        if (isset($_POST['contenu']) && !empty($_POST['contenu']))
        {
            update_projet($_POST['titre'], $_POST['contenu'], $_GET['id']);

            $_SESSION['succes'] = 'Le projet a bien été édité.';
            header('Location:'.BASEURL.'editer_projet/'.$_GET['id'].'.html');
        }
        else
        {
            $_SESSION['erreur'] = 'Le contenu est obligatoire.';
            header('Location:'.BASEURL.'editer_projet/'.$_GET['id'].'.html');
        }
    }
    else
    {
        $_SESSION['erreur'] = 'Le titre est obligatoire.';
        header('Location:'.BASEURL.'editer_projet/'.$_GET['id'].'.html');
    }
}