<?php
session_start();

include('../config/config.php');
include('../config/fonctions.php');

if (isset($_POST['inscription']))
{
    if (champs_non_vides([$_POST['email'], $_POST['nom_utilisateur'], $_POST['pass'], $_POST['pass2']]))
    {
        if (isset($_POST['cgu']))
        {
            if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
            {
                if ($_POST['pass'] == $_POST['pass2'])
                {
                    if (verifie_nom_utilisateur($_POST['nom_utilisateur']) == 0)
                    {
                        if (verifie_email($_POST['email']) == 0)
                        {
                            ajouter_utilisateur($_POST['email'], $_POST['nom_utilisateur'], $_POST['pass']);
                            header('Location:'.BASEURL.'connexion.html');
                        }
                        else
                        {
                            $_SESSION['erreur'] = "Cette adresse mail n'est pas disponible.";
                            header('Location:'.BASEURL.'inscription.html');
                        }
                    }
                    else
                    {
                        $_SESSION['erreur'] = "Ce nom d'utilisateur n'est pas disponible.";
                        header('Location:'.BASEURL.'inscription.html');
                    }
                }
                else
                {
                    $_SESSION['erreur'] = "Les deux mots de passe doivent être identiques.";
                    header('Location:'.BASEURL.'inscription.html');
                }
            }
            else
            {
                $_SESSION['erreur'] = "L'adresse mail doit être au format correct abc@domaine.com.";
                header('Location:'.BASEURL.'inscription.html');
            }
        }
        else
        {
            $_SESSION['erreur'] = "Vous devez accepter les Conditions Générales d'Utilisation pour vous inscrire.";
            header('Location:'.BASEURL.'inscription.html');
        }
    }
    else
    {
        $_SESSION['erreur'] = "Tous les champs sont obligatoires.";
        header('Location:'.BASEURL.'inscription.html');
    }
}