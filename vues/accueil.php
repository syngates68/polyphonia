<div class="jumbotron">
    <img src="<?= BASEURL; ?>assets/img/logo_orange.png">
    <div class="message_presentation">
        <div>
            <span class="surbrillance">A court d'idées?</span>
        </div>
        <p>Trouvez des idées de projets faits pour vous.</p>
        <p>Et augmentez vos connaissances en pratiquant.</p>
    </div>
    <div class="recherche_projet">
        <form method="GET" action="<?= BASEURL ?>recherche/">
            <input type="text" class="recherche" name="search" placeholder="Rechercher un projet">
            <button type="submit"><span class="material-icons">search</span></button>
        </form>
    </div>
</div>

<div class="container">

    <h1>Les projets</h1>

    <div class="projets_container"></div>

    <script src="<?= BASEURL; ?>assets/js/projets.js"></script>
    <script>
        $(document).ready(function()
        {
            req_liste_projets(1, null);
        });
    </script>
</div>