<?php
    session_start();
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    include("config/config.php");
    include("config/fonctions.php");
    include("config/captcha.php");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Polyphonia</title>
    <link rel="stylesheet" href="<?= BASEURL ?>assets/css/reset.css">
    <link rel="stylesheet" href="<?= BASEURL ?>assets/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet"> 
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <link rel="icon" type="image/png" href="<?= BASEURL ?>assets/img/favicon.png" />
    <script src="//cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script>
        var baseurl = "<?= BASEURL; ?>"
    </script>
</head>
<body>
    <div class="has_modal"></div>
    <?php include("vues/index.php"); ?>
    <script src="<?= BASEURL; ?>assets/js/main.js"></script>
</body>
</html>