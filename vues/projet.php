<?php

$projet = req_by_slug($_GET['slug']);
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
            <button class="exporter_pdf"><img src="<?= BASEURL; ?>assets/img/pdf.svg">Exporter en PDF</button>
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
    <?= nl2br($p['contenu']); ?>
</div>

<?php

endforeach;

?>