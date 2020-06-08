<?php 
$page_title = 'Connexion à l\'espace membre';

if (!isset($_SESSION['utilisateur'])) : 
?>
<div class="login_container">
    <div class="formulaire_connexion">
        <img src="<?= BASEURL; ?>assets/img/logo_orange.png">
        <h1>Connexion à l'espace membre</h1>
        <form method="POST" action="./inc/verifier_identifiants.php">

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
                <label for="login">Nom d'utilisateur ou adresse mail</label>
                <input type="text" id="login" name="login" <?php if (isset($_SESSION['_login'])) : ?> value="<?= $_SESSION['_login']; ?>" <?php unset($_SESSION['_login']); endif; ?>>
            </div>
            <div class="form_ligne">
                <label for="pass">Mot de passe</label>
                <input type="password" id="pass" name="pass">
                <div class="mdp_oublie">
                    <a href="<?= BASEURL; ?>mot_de_passe_oublie.html">Mot de passe oublié?</a> 
                </div>
            </div>
            <button type="submit" name="connexion">Se connecter</button>
            <div class="form_ligne cgu">
                <input type="checkbox" name="remember_me" id="remember_me">
                <label for="remember_me">Se souvenir de moi
            </div>
            <p class="message_connexion">Pas encore membre? <a href="<?= BASEURL; ?>inscription.html">Inscrivez-vous ici</a></p>  
        </form>
    </div>
</div>
<?php
else:
    header('Location:'.BASEURL);
endif;