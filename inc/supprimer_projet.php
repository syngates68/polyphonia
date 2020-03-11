<?php
include('../config/config.php');
include('../config/fonctions.php');

supprimer_projet($_POST['id_projet']);

echo "Le ".$_POST['type']." a bien été supprimé";