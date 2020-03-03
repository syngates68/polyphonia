<?php
    ob_start();
    session_start();
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    include("config/config.php");
    include("config/fonctions.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Polyphonia</title>
    <link rel="stylesheet" href="<?= BASEURL ?>assets/css/reset.css">
    <link rel="stylesheet" href="<?= BASEURL ?>assets/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="<?= BASEURL ?>assets/img/favicon.png" />
</head>
<body>
    <?php include("vues/index.php"); ?>
</body>
</html>

<?php
    ob_end_flush();