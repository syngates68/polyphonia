<?php
session_start();

include('../config/config.php');
include('../config/fonctions.php');
include('../config/captcha.php');

if (champs_non_vides([$_POST['nom_utilisateur'], $_POST['email'], $_POST['suggestion'], $_POST['captcha']]))
{
    $secret = get_secret_key();

    $verify = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['captcha']);
    $responseData = json_decode($verify);

    if ($responseData->success)
    {
        mail_nouvelle_suggestion($_POST['nom_utilisateur'], $_POST['email']);
    }
    else
    {
        echo "Le captcha a échoué.";
    }
}
else
{
    echo "Tous les champs sont obligatoires.";
}