<?php

if (isset($_SESSION['utilisateur']) && (req_utilisateur_by_id($_SESSION['utilisateur'])['rang'] == 'admin'))
{

?>
    <div class="container">
        <h1>Admin - Liste des utilisateurs</h1>

        <a href="<?= BASEURL; ?>nouveau_projet.html" class="btn btn_nouveau_projet">Ajouter un utilisateur</a>

        <div class="administration">
            <div class="tbl_header">
                <div class="tbl_header__col">Avatar</div>
                <div class="tbl_header__col">Nom d'utilisateur</div>
                <div class="tbl_header__col">Adresse mail</div>
                <div class="tbl_header__col">Membre depuis le</div>
                <div class="tbl_header__col"></div>
            </div>

        <?php

        $liste_utilisateurs = req_liste_utilisateurs();
        foreach($liste_utilisateurs as $utilisateur) :

        $avatar = ($utilisateur['avatar'] != NULL) ? $utilisateur['avatar'] : 'assets/img/aucune_image.png';
        $nom_utilisateur = ($utilisateur['nom_utilisateur'] != NULL) ? $utilisateur['nom_utilisateur'] : 'Compte supprimé';
        ?>
            
        <div class="tbl_contenu">
                <div class="tbl_contenu__col">
                    <img class="avatar" src="<?= BASEURL; ?><?= $avatar; ?>">
                </div>
                <div class="tbl_contenu__col">
                    <span class="titre"><?= $nom_utilisateur; ?></span>
                </div>
                <div class="tbl_contenu__col">
                    <?= $utilisateur['email']; ?>
                </div>
                <div class="tbl_contenu__col">
                    <?= formate_date($utilisateur['date_inscription']); ?>
                </div>
                <div class="tbl_contenu__col tbl_actions">
        
                </div>
            </div>
            
        <?php
        endforeach;
        ?>

        </div>
        <script src="<?= BASEURL; ?>assets/js/admin.js"></script>
    </div>
<?php
}
else
    header('Location:'.BASEURL);