<?php
session_start();

include('../config/config.php');
include('../config/fonctions.php');

?>
<div class="aide">
    <?php 
    if (isset($_SESSION['succes'])) : 
    ?>
        <div class="succes succes_vanishing"><?= $_SESSION['succes']; ?></div>
    <?php
    unset($_SESSION['succes']);
    endif;

    if (isset($_SESSION['utilisateur'])) : ?>
        <button type="button" class="btn btn-orange btn_nouveau_sujet">Nouveau sujet</button>
    <?php endif; ?>
    <div class="erreur erreur_sujet" style="display:none;"></div>
    <input type="hidden" name="id_projet" value="<?= $_POST['id_projet']; ?>">
    <div class="nouveau_sujet"></div>
<?php
if (count_sujets_by_projet($_POST['id_projet']) > 0)
{
    $sujets = req_sujets_by_projet($_POST['id_projet']);

    foreach($sujets as $sujet) :
?>

    <a href="<?= BASEURL; ?>sujet/<?= $sujet['id']; ?>.html">
        <div class="sujet">
            <div class="bloc_gauche">
                <div class="titre_sujet"><?= $sujet['titre']; ?> <?php if ($sujet['resolu'] == 1) : ?><span class="badge_resolu">Résolu</span><?php endif; ?></div>
                <div class="infos">
                    <?php if ($sujet['date_derniere_reponse'] == NULL) : ?>
                        Ouvert par <?= $sujet['nom_utilisateur']; ?> le <?= formate_date($sujet['date_sujet']); ?>
                    <?php else : ?>
                        Dernière réponse par <?= $sujet['nom_utilisateur_derniere_reponse']; ?> le <?= formate_date($sujet['date_derniere_reponse']); ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="bloc_droit">
                <span class="material-icons">chat</span><?= $sujet['nbr_reponses']; ?>
            </div>
        </div>
    </a>

<?php
    endforeach;
?>
    <script>
        setTimeout(function() { $('.succes_vanishing').slideUp() }, 4000)
    </script>
<?php
}
else
{
?>
    <div class="erreur">Aucun sujet n'a encore été ouvert pour ce projet</div>
<?php
}
?>
</div>