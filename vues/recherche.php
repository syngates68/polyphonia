<div class="container">

    <p>Résultats de recherche pour : <?= $_GET['search']; ?></p>

    <div class="projets_container"></div>
    <script src="<?= BASEURL; ?>assets/js/projets.js"></script>
    <script>
        $(document).ready(function()
        {
            req_liste_projets(1, "<?= $_GET['search']; ?>");
        });
    </script>
</div>