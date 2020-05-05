<?php 
if (isset($_SESSION['nom_utilisateur'])) : 
?>
<div class="login_container">
    <div class="formulaire_connexion">
        <img src="<?= BASEURL; ?>assets/img/logo_orange.png">
        <h1>Confirmation d'inscription</h1>
        <form method="POST" action="./inc/confirmer_inscription.php">

            <?php
            //Message d'erreur
            if (isset($_SESSION['erreur'])) : 
            ?>
                <div class="erreur"><?= $_SESSION['erreur']; ?></div>
            <?php
            unset($_SESSION['erreur']); 
            endif;
            ?>

            <div class="form_ligne">
                <label for="code">Code de confirmation</label>
                <input type="text" id="code" name="code">
            </div>
            <button type="submit" name="confirmation">Confirmer</button> 
        </form>
    </div>
</div>
<?php 
else :
    header('Location:'.BASEURL);
endif;