<?php
if (isset($_SESSION['utilisateur']))
{
    $utilisateur = req_utilisateur_by_id($_SESSION['utilisateur']);
?>
    <div class="container">
        <h1>Paramètres du compte</h1>
        <?php 
        if (isset($_SESSION['erreur'])) :
        ?>
            <div class="erreur">
                <?= $_SESSION['erreur']; ?>
            </div>
        <?php
            endif;
            unset($_SESSION['erreur']);

            if (isset($_SESSION['succes'])) :
        ?>
            <div class="succes">
                <?= $_SESSION['succes']; ?>
            </div>
        <?php
            endif;
            unset($_SESSION['succes']);
        ?>
        <div class="parametres">
            <div class="avatar_container">
                <div class="titre_section">Photo de profil :</div>
                <div class="avatar">
                    <img src="<?= BASEURL; ?><?= $utilisateur['avatar']; ?>">
                </div>
                <button id="modifier_avatar">Modifier</button>
                <input type="file" name="avatar" utilisateur="<?= $utilisateur['id']; ?>">
            </div>
            <div class="infos_container">
                <form method="POST" action="./inc/editer_profil.php">
                    <div class="titre_section">Informations du compte :</div>
                    <div class="form_ligne">
                        <label for="nom_utilisateur">Nom d'utilisateur</label>
                        <input type="text" name="nom_utilisateur" id="nom_utilisateur" value="<?= $utilisateur['nom_utilisateur']; ?>">
                    </div>
                    <div class="form_ligne">
                        <label>Adresse mail</label>
                        <input type="mail" name="email" value="<?= $utilisateur['email']; ?>">
                    </div>
                    <div class="form_ligne">
                        <label>Biographie</label>
                        <textarea name="bio" id="biographie"><?= $utilisateur['bio']; ?></textarea>
                    </div>
                    <button type="submit" name="editer_profil">Modifier</button>
                </form>
                <form method="POST" action="./inc/editer_mdp.php">
                    <div class="titre_section">Mot de passe :</div>
                    <div class="form_ligne">
                        <label>Mot de passe actuel</label>
                        <input type="password" name="pass">
                    </div>
                    <div class="form_ligne">
                        <label>Nouveau mot de passe</label>
                        <input type="password" name="nouveau_pass">
                    </div>
                    <div class="form_ligne">
                        <label>Confirmer mot de passe</label>
                        <input type="password" name="confirm_pass">
                    </div>
                    <button type="submit" name="editer_mdp">Modifier</button>
                </form>
                <form method="POST" action="./inc/reseaux_sociaux.php">
                    <div class="titre_section">Réseaux sociaux :</div>
                    <div class="form_ligne">
                        <label>Facebook (facultatif)</label>
                        <input type="text" name="facebook" placeholder="Lien de votre compte Facebook" value="<?= req_utilisateur_by_id($_SESSION['utilisateur'])['facebook']; ?>">
                    </div>
                    <div class="form_ligne">
                        <label>Twitter (facultatif)</label>
                        <input type="text" name="twitter" placeholder="Lien de votre compte Twitter" value="<?= req_utilisateur_by_id($_SESSION['utilisateur'])['twitter']; ?>">
                    </div>
                    <div class="form_ligne">
                        <label>Discord (facultatif)</label>
                        <input type="text" name="discord" placeholder="Lien de votre compte Discord" value="<?= req_utilisateur_by_id($_SESSION['utilisateur'])['discord']; ?>">
                    </div>
                    <button type="submit" name="editer_social">Modifier</button>
                </form>
                <?php if (req_utilisateur_by_id($_SESSION['utilisateur'])['rang'] != 'admin') : ?>
                <div class="supprimer_compte">
                    <div class="titre_section">Suppression du compte :</div>
                    <button class="btn_supprimer_compte" utilisateur="<?= $_SESSION['utilisateur']; ?>">Supprimer mon compte</button>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <script src="<?= BASEURL; ?>assets/js/parametres.js"></script>
    <script>
        CKEDITOR.replace('biographie', {
            height: 200
        });
    </script>
<?php
}
else
    header('Location:'.BASEURL);