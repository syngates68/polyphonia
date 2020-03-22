<?php

$exist_projet = count_by_slug($_GET['slug']);

if ($exist_projet > 0)
{

    $projet = req_by_slug($_GET['slug']);
    
?>
    
    <div class="projet_header" style="background:url('<?= BASEURL; ?><?= $projet['illustration']; ?>');background-size:cover;background-repeat:no-repeat;">
        <div class="bloc_noir"></div>
        <div class="titre">
            <h1><?= $projet['titre']; ?></h1>
        </div>
    </div>
    
    <div class="projet_contenu">
        <div class="projet_contenu__top">
            <div class="projet_actions">
                <a href="<?= BASEURL; ?>exporter_pdf.php?id=<?= $projet['id_projet']; ?>" class="exporter_pdf"><i class="material-icons">description</i>Exporter en PDF</a>
            </div>
            <div class="projet_infos">
                <div class="auteur">
                    <img src="<?= BASEURL; ?>assets/img/user.svg">
                    <span class="nom_auteur"><?= $projet['nom_utilisateur']; ?></span>
                </div>
                <div class="date">
                    <img src="<?= BASEURL; ?>assets/img/calendar.svg">
                    <span class="date_ajout"><?= formate_date($projet['date_ajout']); ?></span>
                </div>
            </div>   
        </div>
        <div class="projet_texte">
            <?= nl2br($projet['contenu']); ?>
        </div>
        <div class="projet_contenu__footer">
            <div class="message">
                <span class="nota_bene">N.B. :</span><br/>
                Les projets proposés sur Polyphonia sont faits pour vous donner des idées de projets intéressants à faire, et ils ne sont en rien exhaustifs,
                si vous trouvez d'autres idées concernant le projet ci-dessus, libre à vous de le rajouter à votre projet, et si vous pensez que ces idées peuvent intéresser
                d'autres personnes, ou simplement compléter le projet, n'hésitez pas à <B>suggérer une modification</b> ci-dessous.<br/>
                Si vous ne vous pensez pas avoir le niveau pour une partie du projet, ne vous bloquez pas pour autant, vous pouvez ne pas faire cette partie ou simplement la
                remplacer par autre chose.
            </div>
            <a href="#" id="suggerer_modifications">Suggérer une modification</a>
        </div>
    </div>

    <div class="modal_suggerer_modifications">
        <div class="modal_title">
            <div class="titre">
            <span class="material-icons">notification_important</span>
                Suggérer une modification
            </div>
            <span class="material-icons close_modal">close</span>
        </div>
        <div class="modal_content">
            <div class="erreur" style="display:none;"></div>
            <form method="POST" action="../inc/envoyer_modifications.php">
                <div class="form_ligne">
                    <label>Nom d'utilisateur</label>
                    <input type="text" name="nom_utilisateur" <?php if (isset($_SESSION['utilisateur'])) : ?> value="<?= req_utilisateur_by_id($_SESSION['utilisateur'])['nom_utilisateur']; ?>" disabled <?php endif; ?> >
                </div>
                <div class="form_ligne">
                    <label>Adresse mail</label>
                    <input type="mail" name="email" <?php if (isset($_SESSION['utilisateur'])) : ?> value="<?= req_utilisateur_by_id($_SESSION['utilisateur'])['email']; ?>" disabled <?php endif; ?> >
                </div>
                <div class="form_ligne">
                    <label>Modification suggérée</label>
                    <textarea name="suggestion" id="suggestion"></textarea>
                </div>
                <div class="g-recaptcha" data-sitekey="<?= get_public_key(); ?>"></div>
                <div class="button">
                    <button type="submit" name="envoyer">Envoyer</button>
                </div>
            </form>
        </div>
    </div>

    <script src="<?= BASEURL; ?>assets/js/projet.js"></script>
    <script>
        CKEDITOR.replace('suggestion', {
            height: 300
        });
    </script>
<?php
}
else
{
    //Revoir
    header('Location:'.BASEURL.'404.html');
}

?>