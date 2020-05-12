<?php
session_start();

include('../config/config.php');
include('../config/fonctions.php');

$projet = req_by_id($_POST['id_projet']);
?>
<div class="projet_texte">
    <?php if ($projet['date_update'] != NULL) : ?>
        <p class="label_maj">Mis à jour le <?= formate_date($projet['date_update']); ?> par <?= $projet['utilisateur_update']; ?></p>
    <?php endif; ?>

    <?= nl2br($projet['contenu']); ?>
    <?php if (req_fichiers_by_projet($projet['id_projet']) != 0) : ?>
    <div class="fichiers_joints">
        Fichier joint : 
        <?php $fichier = req_fichiers_by_projet($projet['id_projet']); ?>
        <ul>
            <li><a download="<?= $fichier['nom_fichier']; ?>" href="<?= BASEURL; ?><?= $fichier['chemin_fichier']; ?>"><?= $fichier['nom_fichier']; ?>.zip</a></li>
        </ul>
    </div>
    <?php endif; ?>
</div>
<div class="projet_contenu__footer">
    <?php if ($projet['nom_photographe'] != NULL) : ?>
        <p class="copyright_image">Photo par <?= $projet['nom_photographe']; ?> (<a href="<?= $projet['lien_photo']; ?>" target="_blank">Voir la photo</a>)</p>
    <?php endif; ?>
    <div class="message">
        <span class="nota_bene">N.B. :</span><br/>
        Les projets proposés sur Polyphonia sont faits pour vous donner des idées de projets intéressants à faire, et ils ne sont en rien exhaustifs,
        si vous trouvez d'autres idées concernant le projet ci-dessus, libre à vous de le rajouter à votre projet, et si vous pensez que ces idées peuvent intéresser
        d'autres personnes, ou simplement compléter le projet, n'hésitez pas à <span class="suggerer_modifications">suggérer une modification</span>.<br/>
        Si vous ne vous pensez pas avoir le niveau pour une partie du projet, ne vous bloquez pas pour autant, vous pouvez ne pas faire cette partie ou simplement la
        remplacer par autre chose.
    </div>
    <div class="bloc_suggerer_modifications"></div>
</div>