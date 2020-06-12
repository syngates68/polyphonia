<?php $page_title = 'Gestion des signalements'; ?>
<div class="container">
    <h1>Gestion des signalements</h1>
    <div class="liste_signalements">
        <div class="alert_info">
            En cliquant sur le bouton "Valide", cela envoi une notification à l'utilisateur pour l'avertir qu'une décision allant dans le sens de son signalement a été prise.<br/>
            Le bouton "Invalide" quant à lui envoi une notification à l'utilisateur pour l'avertir que l'élément signalé n'enfreignait aucune règle du site.<br/>
            Enfin, la croix permet de ne donner aucune suite à un signalement, dans ce cas aucune notification ne sera envoyée et le signalement n'apparaîtra plus.
        </div>
        <?php if (req_nbr_signalements() > 0) : ?>
            <?php foreach (req_liste_signalements() as $signalement) : ?>
                <div class="signalement">
                    <div class="bloc_gauche">
                        <div class="motif">
                            <?= $signalement['motif']; ?>
                        </div>
                        <div class="infos">
                            Signalé par <?= $signalement['nom_utilisateur']; ?> le <?= formate_date($signalement['date_signalement']); ?>
                        </div>
                    </div>
                    <div class="bloc_droit">
                        <button class="btn btn-blue voir" id="voir_<?= $signalement['id']; ?>">Voir</button>
                        <button class="btn btn-outline-green valid" valid="1" user="<?= $signalement['id_utilisateur']; ?>" id="valid_<?= $signalement['id']; ?>">Valide</button>
                        <button class="btn btn-outline-red invalid" valid="0" user="<?= $signalement['id_utilisateur']; ?>" id="invalid_<?= $signalement['id']; ?>">Invalide</button>
                        <span class="material-icons is_lu" id="is_lu_<?= $signalement['id']; ?>" title="Ne pas donner suite">close</span>
                    </div>
                </div>
                <div class="signalement_contenu" id="signalement_contenu_<?= $signalement['id']; ?>">
                    <iframe <?php if ($signalement['type'] == 'sujet') : ?> src="<?= BASEURL; ?>sujet/<?= $signalement['id_type']; ?>.html" <?php else : ?> src="<?= BASEURL; ?>sujet/<?= $signalement['id_sujet']; ?>.html#reponse_sujet_<?= $signalement['id_type']; ?>" <?php endif; ?>>
                    </iframe>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <div class="erreur">Aucun signalement à afficher.</div>
        <?php endif; ?>
    </div>
</div>
<script src="<?= BASEURL; ?>assets/js/admin.js"></script>