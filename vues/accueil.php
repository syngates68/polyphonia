<h1>Les projets</h1>

<div class="message_presentation">
    <B>Polyphonia</B> a été crée avec comme objectif de fournir à ceux qui le souhaitent des idées de projets plus ou moins 
    longs à mettre en place afin de mettre en pratique les connaissances acquises dans un nouveau langage, de trouver une idée 
    pour un projet de fin d’études, ou bien simplement de passer le temps en le consacrant à la création d’un projet informatique.
</div>

<div class="recherche_projet">
    <input type="text" class="recherche" placeholder="Rechercher un projet">
</div>

<div class="projets_container"></div>

<script src="<?= BASEURL; ?>assets/js/projets.js"></script>
<script>
    $(document).ready(function()
    {
        req_liste_projets(1);
    });
</script>