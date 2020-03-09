<?php 
include('../config/config.php');
include('../config/fonctions.php');

$nbr_pages = req_nbr_pages(9); 
?>

<div class="pagination">
    <ul>
        <?php for ($i = 0; $i < $nbr_pages; $i++) : ?>
        <li page="<?= $i + 1; ?>" <?php if ($i + 1 == $_POST['page']) : ?> class="actif" <?php endif; ?>>
            <a href="#"><?= $i + 1; ?></a>
        </li>
        <?php endfor; ?>
    </ul>
</div>

<div class="nbr_projets"><?= count_nbr_projets(); ?> projets</div>

<div class="liste_projets">
    <?php 
        $liste_projets = req_liste_projets($_POST['page'], 9);
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
            <a href="<?= BASEURL ?>projet/<?= $projet['slug']; ?>.html" projet="<?= $projet['id_projet']; ?>" class="btn_lire_projet">Lire</a>
        </div>
    </div>
    <?php
        endforeach; 
    ?>
</div>