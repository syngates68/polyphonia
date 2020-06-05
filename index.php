<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

include("config/config.php");
include("config/fonctions.php");
include("config/captcha.php");
include("config/cookies.php");

//On garde la page en session afin de revenir à cette page après connexion
if (!strpos($_SERVER['REQUEST_URI'], 'connexion') && !strpos($_SERVER['REQUEST_URI'], 'inscription'))
{
    $_SESSION['redirect'] = './'.$_SERVER['REQUEST_URI'];
}

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
    <script src="<?= BASEURL; ?>assets/js/jquery.min.js"></script>
    <script src="<?= BASEURL; ?>assets/js/emoji-button-3.0.3.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="icon" type="image/png" href="<?= BASEURL ?>assets/img/favicon.png" />
    <!--<script src="//cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>-->
    <script src="<?= BASEURL; ?>assets/ckeditor/ckeditor.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <!-- Highlight JS -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.0.3/styles/railscasts.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.0.3/highlight.min.js"></script>
    <script>hljs.initHighlightingOnLoad();</script>

    <!-- jQuery Modal -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />

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