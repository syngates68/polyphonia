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
            </div>
            <div class="infos_container">
                <form method="POST" action="./inc/verifier_identifiants.php">
                    <div class="form_ligne">
                        <label>Nom d'utilisateur</label>
                        <input type="text" name="nom_utilisateur" value="<?= $utilisateur['nom_utilisateur']; ?>">
                    </div>
                    <div class="form_ligne">
                        <label>Adresse mail</label>
                        <input type="text" name="nom_utilisateur" value="<?= $utilisateur['email']; ?>">
                    </div>
                    <hr>
                    <h2 class="libelle_parametres">Modifier le mot de passe</h2>
                    <div class="form_ligne">
                        <label>Mot de passe actuel</label>
                        <input type="password" name="pass">
                    </div>
                    <div class="form_ligne">
                        <label>Nouveau mot de passe</label>
                        <input type="password" name="pass">
                    </div>
                    <div class="form_ligne">
                        <label>Confirmer mot de passe</label>
                        <input type="password" name="pass">
                    </div>
                    <button type="submit" name="connexion">Modifier</button>
                </form>
                <a href="#" class="btn_supprimer_compte">Supprimer mon compte</a>
            </div>
        </div>
    </div>
    <script src="<?= BASEURL; ?>assets/js/mon_compte.js"></script>
<?php
}
else
    header('Location:'.BASEURL);