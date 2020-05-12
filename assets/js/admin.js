/**
 * Permet de simuler le clic sur l'input file caché
 */
$(document).on('click', '.nouveau_projet #clickable', function()
{
    $('#illustration').click();
});

/**
 * Permet d'appeler la fonction de prévisualisation au changement de l'input file
 */
$(document).on('change', '.nouveau_projet #illustration', function()
{
    readURL(this);
});

/**
 * 
 * @param {*} input 
 * 
 * Permet de prévisualiser l'image avant upload
 */
function readURL(input){
    if (input.files && input.files[0]) {

        var url = input.value;
        var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();

        if (ext == "png" || ext == "jpeg" || ext == "jpg")
        { 
            var reader = new FileReader();
          
            reader.onload = function(e) {
                $.post(baseurl + 'inc/ajouter_image.php',
                {
                    src : e.target.result
                },
                function(data)
                {
                    $('.ajouter_image').html(data).addClass('has_image');
                });
            }
            
            reader.readAsDataURL(input.files[0]);
        }
        else
        {
            alert('Vous devez choisir une image au format .jpg, .png ou .jpeg');
        }
    }
}

/**
 * Permet d'afficher les boutons d'action
 */
$(document).on('click', '.tbl_contenu .tbl_actions .afficher_actions', function()
{

    /*$('.dropdown_menu').each(function()
    {
        if ($(this).css('display') != 'none')
            $(this).hide()
    })*/

    if ($('#' + $(this).attr('dropdown')).css('display') == 'none')
    {
        $('#' + $(this).attr('dropdown')).show()
        $(this).addClass('actif')
    }
    else
    {
        $('#' + $(this).attr('dropdown')).hide()
        $(this).removeClass('actif')
    }
});

/**
 * Permet de remettre un projet en brouillon
 */
$(document).on('click', '.tbl_contenu .tbl_actions .remettre_brouillon', function(e)
{
    e.preventDefault();
    var id = $(this).attr('projet');
    
    if (confirm('Êtes-vous sûr de vouloir remettre ce projet en brouillon?'))
    {
        $.post(baseurl + 'inc/remettre_brouillon.php',
        {
            id_projet : id
        },
        function(data)
        {
            alert(data);
            location.reload();
        });
    }
});

/**
 * Permet de supprimer un projet
 */
$(document).on('click', '.tbl_contenu .tbl_actions .supprimer', function(e)
{
    e.preventDefault();
    var id = $(this).attr('projet');
    var type = $(this).attr('type');
    
    if (confirm('Êtes-vous sûr de vouloir supprimer ce ' + type + '?'))
    {
        $.post(baseurl + 'inc/supprimer_projet.php',
        {
            id_projet : id,
            type : type
        },
        function(data)
        {
            alert(data);
            location.reload();
        });
    }
});

/**
 * Permet de rajouter des tags
 */
$(document).on('keyup', '.nouveau_projet input[name="nouveau_tag"]', function(e)
{
    if (e.key == ';' || e.code == 'Space')
    {
        var val = $(this).val().replace(';', '').replace(' ', '')
        $('.tags_container').append('<span class="tag">'+ val + '</span>')
        $('input[name="tags"]').val($('input[name="tags"]').val() + val + ';')
        $(this).val('')
    }
});

/**
 * Permet de supprimer des tags
 */
$(document).on('click', '.nouveau_projet .tags_container .tag', function()
{
    if (confirm("Supprimer ce tag?"))
    {
        $(this).hide()
        var value = $(this).html()
        var tags = $('input[name="tags"]').val().split(';')
        $('input[name="tags"]').val('')

        for (var i = 0; i < tags.length - 1; i++)
        {
            if (tags[i] != value)
                $('input[name="tags"]').val($('input[name="tags"]').val() + tags[i] + ';')
        }
    }
});

/**
 * Permet de générer un MDP aléatoirement
 */
$(document).on('click', '.nouvel_utilisateur .genere_mdp', function()
{
    $('input[name="pass"]').val('')
    
    var chars = "0123456789abcdefghijkmnopqrstuvwxyzABCDEFGHJKLMONPQRSTUVWXYZ"
    chars = chars.split('')
    var spec = "_*"
    spec = spec.split('')
    var rand = ""

    for (var i = 0; i < 9; i++)
    {
        if (i == 6)
            rand = rand + spec[getRandomIntInclusive(0, spec.length - 1)]
        else
            rand = rand + chars[getRandomIntInclusive(0, chars.length - 1)]
    }

    $('input[name="pass"]').val(rand)
});

/**
 * Permet de bloquer un utilisateur
 */
$(document).on('click', '.administration .bloquer_utilisateur', function(e)
{
    e.preventDefault()
    $('.modal_bloquer_utilisateur').show()
    $('.has_modal').addClass('is_visible')

    $(this).closest('.dropdown_menu').hide()
    $('.afficher_actions[dropdown="' + $(this).closest('.dropdown_menu').attr('id') + '"]').removeClass('actif')

    $.post(baseurl + 'inc/modal_bloquer_utilisateur.php',
    {
        id_utilisateur : $(this).attr('utilisateur')
    },
    function(data)
    {
        $('.modal_bloquer_utilisateur .modal_content').html('')
        $('.modal_bloquer_utilisateur .modal_content').append(data)
    });
})

$(document).on('click', '.valider_blocage', function()
{
    if (confirm("Confirmer le blocage de cet utilisateur?"))
    {
        $.post(baseurl + 'inc/bloquer_utilisateur.php',
        {
            id_utilisateur : $(this).attr('utilisateur'),
            bloque : 1,
            motif_blocage : $('#motif_blocage').val()
        },
        function(data)
        {
            alert(data);
            location.reload();
        });
    }
})

$(document).on('click', '.annuler_blocage', function()
{
    $('.modal_bloquer_utilisateur').hide()
    $('.has_modal').removeClass('is_visible')
})

/**
 * Permet de débloquer un utilisateur
 */
$(document).on('click', '.administration .debloquer_utilisateur', function(e)
{
    e.preventDefault()
    if (confirm("Confirmer le déblocage de cet utilisateur?"))
    {
        $.post(baseurl + 'inc/bloquer_utilisateur.php',
        {
            id_utilisateur : $(this).attr('utilisateur'),
            bloque : 0,
            motif_blocage : null
        },
        function(data)
        {
            alert(data);
            location.reload();
        });
    }
})

$(document).on('click', '.administration .fiche_utilisateur', function(e)
{
    e.preventDefault()
    $('.modal_fiche_utilisateur').show()
    $('.has_modal').addClass('is_visible')

    $(this).closest('.dropdown_menu').hide()
    $('.afficher_actions[dropdown="' + $(this).closest('.dropdown_menu').attr('id') + '"]').removeClass('actif')

    $.post(baseurl + 'inc/fiche_utilisateur.php',
    {
        id_utilisateur : $(this).attr('utilisateur')
    },
    function(data)
    {
        $('.modal_fiche_utilisateur').html('')
        $('.modal_fiche_utilisateur').append(data)
    });
})

$(document).on('click', '.fermer', function()
{
    $('.modal_fiche_utilisateur').hide()
    $('.has_modal').removeClass('is_visible')
})

/**
 * Permet d'obtenir un nombre aléatoire
 */

function getRandomIntInclusive(min, max) {
    min = Math.ceil(min);
    max = Math.floor(max);
    return Math.floor(Math.random() * (max - min +1)) + min;
}