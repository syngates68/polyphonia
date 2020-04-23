<?php
if (verifie_nom_utilisateur($_GET['slug']) > 0)
{
    set_message_as_lus($_SESSION['utilisateur'], req_utilisateur_by_nom_utilisateur($_GET['slug'])['id']);
?>
    <div class="container">
        <div class="messages_top">
            Conversation avec <?= $_GET['slug']; ?>
        </div>
        <form method="POST" action="<?= BASEURL; ?>inc/envoyer_message.php" class="form_message">
            <input type="hidden" name="url" value="message/<?= $_GET['slug']; ?>.html">
            <input type="hidden" name="id_envoi" value="<?= $_SESSION['utilisateur']; ?>">
            <input type="hidden" name="id_reception" value="<?= req_utilisateur_by_nom_utilisateur($_GET['slug'])['id']; ?>">
            <div class="form_ligne">
                <textarea placeholder="Votre message" name="message"></textarea>
            </div>
            <button type="submit">Envoyer</button>
        </form>
        <div class="messages_container">
            <?php if (sizeof(req_messages_by_conversation($_SESSION['utilisateur'], req_utilisateur_by_nom_utilisateur($_GET['slug'])['id'])) > 0) : ?>
                <?php foreach (req_messages_by_conversation($_SESSION['utilisateur'], req_utilisateur_by_nom_utilisateur($_GET['slug'])['id']) as $message) : ?>
                    <div class="message">
                        <img src="<?= BASEURL; ?><?= $message['avatar']; ?>">
                        <div class="message_contenu <?php if ($message['id_envoi'] == $_SESSION['utilisateur']) : ?> message_utilisateur <?php else : ?> message_interlocuteur <?php endif; ?>">
                            <p class="date_message"><?= formate_date_heure($message['date_envoi']); ?></p>
                            <p><?= nl2br($message['contenu']); ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <p class="no_message">Aucun message avec cet utilisateur</p>
            <?php endif; ?>
        </div>
    </div>
<?php
}
else
    header('Location:'.BASEURL);