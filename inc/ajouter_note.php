<?php
session_start();

include('../config/config.php');
include('../config/fonctions.php');

if ($_POST['is_delete'] == 1)
{
    delete_note($_POST['id_reponse'], $_SESSION['utilisateur']);
}

if ($_POST['is_add'] == 1)
{
    ajouter_note($_POST['note'], $_POST['id_reponse'], $_SESSION['utilisateur']);
}