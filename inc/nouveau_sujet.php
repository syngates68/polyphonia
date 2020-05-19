<form action="">
    <div class="form_ligne">
        <label for="sujet">Titre du sujet</label> 
        <input type="text" name="sujet" id="sujet">
    </div>
    <div class="form_ligne">
        <label for="contenu">Votre sujet</label>
        <textarea name="contenu" id="contenu"></textarea>
    </div>
    <div class="button_ligne">
        <button type="submit" class="btn btn-blue">Envoyer</button>
    </div>
</form>

<script>
    CKEDITOR.replace('contenu', {
        height: 200
    });
</script>
<script>
$('.nouveau_sujet form').submit(function()
{
    var titre = $('input[name="sujet"]').val()
    var contenu = CKEDITOR.instances['contenu'].getData()

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
            location.reload()
        }
    })
    return false
})
</script>