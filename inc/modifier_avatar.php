<?php
session_start();

include('../config/config.php');
include('../config/fonctions.php');

$utilisateur = req_utilisateur_by_id($_SESSION['utilisateur']);

$max_size = 1000000;
$types =  ['image/jpg', 'image/png', 'image/jpeg'];
$fichier_temp = $_FILES['file']['tmp_name'];

$name = $_FILES['file']['name'];
$type = $_FILES['file']['type'];
$size = $_FILES['file']['size'];
$dossier = '../assets/utilisateurs/'.$utilisateur['nom_utilisateur'];

if (in_array($type, $types))
{
    if ($type == 'image/jpg')
        $type = '.jpg';
    if ($type == 'image/png')
        $type = '.png';
    if ($type == 'image/jpeg')
        $type = '.jpeg';

    if ($size < $max_size)
    {
        $new_url = $dossier.'/'.$utilisateur['nom_utilisateur'].$type;

        if (move_uploaded_file($fichier_temp, $new_url))
        {
            update_avatar(str_replace('../', '', $new_url), $utilisateur['id']);
            $_SESSION['succes'] = "Votre photo de profil a bien été modifiée.";
        }
        else
        {
            echo "Erreur lors du transfert du fichier.";
        }
    }
    else
        echo "Le fichier est trop lourd";
}
else
    echo "Le fichier doit être au format JPG, PNG ou JPEG";