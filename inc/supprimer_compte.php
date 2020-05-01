<?php
session_start();

include('../config/config.php');
include('../config/fonctions.php');

if (isset($_POST['supprimer_compte']))
{
    if (isset($_POST['type_suppression']))
    {
        if (isset($_POST['motif_suppression']))
        {
            if (isset($_POST['pass']) && champs_non_vides([$_POST['pass']]))
            {
                if (password_verify($_POST['pass'], req_utilisateur_by_id($_SESSION['utilisateur'])['pass']))
                {
                    if (!isset($_POST['garder_commentaires']) && $_POST['type_suppression'] == 1)
                    {
                        //SUPPRIMER LES COMMENTAIRES LAISSES PAR L'UTILISATEUR
                    }

                    $_SESSION['compte_supprime'] = true;

                    //Désactivation du compte
                    if ($_POST['type_suppression'] == '0')
                    {
                        desactive_compte(date("Y-m-d H:i:s"), $_SESSION['utilisateur']);
                    }
                    else
                    {
                        supprime_compte($_POST['motif_suppression'], $_SESSION['utilisateur']);
                    }
                    unset($_SESSION['utilisateur']);
                    header('Location:'.BASEURL.'validation.html');
                }
                else
                {
                    $_SESSION['erreur'] = "Le mot de passe entré est erroné.";
                    header('Location:'.BASEURL.'supprimer_compte.html');
                }
            }
            else
            {
                $_SESSION['erreur'] = "Veuillez renseigner votre mot de passe.";
                header('Location:'.BASEURL.'supprimer_compte.html');
            }
        }
        else
        {
            $_SESSION['erreur'] = "Veuillez indiquer le motif de suppression de votre compte.";
            header('Location:'.BASEURL.'supprimer_compte.html');
        }
    }
    else
    {
        $_SESSION['erreur'] = "Veuillez indiquer le type de suppression souhaité.";
        header('Location:'.BASEURL.'supprimer_compte.html');
    }
}