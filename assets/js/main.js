$(document).on('click', '.projet .btn_lire_projet', function(){
    var id_projet = $(this).attr('projet')

    $.post(baseurl + 'inc/ajouter_vue.php',
    {
        id_projet : id_projet
    })
});

$(document).on('click', 'nav #dropdown', function(e)
{
    e.preventDefault();
    $('.dropdown').toggle('is_visible')
});