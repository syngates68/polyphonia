$('.sujet_container form').submit(function()
{
    var reponse = CKEDITOR.instances['reponse'].getData()
    var id_utilisateur = $('input[name="utilisateur"]').val()
    var id_sujet = $('input[name="sujet"]').val()

    $.post(baseurl + 'inc/reponse_sujet.php',
    {
        reponse : reponse,
        id_utilisateur : id_utilisateur,
        id_sujet : id_sujet
    },
    function(data)
    {
        if (data != '')
            $('.form_reponse .erreur').html(data).slideDown()
        else
            location.reload()
    })

    return false;
})