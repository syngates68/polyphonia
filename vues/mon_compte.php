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
                </div>
            </div>
            <div class="infos_container">
                <p class="nom_utilisateur"><?= $utilisateur['nom_utilisateur']; ?></p>
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
                        <p style="color:red;">Aucune bio</p>
                    <?php endif; ?>
                </div>
                <div class="info">
                    <p><span class="label">Facebook</span></p>
                    <p><em>Non renseigné</em></p>
                </div>
                <div class="info">
                    <p><span class="label">Twitter</span></p>
                    <p><em>Non renseigné</em></p>
                </div>
                <div class="info">
                    <p><span class="label">Discord</span></p>
                    <p><em>Non renseigné</em></p>
                </div>
            </div>
        </div>
    </div>
<?php
}
else
    header('Location:'.BASEURL);