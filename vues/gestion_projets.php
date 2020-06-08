<?php
$page_title = 'Gestion des projets';
if (isset($_SESSION['utilisateur']) && (req_utilisateur_by_id($_SESSION['utilisateur'])['id_droit'] == 1 || req_utilisateur_by_id($_SESSION['utilisateur'])['id_droit'] == 2))
{

?>
    <div class="container">
        <h1>Admin - Gestion des projets</h1>

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
                    <input type="text" id="titre_projet" placeholder="Rechercher un projet">
                </div>
                <div class="form_ligne" style="width:50%">
                    <label for="">Trier par</label>
                    <select name="tri" id="tri">
                        <option value="1" selected>Date d'ajout décroissante</option>
                        <option value="2">Date d'ajout croissante</option>
                        <option value="3">Date de mise à jour décroissante</option>
                        <option value="4">Date de mise à jour croissante</option>
                        <option value="5">Nombre de vues décroissant</option>
                        <option value="6">Nombre de vues croissant</option>
                    </select>
                </div>
            </div>
            <div class="tbl_top">
                <div class="admin_cta">
                    <span class="material-icons" title="Supprimer les éléments sélectionnés">delete</span>
                </div>
                <div class="admin_btn">
                    <a href="<?= BASEURL; ?>nouveau_projet.html" class="btn btn-flex btn-orange"><span class="material-icons">add</span>Ajouter un projet</a>
                </div>
            </div>
            <div class="tbl_header">
                <div class="tbl_header__col"><input type="checkbox"></div>
                <div class="tbl_header__col">Illustration</div>
                <div class="tbl_header__col">Titre</div>
                <div class="tbl_header__col">Vues</div>
                <div class="tbl_header__col">Date d'ajout</div>
                <div class="tbl_header__col">Statut</div>
                <div class="tbl_header__col"></div>
            </div>
            <div class="tbl_projets">

            </div>
        </div>
        <script src="<?= BASEURL; ?>assets/js/admin.js"></script>
        <script>
            $(document).ready(function()
            {
                charge_liste_projets($('.administration #titre_projet').val(), $('.administration #tri').val())
            })
        </script>
    </div>
<?php
}
else
    header('Location:'.BASEURL);