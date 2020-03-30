function req_liste_projets(page, recherche)
{
    $.post(baseurl + 'inc/liste_projets.php',
    {
        page : page,
        recherche : recherche
    },
    function(data)
    {
        $('.projets_container').html(data);
    });
}

$(document).on('submit', '.recherche_projet form', function()
{
    if ($('input[name="search"]').val().trim() == '')
    {
        $('input[name="search"]').val('')
        return false
    }
});

/*$(document).on('click', '.pagination li', function()
{
    req_liste_projets($(this).attr('page'), $('.recherche_projet input').val());
});

$(document).on('keyup', '.recherche_projet input', function()
{
    req_liste_projets(1, $(this).val());
});*/