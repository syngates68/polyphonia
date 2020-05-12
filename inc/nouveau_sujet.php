<form action="">
    <div class="form_ligne">
        <label for="sujet">Titre du sujet</label> 
        <input type="text" name="sujet" id="sujet">
    </div>
    <div class="form_ligne">
        <label for="contenu">Votre sujet</label>
        <textarea name="contenu" id="contenu"></textarea>
    </div>
    <button type="submit" class="btn btn-blue">Envoyer</button>
</form>

<script>
$('.nouveau_sujet form').submit(function()
{
    var titre = $('input[name="sujet"]').val()
    var contenu = $('textarea[name="contenu"]').val()

    $.post(baseurl + 'inc/ajouter_sujet.php',
    {
        titre : titre,
        contenu : contenu,
        id_projet : $('.aide input[name="id_projet"]').val()
    },
    function(data)
    {
        if (data != '')
            $('.aide .erreur_sujet').html(data).slideDown()
        else
        {
            $.post(baseurl + 'inc/aide_projet.php',
            {
                id_projet : $('input[name="id_projet"]').val()
            },
            function(data)
            {
                $('.contenu_page').html(data)
            })
        }
    })
    return false
})
</script>