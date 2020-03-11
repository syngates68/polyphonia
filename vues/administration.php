<?php

if (isset($_SESSION['utilisateur']) && (req_rang($_SESSION['utilisateur']) == 'admin'))
{

?>
    <div class="container">
        <h1>Espace d'administration</h1>

        <a href="<?= BASEURL; ?>nouveau_projet.html" class="btn btn_nouveau_projet">Ajouter un projet</a>

        <div class="administration">
            <div class="tbl_header">
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
                </div>
                <div class="tbl_contenu__col tbl_actions">
                    <?php if ($projet['brouillon'] == 0) : ?>
                        <a href="<?= BASEURL ?>editer_projet/<?= $projet['id_projet']; ?>.html" class="btn_administration editer">Editer le projet</a>
                        <a href="#" class="btn_administration remettre_brouillon" projet="<?= $projet['id_projet']; ?>">Remettre en brouillon</a>
                    <?php else : ?>
                        <a href="<?= BASEURL ?>brouillon/<?= $projet['id_projet']; ?>.html" class="btn_administration brouillon">Reprendre brouillon</a>
                    <?php endif; ?>
                    <a href="#" class="btn_administration supprimer" type="<?php if ($projet['brouillon'] == 0) : ?>projet<?php else : ?>brouillon<?php endif; ?>" projet="<?= $projet['id_projet']; ?>">Supprimer</a>
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