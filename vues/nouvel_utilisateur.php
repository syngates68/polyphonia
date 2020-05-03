<?php

if (isset($_SESSION['utilisateur']) && (req_utilisateur_by_id($_SESSION['utilisateur'])['rang'] == 'admin'))
{

?>

    <div class="container">
        <h1>Ajouter un nouvel utilisateur</h1>

        <div class="nouvel_utilisateur">

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

            <form method="POST" action="<?= BASEURL; ?>inc/ajouter_utilisateur.php">
                <div class="form_ligne">
                    <label>Nom d'utilisateur</label>
                    <input type="text" name="nom_utilisateur">
                </div>
                <div class="form_ligne">
                    <label>Adresse mail</label>
                    <input type="mail" name="mail">
                </div>
                <div class="form_ligne">
                    <label>Mot de passe</label>
                    <input type="text" name="pass">
                    <span class="genere_mdp">Générer aléatoirement</span>
                </div> 
                <div class="form_footer">
                    <button class="btn btn-blue" type="submit" name="ajouter_utilisateur">Valider</button>
                </div>
            </form>
        </div>

        <script src="<?= BASEURL; ?>assets/js/admin.js"></script>
    </div>

<?php
}
else
    header('Location:'.BASEURL);