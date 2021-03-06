<?php
if (isset($_SESSION['utilisateur']))
{
    if (verifie_nom_utilisateur($_GET['slug']) > 0)
    {
        $page_title = 'Messages avec '.$_GET['slug'];
        set_message_as_lus($_SESSION['utilisateur'], req_utilisateur_by_nom_utilisateur($_GET['slug'])['id']);
    ?>
        <div class="container">
            <div class="messages_top">
                <img src="<?= BASEURL; ?><?= req_utilisateur_by_nom_utilisateur($_GET['slug'])['avatar']; ?>">
                <div class="infos_messagerie">
                    <span class="titre_conversation"><a href="<?= BASEURL; ?>utilisateur/<?= $_GET['slug']; ?>.html"><?= $_GET['slug']; ?></a></span>
                    <div class="derniere_connexion">Vu pour la dernière fois le <?= formate_date(req_utilisateur_by_nom_utilisateur($_GET['slug'])['derniere_connexion']); ?></div>
                </div>
            </div>
            <form method="POST" action="<?= BASEURL; ?>inc/envoyer_message.php" class="form_message">
                <input type="hidden" name="url" value="message/<?= $_GET['slug']; ?>.html">
                <input type="hidden" name="id_envoi" value="<?= $_SESSION['utilisateur']; ?>">
                <input type="hidden" name="id_reception" value="<?= req_utilisateur_by_nom_utilisateur($_GET['slug'])['id']; ?>">
                <div class="form_ligne">
                    <textarea placeholder="Votre message" id="message" name="message"></textarea>
                </div>
                <div class="ligne_button">
                    <button type="button" id="emoji-button"><span class="material-icons">insert_emoticon</span></button>
                    <button type="button" class="ajouter_photo"><span class="material-icons">camera_alt</span></button>
                    <button type="submit" class="btn-send"><span class="material-icons">send</span></button>
                </div>
            </form>
            <div class="messages_container">
                <?php if (sizeof(req_messages_by_conversation($_SESSION['utilisateur'], req_utilisateur_by_nom_utilisateur($_GET['slug'])['id'])) > 0) : ?>
                    <?php foreach (req_messages_by_conversation($_SESSION['utilisateur'], req_utilisateur_by_nom_utilisateur($_GET['slug'])['id']) as $message) : ?>
                        <div class="message">
                            <div class="image_utilisateur">
                                <img src="<?= BASEURL; ?><?= $message['avatar']; ?>">
                            </div>
                            <div class="message_contenu <?php if ($message['id_envoi'] == $_SESSION['utilisateur']) : ?> message_utilisateur <?php else : ?> message_interlocuteur <?php endif; ?>">
                                <p class="date_message"><?= formate_date_heure($message['date_envoi']); ?></p>
                                <p><?= nl2br($message['contenu']); ?></p>
                            </div>
                        </div>
                        <?php if (($message['id_message'] == $message['id_dernier_message']) && ($message['id_envoi'] == $_SESSION['utilisateur']) && $message['lu'] == 1) : ?>
                            <div class="message_lu">
                                Vu le <?= formate_date_heure($message['date_lecture']); ?>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php else : ?>
                    <p class="no_message">Aucun message avec cet utilisateur</p>
                <?php endif; ?>
            </div>
        </div>
        <script>
            const button = document.querySelector('#emoji-button');
            const picker = new EmojiButton({
                autoHide : false,
                emojisPerRow : 6
            });
    
            picker.on('emoji', emoji => {
                document.querySelector('textarea').value += emoji;
            });
    
            button.addEventListener('click', () => {
                picker.togglePicker(button);
            });
        </script>
        <script>
            var autoExpand = function(field)
            {
                field.style.height = 'inherit';
    
                var computed = window.getComputedStyle(field);
                var height = parseInt(computed.getPropertyValue('border-top-width'), 10) 
                            + parseInt(computed.getPropertyValue('padding-top'), 10) 
                            + field.scrollHeight 
                            + parseInt(computed.getPropertyValue('padding-bottom'), 10) 
                            + parseInt(computed.getPropertyValue('border-bottom-width'), 10);
                field.style.height = height + 'px';
            };
    
            document.addEventListener('input', function (event) {
                if (event.target.tagName.toLowerCase() !== 'textarea') return;
                autoExpand(event.target);
            }, false);

            
            $('.form_message').on('submit', function()
            {
                if ($('#message').val().trim() == '')
                {
                    $('#message').val('').focus()
                    return false
                }
            });
        </script>
    <?php
    }
    else
        header('Location:'.BASEURL);
}
else
    header('Location:'.BASEURL.'connexion.html');