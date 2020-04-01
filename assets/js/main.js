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

$(document).ready(function()
{
    var hauteur = $('nav').css('height')

    $('.site_content').css('padding-top', hauteur)
    $('.dropdown').css('top', $('nav').css('height'))
});

$(window).on('resize', function()
{
    var hauteur = $('nav').css('height')

    $('.site_content').css('padding-top', hauteur)
    $('.dropdown').css('top', $('nav').css('height'))
});

$(document).on('click', 'nav .menu_mobile', function()
{
    $('nav .nav_liens').toggleClass('is_visible')
});

$(document).on('focus', '.form_ligne input', function()
{
    $('label[for="' + $(this).attr('id') + '"]').addClass('actif')
});

$(document).on('focusout', '.form_ligne input', function()
{
    $('label[for="' + $(this).attr('id') + '"]').removeClass('actif')
});