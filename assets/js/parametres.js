/**
 * Permet de simuler le clic sur l'input file caché
 */
$(document).on('click', '#modifier_avatar', function()
{
    $('input[name="avatar"]').click()
})

/**
 * Permet de mettre à jour l'avatar au changement de l'input file
 */
$(document).on('change', 'input[name="avatar"]', function()
{
    var fd = new FormData()
    var files = this.files[0]
    fd.append('file', files)

    $.ajax(
    {
        url: baseurl + 'inc/modifier_avatar.php',
        type: 'POST',
        data: fd,
        contentType: false,
        processData: false,
        success: function(data)
        {
            if (data != '')
                alert(data)
            else
                location.reload()
        }
    })
})

/**
 * Permet de rediriger ver la page de suppression du compte
 */
$(document).on('click', '.btn_supprimer_compte', function()
{
    window.location.href = baseurl + 'supprimer_compte.html'
})
