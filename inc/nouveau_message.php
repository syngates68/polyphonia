<?php
session_start();

include('../config/config.php');
include('../config/fonctions.php');
$utilisateurs =  req_liste_utilisateurs_actifs($_SESSION['utilisateur']);
?>
<div class="erreur" style="display:none;"></div>
<form>
    <div class="form_ligne">
        <label for="destinataire">Destinataire</label>
        <input type="text" id="destinataire">
        <span class="error_message">Cet utilisateur a été bloqué, votre message restera donc sans réponse jusqu'à ce qu'il soit débloqué</span>
    </div>
    <div class="form_ligne">
        <label for="message">Votre message</label>
        <textarea name="" id="message"></textarea>
    </div>
    <div class="ligne_button">
        <button type="button" id="emoji-button"><span class="material-icons">insert_emoticon</span></button>
        <button class="btn btn-blue" type="submit">Envoyer</button>
    </div>
</form>
<script>
    $(function() 
    {
        var availableTags = [
            <?php foreach ($utilisateurs as $utilisateur) : ?>
                {
                    value: "<?= $utilisateur['nom_utilisateur']; ?>",
                    image: "<?= BASEURL.$utilisateur['avatar']; ?>"
                },
            <?php endforeach; ?>
        ];

        availableTags.sort();

        $("#destinataire").autocomplete({
            source: availableTags
        })
        .data("ui-autocomplete")
        ._renderMenu = function(ul, items) 
        {
            var that = this;
            var val = that.element.val();
            $.each($.grep(items, function(value, key) 
            {
                return new RegExp(val.toLowerCase())
                    .test(value.value.toLowerCase().slice(0, val.length))
            }), 
            function(index, item) 
            {
                that._renderItem = function(ul, item)
                {
                    return $("<li><div><img src='"+item.image+"'><span>"+item.value+"</span></div></li>").appendTo(ul);
                }
                that._renderItemData(ul, item);
            });
        };
    });
</script>
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
</script>
<script>
    function isMobileDevice() { 
        if( navigator.userAgent.match(/iPhone/i)
        || navigator.userAgent.match(/webOS/i)
        || navigator.userAgent.match(/Android/i)
        || navigator.userAgent.match(/iPad/i)
        || navigator.userAgent.match(/iPod/i)
        || navigator.userAgent.match(/BlackBerry/i)
        || navigator.userAgent.match(/Windows Phone/i)
        )
        {
        return true;
        }
        else 
        {
        return false;
        }
    }

    if (isMobileDevice())
    {
        $('#emoji-button').hide()
    }
</script>