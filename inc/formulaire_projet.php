<?php 

$titre = null;
$illustration = null;
$contenu = null;
$btn = "Ajouter";
$btn_name = "ajouter_projet";
$btn_brouillon = "Enregistrer en brouillon";
$btn_brouillon_name = "enregistrer_brouillon";

if (isset($_SESSION['id_projet']))
{
    $projet = req_by_id($_SESSION['id_projet']);

    $titre = $projet['titre'];
    $illustration = $projet['illustration'];
    $contenu = $projet['contenu'];

    /* Edition d'un projet */
    if (isset($_SESSION['modification']))
    {
        $btn = "Modifier";
        $btn_name = "editer_projet";
    }
    /* Brouillon */
    else
    {
        $btn_name = "valider_brouillon";
        $btn_brouillon = "Enregistrer les modifications";
        $btn_brouillon_name = "enregistrer_modifications";
    }
}

?>

<div class="form_ligne">
    <label>Titre</label>
    <input type="text" name="titre" value="<?= $titre; ?>">
</div>
<div class="form_ligne">
    <label>Illustration</label>
    <div class="ajouter_image">
    <?php if ($illustration != null) : ?>
        <img src="<?= BASEURL.$illustration; ?>" onclick="$('#illustration').click()">
    <?php else : ?>
        <div class="btn_ajouter_image" onclick="$('#illustration').click()">
            <i class="material-icons">photo</i>
            <p>Cliquer pour ajouter une image</p>
        </div>
    <?php endif; ?>
    </div>
    <input type="file" id="illustration" name="illustration" style="display:none;">
</div>
<label>Contenu</label>
<textarea name="contenu" id="contenu"><?= $contenu; ?></textarea>
<div class="form_footer">
    <button type="submit" name="<?= $btn_name; ?>"><?= $btn; ?></button>

    <?php 
    if (!isset($_SESSION['modification'])) : 
    ?>
        <button type="submit" name="<?= $btn_brouillon_name; ?>" class="btn_enregistrer_brouillon"><?= $btn_brouillon; ?></button>
    <?php 
    endif;
    ?>

</div>

<script src="<?= BASEURL; ?>assets/js/admin.js"></script>
<script>
    CKEDITOR.replace('contenu', {
        height: 500
    });
</script>

<?php
unset($_SESSION['id_projet']);
unset($_SESSION['modification']);