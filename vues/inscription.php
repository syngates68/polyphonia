<?php 
if (!isset($_SESSION['utilisateur'])) : 
?>
<div class="sign_container">
    <div class="formulaire_connexion">
        <img src="<?= BASEURL; ?>assets/img/logo_orange.png">
        <h1>Inscription à l'espace membre</h1>
        <form method="POST" action="./inc/verifier_inscription.php">

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
                <label for="mail">Adresse mail</label>
                <input type="mail" id="mail" name="email" <?php if (isset($_SESSION['_email'])) : ?> value="<?= $_SESSION['_email']; ?>" <?php unset($_SESSION['_email']); endif; ?>>
            </div>
            <div class="form_ligne">
                <label for="nom_utilisateur">Nom d'utilisateur</label>
                <input type="text" id="nom_utilisateur" name="nom_utilisateur" <?php if (isset($_SESSION['_nom_utilisateur'])) : ?> value="<?= $_SESSION['_nom_utilisateur']; ?>" <?php unset($_SESSION['_nom_utilisateur']); endif; ?>>
            </div>
            <div class="form_ligne">
                <label for="pass">Mot de passe</label>
                <input type="password" id="pass" name="pass" <?php if (isset($_SESSION['_pass'])) : ?> value="<?= $_SESSION['_pass']; ?>" <?php unset($_SESSION['_pass']); endif; ?>>
            </div>
            <div class="form_ligne">
                <label for="pass2">Confirmation du mot de passe</label>
                <input type="password" id="pass2" name="pass2" <?php if (isset($_SESSION['_pass2'])) : ?> value="<?= $_SESSION['_pass2']; ?>" <?php unset($_SESSION['_pass2']); endif; ?>>
            </div>
            <div class="form_ligne cgu">
                <input type="checkbox" name="cgu" id="cgu">
                <label for="cgu">J'ai lu et j'accepte les <a href="<?= BASEURL; ?>cgu.html" target="_blank">Conditions Générales d'Utilisation</a></label>
            </div>
            <button type="submit" name="inscription">S'inscrire</button>
            <p class="message_connexion">Déjà membre? <a href="<?= BASEURL; ?>connexion.html">Connectez-vous</a></p>  
        </form>
    </div>
</div>
<?php 
else :
    header('Location:'.BASEURL);
endif;