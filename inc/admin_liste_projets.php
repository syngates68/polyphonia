<?php
session_start();
include('../config/config.php');
include('../config/fonctions.php');

$liste_projets = req_liste_projets_admin($_POST['titre'], $_POST['tri']);
foreach($liste_projets as $projet) :

    $illustration = ($projet['illustration'] != NULL) ? $projet['illustration'] : 'assets/img/aucune_image.png';

?>
    
    <div class="tbl_contenu">
        <div class="tbl_contenu__col">
            <input type="checkbox">
        </div>
        <div class="tbl_contenu__col">
            <img src="<?= BASEURL; ?><?= $illustration; ?>">
        </div>
        <div class="tbl_contenu__col">
            <span class="titre"><?= $projet['titre']; ?></span>
        </div>
        <div class="tbl_contenu__col">
            <?= $projet['vues']; ?>
        </div>
        <div class="tbl_contenu__col">
            <?= formate_date($projet['date_ajout']); ?>
            <?php if ($projet['brouillon'] == 1 && $projet['date_sauvegarde'] != NULL) : ?>
                <p class="label_brouillon">(Dernière sauvegarde le <?= formate_date_heure($projet['date_sauvegarde']); ?>)</p>
            <?php endif; ?>
            <?php if ($projet['brouillon'] == 0 && $projet['date_update'] != NULL) : ?>
                <p class="label_brouillon">(Mis à jour <?= formate_date_heure($projet['date_update']); ?>)</p>
            <?php endif; ?>
        </div>
        <div class="tbl_contenu__col">
            <?php if ($projet['brouillon'] == 0) : ?> 
                <span class="statut en_ligne">En ligne</span>
            <?php else : ?>
                <span class="statut brouillon">Brouillon</span>
            <?php endif; ?>
        </div>
        <div class="tbl_contenu__col tbl_actions">
            <span class="material-icons afficher_actions" dropdown="dropdown_menu_<?= $projet['id_projet']; ?>">more_horiz</span>
            <div class="dropdown_menu" id="dropdown_menu_<?= $projet['id_projet']; ?>">
                <?php if ($projet['brouillon'] == 0) : ?>
                    <div class="dropdown_lien">
                        <a href="<?= BASEURL ?>editer_projet/<?= $projet['id_projet']; ?>.html" class="btn_administration editer"><span class="material-icons">create</span>Editer le projet</a>
                    </div>
                    <div class="dropdown_lien">
                        <a href="#" class="btn_administration remettre_brouillon" projet="<?= $projet['id_projet']; ?>"><span class="material-icons">file_copy</span>Remettre en brouillon</a>
                    </div>
                <?php else : ?>
                    <div class="dropdown_lien">
                        <a href="<?= BASEURL ?>brouillon/<?= $projet['id_projet']; ?>.html" class="btn_administration brouillon"><span class="material-icons">file_copy</span>Reprendre brouillon</a>
                    </div>
                <?php endif; ?>
                <div class="dropdown_lien">
                    <a href="#" class="btn_administration supprimer" type="<?php if ($projet['brouillon'] == 0) : ?>projet<?php else : ?>brouillon<?php endif; ?>" projet="<?= $projet['id_projet']; ?>"><span class="material-icons">delete</span>Supprimer</a>
                </div>
            </div>
        </div>
    </div>
    
<?php
endforeach;
?>