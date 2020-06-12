<?php
session_start();

include('../config/config.php');
include('../config/fonctions.php');

if (champs_non_vides([$_POST['titre'], $_POST['contenu']]))
{
    if (preg_match('#^[\p{Latin}\' -]+$#u', $_POST['titre']))
    {
        if (strlen($_POST['titre']) > 10 && strlen($_POST['titre']) < 70)
        {
            ajouter_sujet($_POST['titre'], $_POST['contenu'], $_SESSION['utilisateur'], $_POST['id_projet']);
            $_SESSION['succes'] = 'Votre sujet a bien été ajouté au projet.';
        }
        else
        {
            echo "Le titre du sujet doit comporter un minimum de 10 caractères et un maximum de 70 caractères";
        }
    }
    else
    {
        echo "Le titre ne doit pas contenir de caractères spéciaux.";
    }
}
else
{
    echo "Tous les champs sont obligatoires";
}