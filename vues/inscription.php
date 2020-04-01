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
                <input type="mail" id="mail" name="email">
            </div>
            <div class="form_ligne">
                <label for="nom_utilisateur">Nom d'utilisateur</label>
                <input type="text" id="nom_utilisateur" name="nom_utilisateur">
            </div>
            <div class="form_ligne">
                <label for="pass">Mot de passe</label>
                <input type="password" id="pass" name="pass">
            </div>
            <div class="form_ligne">
                <label for="pass2">Confirmation du mot de passe</label>
                <input type="password" id="pass2" name="pass2">
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