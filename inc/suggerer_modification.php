<?php
session_start();

include('../config/config.php');
include('../config/fonctions.php');
include('../config/captcha.php');
?>

<div class="form_modification">
    <form method="POST" action="../inc/envoyer_modifications.php">
        <div class="form_ligne">
            <label for="mail">Adresse mail</label>
            <input type="mail" id="mail" name="email" <?php if (isset($_SESSION['utilisateur'])) : ?> value="<?= req_utilisateur_by_id($_SESSION['utilisateur'])['email']; ?>" disabled <?php endif; ?> >
        </div>
        <div class="form_ligne">
            <label for="suggestion">Modification suggérée</label>
            <textarea name="suggestion" id="suggestion" style="height:200px"></textarea>
        </div>
        <?php if (!isset($_SESSION['utilisateur']) && !DEV) : ?>
            <div class="g-recaptcha" data-sitekey="<?= get_public_key(); ?>"></div>
        <?php endif; ?>
        <input type="hidden" value="<?php if (!isset($_SESSION['utilisateur']) && !DEV) : ?>1<?php else: ?>0<?php endif; ?>">
        <div class="button">
            <button class="btn btn-blue" type="submit" name="envoyer">Envoyer</button>
        </div>
        <div class="erreur" style="display:none"></div>
    </form>
</div>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script>
$('.form_modification form').submit(function() 
{ 
    let email = $('.bloc_suggerer_modifications input[name="email"]').val()
    let suggestion = $('.bloc_suggerer_modifications textarea').val()
    let has_captcha = $('.bloc_suggerer_modifications input[type="hidden"]').val()
    let captcha = null
    if (has_captcha == 1)
        captcha = (grecaptcha.getResponse() != '' && grecaptcha.getResponse() != null) ? grecaptcha.getResponse() : null
 
    $.post(baseurl + 'inc/envoyer_modifications.php', 
    { 
        email: email,
        suggestion: suggestion,
        captcha: captcha,
        has_captcha: has_captcha
    }, 
    function(data) 
    { 
        if (data != '') 
        { 
            $('.bloc_suggerer_modifications .erreur').slideDown().html(data)
        } 
        else 
        {
            location.reload()
        }
    })

    return false;
})
</script>