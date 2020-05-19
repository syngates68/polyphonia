<?php
session_start();

include('../config/config.php');
include('../config/fonctions.php');

update_notifications($_POST['actif'], $_SESSION['utilisateur']);