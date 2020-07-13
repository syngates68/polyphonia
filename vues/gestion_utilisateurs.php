<?php
$page_title = 'Gestion des utilisateurs';
if (isset($_SESSION['utilisateur']) && (req_utilisateur_by_id($_SESSION['utilisateur'])['id_droit'] == 1 || req_utilisateur_by_id($_SESSION['utilisateur'])['id_droit'] == 2))
{

?>
    <div class="container">
        <h1>Admin - Gestion des utilisateurs</h1>

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
            <div class="filtres">
                <div class="form_ligne" style="width:50%">
                    <input type="text" id="nom_utilisateur" placeholder="Rechercher un utilisateur">
                </div>
            </div>
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
                <div class="tbl_header__col">Avatar</div>
                <div class="tbl_header__col">Nom d'utilisateur</div>
                <div class="tbl_header__col">Adresse mail</div>
                <div class="tbl_header__col">Membre depuis le</div>
                <div class="tbl_header__col">Statut</div>
                <div class="tbl_header__col"></div>
            </div>
            <div class="tbl_utilisateurs">

            </div>
        </div>

        <div id="modal_bloquer_utilisateur" class="modal modal_bloquer_utilisateur" style="display:none">
            <div class="modal_content">
            </div>
        </div>

        <!--<div class="modal_fiche_utilisateur">
        </div>-->

        <div id="modal_fiche_utilisateur" class="modal modal_fiche_utilisateur" style="display:none;">
        </div>

        <script src="<?= BASEURL; ?>assets/js/admin.js"></script>
        <script>
        $(document).ready(function()
            {
                charge_liste_utilisateurs($('.administration #nom_utilisateur').val())
            })
        </script>
    </div>
<?php
}
else
    header('Location:'.BASEURL);