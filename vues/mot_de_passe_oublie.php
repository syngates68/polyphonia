<?php 
if (!isset($_SESSION['utilisateur'])) : 
?>
<div class="container">
    <h1>Réinitialisation du mot de passe</h1>
    <div class="texte_reinitialisation">
        <p>
            Afin de pouvoir réinitialiser votre mot de passe veuillez saisir votre adresse mail
            dans le champs ci-dessous.<br/>
            Un mail vous sera alors envoyé afin de pouvoir vous reconnecter.<br/>
            Veillez à vérifier les spams si vous ne recevez aucun mail.
        </p>
    </div>
    <?php 
        if (isset($_SESSION['erreur'])) : 
    ?>
        <div class="erreur" style="width:50%;"><?= $_SESSION['erreur']; ?></div>
    <?php 
        unset($_SESSION['erreur']);
        endif; 
    ?>
    <form method="POST" action="<?= BASEURL; ?>inc/reinitialiser_mdp.php">
        <div class="form_ligne" style="width:50%;">
            <label for="email">Votre adresse mail</label>
            <input type="text" id="email" name="email">
        </div>
        <button class="btn btn-blue">Réinitialiser</button>
    </form>
</div>
<?php
else:
    header('Location:'.BASEURL);
endif;