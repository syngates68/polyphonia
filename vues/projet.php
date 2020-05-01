<?php

if (isset($_GET['slug']))
{

    $exist_projet = count_by_slug($_GET['slug']);

    if ($exist_projet > 0)
    {

        $projet = req_by_slug($_GET['slug']);
        
    ?>
        
        <div class="projet_header" style="background:url('<?= BASEURL; ?><?= $projet['illustration']; ?>');background-size:cover;background-repeat:no-repeat;">
            <div class="bloc_noir"></div>
            <div class="titre">
                <h1><?= $projet['titre']; ?></h1>
            </div>
        </div>

        <div class="titre_mobile">
            <?= $projet['titre']; ?>
        </div>
        
        <div class="projet_contenu">
            <div class="projet_contenu__top">
                <div class="projet_actions">
                    <a href="<?= BASEURL; ?>exporter_pdf.php?id=<?= $projet['id_projet']; ?>" class="exporter_pdf"><i class="material-icons">description</i>Exporter en PDF</a>
                </div>
                <div class="projet_infos">
                    <div class="auteur">
                        <img class="img_auteur" src="<?= BASEURL; ?><?= $projet['avatar']; ?>">
                        <span class="nom_auteur"><a href="<?= BASEURL; ?>utilisateur/<?= $projet['nom_utilisateur']; ?>.html"><?= $projet['nom_utilisateur']; ?></a></span>
                    </div>
                    <div class="date">
                        <img src="<?= BASEURL; ?>assets/img/calendar.svg">
                        <span class="date_ajout"><?= formate_date($projet['date_ajout']); ?></span>
                    </div>
                </div>   
            </div>
            <div class="projet_texte">
                <?= nl2br($projet['contenu']); ?>
                <?php if (sizeof(req_fichiers_by_projet($projet['id_projet'])) > 0) : ?>
                <div class="fichiers_joints">
                    <?= sizeof(req_fichiers_by_projet($projet['id_projet'])); ?> fichier(s) joint(s) : 
                    <ul>
                        <?php foreach (req_fichiers_by_projet($projet['id_projet']) as $fichier) : ?>
                            <li><a download="<?= $fichier['nom_fichier']; ?>" href="<?= BASEURL; ?><?= $fichier['chemin_fichier']; ?>"><?= $fichier['nom_fichier']; ?></a> (<?= $fichier['type_fichier']; ?>)</li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <?php endif; ?>
            </div>
            <div class="projet_contenu__footer">
                <?php if ($projet['nom_photographe'] != NULL) : ?>
                    <p class="copyright_image">Photo par <?= $projet['nom_photographe']; ?> (<a href="<?= $projet['lien_photo']; ?>" target="_blank"><?= $projet['lien_photo']; ?></a>)</p>
                <?php endif; ?>
                <div class="message">
                    <span class="nota_bene">N.B. :</span><br/>
                    Les projets proposés sur Polyphonia sont faits pour vous donner des idées de projets intéressants à faire, et ils ne sont en rien exhaustifs,
                    si vous trouvez d'autres idées concernant le projet ci-dessus, libre à vous de le rajouter à votre projet, et si vous pensez que ces idées peuvent intéresser
                    d'autres personnes, ou simplement compléter le projet, n'hésitez pas à <a target="_blank" href="<?= BASEURL; ?>suggerer_modification/<?= $projet['slug']; ?>.html" id="suggerer_modifications">suggérer une modification</a>.<br/>
                    Si vous ne vous pensez pas avoir le niveau pour une partie du projet, ne vous bloquez pas pour autant, vous pouvez ne pas faire cette partie ou simplement la
                    remplacer par autre chose.
                </div>
            </div>
        </div>
        <script src="<?= BASEURL; ?>assets/js/projet.js"></script>
    <?php
    }
    else
        include('projet_introuvable.php');
}
else
    include('projet_introuvable.php');