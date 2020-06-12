<?php 
$page_title = 'Edition du projet';
if (isset($_SESSION['utilisateur']) && (req_utilisateur_by_id($_SESSION['utilisateur'])['id_droit'] == 1 || req_utilisateur_by_id($_SESSION['utilisateur'])['id_droit'] == 2))
{

    if (isset($_GET['slug'])) 
    { 
        $projet = req_by_id($_GET['slug']);
        $_SESSION['id_projet'] = $projet['id_projet'];
        $_SESSION['modification'] = true;
    ?>
        <div class="container">
            <h1>Edition : <?= $projet['titre']; ?></h1>

            <div class="nouveau_projet">

                <?php 
                //Message d'erreur
                if (isset($_SESSION['erreur'])) : 
                ?>
                    <div class="erreur"><?= $_SESSION['erreur']; ?></div>
                <?php
                unset($_SESSION['erreur']); 
                endif;

                //Message de succès
                if (isset($_SESSION['succes'])) : 
                ?>
                    <div class="succes"><?= $_SESSION['succes']; ?></div>
                <?php
                unset($_SESSION['succes']); 
                endif;
                ?>

                <form method="POST" action="<?= BASEURL; ?>inc/update_projet.php?id=<?= $projet['id_projet']; ?>" enctype="multipart/form-data">
                    <?php include('./inc/formulaire_projet.php'); ?>
                </form>
            </div>

            <script src="<?= BASEURL; ?>assets/js/admin.js"></script>
        </div>
    <?php

    }
    else
        header('Location:'.BASEURL);
}
else
    header('Location:'.BASEURL);