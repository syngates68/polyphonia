/**
 * Permet d'envoyer les données du formulaire de suggestions de modification
 */
/*$('.form_modification form').submit(function()
{
    let email = $('.form_modification input[name="email"]').val()
    let suggestion = CKEDITOR.instances["suggestion"].getData()
    let captcha = (grecaptcha.getResponse() != '' && grecaptcha.getResponse() != null) ? grecaptcha.getResponse() : null
    let nom_utilisateur = $('.form_modification input[name="nom_utilisateur"]').val()

    $.post(baseurl + 'inc/envoyer_modifications.php',
    {
        email: email,
        suggestion: suggestion,
        captcha: captcha,
        nom_utilisateur: nom_utilisateur
    },
    function()
    {
        location.reload()
    })

    return false;
});*/

$(document).on('click', '.suggerer_modifications', function()
{
    if ($('.bloc_suggerer_modifications').css('display') == 'none')
    {
        $.get(baseurl + 'inc/suggerer_modification.php', 
        {
    
        },
        function(data)
        {
            $('.bloc_suggerer_modifications').html(data)
            $('.bloc_suggerer_modifications').slideDown()
            $('.bloc_suggerer_modifications input[name="id_projet"]').val($('.bloc_suggerer_modifications').attr('projet'))
            //SmoothScroll vers le bloc
            var speed = 750
            $('html, body').animate( { scrollTop: $('.bloc_suggerer_modifications').offset().top }, speed )
            return false;
        })
    }
})

setTimeout(function() { $('.succes_vanishing').slideUp() }, 4000)

$(document).on('click', '.page_aide', function()
{
    location.href = $(this).attr('href')
})

$(document).on('click', '.suivre_projet', function()
{
    if (!$(this).hasClass('stop'))
    {
        $(this).html('<span class="material-icons">highlight_off</span>Ne plus suivre le projet').addClass('stop')
    }
    else
    {
        $(this).html('<span class="material-icons">favorite</span>Suivre le projet').removeClass('stop')
    }

    $.post(baseurl + 'inc/suivre_projet.php',
    {
        href : $(this).attr('href')
    },
    function(data)
    {
        if (data != '')
            location.href = baseurl + 'connexion.html'
    })
})