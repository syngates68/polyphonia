<?php
session_start();

include('../config/config.php');
include('../config/fonctions.php');

if (!empty($_POST['message']) && trim($_POST['message']) != '')
{
    if (sizeof(req_id_messagerie($_POST['id_envoi'], $_POST['id_reception'])) == 0)
        ajoute_messagerie($_POST['id_envoi'], $_POST['id_reception']);

    $id_messagerie = req_id_messagerie($_POST['id_envoi'], $_POST['id_reception']);

    ajouter_message($id_messagerie, $_POST['id_envoi'], $_POST['id_reception'], $_POST['message']);
    header('Location:'.BASEURL.$_POST['url']);
}