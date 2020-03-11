<div class="jumbotron">
    <img src="<?= BASEURL; ?>assets/img/logo.png">
    <div class="message_presentation">
        <span class="gras">Polyphonia</span> a été crée avec comme objectif de fournir à ceux qui le souhaitent des idées de projets plus ou moins 
        longs à mettre en place afin de mettre en pratique les connaissances acquises dans un nouveau langage, de trouver une idée 
        pour un projet de fin d’études, ou bien simplement de passer le temps en le consacrant à la création d’un projet informatique.
    </div>
    <div class="recherche_projet">
        <input type="text" class="recherche" placeholder="Rechercher un projet">
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