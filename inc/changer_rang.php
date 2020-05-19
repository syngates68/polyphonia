<?php
session_start();
include('../config/config.php');
include('../config/fonctions.php');

update_droit_user($_POST['id_utilisateur'], $_POST['id_droit']);
$_SESSION['succes'] = "Le rang de l'utilisateur a bien été modifié.";