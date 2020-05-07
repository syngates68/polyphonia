<?php
include('../config/config.php');
include('../config/fonctions.php');

//Si le projet a une image, on la supprime
if (req_by_id($_POST['id_projet'])['illustration'] != NULL)
    unlink('../'.req_by_id($_POST['id_projet'])['illustration']);

supprimer_projet($_POST['id_projet']);

echo "Le ".$_POST['type']." a bien été supprimé";