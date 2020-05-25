<?php

if (isset($_SESSION['utilisateur']) && (req_utilisateur_by_id($_SESSION['utilisateur'])['id_droit'] == 1 || req_utilisateur_by_id($_SESSION['utilisateur'])['id_droit'] == 2))
{

?>
    <div class="container">
        <h1>Admin - Liste des utilisateurs</h1>

        <?php
            //Message de succès
            if (isset($_SESSION['succes'])) : 
        ?>
                <div class="succes" style="float:left;"><?= $_SESSION['succes']; ?></div>
        <?php
            unset($_SESSION['succes']); 
            endif;
        ?>

        <div class="administration">
            <div class="tbl_top">
                <div class="admin_cta">
                    <span class="material-icons" title="Supprimer les éléments sélectionnés">delete</span>
                </div>
                <div class="admin_btn">
                    <a href="<?= BASEURL; ?>nouvel_utilisateur.html" class="btn btn-flex btn-orange"><span class="material-icons">add</span>Ajouter un utilisateur</a>
                </div>
            </div>
            <div class="tbl_header">
                <div class="tbl_header__col"><input type="checkbox"></div>
                <div class="tbl_header__col">ID</div>
                <div class="tbl_header__col">Nom d'utilisateur</div>
                <div class="tbl_header__col">Adresse mail</div>
                <div class="tbl_header__col">Membre depuis le</div>
                <div class="tbl_header__col"></div>
            </div>

        <?php

        $liste_utilisateurs = req_liste_utilisateurs();
        foreach($liste_utilisateurs as $utilisateur) :

        $nom_utilisateur = ($utilisateur['nom_utilisateur'] != NULL) ? $utilisateur['nom_utilisateur'] : 'Compte supprimé';
        ?>
            
        <div class="tbl_contenu <?php if ($utilisateur['motif_suppression'] != NULL) : ?> compte_supprime <?php elseif ($utilisateur['bloque'] == 1) : ?> compte_bloque <?php endif; ?>">
                <div class="tbl_contenu__col">
                    <input type="checkbox">
                </div>
                <div class="tbl_contenu__col">
                    <?= $utilisateur['id']; ?>
                </div>
                <div class="tbl_contenu__col">
                    <?php if ($utilisateur['motif_suppression'] == NULL) : ?><img class="photo_profil" src="<?= BASEURL; ?><?= $utilisateur['avatar']; ?>"><br/><?php endif; ?>
                    <span class="titre"><?= $nom_utilisateur; ?></span>
                    <?php if ($utilisateur['rang'] == 'superadmin' || $utilisateur['rang'] == 'administrateur') : ?> <br/> Administrateur <?php endif; ?>
                    <?php if ($utilisateur['motif_suppression'] != NULL) : ?> <br/>(Motif : <?= $utilisateur['motif_suppression']; ?>) <?php endif; ?>
                    <?php if ($utilisateur['bloque'] == 1) : ?> <br/>(Compte bloqué) <?php endif; ?>
                </div>
                <div class="tbl_contenu__col">
                    <?= $utilisateur['email']; ?>
                </div>
                <div class="tbl_contenu__col">
                    <?= formate_date($utilisateur['date_inscription']); ?>
                    <br/><?php if ($utilisateur['motif_suppression'] == NULL) : ?> (Dernière connexion le <?= formate_date($utilisateur['derniere_connexion']); ?>) <?php endif; ?>
                </div>
                <div class="tbl_contenu__col tbl_actions">
                    <?php if ($utilisateur['motif_suppression'] == NULL) : ?>
                        <span class="material-icons afficher_actions" dropdown="dropdown_menu_<?= $utilisateur['id']; ?>">more_horiz</span>
                        <div class="dropdown_menu" id="dropdown_menu_<?= $utilisateur['id']; ?>">
                            <div class="dropdown_lien">
                                <a class="btn_administration fiche_utilisateur" href="<?= BASEURL; ?>inc/fiche_utilisateur?id_utilisateur=<?= $utilisateur['id']; ?>" rel="modal:open"><span class="material-icons">folder_shared</span>Fiche utilisateur</a>
                            </div>
                            <?php
                            //On laisse la possibilité au superadmin de gérer tous les types d'utilisateur, et les administrateurs tous les utilisateurs saufs les autres admins et superadmins
                            if ((req_utilisateur_by_id($_SESSION['utilisateur'])['id_droit'] == 1 && ($utilisateur['rang'] != 'superadmin')) || req_utilisateur_by_id($_SESSION['utilisateur'])['id_droit'] == 2 && ($utilisateur['rang'] != 'administrateur' && $utilisateur['rang'] != 'superadmin')) : 
                            ?> 
                                <div class="dropdown_lien">
                                    <a href="#" utilisateur="<?= $utilisateur['id']; ?>" class="btn_administration <?php if($utilisateur['bloque'] == 1) : ?>de<?php endif; ?>bloquer_utilisateur"><?php if($utilisateur['bloque'] == 1) : ?><span class="material-icons">check_circle</span>Débloquer<?php else : ?><span class="material-icons">block</span>Bloquer<?php endif; ?></a> 
                                </div>
                            <?php 
                            endif; 
                            ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            
        <?php
        endforeach;
        ?>

        </div>

        <div class="modal_bloquer_utilisateur">
            <div class="modal_title">
                <h5>Bloquer un utilisateur</h5>
            </div>
            <div class="modal_content">
            </div>
        </div>

        <!--<div class="modal_fiche_utilisateur">
        </div>-->

        <div id="modal_fiche_utilisateur" class="modal modal_fiche_utilisateur" style="display:none;">
        </div>

        <script src="<?= BASEURL; ?>assets/js/admin.js"></script>
    </div>
<?php
}
else
    header('Location:'.BASEURL);