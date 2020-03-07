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
        <?php include('./inc/formulaire_projet.php'); ?>
    </form>
</div>

<script src="<?= BASEURL; ?>assets/js/admin.js"></script>
<script>
    CKEDITOR.replace('contenu');
</script>