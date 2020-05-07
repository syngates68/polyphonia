$(document).on('click', '.btn-nouveau-message', function()
{
    if ($('.formulaire_nouveau_message').css('display') == 'none')
    {
        $.get(baseurl + 'inc/nouveau_message.php',
        {
    
        },
        function(data)
        {
            $('.formulaire_nouveau_message').html(data).slideDown()
        })
    }
})

$('.formulaire_nouveau_message').submit(function()
{
    var destinataire = $('#destinataire').val()
    var message = $('#message').val()

    $.post(baseurl + 'inc/envoyer_nouveau_message.php',
    {
        destinataire : destinataire,
        message : message
    },
    function(data)
    {
        if (data != '')
            $('.formulaire_nouveau_message .erreur').html(data).slideDown()
        else
            location.href = baseurl + 'message/' + destinataire + '.html'
    })
    return false
})

$(document).on('change', '.formulaire_nouveau_message #destinataire', function()
{
    $('.formulaire_nouveau_message .error_message').hide()

    $.post(baseurl + 'inc/verifier_utilisateur.php',
    {
        nom_utilisateur : $(this).val()
    },
    function(data)
    {
        if (data == '0')
            $('.formulaire_nouveau_message .error_message').show()
    })
})