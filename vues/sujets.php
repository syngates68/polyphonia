<?php 
$page_title = 'Liste des sujets';
$nbr_elements_page = 20;
$nbr_sujets = sizeof(req_liste_sujets());
$nbr_pages = ceil($nbr_sujets/$nbr_elements_page);
$page = (isset($_GET['p']) && is_numeric($_GET['p']) && $_GET['p'] <= $nbr_pages) ? $_GET['p'] : 1;
?>
<div class="container liste_sujets">
    <h1>Liste des sujets</h1>
    <h2>Retrouvez tous les sujets ouverts sur Polyphonia.</h2>
    <div class="liste_sujets_bloc">
        <div class="pagination">
            <ul>
                <?php for ($i = 0; $i < $nbr_pages; $i++) : ?>
                    <li <?php if ($page == ($i + 1)) : ?>class="actif"<?php endif; ?>><a href="<?= BASEURL; ?>sujets.html?p=<?= $i + 1; ?>"><?= $i + 1; ?></a></li>
                <?php endfor; ?>
            </ul>
        </div>
        <?php
        $offset = ($page - 1) * $nbr_elements_page;
        $limit = ' LIMIT '.$nbr_elements_page.' OFFSET '.$offset; 
        $sujets = req_liste_sujets($limit);
        foreach ($sujets as $sujet) :
        ?>
            <a href="<?= BASEURL; ?>sujet/<?= $sujet['id']; ?>.html">
                <div class="sujet">
                    <div class="bloc_gauche">
                        <div class="avatar_container">
                            <img src="<?= BASEURL; ?><?= $sujet['avatar']; ?>">
                        </div>
                        <div class="infos_container">
                            <div class="titre_sujet"><?= $sujet['titre']; ?></div>
                            <div class="titre_projet">Projet : <?= $sujet['titre_projet']; ?></div>
                            <?php if ($sujet['resolu'] == 1) : ?>
                                <div class="badge_resolu"><span class="material-icons">check_circle_outline</span>Résolu</div>
                            <?php endif; ?>
                            <div class="contenu_sujet">
                                <?= extrait_texte($sujet['contenu'], 200); ?>
                            </div>
                            <div class="infos">
                                <?php if ($sujet['ouvert'] == 1) : ?>
                                    <?php if ($sujet['date_derniere_reponse'] == NULL) : ?>
                                        Ouvert par <?= $sujet['nom_utilisateur']; ?> <?= mb_strtolower(ecart_date($sujet['date_sujet'])); ?>
                                    <?php else : ?>
                                        Dernière réponse par <?= $sujet['nom_utilisateur_derniere_reponse']; ?> <?= mb_strtolower(ecart_date($sujet['date_derniere_reponse'])); ?>
                                    <?php endif; ?>
                                <?php else : ?>
                                    <span class="sujet_ferme"><span class="material-icons">cancel</span>Ce sujet a été fermé</span>
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
    </div>
</div>