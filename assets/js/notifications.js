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

$(document).on('click', '.mes_notifications .marquer_lu', function()
{
    if ($('.non_lu').length > 0)
    {
        var i = 0
        var id_notif = ''

        $('.non_lu').each(function()
        {
            id_notif = id_notif + $(this).attr('id').replace('notification_', '')

            if (i != $('.non_lu').length - 1)
                id_notif = id_notif + ';'

            i = i + 1
        })

        $.post(baseurl + 'inc/notification_lu.php',
        {
            id_notif : id_notif
        },
        function()
        {
            location.reload()
        })
    }
})