<?php
include('../config/config.php');
include('../config/fonctions.php');

bloquer_utilisateur($_POST['id_utilisateur'], $_POST['bloque'], $_POST['motif_blocage']);

$bloque = 'bloqué';
if ($_POST['bloque'] == 0)
    $bloque = 'débloqué';

echo "Cet utilisateur a bien été $bloque";