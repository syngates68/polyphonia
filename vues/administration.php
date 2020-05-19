<?php

if (isset($_SESSION['utilisateur']) && (req_utilisateur_by_id($_SESSION['utilisateur'])['id_droit'] == 1 || req_utilisateur_by_id($_SESSION['utilisateur'])['id_droit'] == 2))
{

?>
    <div class="container">
        <h1>Admin - Liste des projets</h1>

        <?php
            //Message de succès
            if (isset($_SESSION['succes'])) : 
        ?>
                <div class="succes" style="float:left;"><?= $_SESSION['succes']; ?></div>
        <?php
            unset($_SESSION['succes']); 
            endif;
        ?>

        <div class="administration">
            <div class="tbl_top">
                <div class="admin_cta">
                    <span class="material-icons" title="Supprimer les éléments sélectionnés">delete</span>
                </div>
                <div class="admin_btn">
                    <a href="<?= BASEURL; ?>nouveau_projet.html" class="btn btn-flex btn-orange"><span class="material-icons">add</span>Ajouter un projet</a>
                </div>
            </div>
            <div class="tbl_header">
                <div class="tbl_header__col"><input type="checkbox"></div>
                <div class="tbl_header__col">Illustration</div>
                <div class="tbl_header__col">Titre</div>
                <div class="tbl_header__col">Vues</div>
                <div class="tbl_header__col">Date d'ajout</div>
                <div class="tbl_header__col"></div>
            </div>

        <?php

        $liste_projets = req_liste_projets(NULL, NULL, true);
        foreach($liste_projets as $projet) :

            $illustration = ($projet['illustration'] != NULL) ? $projet['illustration'] : 'assets/img/aucune_image.png';

        ?>
            
        <div class="tbl_contenu <?php if ($projet['brouillon'] == 1) : ?> brouillon <?php endif; ?>">
                <div class="tbl_contenu__col">
                    <input type="checkbox">
                </div>
                <div class="tbl_contenu__col">
                    <img src="<?= BASEURL; ?><?= $illustration; ?>">
                </div>
                <div class="tbl_contenu__col">
                    <span class="titre"><?= $projet['titre']; ?></span>
                    <?php if ($projet['brouillon'] == 1) : ?>
                        <p class="label_brouillon">(Brouillon)</p>
                    <?php endif; ?>
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

        </div>
        <script src="<?= BASEURL; ?>assets/js/admin.js"></script>
    </div>
<?php
}
else
    header('Location:'.BASEURL);