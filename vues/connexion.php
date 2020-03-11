<div class="container">
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
                <label>Nom d'utilisateur</label>
                <input type="text" name="nom_utilisateur">
            </div>
            <div class="form_ligne">
                <label>Mot de passe</label>
                <input type="password" name="pass">
            </div>
            <button type="submit" name="connexion">Se connecter</button>
        </form>
    </div>
</div>