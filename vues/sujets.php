<?php 
$page_title = 'Liste des sujets';
$nbr_elements_page = 10;
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
                <div class="sujet <?php if ($sujet['resolu'] == 1) : ?> resolu <?php elseif ($sujet['ouvert'] == 0) : ?> ferme <?php endif; ?>">
                    <?php if ($sujet['resolu'] == 1) : ?><span class="material-icons badge_resolu">check_circle</span><?php endif; ?>
                    <?php if ($sujet['ouvert'] == 0) : ?><span class="material-icons badge_ferme">cancel</span><?php endif; ?>
                    <div class="bloc_gauche">
                        <div class="avatar_container">
                            <img src="<?= BASEURL; ?><?= $sujet['avatar']; ?>">
                        </div>
                        <div class="infos_container">
                            <div class="titre_sujet"><?= $sujet['titre']; ?></div>
                            <div class="titre_projet">Projet : <?= $sujet['titre_projet']; ?></div>
                            <div class="contenu_sujet">
                                <?= extrait_texte($sujet['contenu'], 200); ?>
                            </div>
                            <?php if ($sujet['ouvert'] == 1) : ?>
                            <div class="infos">
                                    <span class="material-icons">chat</span>
                                    <?php if ($sujet['nom_utilisateur_derniere_reponse'] == NULL) : ?>
                                        Ouvert par <?= $sujet['nom_utilisateur']; ?> <?= mb_strtolower(ecart_date($sujet['last_date'])); ?>
                                    <?php else : ?>
                                        Dernière réponse par <?= $sujet['nom_utilisateur_derniere_reponse']; ?> <?= mb_strtolower(ecart_date($sujet['last_date'])); ?>
                                    <?php endif; ?>
                                </div>
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
    </div>
</div>