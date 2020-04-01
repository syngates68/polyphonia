<?php
if (isset($_GET['slug']))
{
    $exist_projet = count_by_slug($_GET['slug']);

    if ($exist_projet > 0)
    {
        $projet = req_by_slug($_GET['slug']);
?>
        <div class="container">
            <h1>Suggérer une modification</h1>
            <div class="form_modification">
                <form method="POST" action="../inc/envoyer_modifications.php">
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
                        <script>
                            setTimeout(function(){ window.close() }, 5000);
                        </script>
                    <?php
                    unset($_SESSION['succes']); 
                    endif;
                    ?>
                    <div class="form_ligne">
                        <label for="mail">Adresse mail</label>
                        <input type="mail" id="mail" name="email" <?php if (isset($_SESSION['utilisateur'])) : ?> value="<?= req_utilisateur_by_id($_SESSION['utilisateur'])['email']; ?>" disabled <?php endif; ?> >
                    </div>
                    <div class="form_ligne">
                        <label for="suggestion">Modification suggérée</label>
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
        header('Location:'.BASEURL);
}
else
    header('Location:'.BASEURL);