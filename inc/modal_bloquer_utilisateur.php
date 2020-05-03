<?php
include('../config/config.php');
include('../config/fonctions.php');
?>

<p>Vous êtes sur le point de bloquer <?= req_utilisateur_by_id($_POST['id_utilisateur'])['nom_utilisateur']; ?></p>
<p>Veuillez renseigner obligatoirement ci-dessous le motif pour lequel vous bloquez ce compte.</p>

<textarea id="motif_blocage" rows="10"></textarea>

<button class="btn btn-red valider_blocage" utilisateur="<?= $_POST['id_utilisateur']; ?>">Bloquer</button>
<button class="btn btn-grey annuler_blocage">Annuler</button>