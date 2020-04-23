<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

include("config/config.php");
include("config/fonctions.php");
include("config/captcha.php");
include("config/cookies.php");

//En cas de blocage de compte on déconnecte l'utilisateur
if (isset($_SESSION['utilisateur']) && req_utilisateur_by_id($_SESSION['utilisateur'])['bloque'] == 1)
{
    session_destroy();
    setcookie('auth', '', time() - 3600, '/', '', false, true);
    
    header('Location:'.BASEURL);
}

ob_start();
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
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">
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

<?php 
$content = ob_get_clean();
echo $content;