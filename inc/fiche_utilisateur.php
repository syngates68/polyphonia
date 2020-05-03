<?php
include('../config/config.php');
include('../config/fonctions.php');

$utilisateur = req_utilisateur_by_id($_POST['id_utilisateur']);
?>

<div class="modal_title">
    <h5>Fiche utilisateur de <?= $utilisateur['nom_utilisateur']; ?></h5>
</div>
<div class="modal_content">
    <div class="fiche">
        <div class="bloc_gauche">
            <div class="avatar_container">
                <img src="<?= BASEURL; ?><?= $utilisateur['avatar']; ?>">
            </div>
        </div>
        <div class="bloc_droit">
            <p class="nom_utilisateur"><?= $utilisateur['nom_utilisateur']; ?></p>
            <div class="infos">
                <div class="titre">Email</div>
                <div class="info"><?= $utilisateur['email']; ?></div>
            </div>
            <div class="infos">
                <div class="titre">Membre depuis le</div>
                <div class="info"><?= formate_date($utilisateur['date_inscription']); ?></div>
            </div>
            <div class="infos">
                <div class="titre">Dernière connexion le</div>
                <div class="info"><?= formate_date($utilisateur['derniere_connexion']); ?></div>
            </div>
            <div class="infos">
                <div class="titre">Etat du compte</div>
                <div class="info"><?php if ($utilisateur['bloque'] == 0 && $utilisateur['actif'] == 1) : ?>Actif<?php elseif ($utilisateur['actif'] == 0) : ?>Inactif<?php else : ?>Bloqué<?php endif; ?></div>
            </div>
            <?php if ($utilisateur['bloque'] == 1) : ?>
                <div class="infos">
                    <div class="titre">Motif</div>
                    <div class="info"><?= $utilisateur['motif_bloque']; ?></div>
                </div>
            <?php endif; ?></p>
        </div>
    </div>
    <button class="btn btn-grey fermer">Fermer</button>
</div>