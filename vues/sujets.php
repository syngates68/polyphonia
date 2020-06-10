<?php $page_title = 'Liste des sujets'; ?>
<div class="container liste_sujets">
    <h1>Liste des sujets</h1>
    <h2>Retrouvez tous les sujets ouverts sur Polyphonia.</h2>
    <div class="liste_sujets_bloc">
        <div class="pagination">
            <ul>
                <?php for ($i = 0; $i < 5; $i++) : ?>
                    <li <?php if ($i == 0) : ?>class="actif"<?php endif; ?>><a href="#"><?= $i + 1; ?></a></li>
                <?php endfor; ?>
            </ul>
        </div>
        <?php 
        $sujets = req_liste_sujets();
        foreach ($sujets as $sujet) :
        ?>
            <a href="<?= BASEURL; ?>sujet/<?= $sujet['id']; ?>.html">
                <div class="sujet">
                    <div class="titre_sujet"><?= $sujet['titre']; ?></div>
                    <div class="titre_projet">Projet : <?= $sujet['titre_projet']; ?></div>
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
            </a>
        <?php
        endforeach; 
        ?>
    </div>
</div>