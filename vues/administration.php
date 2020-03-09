<?php

if (isset($_SESSION['utilisateur']))
{

?>
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

    $liste_projets = req_liste_projets(true);
    foreach($liste_projets as $projet) :

        $illustration = ($projet['illustration'] != NULL) ? $projet['illustration'] : 'assets/img/aucune_image.png';

    ?>
        
    <div class="tbl_contenu <?php if ($projet['brouillon'] == 1) : ?> brouillon <?php endif; ?>">
            <div class="tbl_contenu__col">
                <img src="<?= BASEURL; ?><?= $illustration; ?>">
            </div>
            <div class="tbl_contenu__col">
                <?= $projet['titre']; ?>
                <?php if ($projet['brouillon'] == 1) : ?>
                    <p class="label_brouillon">(Brouillon)</p>
                <?php endif; ?>
            </div>
            <div class="tbl_contenu__col">
                <?= $projet['vues']; ?>
            </div>
            <div class="tbl_contenu__col">
                <?= formate_date($projet['date_ajout']); ?>
                <?php if ($projet['brouillon'] == 1) : ?>
                    <p class="label_brouillon">(Dernière sauvegarde le <?= formate_date_heure($projet['date_sauvegarde']); ?>)</p>
                <?php endif; ?>
            </div>
            <div class="tbl_contenu__col tbl_actions">
                <?php if ($projet['brouillon'] == 0) : ?>
                    <a href="<?= BASEURL ?>editer_projet/<?= $projet['id_projet']; ?>.html" class="btn_administration editer"><i class="material-icons" title="Editer le projet">edit</i>Editer le projet</a>
                <?php else : ?>
                    <a href="<?= BASEURL ?>brouillon/<?= $projet['id_projet']; ?>.html" class="btn_administration brouillon"><i class="material-icons" title="Reprendre le brouillon">insert_drive_file</i>Reprendre brouillon</a>
                <?php endif; ?>
                <i class="material-icons icon_more" title="Autres actions">more_vert</i>
            </div>
        </div>
        
    <?php
    endforeach;
    ?>

    </div>

<?php

}
else
    header('Location:'.BASEURL);