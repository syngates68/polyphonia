<?php
$page_title = 'Vos notifications';
if (isset($_SESSION['utilisateur'])) :
?>
<div class="container">
    <h1>Notifications</h1>
    <div class="mes_notifications">
        <?php 
        if (sizeof(req_notifications_by_user($_SESSION['utilisateur'])) > 0)
        {
        ?>
            <button type="button" class="btn btn-blue marquer_lu">Tout marquer comme lu</button><br/>
        <?php
            foreach(req_notifications_by_user($_SESSION['utilisateur']) as $notification)
            {
            ?>
                <a href="<?= BASEURL.$notification['lien_notification']; ?>" id="lien_<?= $notification['id']; ?>">
                    <div id="notification_<?= $notification['id']; ?>" class="notification <?php if ($notification['lu'] == 0) : ?> non_lu <?php endif; ?>">
                        <div class="titre_notif">
                            <span class="material-icons">
                                <?php if ($notification['type_notification'] == 'reponse') : ?>
                                    help_outline
                                <?php elseif ($notification['type_notification'] == 'sujet_ferme') : ?>
                                    highlight_off
                                <?php elseif ($notification['type_notification'] == 'changement_rang') : ?>
                                    military_tech
                                <?php endif; ?>
                            </span>
                            <?= $notification['contenu']; ?>
                        </div>
                        <div class="date_notif"><?= formate_date_heure($notification['date_ajout']); ?></div>
                    </div>
                </a>
            <?php
            }
        }
        else
        {
        ?>
            <div class="erreur">Aucune notification</div>
        <?php
        }
        ?>
    </div>
</div>
<script src="<?= BASEURL; ?>assets/js/notifications.js"></script>
<?php
else :
    header('Location:'.BASEURL);
endif;