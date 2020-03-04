<h1>Ajouter un nouveau projet</h1>

<div class="nouveau_projet">

    <?php 
    //Message d'erreur
    if (isset($_SESSION['erreur'])) : 
    ?>
        <div class="erreur"><?= $_SESSION['erreur']; ?></div>
    <?php
    unset($_SESSION['erreur']); 
    endif;

    //Message de succès
    if (isset($_SESSION['succes'])) : 
    ?>
        <div class="succes"><?= $_SESSION['succes']; ?></div>
    <?php
    unset($_SESSION['succes']); 
    endif;
    ?>

    <form method="POST" action="./inc/verifier_projet.php" enctype="multipart/form-data">
        <div class="form_ligne">
            <label>Titre</label>
            <input type="text" name="titre">
        </div>
        <div class="form_ligne">
            <label>Illustration</label>
            <div class="ajouter_image">
                <img src="<?= BASEURL; ?>assets/img/photo.svg" class="icon" onclick="$('#illustration').click()">
            </div>
            <input type="file" id="illustration" name="illustration" style="display:none;">
        </div>
        <label>Contenu</label>
        <textarea name="contenu" id="contenu"></textarea>
        <button type="submit" name="ajouter_projet">Ajouter</button>
    </form>
</div>

<script src="<?= BASEURL; ?>assets/js/admin.js"></script>
<script>
    CKEDITOR.replace('contenu');
</script>