<?php $page_title = 'Gestion des signalements'; ?>
<div class="container">
    <h1>Gestion des signalements</h1>
    <div class="liste_signalements">
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
                        <?php if ($signalement['type'] == 'sujet') : ?>
                            <button class="btn btn-outline-red fermer">Fermer</button>
                        <?php else : ?>
                            <button class="btn btn-outline-red supprimer">Supprimer</button>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="signalement_contenu" id="signalement_contenu_<?= $signalement['id']; ?>">
                    <iframe style="width:100%;height:500px;" <?php if ($signalement['type'] == 'sujet') : ?> src="<?= BASEURL; ?>sujet/<?= $signalement['id_type']; ?>.html" <?php else : ?> src="<?= BASEURL; ?>sujet/<?= $signalement['id_sujet']; ?>.html#reponse_sujet_<?= $signalement['id_type']; ?>" <?php endif; ?>>
                    </iframe>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <div class="erreur">Aucun signalement à afficher.</div>
        <?php endif; ?>
    </div>
</div>
<script src="<?= BASEURL; ?>assets/js/admin.js"></script>