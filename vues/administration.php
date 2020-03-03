<h1>Espace d'administration</h1>

<a href="<?= BASEURL; ?>nouveau_projet.html" class="btn btn_nouveau_projet">Ajouter un projet</a>

<div class="administration">
    <div class="tbl_header">
        <div class="tbl_header__col">Titre</div>
        <div class="tbl_header__col">Contenu</div>
        <div class="tbl_header__col">Illustration</div>
        <div class="tbl_header__col"></div>
    </div>

<?php

$liste_projets = req_liste_projets();
foreach($liste_projets as $projet) :

?>
    
    <div class="tbl_contenu">
        <div class="tbl_contenu__col">
            <?= $projet['titre']; ?>
        </div>
        <div class="tbl_contenu__col">
            <?= extrait_texte($projet['contenu'], 700); ?>
        </div>
        <div class="tbl_contenu__col">
            <img src="<?= BASEURL; ?><?= $projet['illustration']; ?>">
        </div>
        <div class="tbl_contenu__col tbl_actions">
            <img class="icon" src="<?= BASEURL; ?>assets/img/edit.svg">
            <img class="icon" src="<?= BASEURL; ?>assets/img/menu.svg">
        </div>
    </div>
    
<?php
endforeach;
?>

</div>