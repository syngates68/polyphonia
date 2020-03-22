<?php
if (isset($_SESSION['utilisateur']))
{
    $utilisateur = req_utilisateur_by_id($_SESSION['utilisateur']);
?>
    <div class="container">
        <h1>Votre compte</h1>
        <div class="compte_content">
            <div class="avatar_container">
                <div class="avatar">
                    <img src="<?= BASEURL; ?><?= $utilisateur['avatar']; ?>">
                    <div class="modifier_avatar">
                        <i class="material-icons">insert_photo</i>
                    </div>
                </div>
                <input type="file" name="avatar" utilisateur="<?= $utilisateur['id']; ?>">
                <div class="vos_infos">
                    <div class="info">
                        <p><span class="label"><i class="material-icons">person</i>Nom d'utilisateur</span></p>
                        <p><?= $utilisateur['nom_utilisateur']; ?></p>
                    </div>
                    <div class="info">
                        <p><span class="label"><i class="material-icons">alternate_email</i>Adresse mail</span></p>
                        <p><?= $utilisateur['email']; ?></p>
                    </div>
                    <div class="info">
                        <p><span class="label"><i class="material-icons">calendar_today</i>Membre depuis le</span></p>
                        <p><?= formate_date($utilisateur['date_inscription']); ?></p>
                    </div>
                    <div class="info">
                        <p><span class="label"><i class="material-icons">calendar_today</i>Dernière connexion le</span></p>
                        <p><?= formate_date($utilisateur['derniere_connexion']); ?></p>
                    </div>
                    <div class="info">
                        <p><span class="label"><i class="material-icons">edit</i>Biographie</span></p>
                        <?php if ($utilisateur['bio'] != NULL && $utilisateur['bio'] != '') : ?>
                            <?= $utilisateur['bio']; ?>
                        <?php else : ?>
                            <p>Aucune bio</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="infos_container">
                <form method="POST" action="./inc/editer_profil.php">
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
                    <hr>
                    <h2 class="libelle_parametres">Modifier le mot de passe</h2>
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
                    <button type="submit" name="editer_profil">Modifier</button>
                </form>
                <a href="#" class="btn_supprimer_compte">Supprimer mon compte</a>
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
            </div>
        </div>
    </div>
    <script src="<?= BASEURL; ?>assets/js/mon_compte.js"></script>
    <script>
        CKEDITOR.replace('biographie', {
            height: 200
        });
    </script>
<?php
}
else
    header('Location:'.BASEURL);