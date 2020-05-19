<?php 
include('../config/config.php');
include('../config/fonctions.php');

$nbr_pages = req_nbr_pages(12, $_POST['recherche']);
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

<div class="nbr_projets"><?= count_nbr_projets($_POST['recherche']); ?> projet<?php if (count_nbr_projets($_POST['recherche']) > 1) : ?>s<?php endif; ?></div>

<div class="liste_projets">
    <?php 
        $liste_projets = req_liste_projets($_POST['page'], 12, false, $_POST['recherche']);
        foreach($liste_projets as $projet) :
    ?>
    <div class="projet">
        <a href="<?= BASEURL; ?>projet/<?= $projet['slug'].'-'.$projet['id_projet']; ?>.html" class="btn_lire_projet" projet="<?= $projet['id_projet']; ?>">
            <div class="image_projet">
                <img src="<?= BASEURL ?><?= $projet['illustration']; ?>">
            </div>
        </a>
        <div class="corps_projet">
            <div class="titre_projet"><a href="<?= BASEURL; ?>projet/<?= $projet['slug'].'-'.$projet['id_projet']; ?>.html" class="btn_lire_projet" projet="<?= $projet['id_projet']; ?>"><?= $projet['titre']; ?></a></div>
        </div>
        <div class="footer_projet">
            <div class="auteur_projet">
                <img src="<?= BASEURL ?>assets/img/user.svg">
                <div class="nom_auteur"><a href="<?= BASEURL; ?>utilisateur/<?= $projet['nom_utilisateur']; ?>.html"><?= $projet['nom_utilisateur']; ?></a></div>
            </div>
            <div class="date_projet">
                <img src="<?= BASEURL ?>assets/img/calendar.svg">
                <div class="date"><?= formate_date($projet['date_ajout']); ?></div>
            </div>
        </div>
    </div>
    <?php
        endforeach; 
    ?>
</div>