/**
 * Permet d'envoyer les données du formulaire de suggestions de modification
 */
$('.form_modification form').submit(function()
{
    let email = $('.form_modification input[name="email"]').val()
    let suggestion = CKEDITOR.instances["suggestion"].getData();
    let captcha = (grecaptcha.getResponse() != '' && grecaptcha.getResponse() != null) ? grecaptcha.getResponse() : null;

    $.post(baseurl + 'inc/envoyer_modifications.php',
    {
        email: email,
        suggestion: suggestion,
        captcha: captcha
    },
    function()
    {
        location.reload()
    })

    return false;
});

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