<?php 
session_start();

include('../config/config.php');
include('../config/fonctions.php');

if ($_POST['favoris'] == 1)
{
    ajouter_favoris($_POST['id_projet'], $_SESSION['utilisateur']);
}
else
{
    delete_favoris($_POST['id_projet'], $_SESSION['utilisateur']);
}