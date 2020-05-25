<?php
include('../config/config.php');
include('../config/fonctions.php');

$utilisateur = req_utilisateur_by_id($_GET['id_utilisateur']);
?>

<div class="modal_title">
    <h5>Fiche utilisateur de <?= $utilisateur['nom_utilisateur']; ?></h5>
</div>
<div class="modal_content">
    <h2><span class="material-icons">info</span>Informations</h2>
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
                <div class="titre">Rang</div>
                <?php if ($utilisateur['id_droit'] != 1 && $utilisateur['id_droit'] != 2) : ?>
                <input type="hidden" name="utilisateur" value="<?= $utilisateur['id']; ?>">
                <select name="rang" id="rang">
                    <?php foreach(req_liste_rangs() as $rang) : ?>
                    <option value="<?= $rang['id']; ?>" <?php if ($rang['id'] == $utilisateur['id_droit']) : ?>selected<?php endif; ?>><?= $rang['libelle']; ?></option>
                    <?php endforeach; ?>
                </select>
                <?php else : ?>
                    <div class="info"><?= ucfirst(req_rang_by_id($utilisateur['id_droit'])); ?></div>
                <?php endif; ?>
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
    <div class="statistiques">
        <h2><span class="material-icons">equalizer</span>Statistiques de l'utilisateur</h2>
        <?php $nbr_reponses = sizeof(req_reponses_by_user($utilisateur['id'])); ?>
        <?php $nbr_sujets = sizeof(req_sujets_by_user($utilisateur['id'], NULL, NULL)); ?>
        <?php $nbr_sujets_resolus = sizeof(req_sujets_by_user($utilisateur['id'], 1, NULL)); ?>
        <?php $nbr_sujets_fermes = sizeof(req_sujets_by_user($utilisateur['id'], NULL, 1)); ?>
        <?php $nbr_projets = sizeof(req_projets_by_user($utilisateur['id'])); ?>
        <div class="stat"><?= $nbr_reponses; ?> <?= ($nbr_reponses > 1) ? "réponses postées" : "réponse postée"; ?></div>
        <div class="stat"><?= $nbr_sujets; ?> <?= ($nbr_sujets > 1) ? "sujets ouverts" : "sujet ouvert"; ?></div>
        <div class="stat"><?= $nbr_sujets_resolus; ?> <?= ($nbr_sujets_resolus > 1) ? "sujets résolus" : "sujet résolu"; ?></div>
        <div class="stat"><?= $nbr_sujets_fermes; ?> <?= ($nbr_sujets_fermes > 1) ? "sujets fermés" : "sujet fermé"; ?></div>
        <div class="stat"><?= $nbr_sujets; ?> <?= ($nbr_sujets > 1) ? "sujets ouverts" : "sujet ouvert"; ?></div>
        <div class="stat"><?= $nbr_projets; ?> <?= ($nbr_projets > 1) ? "projets ajoutés" : "projet ajouté"; ?></div>
    </div>
</div>