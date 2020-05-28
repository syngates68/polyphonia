<?php
include('../config/config.php');
include('../config/fonctions.php');

$utilisateur = req_utilisateur_by_id($_GET['id_utilisateur']);
?>

<div class="modal_content">
    <div class="fiche">
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
                <option value="<?= $rang['id']; ?>" <?php if ($rang['id'] == $utilisateur['id_droit']) : ?>selected<?php endif; ?>><?= $rang['libelle_site']; ?></option>
                <?php endforeach; ?>
            </select>
            <?php else : ?>
                <div class="info"><?= req_rang_by_id($utilisateur['id_droit']); ?></div>
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