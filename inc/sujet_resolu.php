<?php
session_start();

include('../config/config.php');
include('../config/fonctions.php');

sujet_resolu($_POST['id_sujet'], $_POST['resolu']);