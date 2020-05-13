$('.sujet_container form').submit(function()
{
    var reponse = CKEDITOR.instances['reponse'].getData()
    var id_utilisateur = $('input[name="utilisateur"]').val()
    var id_sujet = $('input[name="sujet"]').val()
    var id_posteur = $('input[name="posteur"]').val()

    $.post(baseurl + 'inc/reponse_sujet.php',
    {
        reponse : reponse,
        id_utilisateur : id_utilisateur,
        id_sujet : id_sujet,
        id_posteur : id_posteur
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

$(document).on('click', '.sujet_resolu', function()
{
    var id_sujet = $(this).attr('sujet')

    $.post(baseurl + 'inc/sujet_resolu.php',
    {
        id_sujet : id_sujet,
        resolu : 1
    },
    function()
    {
        location.reload()
    })
})

$(document).on('click', '.sujet_non_resolu', function()
{
    var id_sujet = $(this).attr('sujet')

    $.post(baseurl + 'inc/sujet_resolu.php',
    {
        id_sujet : id_sujet,
        resolu : 0
    },
    function()
    {
        location.reload()
    })
})

$(document).on('click', '.good', function()
{
    var id_reponse = $(this).attr('id').replace('good_', '')
    var is_delete = 0
    var is_add = 0

    if ($(this).hasClass('actif'))
    {
        $(this).removeClass('actif')
        $('#note_' + id_reponse).text(parseInt($('#note_' + id_reponse).text()) - 1)
        is_delete = 1
    }
    else if ($('#bad_' + id_reponse).hasClass('actif'))
    {
        $('#bad_' + id_reponse).removeClass('actif')
        $(this).addClass('actif')
        $('#note_' + id_reponse).text(parseInt($('#note_' + id_reponse).text()) + 2)
        is_delete = 1
        is_add = 1
    }
    else
    {
        $(this).addClass('actif')
        $('#note_' + id_reponse).text(parseInt($('#note_' + id_reponse).text()) + 1)
        is_add = 1
    }

    $.post(baseurl + 'inc/ajouter_note.php',
    {
        is_delete : is_delete,
        is_add : is_add,
        note : '1',
        id_reponse : id_reponse
    })
})

$(document).on('click', '.bad', function()
{
    var id_reponse = $(this).attr('id').replace('bad_', '')
    var is_delete = 0
    var is_add = 0

    if ($(this).hasClass('actif'))
    {
        $(this).removeClass('actif')
        $('#note_' + id_reponse).text(parseInt($('#note_' + id_reponse).text()) + 1)
        is_delete = 1
    }
    else if ($('#good_' + id_reponse).hasClass('actif'))
    {
        $('#good_' + id_reponse).removeClass('actif')
        $(this).addClass('actif')
        $('#note_' + id_reponse).text(parseInt($('#note_' + id_reponse).text()) - 2)
        is_delete = 1
        is_add = 1
    }
    else
    {
        $(this).addClass('actif')
        $('#note_' + id_reponse).text(parseInt($('#note_' + id_reponse).text()) - 1)
        is_add = 1
    }

    $.post(baseurl + 'inc/ajouter_note.php',
    {
        is_delete : is_delete,
        is_add : is_add,
        note : '-1',
        id_reponse : id_reponse
    })
})