<?php
session_start();

include('../config/config.php');
include('../config/fonctions.php');
include('../config/captcha.php');

if (champs_non_vides([$_POST['email'], $_POST['suggestion'], $_POST['captcha']]))
{
    $secret = get_secret_key();

    $verify = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['captcha']);
    $responseData = json_decode($verify);

    if ($responseData->success)
    {
        //mail_nouvelle_suggestion($_POST['nom_utilisateur'], $_POST['email']);
        $_SESSION['succes'] = "Merci pour votre suggestion, elle sera analysée dès que possible et vous serez évidemment crédité en cas de prise en compte dans le projet.<br/>
                            Cette page se fermera automatiquement dans 5 secondes.";
    }
    else
    {
        $_SESSION['erreur'] = "Le captcha a échoué.";
    }
}
else
{
    $_SESSION['erreur'] = "Tous les champs sont obligatoires.";
}