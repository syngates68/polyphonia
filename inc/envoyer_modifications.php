<?php
session_start();

include('../config/config.php');
include('../config/fonctions.php');
include('../config/captcha.php');

$captcha_fait = true;

if ($_POST['has_captcha'] && !champs_non_vides([$_POST['captcha']]))
    $captcha_fait = false;

if (champs_non_vides([$_POST['email'], $_POST['suggestion']]) && $captcha_fait)
{
    $captcha_reussi = true;

    if ($_POST['has_captcha'])
    {
        $secret = get_secret_key();
        $verify = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['captcha']);
        $responseData = json_decode($verify);

        if (!$responseData->success)
            $captcha_reussi = false;
    }

    if ($captcha_reussi)
    {
        //mail_nouvelle_suggestion($_POST['nom_utilisateur'], $_POST['email']);
        $_SESSION['succes'] = "Merci pour votre suggestion, elle sera analysée dès que possible et vous serez évidemment crédité en cas de prise en compte dans le projet.";
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