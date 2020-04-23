<?php

if (isset($_SESSION['utilisateur']) && (req_utilisateur_by_id($_SESSION['utilisateur'])['rang'] == 'admin'))
{

?>
    <div class="container">
        <h1>Admin - Liste des utilisateurs</h1>

        <a href="<?= BASEURL; ?>nouvel_utilisateur.html" class="btn btn_nouveau_projet">Ajouter un utilisateur</a>

        <div class="administration">
            <div class="tbl_header">
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
            
        <div class="tbl_contenu <?php if ($utilisateur['motif_suppression'] != NULL) : ?> compte_supprime <?php endif; ?>">
                <div class="tbl_contenu__col">
                    <?= $utilisateur['id']; ?>
                </div>
                <div class="tbl_contenu__col">
                    <span class="titre"><?= $nom_utilisateur; ?></span>
                    <?php if ($utilisateur['rang'] == 'admin') : ?> <br/> Administrateur <?php endif; ?>
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
                        <a href="#" class="btn_administration fiche_utilisateur">Fiche utilisateur</a>
                        <?php if ($utilisateur['rang'] != 'admin') : ?> 
                        <a href="#" utilisateur="<?= $utilisateur['id']; ?>" class="btn_administration <?php if($utilisateur['bloque'] == 1) : ?>de<?php endif; ?>bloquer_utilisateur"><?php if($utilisateur['bloque'] == 1) : ?>Débloquer<?php else : ?>Bloquer<?php endif; ?></a> 
                        <?php endif; ?>
                    <?php endif; ?>
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