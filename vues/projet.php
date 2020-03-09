<?php

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
    
    <div class="projet_contenu">
        <div class="projet_contenu__top">
            <div class="projet_actions">
                <button class="exporter_pdf"><i class="material-icons">description</i>Exporter en PDF</button>
            </div>
            <div class="projet_infos">
                <div class="auteur">
                    <img src="<?= BASEURL; ?>assets/img/user.svg">
                    <span class="nom_auteur"><?= $projet['nom_utilisateur']; ?></span>
                </div>
                <div class="date">
                    <img src="<?= BASEURL; ?>assets/img/calendar.svg">
                    <span class="date_ajout"><?= formate_date($projet['date_ajout']); ?></span>
                </div>
            </div>   
        </div>
        <div class="projet_texte">
            <?= nl2br($projet['contenu']); ?>
        </div>
        <div class="projet_contenu__footer">
            <a href="#">Suggérer une modification</a>
        </div>
    </div>
    
<?php
}
else
{
    //Revoir
    header('Location:'.BASEURL.'404.html');
}

?>