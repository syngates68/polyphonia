<?php
session_start();

include('../config/config.php');
include('../config/fonctions.php');
include('../config/captcha.php');
?>

<div class="form_modification">
    <form method="POST" action="../inc/envoyer_modifications.php">
        <?php 
        //Message d'erreur
        if (isset($_SESSION['erreur'])) : 
        ?>
            <div class="erreur"><?= $_SESSION['erreur']; ?></div>
        <?php
        unset($_SESSION['erreur']); 
        endif;
        //Message de succès
        if (isset($_SESSION['succes'])) : 
        ?>
            <div class="succes"><?= $_SESSION['succes']; ?></div>
        <?php
        unset($_SESSION['succes']); 
        endif;
        ?>
        <div class="form_ligne">
            <label for="mail">Adresse mail</label>
            <input type="mail" id="mail" name="email" <?php if (isset($_SESSION['utilisateur'])) : ?> value="<?= req_utilisateur_by_id($_SESSION['utilisateur'])['email']; ?>" disabled <?php endif; ?> >
        </div>
        <div class="form_ligne">
            <label for="suggestion">Modification suggérée</label>
            <textarea name="suggestion" id="suggestion" style="height:200px"></textarea>
        </div>
        <?php if (!isset($_SESSION['utilisateur']) && !DEV) : ?>
            <div class="g-recaptcha" data-sitekey="<?= get_public_key(); ?>"></div>
        <?php endif; ?>
        <div class="button">
            <button type="submit" name="envoyer">Envoyer</button>
        </div>
    </form>
</div>
<script src="<?= BASEURL; ?>assets/js/projet.js"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>