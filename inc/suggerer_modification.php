<?php
session_start();

include('../config/config.php');
include('../config/fonctions.php');
include('../config/captcha.php');
?>

<div class="form_modification">
    <form method="POST" action="../inc/envoyer_modifications.php">
        <input type="hidden" name="id_projet">
        <div class="form_ligne">
            <label for="mail">Adresse mail</label>
            <input type="mail" id="mail" name="email" <?php if (isset($_SESSION['utilisateur'])) : ?> value="<?= req_utilisateur_by_id($_SESSION['utilisateur'])['email']; ?>" disabled <?php endif; ?> >
        </div>
        <?php if (!isset($_SESSION['utilisateur'])) : ?>
            <div class="form_ligne">
                <label for="nom_utilisateur">Nom d'utilisateur</label>
                <input type="text" id="nom_utilisateur" name="nom_utilisateur">
                <span class="explication">Ce nom apparaîtra sur la page du projet en cas de prise en compte de la modification</span>
            </div>
        <?php else : ?>
            <input type="hidden" id="nom_utilisateur" name="nom_utilisateur" value="<?= req_utilisateur_by_id($_SESSION['utilisateur'])['nom_utilisateur']; ?>">
        <?php endif; ?>
        <div class="form_ligne">
            <label for="suggestion">Modification suggérée</label>
            <textarea name="suggestion" id="suggestion" style="height:200px"></textarea>
        </div>
        <?php if (!isset($_SESSION['utilisateur']) && !DEV) : ?>
            <div class="g-recaptcha" data-sitekey="<?= get_public_key(); ?>"></div>
        <?php endif; ?>
        <input type="hidden" name="has_captcha" value="<?php if (!isset($_SESSION['utilisateur']) && !DEV) : ?>1<?php else: ?>0<?php endif; ?>">
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
    let has_captcha = $('.bloc_suggerer_modifications input[name="has_captcha"]').val()
    let captcha = null
    let nom_utilisateur = $('.bloc_suggerer_modifications input[name="nom_utilisateur"]').val()
    let id_projet = $('.bloc_suggerer_modifications input[name="id_projet"]').val()
    
    if (has_captcha == 1)
        captcha = (grecaptcha.getResponse() != '' && grecaptcha.getResponse() != null) ? grecaptcha.getResponse() : null
 
    $.post(baseurl + 'inc/envoyer_modifications.php', 
    { 
        email: email,
        suggestion: suggestion,
        captcha: captcha,
        has_captcha: has_captcha,
        nom_utilisateur: nom_utilisateur,
        id_projet: id_projet
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