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