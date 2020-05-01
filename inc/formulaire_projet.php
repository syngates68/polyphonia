<?php 

$titre = null;
$illustration = null;
$contenu = null;
$nom_photographe = null;
$lien_photo = null;
$tags = null;
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
    $nom_photographe = $projet['nom_photographe'];
    $lien_photo = $projet['lien_photo'];
    $tags = $projet['tags'];

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

<div class="formulaire">
    <div class="bloc_formulaire gauche">
        <div class="form_ligne">
            <label>Titre</label>
            <input type="text" name="titre" value="<?= $titre; ?>">
        </div>
        <div class="form_ligne">
            <label>Illustration</label>
            <div class="ajouter_image_container">
                <div class="ajouter_image <?php if ($illustration != null) : ?>has_image<?php endif; ?>">
                <?php if ($illustration != null) : ?>
                    <img src="<?= BASEURL.$illustration; ?>" onclick="$('#illustration').click()">
                <?php else : ?>
                    <div class="btn_ajouter_image" onclick="$('#illustration').click()">
                        <i class="material-icons">photo</i>
                        <p>Cliquer pour ajouter une image</p>
                    </div>
                <?php endif; ?>
                </div>
            </div>
            <input type="file" id="illustration" name="illustration" style="display:none;">
        </div>
        <div class="group_form_ligne">
            <div class="form_ligne">
                <label>Nom du photographe</label>
                <input type="text" name="nom_photographe" value="<?= $nom_photographe; ?>">
            </div>
            <div class="form_ligne">
                <label>Lien de la photo</label>
                <input type="text" name="lien_photo" value="<?= $lien_photo; ?>">
            </div>
        </div>
        <div class="form_ligne">
            <label>Tags</label>
            <div class="tags_container">
                <?php 
                    $exp = explode(';', $tags); 
                    if (sizeof($exp) > 0) :
                        for ($i = 0; $i < sizeof($exp) - 1; $i++) :
                ?>
                    <span class="tag"><?= $exp[$i]; ?></span>
                <?php
                        endfor;
                    endif;
                ?>
            </div>
            <input type="text" name="nouveau_tag" placeholder="Ajouter un tag">
            <input type="hidden" name="tags" value="<?= $tags; ?>">
        </div>
        <div class="form_ligne">
            <label>Fichiers joints (facultatif) <span class="ajouter_fichier">Ajouter</span></label>
            <div class="inputs_file"></div>
        </div>
    </div>
    <div class="bloc_formulaire droite">
        <label>Contenu</label>
        <textarea name="contenu" id="contenu"><?= $contenu; ?></textarea>
    </div>
</div>

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

<script>
    CKEDITOR.replace('contenu', {
        height: 500
    });
</script>

<?php
unset($_SESSION['id_projet']);
unset($_SESSION['modification']);