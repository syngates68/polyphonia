<?php $page_title = $_GET['search']; ?>
<div class="container">

    <p>Résultats de recherche pour : <?= htmlentities($_GET['search']); ?></p>
    <input type="hidden" name="recherche" value="<?= htmlentities($_GET['search']); ?>">
    <div class="projets_container"></div>
    <script src="<?= BASEURL; ?>assets/js/projets.js"></script>
    <script>
        $(document).ready(function()
        {
            req_liste_projets(1, "<?= htmlentities($_GET['search']); ?>");
        });
    </script>
</div>