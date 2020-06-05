<?php 
if (!isset($_SESSION['utilisateur'])) : 
?>
<div class="mdp_oublie_container container">
    <h1>Vous avez oublié votre mot de passe?</h1>
    <div class="texte_reinitialisation">
        <p>
            Aucun soucis, saisissez simplement dans le formulaire ci-dessous l'adresse mail avec laquelle vous vous êtes inscrits.<br/>
            Un mail vous sera alors envoyé afin de pouvoir vous permettre de réinitialiser votre mot de passe.<br/>
            Veillez à vérifier les spams si vous ne recevez aucun mail.
        </p>
    </div>
    <?php 
        if (isset($_SESSION['erreur'])) : 
    ?>
        <div class="erreur"><?= $_SESSION['erreur']; ?></div>
    <?php 
        unset($_SESSION['erreur']);
        endif; 
    ?>
    <form method="POST" action="<?= BASEURL; ?>inc/reinitialiser_mdp.php">
        <div class="form_ligne">
            <label for="email">Votre adresse mail</label>
            <input type="text" id="email" name="email">
        </div>
        <button class="btn btn-blue">Envoyer mail</button>
    </form>
</div>
<?php
else:
    header('Location:'.BASEURL);
endif;