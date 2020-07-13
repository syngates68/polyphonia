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

                <div class="aide_content">
                    <div class="aide_bloc_infos">
                        <?php if (isset($_SESSION['utilisateur'])) : ?>
                            <button type="button" class="btn btn-outline-orange btn_nouveau_sujet">Nouveau sujet</button>
                        <?php endif; ?>
                        <p>
                            En cas de problème lors de la réalisation du projet, cette page d'aide est là pour vous. Posez votre question et décrivez votre problème afin que les autres
                            utilisateurs puissent vous répondre et ainsi vous permettre d'avancer sur votre projet.<br/>
                            Pour ce projet : <br/>
                            <ul>
                                <li><?= count_sujets_by_projet($id_projet); ?> <?= (count_sujets_by_projet($id_projet) > 1) ? "sujets ont été ouverts" : "sujet a été ouvert" ?></li>
                                <li><?= count_resolus_by_projet($id_projet); ?> <?= (count_resolus_by_projet($id_projet) > 1) ? "sujets ont été résolus" : "sujet a été résolu" ?></li>
                                <li><?= count_fermes_by_projet($id_projet); ?> <?= (count_fermes_by_projet($id_projet) > 1) ? "sujets ont été fermés" : "sujet a été fermé" ?></li>
                                <li><?= count_nb_reponses_by_projet($id_projet); ?> <?= (count_nb_reponses_by_projet($id_projet) > 1) ? "réponses ont été postées" : "réponse a été postée" ?></li>
                            </ul>
                        </p>
                    </div>
                    <div class="aide_bloc_sujets">
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
                                    <div class="avatar_container">
                                        <img src="<?= BASEURL; ?><?= $sujet['avatar']; ?>">
                                        <div class="bulle <?php if ($sujet['ouvert'] == 0) : ?>ferme<?php endif; ?> <?php if ($sujet['resolu'] == 1) : ?>resolu<?php endif ?>"><span class="material-icons"><?php if ($sujet['ouvert'] == 0) : ?>cancel<?php endif; ?> <?php if ($sujet['resolu'] == 1) : ?>check_circle_outline<?php endif ?></span></div>
                                    </div>
                                    <div class="infos_container">
                                        <div class="titre_sujet"><?= $sujet['titre']; ?></div>
                                        <div class="info">
                                            Ouvert par <?= $sujet['nom_utilisateur']; ?> <?= mb_strtolower(ecart_date($sujet['date_sujet'])); ?>
                                        </div>
                                        <div class="contenu_sujet">
                                            <?= extrait_texte($sujet['contenu'], 200); ?>
                                        </div>
                                        <div class="infos">
                                            <?php if ($sujet['ouvert'] == 1 && $sujet['nom_utilisateur_derniere_reponse'] != NULL) : ?>
                                                <div class="info">
                                                    <img src="<?= BASEURL; ?><?= $sujet['avatar_derniere_reponse']; ?>">
                                                    Dernière réponse par <?= $sujet['nom_utilisateur_derniere_reponse']; ?> <?= mb_strtolower(ecart_date($sujet['last_date'])); ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
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
                </div>
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