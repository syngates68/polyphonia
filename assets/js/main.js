/**
 * Permet d'ajouter une vue à chaque clic sur un projet
 */
$(document).on('click', '.projet .btn_lire_projet', function(){
    var id_projet = $(this).attr('projet')

    $.post(baseurl + 'inc/ajouter_vue.php',
    {
        id_projet : id_projet
    })
});

/**
 * Permet d'ouvrir/fermer le dropdown
 */
$(document).on('click', 'nav #dropdown', function(e)
{
    e.preventDefault()
    $('.dropdown').toggle('is_visible')
});

/**
 * Permet de placer le dropdown selon la hauteur de la barre de navigation
 */
$(document).ready(function()
{
    var hauteur = $('nav').css('height')

    $('.site_content').css('padding-top', hauteur)
    $('.dropdown').css('top', $('nav').css('height'))
});

/**
 * Permet de replacer le dropdown au redimensionnement de la fenêtre
 */
$(window).on('resize', function()
{
    var hauteur = $('nav').css('height')

    $('.site_content').css('padding-top', hauteur)
    $('.dropdown').css('top', $('nav').css('height'))
});

/**
 * Permet d'afficher le menu mobile au clic sur le menu hamburger
 */
$(document).on('click', 'nav .menu_mobile', function()
{
    $('nav .nav_liens').toggleClass('is_visible')
});

/**
 * Permet de mettre le label en couleur lors du focus sur un input
 */
$(document).on('focus', '.form_ligne input', function()
{
    if ($(this).attr('type') != 'radio' && $(this).attr('type') != 'checkbox')
        $('label[for="' + $(this).attr('id') + '"]').addClass('actif')
});

/**
 * Permet de retirer la couleur du label lorsque l'input perd le focus
 */
$(document).on('focusout', '.form_ligne input', function()
{
    $('label[for="' + $(this).attr('id') + '"]').removeClass('actif')
});