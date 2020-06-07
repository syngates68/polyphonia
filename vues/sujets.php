<div class="container liste_sujets">
    <h1>Liste des sujets</h1>
    <?php 
    $sujets = req_liste_sujets();
    foreach ($sujets as $sujet) :
    ?>
        <div class="sujet">
            <div class="titre_sujet"><?= $sujet['titre']; ?></div>
            <div class="titre_projet">Projet : <?= $sujet['titre_projet']; ?></div>
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
    <?php
    endforeach; 
    ?>
</div>