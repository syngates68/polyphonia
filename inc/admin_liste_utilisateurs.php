<?php
session_start();
include('../config/config.php');
include('../config/fonctions.php');

$liste_utilisateurs = req_liste_utilisateurs($_POST['nom_utilisateur']);
foreach($liste_utilisateurs as $utilisateur) :

$nom_utilisateur = ($utilisateur['nom_utilisateur'] != NULL) ? $utilisateur['nom_utilisateur'] : 'Compte supprimé';
?>
    
    <div class="tbl_contenu">
        <div class="tbl_contenu__col">
            <?php if ($utilisateur['rang'] != 'superadmin' && $utilisateur['rang'] != 'admin') : ?>
                <input type="checkbox">
            <?php endif; ?>
        </div>
        <div class="tbl_contenu__col">
            <?php if ($utilisateur['motif_suppression'] == NULL) : ?><img class="photo_profil" src="<?= BASEURL; ?><?= $utilisateur['avatar']; ?>"><br/><?php endif; ?>
        </div>
        <div class="tbl_contenu__col">
            <span class="titre"><?= $nom_utilisateur; ?></span>
            <?php if ($utilisateur['rang'] == 'superadmin' || $utilisateur['rang'] == 'admin' || $utilisateur['rang'] == 'moderateur') : ?> <br/> <span class="rang"><?= $utilisateur['libelle_site']; ?></span> <?php endif; ?>
            <?php if ($utilisateur['motif_suppression'] != NULL) : ?> <br/>(Motif : <?= $utilisateur['motif_suppression']; ?>) <?php endif; ?>
            <br/>ID : <?= $utilisateur['id']; ?>
        </div>
        <div class="tbl_contenu__col">
            <?= $utilisateur['email']; ?>
        </div>
        <div class="tbl_contenu__col">
            <?= formate_date($utilisateur['date_inscription']); ?>
            <br/><?php if ($utilisateur['motif_suppression'] == NULL) : ?> (Dernière connexion le <?= formate_date($utilisateur['derniere_connexion']); ?>) <?php endif; ?>
        </div>
        <div class="tbl_contenu__col">
            <?php if ($utilisateur['motif_suppression'] != NULL) : ?> 
                <span class="statut supprime">Supprimé</span>
            <?php elseif ($utilisateur['bloque'] == 1) : ?> 
                <span class="statut bloque">Bloqué</span> 
            <?php elseif ($utilisateur['actif'] == 0) : ?>
                <span class="statut inactif">Inactif</span>
            <?php elseif ($utilisateur['confirm'] == 0) : ?>
                <span class="statut non_confirme">Non confirmé</span>
            <?php else : ?>
                <span class="statut en_ligne">Actif</span>
            <?php endif; ?>
        </div>
        <div class="tbl_contenu__col tbl_actions">
            <?php if ($utilisateur['motif_suppression'] == NULL) : ?>
                <span class="material-icons afficher_actions" dropdown="dropdown_menu_<?= $utilisateur['id']; ?>">more_horiz</span>
                <div class="dropdown_menu" id="dropdown_menu_<?= $utilisateur['id']; ?>">
                    <div class="dropdown_lien">
                        <a class="btn_administration fiche_utilisateur" href="<?= BASEURL; ?>inc/fiche_utilisateur?id_utilisateur=<?= $utilisateur['id']; ?>" rel="modal:open"><span class="material-icons">person</span>Fiche utilisateur</a>
                    </div>
                    <?php
                    //On laisse la possibilité au superadmin de gérer tous les types d'utilisateur, et les administrateurs tous les utilisateurs saufs les autres admins et superadmins
                    if ((req_utilisateur_by_id($_SESSION['utilisateur'])['id_droit'] == 1 && ($utilisateur['rang'] != 'superadmin')) || req_utilisateur_by_id($_SESSION['utilisateur'])['id_droit'] == 2 && ($utilisateur['rang'] != 'admin' && $utilisateur['rang'] != 'superadmin')) : 
                    ?> 
                        <?php if($utilisateur['bloque'] == 0) : ?>
                            <div class="dropdown_lien">
                                <a href="<?= BASEURL; ?>inc/bloquer_utilisateur?id_utilisateur=<?= $utilisateur['id']; ?>" rel="modal:open" class="btn_administration bloquer_utilisateur"><span class="material-icons">block</span>Bloquer</a> 
                            </div>
                        <?php else : ?>
                            <div class="dropdown_lien">
                                <a href="#" utilisateur="<?= $utilisateur['id']; ?>" class="btn_administration debloquer_utilisateur"><span class="material-icons">check_circle</span>Débloquer</a> 
                            </div>
                        <?php endif; ?>
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