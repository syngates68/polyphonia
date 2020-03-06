<?php
include('../config/config.php');
include('../config/fonctions.php');

$nb_vues = req_by_id($_POST['id_projet'])['vues'];
update_vues($_POST['id_projet'], $nb_vues + 1);