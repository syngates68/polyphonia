<?php
include('../config/config.php');
include('../config/fonctions.php');

if (stripos($_POST['id_notif'], ';') != '-1')
{
    $tab = explode(';', $_POST['id_notif']);

    for ($i = 0; $i < sizeof($tab); $i++)
    {
        notification_lu($tab[$i]);
    }
}
else
{
    notification_lu($_POST['id_notif']);
}