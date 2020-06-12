<?php

if (isset($_GET['slug']))
{
    $tab = explode('-', $_GET['slug']);
    $id_projet = $tab[(sizeof(explode('-', $_GET['slug'])) - 1)];
    $slug = str_replace('-'.$id_projet, '', $_GET['slug']);
    $nbr_elements_page = 20;
    $nbr_sujets = count_sujets_by_projet($id_projet);
    $nbr_pages = ceil($nbr_sujets/$nbr_elements_page);
    $page = (isset($_GET['pagination']) && is_numeric($_GET['pagination']) && $_GET['pagination'] <= $nbr_pages) ? $_GET['pagination'] : 1;

    if (is_numeric($id_projet))
        $exist_projet = count_by_id($id_projet);
    else
        $exist_projet = 0;

    if ($exist_projet > 0)
    {

        $projet = req_by_id($id_projet);
        
        $page_title = 'Aide - '.$projet['titre'];

        if ($slug == $projet['slug'])
        {

        ?>
            <div class="aide">
                <div class="aide_top">
                    <div class="aide_titre">
                        <h1>Page d'aide</h1>
                        <h2><?= req_by_id($id_projet)['titre']; ?></h2>
                        <?php if (count_sujets_by_projet($id_projet) > 0) : ?>
                            <p class="nbr_sujets_ouverts"><?= count_sujets_by_projet($id_projet); ?> <?= (count_sujets_by_projet($id_projet) > 10) ? 'sujets ouverts' : 'sujet ouvert'; ?></p>
                        <?php endif; ?>
                    </div>
                    <button class="btn btn-orange page_projet" href="<?= BASEURL; ?>projet/<?= $_GET['slug']; ?>.html"><span class="material-icons">description</span>Page projet</button>
                </div>
                <?php 
                if (isset($_SESSION['succes'])) :
                ?>
                    <div class="succes succes_vanishing"><?= $_SESSION['succes']; ?></div>
                <?php
                unset($_SESSION['succes']);
                endif;
                ?>

                <?php
                if (isset($_SESSION['utilisateur'])) : ?>
                    <button type="button" class="btn btn-outline-orange btn_nouveau_sujet">Nouveau sujet</button>
                <?php endif; ?>
                <div class="erreur erreur_sujet" style="display:none;"></div>
                <input type="hidden" name="id_projet" value="<?= $id_projet; ?>">
                <div class="nouveau_sujet"></div>
                <?php
                    //Pagination
                    $offset = ($page - 1) * $nbr_elements_page;
                    $limit = ' LIMIT '.$nbr_elements_page.' OFFSET '.$offset;
                ?>
                <?php if ($nbr_pages > 1) : ?>
                    <div class="pagination">
                        <ul>
                            <?php for ($i = 0; $i < $nbr_pages; $i++) : ?>
                                <li <?php if ($page == ($i + 1)) : ?>class="actif"<?php endif; ?>><a href="<?= BASEURL; ?>aide/<?= $_GET['slug']; ?>.html/?pagination=<?= $i + 1; ?>"><?= $i + 1; ?></a></li>
                            <?php endfor; ?>
                        </ul>
                    </div>
                <?php endif; ?>
                <?php
                if (count_sujets_by_projet($id_projet) > 0)
                {
                    $sujets = req_sujets_by_projet($id_projet, $limit);

                    foreach($sujets as $sujet) :
                ?>

                <a href="<?= BASEURL; ?>sujet/<?= $sujet['id']; ?>.html">
                    <div class="sujet">
                        <div class="bloc_gauche">
                            <div class="titre_sujet"><?= $sujet['titre']; ?></div>
                            <?php if ($sujet['resolu'] == 1) : ?>
                                <div class="badge_resolu"><span class="material-icons">check_circle_outline</span>Résolu</div>
                            <?php endif; ?>
                            <div class="contenu_sujet">
                                <?= extrait_texte($sujet['contenu'], 200); ?>
                            </div>
                            <div class="infos">
                                <?php if ($sujet['ouvert'] == 1) : ?>
                                        <div class="info">
                                            <img src="<?= BASEURL; ?><?= $sujet['avatar']; ?>">
                                            Ouvert par <?= $sujet['nom_utilisateur']; ?> <?= mb_strtolower(ecart_date($sujet['date_sujet'])); ?>
                                        </div>
                                    <?php if ($sujet['nom_utilisateur_derniere_reponse'] != NULL) : ?>
                                        <div class="info">
                                            <img src="<?= BASEURL; ?><?= $sujet['avatar_derniere_reponse']; ?>">
                                            Dernière réponse par <?= $sujet['nom_utilisateur_derniere_reponse']; ?> <?= mb_strtolower(ecart_date($sujet['last_date'])); ?>
                                        </div>
                                    <?php endif; ?>
                                <?php else : ?>
                                    <span class="sujet_ferme"><span class="material-icons">cancel</span>Ce sujet a été fermé</span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="bloc_droit">
                            <span class="material-icons">chat</span><?= $sujet['nbr_reponses']; ?>
                        </div>
                    </div>
                </a>

                <?php
                    endforeach;
                ?>
                <script>
                    setTimeout(function() { $('.succes_vanishing').slideUp() }, 4000)
                </script>
                <?php
                }
                else
                {
                ?>
                    <div class="erreur">Aucun sujet n'a encore été ouvert pour ce projet</div>
                <?php
                }
                ?>
            </div>
            <script src="<?= BASEURL; ?>assets/js/aide.js"></script>
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