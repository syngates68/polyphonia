<?php if (isset($_SESSION['compte_supprime'])) : ?>
<div class="container">
    <div class="succes_suppression">
        Votre compte a bien été désactivé, nous sommes désolé de vous voir partir 
        et espérons que votre temps passé sur Polyphonia vous aura plu malgré tout!<br/>
        Vous allez-être redirigé automatiquement.
    </div>
    <meta http-equiv="refresh" content="5;URL=<?= BASEURL; ?>"> 
</div>
<?php 
    unset($_SESSION['compte_supprime']);
    else :
        header('Location:'.BASEURL);
    endif;