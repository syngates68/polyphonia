<?php
include('../config/config.php');
include('../config/fonctions.php');
?>

<h2>Bloquer <?= req_utilisateur_by_id($_GET['id_utilisateur'])['nom_utilisateur']; ?></h2>
<p>Vous êtes sur le point de bloquer le compte de cet utilisateur.</p><br/>
<p>Veuillez indiquer ci-dessous le motif de blocage. Une fois validé, l'utilisateur concerné sera bloqué du site.</p><br/>
<form class="form_bloquer_utilisateur">
    <input type="hidden" name="utilisateur" value="<?= $_GET['id_utilisateur']; ?>">
    <div class="form_ligne">
        <label for="motif_blocage">Motif</label>
        <textarea name="motif_blocage" id="motif_blocage"></textarea>
    </div>
    <button class="btn btn-outline-blue" type="submit">Valider</button>
</form>

<script>
    $('.form_bloquer_utilisateur').submit(function()
    {
        $.post(baseurl + 'inc/valider_blocage.php',
        {
            id_utilisateur : $('input[name="utilisateur"]').val(),
            bloque : 1,
            motif_blocage : $('textarea[name="motif_blocage"]').val()
        },
        function(data)
        {
            if (data != '')
                alert(data)
            else
                location.reload()
        })
        return false
    })
</script>