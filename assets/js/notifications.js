$(document).on('click', '.mes_notifications a', function(e)
{
    e.preventDefault()
    var href = $(this).attr('href')
    var id_notif = $(this).attr('id').replace('lien_', '')

    $.post(baseurl + 'inc/notification_lu.php',
    {
        id_notif : id_notif
    },
    function()
    {
        location.href = href
    })
})