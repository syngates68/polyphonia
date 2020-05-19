<div class="container">
    <h1>Vos messages</h1>
    <div class="mes_messages">
        <div class="bloc-nouveau-message">
            <button class="btn btn-orange btn-nouveau-message">Nouveau message</button>
            <div class="formulaire_nouveau_message">
            </div>
        </div>
        <?php if (sizeof(req_messages_by_user($_SESSION['utilisateur'])) > 0) : ?>
            <?php foreach (req_messages_by_user($_SESSION['utilisateur']) as $message) : ?>
                <?php $id_utilisateur = ($message['id_utilisateur_1'] != $_SESSION['utilisateur']) ? $message['id_utilisateur_1'] : $message['id_utilisateur_2']; ?>
                <a href="<?= BASEURL; ?>message/<?= req_utilisateur_by_id($id_utilisateur)['nom_utilisateur']; ?>.html">
                    <div class="message <?php if ($message['lu'] == 0 && $message['id_envoi'] != $_SESSION['utilisateur']) : ?>non_lu<?php endif; ?>">
                        <img src="<?= BASEURL; ?><?= req_utilisateur_by_id($id_utilisateur)['avatar']; ?>">
                        <div class="nom_utilisateur">
                            <?= req_utilisateur_by_id($id_utilisateur)['nom_utilisateur']; ?>
                            <?php if(req_utilisateur_by_id($id_utilisateur)['id_droit'] == 1 || req_utilisateur_by_id($_SESSION['utilisateur'])['id_droit'] == 2) : ?><span class="badge_admin material-icons">verified_user</span><?php endif; ?>
                        </div>
                        <div class="contenu">
                            <?php $envoi = ($message['id_envoi'] == $_SESSION['utilisateur']) ? 'Vous' : req_utilisateur_by_id($message['id_envoi'])['nom_utilisateur']; ?>
                            <?= $envoi.' : '.extrait_texte($message['dernier_message'], 200); ?>
                        </div>
                        <div class="date_message">
                            <?= formate_date_heure($message['date_dernier_message']); ?>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
        <?php else : ?>
            <div class="erreur">Aucun message</div>
        <?php endif; ?>
    </div>
    <script src="<?= BASEURL; ?>assets/js/messages.js"></script>
</div>