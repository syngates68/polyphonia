<h1>Les projets</h1>

<div class="message_presentation">
    <B>Polyphonia</B> a été crée avec comme objectif de fournir à ceux qui le souhaitent des idées de projets plus ou moins 
    longs à mettre en place afin de mettre en pratique les connaissances acquises dans un nouveau langage, de trouver une idée 
    pour un projet de fin d’études, ou bien simplement de passer le temps en le consacrant à la création d’un projet informatique.
</div>

<div class="recherche_projet">
    <input type="text" class="recherche" placeholder="Rechercher un projet">
</div>

<div class="pagination">
    <ul>
        <li class="actif">
            <a href="#">1</a>
        </li>
        <li>
            <a href="#">2</a>
        </li>
        <li>
            <a href="#">3</a>
        </li>
    </ul>
</div>

<div class="nbr_projets"><?= count_nbr_projets(); ?> projets</div>

<div class="liste_projets">
    <?php 
        $liste_projets = req_liste_projets();
        foreach($liste_projets as $projet) :
    ?>
    <div class="projet">
        <div class="image_projet">
            <img src="<?= BASEURL ?><?= $projet['illustration']; ?>">
        </div>
        <div class="corps_projet">
            <div class="titre_projet"><?= $projet['titre']; ?></div>
            <div class="description_projet">
                <?= extrait_texte($projet['contenu'], 710); ?>
            </div>
        </div>
        <div class="footer_projet">
            <div class="infos_projet">
                <div class="auteur_projet">
                    <img src="<?= BASEURL ?>assets/img/user.svg">
                    <div class="nom_auteur"><?= $projet['nom_utilisateur']; ?></div>
                </div>
                <div class="date_projet">
                    <img src="<?= BASEURL ?>assets/img/calendar.svg">
                    <div class="date"><?= formate_date($projet['date_ajout']); ?></div>
                </div>
            </div>
            <a href="<?= BASEURL ?>projet/<?= $projet['slug']; ?>.html" class="btn_lire_projet">Lire<img src="<?= BASEURL ?>assets/img/arrow_right.svg"></a>
        </div>
    </div>
    <?php
        endforeach; 
    ?>
</div>