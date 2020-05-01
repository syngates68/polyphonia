<?php

if (isset($_COOKIE['auth']))
{
    $auth = $_COOKIE['auth'];
    $auth = explode('----', $auth);
    $utilisateur = req_utilisateur_by_id($auth[0]);

    $key = sha1($utilisateur['nom_utilisateur'].$utilisateur['pass']);

    if ($key == $auth[1])
    {
        $_SESSION['utilisateur'] = $utilisateur['id'];
        setcookie('auth', $utilisateur['id'] . '----' . sha1($utilisateur['nom_utilisateur'] . $utilisateur['pass']), time() + 3600 * 24 * 3, '/', '', false, true);
        update_derniere_connexion(date("Y-m-d H:i:s"), $utilisateur['id']);
    }
    else
    {
        setcookie('auth', '', time() - 3600, '/', '', false, true);
    }
}