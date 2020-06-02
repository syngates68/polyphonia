<?php

if (isset($_GET['slug']))
{

    $tab = explode('-', $_GET['slug']);
    $id_projet = $tab[(sizeof(explode('-', $_GET['slug'])) - 1)];
    $slug = str_replace('-'.$id_projet, '', $_GET['slug']);

    $exist_projet = count_by_id($id_projet);

    if ($exist_projet > 0)
    {

        $projet = req_by_id($id_projet);
        
        if ($slug == $projet['slug'])
        {
        
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
                <?php if (isset($_SESSION['succes'])) : ?><div class="succes succes_vanishing"><?= $_SESSION['succes']; ?></div><?php unset($_SESSION['succes']); endif; ?>
                    <div class="projet_contenu__top">
                    <div class="projet_actions">
                        <button class="btn btn-orange page_aide" href="<?= BASEURL; ?>aide/<?= $_GET['slug']; ?>.html"><span class="material-icons">help_outline</span>Page d'aide</button>
                        <button title="Être averti lorsqu'une nouvelle question est posée." href="<?= BASEURL; ?>projet/<?= $_GET['slug']; ?>.html" id="suivre_projet_<?= $id_projet; ?>" class="btn btn-outline-orange suivre_projet"><span class="material-icons">favorite</span>Suivre le projet</button>
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
                <input type="hidden" name="id_projet" value="<?= $projet['id_projet']; ?>">
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
                <a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/4.0/"><img alt="Licence Creative Commons" style="border-width:0" src="https://i.creativecommons.org/l/by-nc-sa/4.0/88x31.png" /></a><br />Ce(tte) œuvre est mise à disposition selon les termes de la <a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/4.0/">Licence Creative Commons Attribution - Pas d’Utilisation Commerciale - Partage dans les Mêmes Conditions 4.0 International</a>.
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
            </div>
            <script src="<?= BASEURL; ?>assets/js/projet.js"></script>
        <?php
        }
        else
            header('Location:'.BASEURL.'projet/'.$projet['slug'].'-'.$id_projet.'.html');
    }
    else
        include('projet_introuvable.php');
}
else
    include('projet_introuvable.php');