<?php 

$titre = null;
$illustration = null;
$contenu = null;
$btn = "Ajouter";
$btn_name = "ajouter_projet";

if (isset($_SESSION['id_projet']))
{
    $projet = req_by_id($_SESSION['id_projet']);

    $titre = $projet['titre'];
    $illustration = $projet['illustration'];
    $contenu = $projet['contenu'];
    $btn = "Modifier";
    $btn_name = "editer_projet";
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
        <img src="<?= BASEURL.$illustration; ?>">
    <?php else : ?>
        <img src="<?= BASEURL; ?>assets/img/photo.svg" class="icon" onclick="$('#illustration').click()">
        <input type="file" id="illustration" name="illustration" style="display:none;">
    <?php endif; ?>
    </div>
</div>
<label>Contenu</label>
<textarea name="contenu" id="contenu"><?= $contenu; ?></textarea>
<button type="submit" name="<?= $btn_name; ?>"><?= $btn; ?></button>

<?php unset($_SESSION['id_projet']); ?>