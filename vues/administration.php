<?php

if (isset($_SESSION['utilisateur']) && (req_utilisateur_by_id($_SESSION['utilisateur'])['id_droit'] == 1 || req_utilisateur_by_id($_SESSION['utilisateur'])['id_droit'] == 2))
{

?>
    <div class="container">
        <h1>Admin - Tableau de bord</h1>

        <div class="tabor">

            <a href="<?= BASEURL; ?>liste_projets.html">
                <div class="admin-card">
                    <span class="material-icons">description</span>
                    <h3>Gestion des projets</h3>
                </div>
            </a>

            <a href="<?= BASEURL; ?>liste_utilisateurs.html">
                <div class="admin-card">
                    <span class="material-icons">account_circle</span>
                    <h3>Gestion des utilisateurs</h3>
                </div>
            </a>

            <a href="#">
                <div class="admin-card">
                    <span class="material-icons">equalizer</span>
                    <h3>Statistiques</h3>
                </div>
            </a>

            <a href="#">
                <div class="admin-card">
                    <span class="material-icons">report_problem</span>
                    <h3>Signalements</h3>
                    <?php if (req_nbr_signalements() > 0) : ?>
                        <div class="notification">
                            <?= req_nbr_signalements(); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </a>

            <a href="#">
                <div class="admin-card">
                    <span class="material-icons">emoji_objects</span>
                    <h3>Suggestions</h3>
                </div>
            </a>

        </div>

        <div class="statistiques_tabor">
            <h2><span class="material-icons">equalizer</span>Statistiques quotidiennes (comparaison à la veille)</h2>
            <div class="stat">
                <span class="material-icons">description</span>
                <?php $nbr_projets = req_nbr_projets_jour(date("d/m/y")); ?>
                <?= $nbr_projets ?> <?= ($nbr_projets > 1) ? "nouveaux projets ajoutés" : "nouveau projet ajouté"; ?>
                <?php $comp_p = $nbr_projets - req_nbr_projets_jour(strftime("%d/%m/%Y", mktime(0, 0, 0, date('m'), date('d')-1, date('y')))); ?>
                <B>(<?php if ($comp_p == 0) : ?>=<?php elseif ($comp_p > 0) : ?>+<?= $comp_p; ?><?php else : ?><?= $comp_p; ?><?php endif; ?>)</B>
            </div>
            <div class="stat">
                <span class="material-icons">chat</span>
                <?php $nbr_sujets = req_nbr_sujets_jour(date("d/m/Y")); ?>
                <?= $nbr_sujets ?> <?= ($nbr_sujets > 1) ? "nouveaux sujets ouverts" : "nouveau sujet ouvert"; ?>
                <?php $comp_s = $nbr_sujets - req_nbr_sujets_jour(strftime("%d/%m/%Y", mktime(0, 0, 0, date('m'), date('d')-1, date('y')))); ?>
                <B>(<?php if ($comp_s == 0) : ?>=<?php elseif ($comp_s > 0) : ?>+<?= $comp_s; ?><?php else : ?><?= $comp_s; ?><?php endif; ?>)</B>
            </div>
            <div class="stat">
                <span class="material-icons">person</span>
                <?php $nbr_inscrits = req_nbr_inscrits_jour(date("d/m/Y")); ?>
                <?= $nbr_inscrits ?> <?= ($nbr_inscrits > 1) ? "nouveaux inscrits" : "nouvel inscrit"; ?>
                <?php $comp_i = $nbr_inscrits - req_nbr_inscrits_jour(strftime("%d/%m/%Y", mktime(0, 0, 0, date('m'), date('d')-1, date('y')))); ?>
                <B>(<?php if ($comp_i == 0) : ?>=<?php elseif ($comp_i > 0) : ?>+<?= $comp_i; ?><?php else : ?><?= $comp_i; ?><?php endif; ?>)</B>
            </div>
        </div>

        <script src="<?= BASEURL; ?>assets/js/admin.js"></script>
    </div>
<?php
}
else
    header('Location:'.BASEURL);