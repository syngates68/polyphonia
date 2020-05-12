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
                        <a href="#" class="actif" id="description"><span class="material-icons">description</span>Projet</a>
                        <a href="#" id="aide"><span class="material-icons">help</span>Aide</a>
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
                <div class="contenu_page"></div>
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