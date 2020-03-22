<div class="login_container">
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
                <label>Adresse mail</label>
                <input type="mail" name="email">
            </div>
            <div class="form_ligne">
                <label>Nom d'utilisateur</label>
                <input type="text" name="nom_utilisateur">
            </div>
            <div class="form_ligne">
                <label>Mot de passe</label>
                <input type="password" name="pass">
            </div>
            <div class="form_ligne">
                <label>Confirmation du mot de passe</label>
                <input type="password" name="pass2">
            </div>
            <button type="submit" name="inscription">S'inscrire</button>
        </form>
    </div>
</div>