/**
 * Permet de simuler le clic sur l'input file caché
 */
$(document).on('click', '#change_avatar', function()
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

function preventDefault(e) {
    e.preventDefault();
      e.stopPropagation();
}

document.getElementById('change_avatar').addEventListener('dragenter', preventDefault, false)
document.getElementById('change_avatar').addEventListener('dragleave', preventDefault, false)
document.getElementById('change_avatar').addEventListener('dragover', preventDefault, false)
document.getElementById('change_avatar').addEventListener('drop', preventDefault, false)

function handleDrop(e) {
    var data = e.dataTransfer,
        files = data.files;
 
    handleFiles(files)     
}
 
document.getElementById('change_avatar').addEventListener('drop', handleDrop, false);

function handleFiles(files) {
	for (var i = 0, len = files.length; i < len; i++) {
		uploadImage(files[i]);
	}
}

function uploadImage(image)
{
    var fd = new FormData()
    var files = image
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
}