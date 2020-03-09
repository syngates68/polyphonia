function req_liste_projets(page)
{
    $.post(baseurl + 'inc/liste_projets.php',
    {
        page : page
    },
    function(data)
    {
        $('.projets_container').html(data);
    });
}

$(document).on('click', '.pagination li', function()
{
    req_liste_projets($(this).attr('page'));
});