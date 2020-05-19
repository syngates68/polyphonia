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
            <div class="aide">
                <div class="aide_top">
                    <h1>Page d'aide : <?= req_by_id($id_projet)['titre']; ?> </h1>
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
            if (count_sujets_by_projet($id_projet) > 0)
            {
                $sujets = req_sujets_by_projet($id_projet);

                foreach($sujets as $sujet) :
            ?>

                <a href="<?= BASEURL; ?>sujet/<?= $sujet['id']; ?>.html">
                    <div class="sujet">
                        <div class="bloc_gauche">
                            <div class="titre_sujet"><?= $sujet['titre']; ?> <?php if ($sujet['resolu'] == 1) : ?><span class="badge_resolu">Résolu</span><?php endif; ?></div>
                            <div class="infos">
                                <?php if ($sujet['ouvert'] == 1) : ?>
                                    <?php if ($sujet['date_derniere_reponse'] == NULL) : ?>
                                        Ouvert par <?= $sujet['nom_utilisateur']; ?> <?= strtolower(ecart_date($sujet['date_sujet'])); ?>
                                    <?php else : ?>
                                        Dernière réponse par <?= $sujet['nom_utilisateur_derniere_reponse']; ?> <?= mb_strtolower(ecart_date($sujet['date_derniere_reponse'])); ?>
                                    <?php endif; ?>
                                <?php else : ?>
                                    <span class="sujet_ferme">Ce sujet a été fermé</span>
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