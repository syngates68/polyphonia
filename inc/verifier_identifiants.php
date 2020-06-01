<?php
session_start();

include('../config/config.php');
include('../config/fonctions.php');

if (isset($_POST['connexion']))
{
    if (isset($_POST['login']) && !empty($_POST['login']) && isset($_POST['pass']) && !empty($_POST['pass']))
    {
        if (check_connexion($_POST['login']) != 0)
        {
            $utilisateur = check_connexion($_POST['login']);

            if (password_verify($_POST['pass'], $utilisateur['pass']))
            {
                if ($utilisateur['bloque'] == 0)
                {
                    $_SESSION['utilisateur'] = $utilisateur['id'];
                    update_derniere_connexion(date("Y-m-d H:i:s"), $utilisateur['id']);
    
                    if (req_utilisateur_by_id($utilisateur['id'])['actif'] == 0)
                        reactive_compte($utilisateur['id']);
    
                    if (isset($_POST['remember_me']))
                        setcookie('auth', $utilisateur['id'] . '----' . sha1($utilisateur['nom_utilisateur'] . $utilisateur['pass']), time() + 3600 * 24 * 3, '/', '', false, true);
                    
                    //On redirige l'utilisateur vers la page précédente si nécessaire
                    if (isset($_SESSION['redirect']))
                    {
                        header('Location:'.$_SESSION['redirect']);
                        unset($_SESSION['redirect']);
                    }
                    else
                        header('Location:'.BASEURL);
                }
                else
                {
                    $_SESSION['_login'] = $_POST['login'];
                    $_SESSION['erreur'] = 'Votre compte a été bloqué pour le motif suivant : '.$utilisateur['motif_bloque'];
                    header('Location:'.BASEURL.'connexion.html');
                }
            }
            else
            {
                $_SESSION['_login'] = $_POST['login'];
                $_SESSION['erreur'] = 'Aucun compte ne correspond aux informations rentrées.';
                header('Location:'.BASEURL.'connexion.html');
            }
        }
        else
        {
            $_SESSION['_login'] = $_POST['login'];
            $_SESSION['erreur'] = 'Aucun compte ne correspond aux informations rentrées.';
            header('Location:'.BASEURL.'connexion.html');
        }
    }
    else
    {
        $_SESSION['_login'] = $_POST['login'];
        $_SESSION['erreur'] = 'Tous les champs sont obligatoires.';
        header('Location:'.BASEURL.'connexion.html');
    }
}