/**
 * 
 * @param {*} page 
 * @param {*} recherche 
 * 
 * Permet de récupérer la liste des projets selon la page et la recherche
 */
function req_liste_projets(page, recherche)
{
    $('.loader').show()
    $.post(baseurl + 'inc/liste_projets.php',
    {
        page : page,
        recherche : recherche
    },
    function(data)
    {
        $('.projets_container').html(data)
        $('.loader').hide()
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

$(document).on('click', '.pagination li', function(e)
{
    e.preventDefault()
    var recherche = null
    if ($('input[name="recherche"]').val() != null && $('input[name="recherche"]').val() != undefined)
        recherche = $('input[name="recherche"]').val()
    req_liste_projets($(this).attr('page'), recherche);
});