<?php
session_start();

include('../config/config.php');
include('../config/fonctions.php');

update_signalement($_POST['id_signalement']);