<?php

$projet = req_by_slug($_GET['slug']);

if (sizeof($projet) > 0)
{

    foreach($projet as $p) :
    
    ?>
    
    <div class="projet_header" style="background:url('<?= BASEURL; ?><?= $p['illustration']; ?>');background-size:cover;background-repeat:no-repeat;">
        <div class="bloc_noir"></div>
        <div class="titre">
            <h1><?= $p['titre']; ?></h1>
        </div>
    </div>
    
    <div class="projet_contenu">
        <div class="projet_contenu__top">
            <div class="projet_actions">
                <button class="exporter_pdf"><i class="material-icons">description</i>Exporter en PDF</button>
            </div>
            <div class="projet_infos">
                <div class="auteur">
                    <img src="<?= BASEURL; ?>assets/img/user.svg">
                    <span class="nom_auteur"><?= $p['nom_utilisateur']; ?></span>
                </div>
                <div class="date">
                    <img src="<?= BASEURL; ?>assets/img/calendar.svg">
                    <span class="date_ajout"><?= formate_date($p['date_ajout']); ?></span>
                </div>
            </div>   
        </div>
        <div class="projet_texte">
            <?= nl2br($p['contenu']); ?>
        </div>
        <div class="projet_contenu__footer">
            <a href="#">Suggérer une modification</a>
        </div>
    </div>
    
    <?php
    
    endforeach;
}
else
{
    //Revoir
    include('404.php');
}

?>