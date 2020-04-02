/**
 * Permet de simuler le clic sur l'input file caché
 */
$(document).on('click', '.clickable', function()
{
    $('#illustration').click();
});

/**
 * Permet d'appeler la fonction de prévisualisation au changement de l'input file
 */
$(document).on('change', '#illustration', function()
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
$(document).on('keyup', 'input[name="nouveau_tag"]', function(e)
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
$(document).on('click', '.tags_container .tag', function()
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