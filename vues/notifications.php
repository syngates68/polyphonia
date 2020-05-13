<?php 
if (isset($_SESSION['utilisateur'])) :
?>
<div class="container">
    <h1>Notifications</h1>
    <div class="mes_notifications">
        <?php 
        if (sizeof(req_notifications_by_user($_SESSION['utilisateur'])) > 0)
        {
            foreach(req_notifications_by_user($_SESSION['utilisateur']) as $notification)
            {
            ?>
                <a href="<?= BASEURL.$notification['lien_notification']; ?>" id="lien_<?= $notification['id']; ?>">
                    <div class="notification <?php if ($notification['lu'] == 0) : ?> non_lu <?php endif; ?>">
                        <div class="titre_notif"><span class="material-icons">help_outline</span><?= $notification['contenu']; ?></div>
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