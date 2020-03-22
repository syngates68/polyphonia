$(document).on('click', '#suggerer_modifications', function(e){
    e.preventDefault()
    $('.modal_suggerer_modifications').addClass('is_visible')
    $('body').css('overflow', 'hidden')
    $('.has_modal').addClass('is_visible')
});

$(document).on('click', '.has_modal, .close_modal', function(){
    $('.modal_suggerer_modifications').removeClass('is_visible')
    $('body').css('overflow', 'auto')
    $('.has_modal').removeClass('is_visible')
});

$('.modal_suggerer_modifications form').submit(function()
{
    let nom_utilisateur = $('.modal_suggerer_modifications input[name="nom_utilisateur"]').val()
    let email = $('.modal_suggerer_modifications input[name="email"]').val()
    let suggestion = CKEDITOR.instances["suggestion"].getData();
    let captcha = (grecaptcha.getResponse() != '' && grecaptcha.getResponse() != null) ? grecaptcha.getResponse() : null;

    $.post(baseurl + 'inc/envoyer_modifications.php',
    {
        nom_utilisateur: nom_utilisateur,
        email: email,
        suggestion: suggestion,
        captcha: captcha
    },
    function(data)
    {
        if (data != '')
        {
            $('.modal_suggerer_modifications .erreur').show().html(data)
        }
        else
            location.reload()
    })

    return false;
});