document.onclick = function(event)
{
    if (!event.target.matches('.afficher_actions')) 
    {
        var dropdowns = document.getElementsByClassName("dropdown_menu");
        var i;
        for (i = 0; i < dropdowns.length; i++) 
        {
            var openDropdown = dropdowns[i];
            var id = openDropdown.getAttribute('id')
            if (openDropdown.classList.contains('show'))
            {
                openDropdown.classList.remove('show')
                document.querySelector("[dropdown='" + id + "']").classList.remove('actif')
            }
        }
    }
    else
    {
        var dropdowns = document.getElementsByClassName("dropdown_menu");
        var id_dropdown = event.target.getAttribute('dropdown')

        var i;
        for (i = 0; i < dropdowns.length; i++) 
        {
            var openDropdown = dropdowns[i];
            var id = openDropdown.getAttribute('id')
            if (openDropdown.classList.contains('show') && id != id_dropdown)
            {
                openDropdown.classList.remove('show')
                document.querySelector("[dropdown='" + id + "']").classList.remove('actif')
            }
        }
    }
}

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

    if (!$('#' + $(this).attr('dropdown')).hasClass('show'))
    {
        $('#' + $(this).attr('dropdown')).addClass('show')
        $(this).addClass('actif')
    }
    else
    {
        $('#' + $(this).attr('dropdown')).removeClass('show')
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
/*$(document).on('click', '.administration .bloquer_utilisateur', function(e)
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
})*/


/**
 * Permet de débloquer un utilisateur
 */
$(document).on('click', '.administration .debloquer_utilisateur', function(e)
{
    e.preventDefault()
    if (confirm("Confirmer le déblocage de cet utilisateur?"))
    {
        $.post(baseurl + 'inc/valider_blocage.php',
        {
            id_utilisateur : $(this).attr('utilisateur'),
            bloque : 0,
            motif_blocage : null
        },
        function()
        {
            location.reload()
        })
    }
})

$(document).on('click', '.administration .fiche_utilisateur', function(e)
{
    e.preventDefault()
    this.blur()
    $.get(this.href, function(html) 
    {
        $(html).appendTo('modal_fiche_utilisateur').modal();
    })
})

$(document).on('change', 'select[name="rang"]', function()
{
    $.post(baseurl + 'inc/changer_rang.php',
    {
        id_utilisateur : $('input[name="utilisateur"]').val(),
        id_droit : $(this).val()
    },
    function()
    {
        location.reload()
    })
})

/**
 * Permet d'obtenir un nombre aléatoire
 */

function getRandomIntInclusive(min, max) {
    min = Math.ceil(min);
    max = Math.floor(max);
    return Math.floor(Math.random() * (max - min +1)) + min;
}

/* GESTION DES PROJETS */
function charge_liste_projets(titre, tri)
{
    $.post(baseurl + 'inc/admin_liste_projets.php',
    {
        titre : titre,
        tri : tri
    },
    function(data)
    {
        $('.administration .tbl_projets').html(data)
    })
}

$(document).on('keyup', '.administration #titre_projet', function()
{
    charge_liste_projets($(this).val(), $('.administration #tri').val())
})

$(document).on('change', '.administration #tri', function()
{
    charge_liste_projets($('.administration #titre_projet').val(), $(this).val())
})

/* GESTION DES UTILISATEURS */
function charge_liste_utilisateurs(nom_utilisateur)
{
    $.post(baseurl + 'inc/admin_liste_utilisateurs.php',
    {
        nom_utilisateur : nom_utilisateur
    },
    function(data)
    {
        $('.administration .tbl_utilisateurs').html(data)
    })
}

$(document).on('keyup', '.administration #nom_utilisateur', function()
{
    charge_liste_utilisateurs($(this).val())
})

//Afficher un(e) sujet/réponse signalé(e)
$(document).on('click', '.liste_signalements .voir', function()
{
    var id_signalement = $(this).attr('id').replace('voir_', '')
    if (!$(this).hasClass('masquer'))
    {
        $('.signalement_contenu').each(function()
        {
            $(this).slideUp()
            $('#voir_' + $(this).attr('id').replace('signalement_contenu_', '')).removeClass('masquer')
        })
        $('#signalement_contenu_' + id_signalement).slideDown()
        $(this).addClass('masquer')
    }
    else
    {
        $('#signalement_contenu_' + id_signalement).slideUp()
        $(this).removeClass('masquer')
    }
})

//Gestion des signalements
$(document).on('click', '.liste_signalements .is_lu', function()
{
    if (confirm("Ne pas donner suite à ce signalement?"))
    {
        $.post(baseurl + 'inc/signalement_lu.php',
        {
            id_signalement : $(this).attr('id').replace('is_lu_', '')
        },
        function()
        {
            location.reload()
        })
    }
})

$(document).on('click', '.liste_signalements .valid, .liste_signalements .invalid', function()
{
    var valid = $(this).attr('valid')
    if (valid == 1)
        var id_signalement = $(this).attr('id').replace('valid_', '')
    else
        var id_signalement = $(this).attr('id').replace('invalid_', '')

    var id_utilisateur = $(this).attr('user')

    $.post(baseurl + 'inc/signalement_reponse.php',
    {
        valid : valid,
        id_signalement : id_signalement,
        id_utilisateur : id_utilisateur
    },
    function()
    {
        alert("L'utilisateur a bien été notifié du traitement de son signalement.")
        location.reload()
    })
})